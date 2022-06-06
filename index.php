<?php

require 'Routing.php';

$path = $_SERVER['REQUEST_URI'];
$path = trim($path, '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('main_menu', 'DefaultController');
Router::get('solo_game', 'DefaultController');
Router::get('play_with_friends', 'DefaultController');
Router::get('top_100', 'DefaultController');
Router::get('add_question', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('logout', 'SecurityController');
Router::post('register', 'SecurityController');

Router::run($path);