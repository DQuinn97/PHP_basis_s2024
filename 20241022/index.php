<?php
$sort = "";
$sort_ = [];
$order = "ASC";
if (isset($_GET["sort"])) {
    $sort = $_GET["sort"];
    // $sort_ = explode(',', $sort);
}
if (isset($_GET["order"])) {
    $order = $_GET["order"];
}


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

$sql = "SELECT * FROM movies";
if (count($sort_) > 0) {
    $sql .= " ORDER BY";
    foreach ($sort_ as $i => $s) {
        $sql .= ($i > 0 ? ',' : '') . " $s ASC";
    }
}


$stmt = $db->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Movies</h1>
            </header>

            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>year</th>
                        <th>studio</th>
                        <th>genres</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d): ?>
                        <tr>
                            <td><?= $d['id'] ?></td>
                            <td><?= $d['title'] ?></td>
                            <td><?= $d['release_year'] ?></td>
                            <td><?= $d['production_studio'] ?></td>
                            <td><?= $d['genres'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <!-- <pre>
    <?php print_r($data); ?>
    </pre> -->
</body>

</html>