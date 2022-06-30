<?php
require_once "Includes/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create student</title>
</head>
<body>
<h1>Aanmaken student</h1>
<form action="Includes/createstudent.inc.php" method="post">
<label for="firstName">Voornaam</label><br>
<input type="text" id="firstName" name="firstName" value="Voornaam"><br>
<label for="lastName">Achternaam</label><br>
<input type="text" id="lastName" name="lastName" value="Achternaam"><br>
<label for="ageChild">Leeftijd</label><br>
<input type="text" id="ageChild" name="ageChild" value="Leeftijd"><br>
<label for="classNumber">Klas</label><br>
<input type="text" id="classNumber" name="classNumber" value="Klas"><br><br>

<input type="submit" name="submitStudent" value="Opslaan">
</form>
</body>
</html>