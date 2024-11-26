<?php
require("./data.php");
$id = $_GET["id"];

if (!isset($photos[$id])) {
    header("HTTP/1.0 404 Not Found");
    header('Location: index.php');
    exit;
}

$detail = $photos[$id];
$user = $detail["user"];

?>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lego Detail <?php $id ?></title>
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h1><?= $detail["alt_description"] ?: $detail["description"] ?></h1>
                <p>van <b><?= $detail["user"]["name"] ?></b></p>
            </header>
            <figure>
                <img alt="<?= $detail["alt_description"] ?>" src="<?= $detail["url"] ?>" />
                <figcaption>
                    <i>"<?= $detail["alt_description"] ?: $detail["description"] ?>" door <b><?= $user["name"] ?></b></i>

                    <p>👍 <?= $detail["likes"] ?> op Unsplash</p>
                </figcaption>
            </figure>
            <aside>
                <h3><?= $detail["alt_description"] ?: $detail["description"] ?></h3>
                <p><?= $detail["description"] ?: $detail["alt_description"] ?></p>
                <small><i><a href="<?= $detail["link"] ?>" target="_blank">Bekijk op Unsplash</a></i></small>
                <p><small><i>Tags: <?= join(', ', $detail["tags"]) ?></i></small>
            </aside>
            <aside>
                <h3>De fotograaf:</h3>
                <img alt="" src="<?= $user["profile_image"] ?>" />

                <?php
                if ($user["first_name"] && $user["last_name"]):
                ?>
                    <p>
                        Voornaam: <?= $user["first_name"] ?> <br>
                        Naam: <?= $user["last_name"] ?>
                    </p>
                <?php
                else:
                ?>
                    <p>
                        Naam: <?= $user["name"] ?>
                    </p>
                <?php
                endif;
                ?>
                <small><i><a href="<?= $user["link"] ?>" target="_blank">Bezoek op Unsplash</a></i></small>
            </aside>
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