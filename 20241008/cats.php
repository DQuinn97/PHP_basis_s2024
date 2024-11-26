<?php
include("./cats_photos.php");
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
                <h1>Cats!</h1>
            </header>
            <?php

            foreach ($photos as $id => $link) {
                echo "<aside><a href=\"./cats_detail.php?id=$id\"><img src=$link ></aside><a>";
            }
            ?>
        </section>
    </main>

</body>

</html>