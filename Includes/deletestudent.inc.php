<?php
require_once '../Includes/database.php';

// Checken of de input is ingevuld | Convert string naar HTML entities

if (isset($_POST["deleteStudent"]) || isset($_GET["id"])) {
    $id = $_GET["id"];


//     $firstName = htmlentities($_POST["firstName"]);
//     $lastName = htmlentities($_POST["lastName"]);
//     $ageChild = htmlentities($_POST["ageChild"]);
//     $classNumber = htmlentities($_POST["classNumber"]);

// // var_dump(empty($firstName), empty($lastName), empty($ageChild), empty($classNumber));
//     // Checken of de input ingevuld is. Zo niet dan weergeef een foutmelding
//     if (empty($firstName) || empty($lastName) || empty($ageChild) || empty($classNumber)) {
//         $emptyInput = true;
//     };

//     if ($emptyInput == true) {
//         header("location: ../pages/admin.php?error=emptyinput ");
//         exit();
//     }

//     require_once 'database.php';


    // Query voor het verwijderen van data afhankelijk van het geselecteerde ID
    $sql = "DELETE FROM students WHERE id = ? ;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Lukt het aanmaken niet? Weergeef error
        header("location: ../pages/admin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
    mysqli_stmt_execute($stmt);
//     // myslqi_stmt_close($stmt);

    // Gelukt? Weergeef in header dat er geen error is
    header("location: ../pages/admin.php?error=none");
} else {
    // Iets anders mis gegaan? Stuur de gebruiker terug naar de admin pagina
    header("location: ../pages/admin.php");
    exit();
}
