<?php

session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['userId']);
header("Location: index.php");
exit;
