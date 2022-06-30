<?php

require_once '../Includes/database.php';
$id = $_GET['id'];
// var_dump($_GET);

$sql = "SELECT * FROM `students` WHERE id = " . $id;
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result)

// var_dump($result);
?>
<!DOCTYPE html>
<html>
<h1>Overzicht Student</h1>
<form action="../Includes/updatestudent.inc.php?id=<?= $row["id"]?>" method="post">
    <label for="firstName">Voornaam</label><br>
    <input type="text" id="firstName" name="firstName" value="<?= $row["firstName"]?>"><br>
    <label for="lastName">Achternaam</label><br>
    <input type="text" id="lastName" name="lastName" value="<?= $row["lastName"]?>"><br>
    <label for="ageChild">Leeftijd</label><br>
    <input type="text" id="ageChild" name="ageChild" value="<?= $row["ageChild"]?>"><br>
    <label for="classNumber">Klas</label><br>
    <input type="text" id="classNumber" name="classNumber" value="<?= $row["classNumber"]?>"><br>

    <input type="submit" name="updateStudent" value="Opslaan">
</form>
<!-- <table>
    <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Leeftijd</th>
        <th>Klas</th>
    </tr>
        <tr>
            <td><?= $row["firstName"]?></td>
            <td><?= $row["lastName"]?></td>
            <td><?= $row["ageChild"]?></td>
            <td><?= $row["classNumber"]?></td>
        </tr>
</table> -->
<br><br>
<a href="admin.php" value="Terug">Terug</a>
</html>



