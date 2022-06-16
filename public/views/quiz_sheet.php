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
            <i id="i1"><?php echo $correct_answer, $question_line;?></i>
        </h2>
    </div>
    <div class="buttons">
        <form action="/quiz_sheet/<?php echo $id+1;?>" method="GET">
            <input type="hidden" name="correct_answer" value=<?php echo $correct_answer?>>
            <input type="submit" name="answer" value="<?php echo $answer1;?>" id="A">
            <input type="submit" name="answer" value="<?php echo $answer2;?>" id="B">
            <input type="submit" name="answer" value="<?php echo $answer3;?>" id="C">
            <input type="submit" name="answer" value="<?php echo $answer4;?>" id="D">
        </form>
    </div>
    <div class="button_1">
        <?php echo $id;?> / 5
    </div>
</body>
</html>
