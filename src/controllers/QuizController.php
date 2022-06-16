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

        setcookie('points', 0, time() + (86400 * 30), "/");

        return $this->render('solo_game', ['count_of_questions' => $quiz->getCountOfQuestions()]);
    }

    public function quiz_sheet($id)
    {
        if($_POST['answer']) {
            $my_points = $_COOKIE['points'];
            $answer = $_POST['answer'];
            $correct_answer = $_POST['correct_answer'];
            if($answer == $correct_answer) {
                $my_points += 1;
                setcookie('points',  $my_points, time() + (86400 * 30), "/");
            }
            $id_qq_1 = $id-1;
            $this->quizRepository->add_answer($_COOKIE['id_qq'.$id_qq_1], $answer);
        }

        if($id == null || $id == 0){
            $id = 1;
        }

        if($id > 5){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/scores");
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
            'image' => $question->getImage(),
            'points' => $my_points
        ]);
    }

    public function your_points() {
        $points = $this->quizRepository->getPoints();
        $total = $this->quizRepository->get_total_points();
        $this->render('your_points', [
            'points' => $points,
            'total' => $total
        ]);
    }

    public function top_100() {
        $points = $this->quizRepository->getRanking();
        $this->render('top_100', [
            'points' => $points
        ]);
    }
}