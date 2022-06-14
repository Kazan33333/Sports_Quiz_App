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
        <a href="/quiz_sheet">
            <button id="b1" type="button"><?php echo $answer1;?></button>
            <button id="b2" type="button"><?php echo $answer2;?></button>
            <button id="b3" type="button"><?php echo $answer3;?></button>
            <button id="b4" type="button"><?php echo $answer4;?></button>
        </a>
    </div>
</body>
</html>
