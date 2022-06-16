<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/quiz_sheet.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main_menu.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Quiz sheet</title>
</head>
<body>
    <div class="logo">
        <img id="logo2" src="/public/img/Logo.png"></img>
    </div>
    <div class="header">
        <h2>
            <i id="i1"><?php echo $question_line;?></i>
        </h2>
    </div>
    <div class="buttons">
        <form action="/quiz_sheet/<?php echo $id+1;?>" method="POST">
            <input type="hidden" name="correct_answer" value=<?php echo $correct_answer?>>
            <button type="submit" name="answer" value="A" id="A"><?php echo $answer1;?></button>
            <button type="submit" name="answer" value="B" id="B"><?php echo $answer2;?></button>
            <button type="submit" name="answer" value="C" id="C"><?php echo $answer3;?></button>
            <button type="submit" name="answer" value="D" id="D"><?php echo $answer4;?></button>
        </form>
    </div>
    <div class="question_no">
        <?php echo $id;?> / 5
    </div>
    <div class="points">
        <?php echo $_COOKIE['points'];?> / 5
    </div>
</body>
</html>
