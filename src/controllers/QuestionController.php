<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Question.php';
require_once __DIR__.'/../repository/QuestionRepository.php';

class QuestionController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $questionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->questionRepository = new QuestionRepository();
    }

    public function addQuestion()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            // TODO create new project object and save it in database(potem outnąć)
            $question = new Question($_POST['question_line'], $_POST['answer1'], $_POST['answer2'],$_POST['answer3'],$_POST['answer4'],$_POST['correct_answer'],$_POST['id_category'], $_FILES['file']['name']);
            $this->questionRepository->addQuestion($question);

            return $this->render('projects', ['messages' => $this->message]);//
        }
        return $this->render('quiz-sheet', ['messages' => $this->message]);//
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}

