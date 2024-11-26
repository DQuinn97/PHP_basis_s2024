<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forms</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

</head>

<body>
    <main>
        <section>
            <header>
                <h1>Subscribe</h1>
            </header>
            <form action="forms.php" method="post">
                <label for="firstname">Voornaam: </label>
                <input type="text" name="firstname" id="firstname" required placeholder="John">
                <label for="lastname">Achternaam: </label>
                <input type="text" name="lastname" id="lastname" required placeholder="Doe">
                <label for="email">email: </label>
                <input type="email" name="email" id="email" required placeholder="John.Doe@email.com">
                <label for="gender">Geslacht: </label>
                <input type="radio" name="gender" id="gender-m" value="m"><label for="gender-m">M</label>
                <input type="radio" name="gender" id="gender-f" value="f"><label for="gender-f">F</label>
                <input type="radio" name="gender" id="gender-x" value="x"><label for="gender-x">X</label>
                <br>

                <input type="submit" value="Verzenden..." name="submit" id="submit">
            </form>
        </section>
    </main>
</body>

</html>