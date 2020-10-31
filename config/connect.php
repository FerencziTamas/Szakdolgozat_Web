<?php

//Adatbázishoz való csatlakozás
$conn = new mysqli("localhost", "erdo_adatbazis_user", "erdo_adatbazis_user", "erdo_adatbazis", "3306");

if($conn -> errno){
    die("Az adatbázishoz való csatlakozás sikertelen");
}

//Karakter kódolás beállítása
if(!$conn->set_charset("utf8")){
    echo ("A karakterkódolás beállítása sikertelen");
}