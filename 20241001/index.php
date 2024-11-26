<!DOCTYPE html>
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$id = $_GET["id"] || 0;
switch ($id) {
  case 0:
    $name = "Quinten Rotthier";
    break;
  case 1:
    $name = "Also Quinten Rotthier";
    break;
  default:
    $name = "No Name";
    break;
}
?>


<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $name; ?></title>
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
  <main>
    <h1><?php echo $name; ?></h1>
    <h2>Student Full Stack Developer</h2>
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis, dolore
      debitis, blanditiis ad sapiente maxime aliquid, quo culpa qui laborum
      libero itaque. Voluptatibus nostrum ex accusamus maxime expedita modi
      nemo!
    </p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Fuga expedita excepturi, dolorum inventore in esse magnam repudiandae debitis incidunt!
      Placeat iusto voluptas quis adipisci dolorum atque assumenda voluptates, sunt illo.
    </p>
    <ul>
      <li>
        <a href="https://www.linkedin.com/in/quinten-rotthier/" title="LinkedIn">Mijn LinkedIn</a>
      </li>
      <li>
        <a
          href="mailto:quinten2407@gmail.com?subject=test test&body=this is a test"
          title="mail">Mijn Email</a>
      </li>
    </ul>
  </main>
  <footer>
    <hr>
    <p align="center"><small>&copy; Copyright 2024 by <?php echo $name ?></small></p>
  </footer>
</body>

</html>