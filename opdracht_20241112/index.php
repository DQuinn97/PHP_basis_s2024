<?php
include('db.inc.php');

print '<pre>';
print_r($_POST);
print '</pre>';
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Members subscription
    </title>
    <style>
        ul.error {
            background-color: red;
            color: white;
        }

        ul.notif {
            background-color: green;
            color: white;
        }

        body {
            width: 99vw;
        }

        nav {
            float: right;
            margin-right: 5vw;
        }

        main {
            width: 80vw;
            margin: 0 auto;
        }

        form {
            width: 50vw;
            margin: 0 auto;
            display: grid;
        }

        #gender {
            width: 125px;
        }

        header,
        button {
            width: 125px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <nav>
        <a href="./admin.php">admin pagina</a>
    </nav>
    <main>

        <section id="addform">
            <form method="post" action="index.php">
                <header>
                    <h2>Subscribe...</h2>
                </header>

                <?php if (count($errors)): ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if (count($notifs)): ?>
                    <ul class="notif">
                        <?php foreach ($notifs as $notif): ?>
                            <li><?= $notif; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <label for="firstname">Voornaam<small>*</small>:</label>
                <input maxlength="100" type="text" id="firstname" value="<?= @$firstname; ?>" name="firstname" placeholder="Typ hier je voornaam..." />
                <br>
                <label for="lastname">Familienaam<small>*</small>:</label>
                <input maxlength="100" type="text" id="lastname" value="<?= @$lastname; ?>" name="lastname" placeholder="Typ hier je familienaam..." />
                <br>
                <label for="username">Gebruikersnaam<small>*</small>:</label>
                <input maxlength="20" type="text" id="username" value="<?= @$username; ?>" name="username" placeholder="Typ hier je gebruikersnaam..." />
                <br>

                <label for="gender">Geslacht<small>*</small>:</label>
                <select id="gender" name="gender">
                    <option value="0">- selecteer -</option>
                    <option value="f" <?= (@$_POST['gender'] == 'f' ? 'selected' : ''); ?>>Vrouw</option>
                    <option value="m" <?= (@$_POST['gender'] == 'm' ? 'selected' : ''); ?>>Man</option>
                    <option value="x" <?= (@$_POST['gender'] == 'x' ? 'selected' : ''); ?>>X</option>
                </select>
                <br>
                <label for="photo">Profielfoto:</label>
                <input type="url" id="photo" name="photo" value="<?= @$photo; ?>" placeholder="Typ hier de link naar je profielfoto...">
                <br>

                <button id="submit" name="submit" type="submit">Subscribe</button>
            </form>
        </section>

    </main>
</body>

</html>