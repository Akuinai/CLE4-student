<?php


// Checken of de input is ingevuld | Convert string naar HTML entities

if (isset($_POST["updateStudent"])) {
    $firstName = htmlentities($_POST["firstName"]);
    $lastName = htmlentities($_POST["lastName"]);
    $ageChild = htmlentities($_POST["ageChild"]);
    $classNumber = htmlentities($_POST["classNumber"]);


    // Checken of de input ingevuld is. Zo niet dan weergeef een foutmelding

    if (empty($firstName) || empty($lastName) || empty($ageChild) || empty($classNumber)) {
        $emptyInput = true;
    };

    if ($emptyInput == true) {
        header("location: ../pages/admin.php?error=emptyinput ");
        exit();
    }

    require_once 'database.php';


    // Query voor het updaten van data in het formulier

    $sql = "UPDATE students SET firstName=?, lastName=?, ageChild=?, classNumber=? WHERE id = ? ;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Lukt het update niet? Weergeef error
        header("location: ../pages/admin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $ageChild, $classNumber, $_GET['id']);
    mysqli_stmt_execute($stmt);


    // Gelukt? Weergeef in header dat er geen error is
    header("location: ../pages/admin.php?error=none");
} else {
    // Iets anders mis gegaan? Stuur de gebruiker terug naar de admin pagina
    header("location: ../pages/admin.php");
    exit();
}
