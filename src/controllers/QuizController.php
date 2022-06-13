<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Quiz.php';
require_once __DIR__.'/../repository/QuizRepository.php';
require_once __DIR__.'/../repository/QuestionRepository.php';

class QuizController extends AppController
{
    private QuizRepository $quizRepository;
    private QuestionRepository $questionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->quizRepository = new QuizRepository();
        $this->questionRepository = new QuestionRepository();
    }

    public function addQuizQuestions(Quiz &$quiz): void
    {
        $max_id_questions = $this->quizRepository->get_max_id_question();
        $count_of_questions = $quiz->getCountOfQuestions();
        for($i = 0; $i < $count_of_questions; $i++)
        {
            $quiz->add_question_to_quiz($this->questionRepository->getQuestion(rand(0, $max_id_questions)));
        }
    }
}