<?php
require __DIR__ . '/Conect.php';


$sql1 = "SELECT name FROM nurse";
$stmt1 = $dbh->prepare($sql1);
$stmt1->execute();
$sql2 = "SELECT DISTINCT department FROM nurse";
$stmt2 = $dbh->prepare($sql2);
$stmt2->execute();
$sql3 = "SELECT DISTINCT shift FROM nurse";
$stmt3 = $dbh->prepare($sql3);
$stmt3->execute();


?>

<h2>Просмотреть список палат, в которых дежурит выбранная медсестра</h2>
<form method="post" action="list_ward.php">
    Выберите медсестру:
    <select name="ward_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt1->fetch()) { 
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
    ?>
    </select>
    <br/>
<input type="submit" name="submit" value="Просмотреть" />
</form>


<h2>Просмотреть список медсестер, работающих в выбранном отделении</h2>
<form method="post" action="list_nurse.php">
    Выберите отделение:
    <select name="depart_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt2->fetch()) { 
        echo "<option value='".$row['department']."'>".$row['department']."</option>";
    }
    ?>
    </select>
    <br/>
<input type="submit" name="submit" value="Просмотреть" />
</form>

<h2>Просмотреть дежурства в выбранную смену</h2>
<form method="post" action="list_shifts.php">
    Выберите смену:
    <select name="duty_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt3->fetch()) { 
        echo "<option value='".$row['shift']."'>".$row['shift']."</option>";
    }
    ?>
    </select>
    <br/>
<input type="submit" name="submit" value="Просмотреть" />

</form>