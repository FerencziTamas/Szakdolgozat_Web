<?php
//init.php meghívása kell
require_once ('config/init.php');
isNotLogged();
printHTML("index.php");
