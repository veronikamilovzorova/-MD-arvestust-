<?php
require_once ('conf.php');
session_start();
if (isset($_REQUEST["pluspunkt"])) {

    global $yhendus;


    $kask = $yhendus->prepare("UPDATE toolid SET valminudkogus = valminudkogus + 1 WHERE toolid.id = ?");
    $kask->bind_param("i", $_REQUEST["pluspunkt"]);
    $kask->execute();

}


global $yhendus;
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
<h1>Valminudkoguse lisamine</h1>
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
        if ($tellimiskogus > $valminudkogus) {
        echo"<td><a href='?pluspunkt=$id'>Lisa+1punkt</a></td>";
        }
        echo "</tr>";
    }
    ?>
</table>
<?php
echo"<h3><a href='table3.php'>Vaata Toolide seis</a></h3>";
echo"<h3><a href='table2.php'>Vaata tellimuse sissestamine</a></h3>";
?>
</body>
</html>