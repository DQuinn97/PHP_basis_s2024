<?php

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

$errors = [];
$notifs = [];

if (@$_POST['submit'] !== null) {

    // Validaties voor voornaam
    $firstname = @$_POST['firstname'];
    if (strlen($firstname) == 0) {
        $errors[] = 'Gelieve een voornaam in te vullen.';
    } else if (strlen($firstname) > 100) {
        $errors[] = 'Je voornaam is te lang...';
    }

    // Validaties voor naam
    $lastname = @$_POST['lastname'];
    if (strlen($lastname) == 0) {
        $errors[] = 'Gelieve een familienaam in te vullen.';
    } else if (strlen($lastname) > 100) {
        $errors[] = 'Je familienaam is te lang...';
    }

    // Validaties voor gebruikersnaam
    $username = @$_POST['username'];

    if (strlen($username) == 0) {
        $errors[] = 'Gelieve een gebruikersnaam in te vullen.';
    } else if (strlen($username) > 20) {
        $errors[] = 'Je gebruikersnaam is te lang...';
    } else if (in_array($username, getUsernames())) {
        $errors[] = 'Deze gebruikersnaam bestaat al...';
    }

    // Validaties voor geslacht
    $gender = @$_POST['gender'];
    if (!in_array($gender, ['f', 'm', 'x'])) {
        $errors[] = 'Gelieve je geslacht te selecteren.';
    }

    // Validaties voor photo
    $photo = @$_POST['photo'];
    if (strlen($username) > 255) {
        $errors[] = 'De url van de photo is te lang...';
    }

    // Notificatie toevoegen wanneer succesvol
    if (count($errors) == 0) {
        $success = insertMember($firstname, $lastname, $username, $gender, $photo);
        if ($success) {
            $notifs[] = "Gebruiker '$username' succesvol toegevoegd";
        }
    }
}

// PAS STATUS AAN NAAR 0 INDIEN taakId AANWEZIG IN POST
$memberIdToDelete = @$_POST['memberId'];
if ($memberIdToDelete !== null) {
    deleteMember($memberIdToDelete) ? $notifs[] = 'Member succesvol verwijderd...' : $errors[] = 'Member kon niet verwijderd worden...';
}

// HAAL ALLE USERNAMES OP UIT DE DB
function getUsernames(): array
{
    global $db;

    $sql = "SELECT username FROM members";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $usernames = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return array_map(function ($username) {
        return $username['username'];
    }, $usernames);
}

// HAAL ALLE MEMBERS OP UIT DE DB
function getMembers(): array
{
    global $db;

    $sql = "SELECT id, username, firstname, lastname, gender, photo FROM members WHERE username<>'-'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// MEMBER TOEVOEGEN
function insertMember(String $firstname, String $lastname, String $username, String $gender, String $photo): bool
{
    global $db;
    $sql = "INSERT INTO members(firstname, lastname, username, gender, photo) VALUES (:firstname, :lastname, :username, :gender, :photo)";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':username' => $username,
        ':gender' => $gender,
        ':photo' => $photo
    ]);

    return $success;
}

// MEMBER VERWIJDEREN
function deleteMember(int $id, bool $soft = true): bool
{
    global $db;

    if ($soft) {
        $sql  = "UPDATE members SET username='-', firstname='-', lastname='-', gender='x', photo=NULL, updated=CURRENT_TIMESTAMP WHERE id=:id";
    } else {
        $sql = "DELETE FROM members WHERE id = :id";
    }
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([
        ':id' => $id
    ]);
    return $success;
}
