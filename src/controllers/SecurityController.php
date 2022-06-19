<?php

require_once 'AppController.php';

require_once 'src/models/User.php';
require_once 'src/repository/UserRepository.php';

class SecurityController extends AppController {

    private $cookieName;
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->cookieName = 'user';
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User does not exist']]);
        }
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist']]);
        }
        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong email or password']]);
        }

        $cookieIdValue = $user->getIdUser();
        $cookieEmailValue = $user->getEmail();
        $cookieNicknameValue = $user->getNickname();


        if (!isset($_COOKIE[$this->cookieName])) {
            setCookie($this->cookieName, $cookieNicknameValue, time() + (86400 * 30), "/");
            setCookie('id_user', $cookieIdValue, time() + (86400 * 30), "/");
            setCookie('email', $cookieEmailValue, time() + (86400 * 30), "/");
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/main_menu");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $user = new User(
            0,
            $_POST['nickname'],
            password_hash($_POST['password'], PASSWORD_DEFAULT),
            $_POST['email']
        );

        $message = $this->userRepository->saveUser($user);

        return $this->render('register', ['messages' => [$message]]);

    }

    public function logout()
    {
        if (isset($_COOKIE['user'])) {
            setcookie($this->cookieName, '', time() - (86400 * 30), "/");
            setcookie('user', '', time() - (86400 * 30), "/");
            setcookie('email', '', time() - (86400 * 30), "/");
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/");
        }
    }
}