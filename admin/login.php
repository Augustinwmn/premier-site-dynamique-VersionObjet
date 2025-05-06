<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleLogin.css">
    <title>Administration - veuillez vous authentifier</title>
</head>
<body>

    <form action="traitement_login.php" method="POST">

        <input type="text" placeholder="identifiant" name="identifiant">

        <input type="password" placeholder="password" name="mdp">

        <input type="submit" value="Valider">

    </form>
    <a href="../index.php"><button>Exit</button></a>
</body>
</html>