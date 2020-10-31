<?php

require_once('config/init.php');

if(isset($_POST["id"]))
{
    foreach ($_POST["id"] as $id)
    {
        $sql="DELETE FROM `felhasznalok` WHERE `felhasznaloId`= ".$id;
        $result = $conn -> query($sql);
    }
}