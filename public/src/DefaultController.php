<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function main_menu()
    {
        $this->render('main_menu');
    }

    public function solo_game()
    {
        $this->render('solo_game');
    }

    public function play_with_friends()
    {
        $this->render('play_with_friends');
    }

    public function top_100()
    {
        $this->render('top_100');
    }

    public function add_question()
    {
        $this->render('add_question');
    }
}