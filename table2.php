<?php
require_once ('conf.php');
global $yhendus;
session_start();
if(isset($_REQUEST["tool"]) && !empty($_REQUEST["tool"])){
    $kask=$yhendus->prepare("INSERT INTO toolid(tool,tellimiskogus,Varvid) VALUES (?, ?, ?)");
    $kask->bind_param("sii",$_REQUEST["tool"], $_REQUEST["tellimiskogus"], $_REQUEST["värv"]);
    //s-string, i-integer
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    //aadresiribas kustutakse päring faili nimeni


}



$kask=$yhendus->prepare("Select toolid.id, tool, tellimiskogus, valminudkogus, Varvid.varv From toolid, Varvid 
where toolid.Varvid=Varvid.id ");
$kask->execute();
$kask->bind_result($id,$tool, $tellimiskogus, $valminudkogus, $Varvid);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Toolid</title>
</head>
<body>
<h1> tellimuse sissestamine</h1>
 <?php
    if(isset($_SESSION['kasutaja'])){
        ?>
        <h1>Tere, <?="$_SESSION[kasutaja]"?></h1>
        <a href="logout.php">Logi välja</a>
        <br>
        <?php
    }else if(isset($_SESSION['onAdmin'])){
        ?>
        <h1>Tere, <?="$_SESSION[onAdmin]"?></h1>
        <a href="logout.php">Logi välja</a>
        <br>
        <?php
    }else{
        $voras = true;
        ?>
            <br>
        <a href="login.php">Logi sisse</a>
        <br>
        <a href="registreerimine.php">Registreeri siin</a>
        <br>

        <br>
        <?php
    }
    ?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tool</th>
        <th>Tellimiskogus</th>
        <th>Valminudkogus</th>
        <th>Varv</th>

    </tr>
    <?php
    while($kask->fetch()) {

        echo "<tr>";
        echo "<td>".$id."</td>";
        echo "<td>".$tool."</td>";
        echo "<td>".$tellimiskogus."</td>";
        echo "<td>".$valminudkogus."</td>";
        echo "<td>".$Varvid."</td>";
        echo "</tr>";

        echo "</tr>";
    }
    ?>
</table>
<?php
echo"<h3><a href='table1.php'>Vaata Valminudkoguse lisamine</a></h3>";
echo"<h3><a href='table3.php'>Vaata Toolide seis</a></h3>";
?>
<br>
<form action=" " method="post">
    <input type="submit" value="Lisa">
    <br>
    <label for="tool">tool</label>
    <input type="text" name="tool" id="tool">
    <br>
    <label for="tellimiskogus">tellimiskogus</label>
    <input type="number" name="tellimiskogus" id="tellimiskogus">

    <br>

    <label for="värv">värv</label>

    <select name="värv" id="värv">

        <?php

        $kask3=$yhendus->prepare("SELECT id, varv FROM Varvid");
        $kask3->execute();
        $kask3->bind_result($id, $varv);

        while($kask3->fetch()) {

            echo "<option value=".$id.">".$varv."</option>";
        }
        ?>
    </select>


</form>
</body>
</html>