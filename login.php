<?php
require_once("conf.php");
global $yhendus;
session_start();

//kontrollime kas väljad  login vormis on täidetud
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    //eemaldame kasutaja sisestusest kahtlase pahna
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    //SIIA UUS KONTROLL
    $sool = 'taiestisuvalinetekst';
    $kryp = crypt($pass, $sool);
    //kontrollime kas andmebaasis on selline kasutaja ja parool
    $kask=$yhendus-> prepare("SELECT kasutaja,onAdmin FROM kasutajad WHERE kasutaja=? AND parool=?");
    $kask->bind_param("ss", $login, $kryp);
    $kask->bind_result($kasutaja, $onAdmin);
    $kask->execute();
    //kui on, siis loome sessiooni ja suuname
    if ($kask->fetch()) {
        $_SESSION['tuvastamine'] = 'misiganes';
        $_SESSION['kasutaja'] = $login;
        $_SESSION['onAdmin'] = $onAdmin;

        if($onAdmin==1){
            header('Location: table3.php');
            echo '<script>window.location.href = "table3b.php";</script>';
        }
        else{
            echo '<script>window.location.href ="table.php";</script>';
        }
    } else {
        echo "kasutaja $login või parool $kryp on vale";
        $yhendus->close();
        exit();
    }
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="logir">
<h1>Login</h1>
<a href='table3.php'>Tagasi</a>
<form action="" method="post">
    Login: <input type="text" name="login"><br>
    salasõna: <input type="password" name="pass"><br>
    <input type="submit" value="Logi sisse">
</form>
</div>