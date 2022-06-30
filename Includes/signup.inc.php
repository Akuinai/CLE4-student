<?php

// Checken of de input is ingevuld | Convert string naar HTML entities
if (isset($_POST["signIn"])) {
    $email = htmlentities($_POST["email"]);
    $pwd = htmlentities($_POST["password"]);

    // Checken of de input ingevuld is. Zo niet dan weergeef een foutmelding
    if (empty($email) || empty($pwd)) {
        $emptyInput = true;
    };

    if ($emptyInput === true) {
        header("location: ../pages/signup.php?error=emptyinput ");
        exit();
    }

    require_once 'database.php';

    // Query voor het aanmaken van data in het formulier
    $sql = "INSERT INTO users (email, password) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Lukt het aanmaken niet? Weergeef error
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, password_hash($pwd, PASSWORD_BCRYPT));
    mysqli_stmt_execute($stmt);
    
    // Gelukt? Weergeef in header dat er geen error is
    header("location: ../pages/login.php");
} else {
    // Iets anders mis gegaan? Stuur de gebruiker terug naar de admin pagina
    header("location: ../pages/signup.php");
    exit();
}
