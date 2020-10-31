<?php

require_once('config/init.php');

//$emailPatt=new Regex("^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$");


if(empty($_SESSION['id']))
{
    if (!empty($_POST['nev']))
    { 
        if(!empty($_POST['RegEmail']))
        {
            if(preg_match_all("^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)^", $_POST['RegEmail']))
            {
                if(!empty($_POST['cim']))
                {
                    if(!empty($_POST['RegPass']))
                    {
                        if(preg_match_all("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}^", $_POST['RegPass']))
                        {
                            if(!empty($_POST['confirm'])){
                                $nev = $_POST['nev'];
                                $cim = $_POST['cim'];
                                $email = $_POST['RegEmail'];
                                $jelszo = $_POST['RegPass'];
                                $megerosit = $_POST['confirm'];
                        
                                if($jelszo==$megerosit){
                                    $sql="INSERT INTO felhasznalok (nev, cim, email, jelszo, rendszergazdaE) VALUES (?,?,?,?,0)";
                                    $stmt = $conn -> prepare($sql);
                                    $stmt -> bind_param("ssss",$nev, $cim, $email, $jelszo);
                                    $stmt -> execute();
                                    if(!$stmt -> errno){
                                        echo "<script>alert('Sikeres Regisztráció! Kattintson az OK gombra a folytatáshoz!'); window.location='index.php'</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('Kapcsolódási hiba! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
                                    }
                                }
                                else
                                {
                                    echo "<script>alert('A jelszavak nem egyeznek! Kattintson az OK gombra a folytatáshoz!')</script>";
                                }
                            }
                            else
                            {
                                echo "<script>alert('Töltse ki a megerősítés mezőt! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
                            }
                        }
                        else
                        {
                            echo "<script>alert('A jelszónak minimum 8 karakternek kell lennie, számot, kis- és nagybetűt! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
                        }
                    }
                    else
                    {
                        echo "<script>alert('Töltse ki a jelszó mezőt! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
                    }
                } 
                else
                {
                    echo "<script>alert('Töltse ki a cím mezőt! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
                }
            }
            else
            {
                echo "<script>alert('Hibás az e-mail cím formátuma! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
            }
        }
        else
        {
            echo "<script>alert('Töltse ki az e-mail cím mezőt! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
        }
    }
    else
    {
        echo "<script>alert('Töltse ki a név mezőt! Kattintson az OK gombra a folytatáshoz!'); window.location='LoginReg.php'</script>";
    }
}
else
{
    header("Location: index.php");
}

sikertelenRegisztracio();
sikeresRegisztracio();
