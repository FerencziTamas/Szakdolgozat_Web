<?php 
require_once('config/init.php');

if(!empty($_SESSION['id']))
{
    if(isset($_POST['updateData'])){

        $id = $_POST['id'];
        $nev= $_POST['nev'];
        $cim= $_POST['cim'];
        $email = $_POST['email'];
        $jelszo = $_POST['jelszo'];

        $sql = 'UPDATE `felhasznalok` SET `nev`="'.$nev.'", `cim`="'.$cim.'", `email`="'.$email.'", `jelszo`="'.$jelszo.'" ,`rendszergazdaE`= 0 WHERE `felhasznaloId`='.$id;

        $sqlRun = mysqli_query($conn, $sql);

        if($sqlRun){
            header("Location: Users.php");
        }
        else{
            header("Location: index.php");
        }
    }
    else{
        header("Location: ShowForests.php");
    }
}
else
{
    header("Location: index.php");
}