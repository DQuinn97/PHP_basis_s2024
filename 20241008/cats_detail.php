<?php
include("./cats_photos.php");
$id = $_GET["id"] ?: 0;
$id = $photos[$id] ? $id : 0;
?>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cats cats cats</title>
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h1>Cat #<?php echo $id + 1 ?></h1>
            </header>
            <?php

            echo "<aside><a href=\"\"><img src=" . $photos[$id] . "></aside><a>";

            ?>
        </section>
    </main>

</body>

</html>