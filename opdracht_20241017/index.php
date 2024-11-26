<?php
require("./answers.php");
$previousAnswer =  null;

if (isset($_GET["result"])) {
    $previousAnswer = $_GET["result"];
}


function getRandomAnswer($prev = null)
{
    global $answers;
    return $answers[rand(0, count($answers) - 1)];
}
$newAnswer = "";
do {
    $newAnswer = getRandomAnswer();
} while ($newAnswer == $previousAnswer);
?>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Magic 8-Ball</title>

    <link rel="stylesheet" href="8ball.css">
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h1>Magic 8-Ball</h1>
            </header>

            <aside class="ball-container">
                <img src="./8-ball.png" style='width:100%'>
                <div class="ball-answer"><?= $previousAnswer ?></div>

            </aside>
        </section>
        <section>
            <a href="index.php?result=<?= $newAnswer ?>" target="_self"><b><?= $previousAnswer ? "ASK AGAIN" : "ASK 8-BALL" ?></b></a>
        </section>
    </main>
    <footer>
        <hr>
        <p>
            <small> Gemaakt door Quinten Rotthier</small>
        </p>
    </footer>
</body>

</html>