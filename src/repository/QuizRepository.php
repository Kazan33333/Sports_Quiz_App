<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Question.php';

class QuizRepository extends Repository
{
    public function addQuiz(Quiz $quiz): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO quiz (id_user1, id_user2, date, id_category, count_of_questions)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $quiz->getIdUser1(),
            $quiz->getIdUser2(),
            $date,
            $quiz->getIdCategory(),
            $quiz->getCountOfQuestions()
        ]);
    }
}