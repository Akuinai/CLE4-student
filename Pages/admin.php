<?php
require_once '../Includes/database.php';
session_start();
$userLoggedin = isset($_SESSION['userEmail']);

if (!$userLoggedin) {
    $_SESSION['unautorizedVisitor'] = 'Log eerst in om naar beveiligde pagina\'s te gaan..';
    header('location: ../pages/login.php ');
}

$sql = "SELECT * FROM `students`";
$result = mysqli_query($db, $sql);

// Foutmeldingen + feedback tijdens het invullen van de velden (formulier)
$errorHandler = null;
if (isset($_GET["error"])) {
    if ($_GET["error"] == "stmtfailed") {
        $errorHandler = "Er is iets misgegaan, probeer opnieuw!";

        // Feedback als het aanmaken of verwijderen  van een student is gelukt
    } else if ($_GET["error"] == "none") {
        $errorHandler = "De student is aangemaakt, aangepast of verwijdert. Bekijk hieronder het overzicht van alle studenten";

        // Error wanneer er 1 of meer velden niet zijn ingevuld
    } else if ($_GET["error"] == "emptyinput") {
        $errorHandler = "Vul alle velden in!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Avontuur - Admin</title>
</head>

<body>
    <main>
        <nav>
            <a href="index.html">Home</a>
            <a href="overhetspel.html">Over het spel</a>
            <a href="#">Help</a>
            <a href="./logout.php">Log out</a>
            <a href="./admin.php">Admin</a>
            <a href="prijzen.html">Prijzen</a>

        </nav>

        <body>
            <h1>Aanmaken student</h1>
            <form action="../Includes/createstudent.inc.php" method="post">
                <label for="firstName">Voornaam</label><br>
                <input type="text" id="firstName" name="firstName" value="Voornaam"><br>
                <label for="lastName">Achternaam</label><br>
                <input type="text" id="lastName" name="lastName" value="Achternaam"><br>
                <label for="ageChild">Leeftijd</label><br>
                <input type="text" id="ageChild" name="ageChild" value="Leeftijd"><br>
                <label for="classNumber">Klas</label><br>
                <input type="text" id="classNumber" name="classNumber" value="Klas"><br><br>

                <input type="submit" name="submitStudent" value="Opslaan">

                <!-- Hier weergeef ik een klein stuke PHP code voor het ophalen van de eventuele passende error -->
                <p> <?= $errorHandler ?></p>

                <h1>Overzicht studenten</h1>
                <table>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Leeftijd</th>
                        <th>Klas</th>
                    </tr>
                    <?php
                    //// Haal results op via een array
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];

                    ?>
                        <tr>
                            <td><?= htmlspecialchars($row["firstName"], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($row["lastName"], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($row["ageChild"], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($row["classNumber"], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <a href="detail.php?id=<?= htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') ?>">
                                    Detail
                                </a>
                            </td>
                            <td>
                                <a href="edit.php?id=<?= htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') ?>">
                                    Edit
                                </a>
                            </td>

                            <td>
                                <form action="../Includes/deletestudent.inc.php?id=<?= $row["id"] ?>" method="post">
                                    <input type="submit" name="deleteStudent" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
        </body>

</html>