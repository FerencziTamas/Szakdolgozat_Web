<?php
//init.php meghívása kell
require_once('config/init.php');

printHTML("html/Header.html");
echo menu();

if(empty($_SESSION['id']))
{
    //Bejelentkezés//////////////////
    if (!empty($_POST['logEmail']) && (!empty($_POST['logPass']))){
        $email = $_POST['logEmail'];
        $jelszo = $_POST['logPass'];
        $sql = "SELECT * FROM `felhasznalok` WHERE `email`='$email' AND `jelszo` = '$jelszo' AND `rendszergazdaE`=1";
        
        $res = $conn -> query($sql);
        if (!$res){
            die("Bejelentkezési hiba!");
        }
        if ($res -> num_rows == 1){
            $row = $res -> fetch_assoc();
            $_SESSION['id'] = $row['felhasznaloId'];
            header("Location: index.php");
        } else 
        {
            echo "<script>alert('Helytelen e-mail cím vagy jelszó! Kattintson az OK gombra a folytatáshoz!')</script>";
        }
    }
}
else
{
    header("Location: index.php");
}



printHTML("html/LoginReg.html");
if (!empty($_SESSION['loginError'])){
    echo $_SESSION['loginError'];
    unset($_SESSION['loginError']);
}
