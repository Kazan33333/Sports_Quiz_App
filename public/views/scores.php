<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/scores.css">
    <title>Scores</title>
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
            <i id="i1">Scores</i>
        </h2>
    </div>
    <div class="list1">
        <a href="/solo_game">
            <button class="button_play" type="submit" id="play">Play again</button>
        </a>
    </div>
    <div class="scores">
        <i id="i2">GREAT!</i>
        <i id="i3">Your score:....................<?php echo $_COOKIE['points'];?>/5</i>
    </div>
</body>
</html>