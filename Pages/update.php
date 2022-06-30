<?php

require_once '../Includes/database.php';
$id = $_POST['id'];


$sql = "UPDATE * FROM `students` WHERE 'id' = []";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result)

// var_dump($result);
?>
<!DOCTYPE html>
<html>
<h1>Overzicht Student</h1>
<table>
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
</table>
<br><br>
<a href="admin.php" value="Terug">Terug</a>
</html>



