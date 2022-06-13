<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Question.php';

class QuizRepository extends Repository
{
    public function addQuiz(Quiz &$quiz): void
    {
        $stmt = $this->database->connect()->prepare("
            INSERT INTO quizes (id_user1, id_user2, id_category, count_of_questions)
            VALUES (?, ?, ?, ?) RETURNING id;
        ");

        $stmt->execute([
            $quiz->getIdUser1(),
            $quiz->getIdUser2(),
            $quiz->getIdCategory(),
            $quiz->getCountOfQuestions()
        ]);

        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        $quiz->setId($id['id']);
    }

    public function get_max_id_question(): ?int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT MAX(id) as max_id_question FROM public.questions
        ');

        $stmt->execute();

        $ret_val = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ret_val == false) {
            return null;
        }

        return $ret_val['max_id_question'];
    }

    public function add_quiz_question(Quiz $quiz): void
    {
        foreach ($quiz->getListOfQuestions() as $question)
        {
            $stmt = $this->database->connect()->prepare('
                INSERT INTO quiz_question (id_quiz, id_question)
                VALUES (?, ?) RETURNING id
            ');

            $stmt->execute([
                $quiz->getId(),
                $question->getId()
            ]);

            $ret_val = $stmt->fetch(PDO::FETCH_ASSOC);

            $question->setIdQuizQuestion($ret_val['id']);
        }
    }
}