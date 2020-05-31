<?php
require __DIR__ . '/Conect.php';


$sql1 = "SELECT DISTINCT department FROM nurse";
$stmt1 = $dbh->prepare($sql1);
$stmt1->execute();
$sql2 = "SELECT DISTINCT shift FROM nurse";
$stmt2 = $dbh->prepare($sql2);
$stmt2->execute();
$sql3 = "SELECT name FROM nurse";
$stmt3 = $dbh->prepare($sql3);
$stmt3->execute();
$sql4 = "SELECT name FROM ward";
$stmt4 = $dbh->prepare($sql4);
$stmt4->execute();



?>
<h1>Добавить медсестру</h1>
<form method="post" action="add_nurse.php">
id: </br>
<input name="id" type="text" size="30">
</br>

name: </br>
<input name="name" type="text" size="30">
</br>

date: </br>
<input name="date" type="date">
</br>

department:</br>
<select name="depart_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt1->fetch()) { 
        echo "<option value='".$row['department']."'>".$row['department']."</option>";
    }
    ?>
    </select>
    <br/>
    shift <br/>
    <select name="duty_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt2->fetch()) { 
        echo "<option value='".$row['shift']."'>".$row['shift']."</option>";
    }
    ?>
    </select>
    <br/>

<input type="submit" name="submit" value="Добавить" />
</form>


<h1>Добавить палату</h1>
<form method="post" action="add_ward.php">
id: </br>
<input name="id" type="text" size="30">
</br>

name: </br>
<input name="name" type="text" size="30">
</br>

<input type="submit" name="submit" value="Добавить" />
</form>



<h1>Назначить выбранную медсестру в указанную палату</h1>
<form method="post" action="appointing.php">
name: </br>
<select name="name_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt3->fetch()) { 
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
    ?>
    </select>
    <br/>

name ward: </br>
<select name="ward_select"> 
    <option value=""</option>
    <?php    
    while ($row = $stmt4->fetch()) { 
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
    }
    ?>
    </select>
    <br/>


<input type="submit" name="submit" value="Назначить" />
</form>