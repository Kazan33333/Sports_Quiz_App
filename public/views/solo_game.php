<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/solo_game.css">
    <title>Solo game</title>
</head>
<body>
    <div class="logo">
        <h1>
            <a href="/main_menu">
                <img id="logo2" src="/public/img/Logo.png"></img>
            </a>
        </h1>
    </div>
    <div class="header">
        <h2>
            <i id="i1">Solo game</i>
        </h2>
    </div>
    <div class="list1">
        <div class="question_count">
            Count of questions: <?php echo $count_of_questions;?>
        </div>
        <a href="/quiz_sheet/1">
            <button class="button_play" type="submit" id="play">Play</button>
        </a>
    </div>
</body>
</html>