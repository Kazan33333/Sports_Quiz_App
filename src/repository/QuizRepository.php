<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Question.php';

class QuizRepository extends Repository
{
    public function addQuiz(Quiz $quiz): int
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO quiz (id_user1, id_user2, date, id_category, count_of_questions)
            VALUES (?, ?, ?, ?, ?) RETURNING id;
        ');

        $stmt->execute([
            $quiz->getIdUser1(),
            $quiz->getIdUser2(),
            $date,
            $quiz->getIdCategory(),
            $quiz->getCountOfQuestions()
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_max_id_question(): ?int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT MAX(id) as max_id_question FROM public.questions
        ');

        $stmt->execute();

        $max_id_question = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($max_id_question == false) {
            return null;
        }

        return $max_id_question;
    }
}