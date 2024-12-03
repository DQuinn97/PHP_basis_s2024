<?php

// CONNECTIE MAKEN MET DE DB
function connectToDB()
{
    // CONNECTIE CREDENTIALS
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'phpbasis';
    $db_port = 8889;

    try {
        $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        die();
    }
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    return $db;
}


// REGISTER USER TO DB
function register(String $fn, String $ln, String $email, String $password, Int $optin = 0): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO users(firstname, lastname, mail, password, optin) VALUES (:firstname, :lastname, :mail, :password, :optin);";
    $stmt = $db->prepare($sql);
    $stmt->execute([':firstname' => $fn, ':lastname' => $ln, ':mail' => $email, ':password' => md5($password), ':optin' => $optin]);
    return $db->lastInsertId();
}

// CHECK IF USER EXISTS
function checkEmail(String $email): bool
{
    $sql = "SELECT id FROM users WHERE mail = :mail;";
    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([':mail' => $email]);
    $exists = $stmt->fetch(PDO::FETCH_ASSOC);
    return $exists ? true : false;
}

// CHECK IF USER EXISTS WITH PASSWORD
function checkUser(String $email, String $password): bool | int
{
    $sql = "SELECT id FROM users WHERE mail = :mail AND password = :password;";
    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([':mail' => $email, ':password' => md5($password)]);
    return $stmt->fetchColumn();
}
