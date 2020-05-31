<?php
require __DIR__ . '/Conect.php';

$depart=$_POST['depart_select'];
$sql="SELECT name FROM nurse WHERE department=:depart";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':depart', $depart);
$stmt->execute();
?>


<table border=1>
    <thead>
        <h2 align="center">Список медсестер, работающих в выбранном отделении(<?php echo $depart?>):</h2>
    </thead>
    <tbody>
        <?php while ($row = $stmt -> fetch(PDO::FETCH_NUM)) { ?>
            <tr>
                <?php foreach ($row as $col_value) { ?>
                    <td><?php echo $col_value ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>