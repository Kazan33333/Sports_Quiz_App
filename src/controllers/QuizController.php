<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Quiz.php';
require_once __DIR__.'/../repository/QuizRepository.php';

class QuizController extends AppController
{
    public function addQuizQuestions(Quiz $quiz): Quiz
    {
        for($i = 0; $i < $quiz->getCountOfQuestions(); $i++)
        {
            $quiz->add_question_to_quiz(rand(0, get_max_id_question()));
        }

        return quiz;
    }
}