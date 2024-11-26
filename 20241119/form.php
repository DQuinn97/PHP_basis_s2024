<?php
require('db.inc.php');
$authors = getAuthors();

$id = (int)@$_GET['id'];


if ($id !== 0) {
    $item = getNewsItem($id);
    if (!$item) {
        header("Location: index.php");
        exit;
    }

    $title = $item['title'];
    $body = $item['body'];
    $_POST['author'] = null || (int)$item['author_id'];
    $_POST['status'] = (int)$item['status'];
}

$errors = [];

if (@$_POST['submit'] !== null) {
    $id = (int)@$_POST['id'];


    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $title = "";
    $body = "";
    $author = null;
    $status = 0;

    if (!isset($_POST['title'])) {
        $errors[] = "title field missing...";
    } elseif (strlen($_POST['title']) == 0) {
        $errors[] = "title field empty...";
    } else {
        $title = $_POST['title'];
    }

    if (!isset($_POST['body'])) {
        $errors[] = "body field missing...";
    } else {
        $body = $_POST['body'];
    }

    if (!isset($_POST['author'])) {
        $errors[] = "author field missing...";
    } elseif (!isset($authors[$_POST['author']]) && (int)$_POST['author'] !== 0) {
        $errors[] = "author id invalid...";
    } else {
        $author = (int)$_POST['author'] != 0 ? (int)$_POST['author'] : null;
    }

    if (!isset($_POST['status'])) {
        $status = 0;
    } elseif ($_POST['status'] == 1) {
        $status = 1;
    }

    if (count($errors) == 0) {
        if ($id == 0) {
            // echo "$title, $body, $author, $status";
            insertNewsItem($title, $body, $author, $status); // !!! krijgt juiste data, maar doet niks en breekt dan de pagina.. :)
        } else {
            updateNewsItem($id, $title, $body, $author, $status);
        }
        //header("Location: index.php?message=Record werd toegevoegd...");
    }
}


?>
<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My first CRUD - t item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

</head>

<body>


    <div class="container">
        <main class="col-md-9">
            <h2><?= $id == 0 ? 'Add new' : 'Edit'; ?> item</h2>

            <?php if (count($errors)): ?>
                <div class="p-3 text-warning-emphasis bg-warning-subtle border border-warning">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <br>
            <?php endif; ?>
            <?php if (@$_POST['submit'] && count($errors) == 0): ?>
                <div class="p-3 bg-success border border-success">
                    <p>Successfully submitted...</p>
                </div>
            <?php endif; ?>

            <form method="post" action="form.php">
                <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title..." value="<?= @$title; ?>">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Article</label>
                    <textarea class="form-control" id="body" name="body" rows="5"><?= @$body; ?></textarea>
                </div>

                <div class="mb-3">
                    <select id="author" name="author" class="form-select" aria-label="Author">
                        <option <?= isset($_POST['author']) && $_POST['author'] != 0 ? '' : 'selected' ?> value=0>Please select an author</option>
                        <?php foreach ($authors as $index => $author): ?>
                            <option value="<?= $index; ?>" <?= $index == @$_POST['author'] ? 'selected' : '' ?>><?= $author; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" value='1' name="status" <?= @$_POST['submit'] == null || @$_POST['status'] == 1 ? 'checked' : ''  ?>>
                        <label class="form-check-label" for="status">Published</label>
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" />
            </form>

        </main>

    </div>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>