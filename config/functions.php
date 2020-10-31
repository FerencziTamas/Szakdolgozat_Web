<?php

//Fájl beolvasás
function printHTML($html)
{
    echo file_get_contents($html);
}

//ellenőrzi hogy a felhasználó be van-e jelentkezve
function isLogged()
{
    if(!empty($_SESSION['id']))
    {
        return true;
    }
    else
    {
        return false;
    }
}

//ellenőrzi hogy a felhasználó nincs-e bejelentkezve
function isNotLogged()
{
    unset($_SESSION['id']);
    header("Location: index.php");
}

function menu(){
    $menu = file_get_contents('html/Menu.html');
    if (isLogged())
    {
        $menu = str_replace("::kibelepes", '
        <li class="nav-item"> <a class="nav-link text-light" href="Users.php"> Felhasználók </a></li>
        <li class="nav-item"> <a class="nav-link text-light" href="Logout.php"> Kilép </a></li>', $menu);
    } else 
    {
        $menu = str_replace("::kibelepes", '<li class="nav-item"><a class="nav-link text-light" href="LoginReg.php"> Belépés/Regisztráció </a></li>', $menu);
    }
    return $menu;
}

function sikertelenRegisztracio() {
    if (!empty($_SESSION['sikertelenRegisztracio'])) {
        echo '<h4 class="text-danger text-center">' . $_SESSION['sikertelenRegisztracio'] . '</h4>';
        unset($_SESSION['sikertelenRegisztracio']);
    }
}

function sikeresRegisztracio() {
    if (!empty($_SESSION['sikeresRegisztracio'])) {
        echo '<h4 class="text-success text-center">' . $_SESSION['sikeresRegisztracio'] . '</h4>';
        unset($_SESSION['sikeresRegisztracio']);
    }
}