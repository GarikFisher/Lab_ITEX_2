<?php
require __DIR__ . '/Conect.php';

$shifts=$_POST['duty_select'];
$sql="SELECT nurse.name, ward.name FROM nurse JOIN nurse_ward ON nurse.id_nurse=nurse_ward.fid_nurse JOIN ward ON nurse_ward.fid_ward=ward.id_ward WHERE nurse.shift=:shifts";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':shifts', $shifts);
$stmt->execute();
?>


<table border=1>
    <thead>
        <h2 align="center">Дежурства в выбранную смену (<?php echo $shifts?>):</h2>
        <th>Имя медсестеры</th>
        <th>Номер палаты</th>
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