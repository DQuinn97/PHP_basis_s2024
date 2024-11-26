<?php
require("./data.php");
$page = $_GET["page"] ?: 0;
$itemsPP = 6;
?>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lego Splash</title>
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h1>Lego</h1>
                <p><b><?= "Totaal: " . count($photos) . " foto's" ?></b></p>
            </header>
            <?php
            for ($id = $page * $itemsPP; $id < $page * $itemsPP + $itemsPP; $id++):
                $detail = $photos[$id];
            ?>
                <aside style="background-color:<?= $detail["color"] ?>">
                    <a href="./detail.php?id=<?= $id ?>">
                        <img alt="<? $detail["alt_description"] ?>" src="<?= $detail["url"] ?>" />
                    </a>
                </aside>
            <?php
            endfor;
            ?>
        </section>
        <section>
            <?php if (($page > 0)): ?>
                <a href="?page=<?= $page - 1 ?>"><b>
                        < Prev</b></a>
            <?php endif; ?>
            <?php if (($page) * $itemsPP + $itemsPP < count($photos)): ?>
                <a href="?page=<?= $page + 1 ?>"><b>Next ></b></a>
            <?php endif; ?>
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