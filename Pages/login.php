<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/index.css"/>
    <title>Login</title>
</head>
<body>
    <main>
    <nav>
        <div>
            <a href="../index.html"><img class="logo" src="../Images/logo-witte-tekst.svg" alt="logo"></a>
        </div>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="overhetspel.html">Over het spel</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign-up</a></li>
            <li><a href="prijzen.html">Prijzen</a></li>
        </ul>
    </nav>
    <div class="textdiv2">
        <h1>Docent? Log hier dan in!</h1>
    </div>
    <div class="green-vector2"></div>
    <div class="formdiv-login">
        <?php if(isset($_SESSION['unautorizedVisitor'])): ?>
            <h2><?=$_SESSION['unautorizedVisitor']?></h2>
        <?php endif; ?>
        <form action="../Includes/login.inc.php" method="post">
            <label for="email">E-mailadres:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">

            <input type="submit" name="logIn" value="Inloggen">
        </form>
    </div>
    </div>
    </main>
</body>
</html>