<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/quiz_sheet.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <title>Quiz sheet</title>
</head>
<body>
<div class="logo">
    <img id="logo2" src="/public/img/Logo.png"></img>
</div>
<div class="header">
    <h2>
        <i id="i1">QUESTION</i>
    </h2>
</div>
<div class="buttons">
    <a href="/play_with_friends">
        <button id="b1" type="button">PLAY WITH FRIENDS</button>
    </a>
    <a href="/solo_game">
        <button id="b2" type="button">SOLO GAME</button>
    </a>
    <a href="/your_points">
        <button id="b3" type="button">YOUR POINTS</button>
    </a>
    <a href="/top_100">
        <button id="b4" type="button">TOP 100</button>
    </a>
</div>
<div class="user-logout">
    <form class="logout" action="logout" method="POST">
        <button class="button_1" action="logout" method=""POST type="submit">Log out</button>
    </form>
</div>
</body>
</html>
