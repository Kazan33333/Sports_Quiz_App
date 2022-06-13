<?php

class Quiz
{
    private $id_user1;
    private $id_user2;
    private $id_category;
    private $count_of_questions;
    private $list_of_questions;
    private int $id = 0;

    public function __construct($id_user1, $id_user2 = 0, $id_category = 1, $count_of_questions = 5)
    {
        $this->id_user1 = $id_user1;
        $this->id_user2 = $id_user2;
        $this->id_category = $id_category;
        $this->count_of_questions = $count_of_questions;
    }

    public function getListOfQuestions()
    {
        return $this->list_of_questions;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function add_question_to_quiz($question): void
    {
        array_push($this->list_of_questions, $question);
    }
}