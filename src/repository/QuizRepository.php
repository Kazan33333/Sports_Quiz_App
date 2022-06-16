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
        setcookie('id_quiz', $id['id'], time() + (86400 * 30), "/");
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
        $i = 1;
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

            setcookie('id_qq'.$i, $ret_val['id'], time() + (86400 * 30), "/");
            $i++;
        }
    }

    public function add_answer($id_qq, $answer): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO answers (id_quiz_question, id_user, answer)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $id_qq,
            $_COOKIE['id_user'],
            $answer
        ]);
    }

    public function getPoints(): array
    {
        $stmt = $this->database->connect()->prepare("
            SELECT to_char(quizes.date, 'YYYY-MM-DD HH24:MI') as quiz_date, COUNT(answers.id) FROM answers
            INNER JOIN quiz_question ON answers.id_quiz_question = quiz_question.id
            INNER JOIN questions ON quiz_question.id_question = questions.id
            INNER JOIN quizes ON quiz_question.id_quiz = quizes.id
            WHERE questions.correct_answer = answers.answer
            AND answers.id_user = :id_user
            GROUP BY answers.id_user, quizes.id;
        ");

        $id_user = $_COOKIE['id_user'];

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_total_points(): ?int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT answers.id_user, COUNT(answers.id) FROM answers
            INNER JOIN quiz_question ON answers.id_quiz_question = quiz_question.id
            INNER JOIN questions ON quiz_question.id_question = questions.id
            WHERE questions.correct_answer = answers.answer
            AND answers.id_user = :id_user
            GROUP BY answers.id_user;
        ');

        $id_user = $_COOKIE['id_user'];

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);

        $stmt->execute();

        $ret_val = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ret_val == false) {
            return null;
        }

        return $ret_val['count'];
    }

    public function getRanking(): array
    {
        $stmt = $this->database->connect()->prepare("
            SELECT users.nickname, COUNT(answers.id) as points FROM answers
            INNER JOIN quiz_question ON answers.id_quiz_question = quiz_question.id
            INNER JOIN questions ON quiz_question.id_question = questions.id
            INNER JOIN quizes ON quiz_question.id_quiz = quizes.id
            INNER JOIN users ON answers.id_user = users.id
            WHERE questions.correct_answer = answers.answer
            GROUP BY users.nickname
            ORDER BY points
            LIMIT 100;
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}