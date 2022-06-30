<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/index.css"/>
    <title>Sign-up</title>
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
        <h1>Docent? Maak hier een account aan!</h1>
    </div>
    <div class="green-vector2"></div>
    <div class="formdiv-login">
        <form action="../Includes/signup.inc.php" method="post">
            <label for="email">E-mailadres:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
            
            <input type="submit" name="signIn" value="Aanmelden">
        </form>
    </div>
    </div>
    </main>
</body>
</html>