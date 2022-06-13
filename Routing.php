<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/QuizController.php';

class Router {

    public static $routes;

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run($url) {

        $action = explode("/", $url)[0];

        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }
        if(isset($_COOKIE['user']) && $url != 'logout'){
            $controller = self::$routes[explode("/",$url)[0]];
            $object = new $controller;
            $action = $action ?: 'login';
        }
        elseif ($url == 'logout' || $url == 'register'){
            $controller = self::$routes[$action];
            $object = new $controller;
            $action = $url;
        }
        else {
            $controller = self::$routes[$action];
            $object = new $controller;
            $action = 'login';
        }
        $object->$action();
    }
}