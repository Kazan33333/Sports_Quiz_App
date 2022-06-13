<?php

class Question {
    private int $id = 0;
    private $question_line;
    private $answer1;
    private $answer2;
    private $answer3;
    private $answer4;
    private $correct_answer;
    private $id_category;
    private $image;
    private int $id_quiz_question = 0;

    public function __construct($question_line, $answer1,$answer2,$answer3,$answer4, $correct_answer, $id_category, $image)
    {
        $this->question_line = $question_line;
        $this->answer1 = $answer1;
        $this->answer2 = $answer2;
        $this->answer3 = $answer3;
        $this->answer4 = $answer4;
        $this->correct_answer = $correct_answer;
        $this->id_category= $id_category;
        $this->image = $image;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdQuizQuestion(): int
    {
        return $this->id_quiz_question;
    }

    public function setIdQuizQuestion(int $id_quiz_question): void
    {
        $this->id_quiz_question = $id_quiz_question;
    }

    public function getQuestion_line()
    {
        return $this->question_line;
    }

    public function setQuestion_line($question_line)
    {
        $this->question_line = $question_line;
    }

    public function getAnswer1()
    {
        return $this->answer1;
    }

    public function setAnswer1($answer1)
    {
        $this->answer1 = $answer1;
    }

    public function getAnswer2()
    {
        return $this->answer2;
    }

    public function setAnswer2($answer2)
    {
        $this->answer2 = $answer2;
    }

    public function getAnswer3()
    {
        return $this->answer3;
    }

    public function setAnswer3($answer3)
    {
        $this->answer3 = $answer3;
    }

    public function getAnswer4()
    {
        return $this->answer4;
    }

    public function setAnswer4($answer4)
    {
        $this->answer4 = $answer4;
    }

    public function getCorrect_answer()
    {
        return $this->correct_answer;
    }

    public function setCorrect_answer($correct_answer)
    {
        $this->correct_answer = $correct_answer;
    }

    public function getId_category()
    {
        return $this->id_category;
    }

    public function setId_category($id_category)
    {
        $this->id_category = $id_category;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}
