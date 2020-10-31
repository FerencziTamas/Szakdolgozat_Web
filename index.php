<?php
//init.php meghívása kell
require_once('config/init.php');

printHTML("html/Header.html");
echo menu();

printHTML("html/Main.html");
printHTML("html/Footer.html");

$conn -> close();