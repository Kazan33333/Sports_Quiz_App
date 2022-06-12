<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Quiz.php';
require_once __DIR__.'/../repository/QuizRepository.php';

class QuizController extends AppController
{
    private QuizRepository $quizRepository;

    public function __construct()
    {
        parent::__construct();
        $this->quizRepository = new QuizRepository();
    }

    public function addQuizQuestions(Quiz $quiz): Quiz
    {
        $max_id_questions = $this->quizRepository->get_max_id_question();
        for($i = 0; $i < $quiz->getCountOfQuestions(); $i++)
        {
            $quiz->add_question_to_quiz(rand(0, $max_id_questions));
        }

        return $quiz;
    }
}