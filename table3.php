<?php
require_once ('conf.php');
global $yhendus;
session_start();

//registreerimata kasutaja
$voras = false;


//sql valminud toolide lugemine andmebaasist
$kask=$yhendus->prepare("Select toolid.id, tool, tellimiskogus, valminudkogus, Varvid.varv From toolid, Varvid 
where toolid.Varvid=Varvid.id  and tellimiskogus=valminudkogus ");
$kask->execute();
$kask->bind_result($id,$tool, $tellimiskogus, $valminudkogus, $Varvid);

//
if (isset($_POST["register"])) {
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    $sool = "taiestisuvalinetekst";
    $krypt = crypt($pass, $sool);

    global $yhendus;
//kasutajate lisamine sql andmebaasisse
    $kask = $yhendus->prepare("INSERT INTO kasutajad (kasutaja, parool) VALUES (?, ?)");
    $kask->bind_param("ss", $login, $krypt);
    $success = $kask->execute();
//registratsiooni tulemuse kontroll
    if ($success) {

        header("Location: $_SERVER[PHP_SELF]");
        exit();
    } else {
        echo "Registreerimine ebaõnnestus. Palun proovige uuesti.";
    }

    $kask->close();
}

function isAdmin()
{
    //kontroll kas admini kasutaja on sesioni sees
    return isset($_SESSION['onAdmin']) && $_SESSION['onAdmin'];
}
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
<heder>
    <h1>Toolivahendus</h1>
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

</heder>


<?php
//kui kasutaja pole registreeritud siis ta ei nae andmed
if (!$voras) {
?>

<?php
if(isAdmin()){
    echo"<h3><a href='table1.php'>Vaata Valminudkoguse lisamine</a></h3>";
    echo"<h3><a href='table2.php'>Vaata tellimuse sissestamine</a></h3>";
}

?>
        <div id="srss">
        <br>
<h1>Toolide seis</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tool</th>
        <th>Tellimiskogus</th>
        <th>Valminudkogus</th>
        <th>Varv</th>

    </tr>
    <?php
    //tr elemendi kokku panemine SQL-ist ridade kaupa
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

<br>

<?php

// SQL kask mis naitab kui palju on vaja veel toole teha kokku

$kask2=$yhendus->prepare("SELECT SUM(tellimiskogus - valminudkogus) as jaak FROM toolid ");
$kask2->execute();
$kask2->bind_result($jaak);
$kask2->fetch();


echo "Jaanud veel teha: ".$jaak;
?>
        </div>

<?php
}
?>
</body>
</html>