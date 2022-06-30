<?php
require_once 'database.php';
session_start();

if (isset($_POST["logIn"])) {
    $email = htmlentities($_POST["email"]);
    $pwd = htmlentities($_POST["password"]);
    $emptyInput = false;

    // Checken of de input ingevuld is. Zo niet dan weergeef een foutmelding
    if (empty($email) || empty($pwd)) {
        $emptyInput = true;
    }

    if ($emptyInput === true) {
        header("location: ../pages/login.php?error=emptyinput ");
        exit();
    }

    $sql = "SELECT * FROM `users` WHERE email = ?";
   

    // User ophalen op basis van e-mail
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Lukt het checken niet? Weergeef error
        header("location: ../pages/login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    $result = mysqli_stmt_execute($stmt);
    
    // id, emailadres en pwd ophalen en terug krijgen

    $user = mysqli_fetch_assoc($stmt->get_result());
    $userId = $user['id'];
    $userPassword = $user['password'];
    $userEmail =  $user['email'];

    // Checken of gegevens overeenkomen 
    $userVerified = password_verify($pwd, $userPassword);

    // Als het niet klopt, error handling (melding in URL) met wrong credentitals
    if (!$userVerified){
        header("location: ../pages/login.php?error=wrongcredentitals");
    }

    // Als het goed is, sla iets op in session
    $_SESSION['userId'] = $userId;
    $_SESSION['userEmail'] = $userEmail;

    // Re-directen naar admin 
    header("location: ../pages/admin.php");


}
