<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Question.php';

class QuestionRepository extends Repository
{

    public function getQuestion(int $id): ?Question
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.questions WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $question = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($question == false) {
            return null;
        }

        return new Question(
            $question['question_line'],
            $question['answer1'],
            $question['answer2'],
            $question['answer3'],
            $question['answer4'],
            $question['correct_answer'],
            $question['id_category'],
            $question['image']
        );
    }

    public function addQuestion(Question $question): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO questions (question_line, answer1,answer2,answer3,answer4, correct_answer, id_category,id_user, flag, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $id_user = 1;
        $flag = 1;

        $stmt->execute([
            $question->getQuestion_line(),
            $question->getAnswer1(),
            $question->getAnswer2(),
            $question->getAnswer3(),
            $question->getAnswer4(),
            $question->getCorrect_answer(),
            $question->getId_category(),
            $id_user,
            $flag,
            $question->getImage()

        ]);
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
