<?php
require __DIR__ . '/Conect.php';

$names=$_POST['ward_select'];
$sql="SELECT ward.name FROM nurse JOIN nurse_ward ON nurse.id_nurse=nurse_ward.fid_nurse JOIN ward ON nurse_ward.fid_ward=ward.id_ward WHERE nurse.name=:names";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':names', $names);
$stmt->execute();
?>


<table border=1>
    <thead>
        <h2 align="center">Список палат, в которых дежурит выбранная медсестра (<?php echo $names?>):</h2>
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
