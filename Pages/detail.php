
<?php
// Detailpagina waar eenmaal een ID aangekoppeld de student weergegeven wordt

// Verbinding met database
require_once '../Includes/database.php';
$id = $_GET['id'];


$sql = "SELECT * FROM `students` WHERE id = " . $id;
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

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



