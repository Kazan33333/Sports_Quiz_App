<?php

class Quiz
{
    private $id_user1;
    private $id_user2;
    private $id_category;
    private $count_of_questions;
    private $list_of_questions;

    public function __construct($id_user1, $id_user2, $id_category, $count_of_questions)
    {
        $this->id_user1 = $id_user1;
        $this->id_user2 = $id_user2;
        $this->id_category = $id_category;
        $this->count_of_questions = $count_of_questions;

        $max_id_question = get_max_id_question();
    }

    public function getIdUser1()
    {
        return $this->id_user1;
    }

    public function setIdUser1($id_user1): void
    {
        $this->id_user1 = $id_user1;
    }

    public function getIdUser2()
    {
        return $this->id_user2;
    }

    public function setIdUser2($id_user2): void
    {
        $this->id_user2 = $id_user2;
    }

    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function setIdCategory($id_category): void
    {
        $this->id_category = $id_category;
    }

    public function getCountOfQuestions()
    {
        return $this->count_of_questions;
    }

    public function setCountOfQuestions($count_of_questions): void
    {
        $this->count_of_questions = $count_of_questions;
    }
}