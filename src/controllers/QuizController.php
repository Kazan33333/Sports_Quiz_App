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

    private function addQuizQuestions(Quiz &$quiz): void
    {
        $max_id_questions = $this->quizRepository->get_max_id_question();
        $count_of_questions = $quiz->getCountOfQuestions();
        for($i = 1; $i <= $count_of_questions; $i++)
        {
            $id_question = rand(1, $max_id_questions);
            $question = $this->questionRepository->getQuestion($id_question);
            $question->setId($id_question);
            $quiz->add_question_to_quiz($question);
            setcookie('id_question'.$i, $id_question, time() + (86400 * 30), "/");
        }
    }

    public function solo_game()
    {
        $quiz = new Quiz(
            $_COOKIE['id_user']
        );

        $this->quizRepository->addQuiz($quiz);

        $this->addQuizQuestions($quiz);

        $this->quizRepository->add_quiz_question($quiz);

        return $this->render('solo_game', ['count_of_questions' => $quiz->getCountOfQuestions()]);
    }

    public function quiz_sheet($id)
    {
        if($id == null || $id == 0){
            $id = 1;
        }

        if($id > 5){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/main_menu");
        }

        $question = $this->questionRepository->getQuestion($_COOKIE['id_question'.$id]);

        if($question == null){
            $this->render('main_menu', []);
        }

        $this->render('quiz_sheet', [
            'id' => $id,
            'question_line' => $question->getQuestion_line(),
            'answer1' => $question->getAnswer1(),
            'answer2' => $question->getAnswer2(),
            'answer3' => $question->getAnswer3(),
            'answer4' => $question->getAnswer4(),
            'correct_answer' => $question->getCorrect_answer(),
            'image' => $question->getImage()
        ]);
    }
}