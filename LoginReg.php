<?php
//init.php meghívása kell
require_once('config/init.php');

printHTML("html/Header.html");
echo menu();

if(empty($_SESSION['id']))
{
    printHTML("html/LoginReg.html");
}
else
{
    header("Location: index.php");
}


printHTML("html/Footer.html");
$conn -> close();