<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/your_points.css">
    <title>Your points</title>
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
            <i id="i1">Your points</i>
        </h2>
    </div>
    <div class="list1">
        <div class="suma_pkt">Suma punktów: <?php echo $total;?></div>
        <table>
            <tr>
                <th>Date</th>
                <th>Points</th>
            </tr>
            <?php foreach ($points as $point):?>
            <tr>
                <td><?php echo $point['quiz_date']?></td>
                <td><?php echo $point['count']?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>