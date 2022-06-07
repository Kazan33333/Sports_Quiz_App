<?php

require_once 'src/repository/Repository.php';
require_once 'src/models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare(
            '
                SELECT public.users.nickname,
                       public.users.email,
                       public.users.password
                FROM public.users
                WHERE public.users.email = :email
            '
        );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['password'],
            $user['email'],
            $user['nickname'],
        );
    }

    public function saveUser(User $user): string
    {
        $email = $user->getEmail();
        if ($this->getUser($email) != null) {
            return "User already exist";
        }
        try {
            $stmt = $this->database->connect()->prepare(
                '
                INSERT INTO public.users(password, email, nickname, date, id_role)
                VALUES (:password, :email, :nickname, CURRENT_TIMESTAMP, 1);
            '
            );

            $password = $user->getPassword();
            $email = $user->getEmail();
            $name = $user->getNickname();

            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':nickname', $name, PDO::PARAM_STR);

            $stmt->execute();

            return "User created successfully";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}