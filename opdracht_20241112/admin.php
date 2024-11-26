<?php
include('db.inc.php');

print '<pre>';
print_r($_POST);
print '</pre>';

$members = getMembers();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        PHP todo app...
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

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <main>

        <section id="overview">
            <header>
                <h2>Members</h2>
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
            <table>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>gender</th>
                    <th>photo</th>
                    <th style="color:red">DELETE?</th>
                </tr>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= $member['id']; ?></td>
                        <td><?= $member['username']; ?></td>
                        <td><?= $member['firstname']; ?></td>
                        <td><?= $member['lastname']; ?></td>
                        <td><?= $member['gender']; ?></td>
                        <td><?= $member['photo']; ?></td>
                        <td>
                            <form method="post" action="admin.php">
                                <input type="hidden" id="memberId" name="memberId" value="<?= $member['id']; ?>">
                                <button type="submit">Verwijder member</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

    </main>
</body>

</html>