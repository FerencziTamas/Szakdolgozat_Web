<?php
//init.php meghívása kell
require_once('config/init.php');

printHTML("html/Header.html");
echo menu();

$html = file_get_contents("html/ShowCustomers.html");
$html .= '<table>';

$sql='SELECT * FROM `vevok`';

if(isset($_POST['keres']))
{
    $keres=$_POST['keres'];
    $sql .= ' WHERE `nev` LIKE "%'.$keres.'%"';
    $result = $conn -> query($sql);

    if(!$result)
    {
        die("Hiba történt a lekérdezésben!");
    }
    else if($result-> num_rows > 0)
    {
        $html .='<thead>
                <tr>
                <th scope="col">Azonosító</th>
                <th scope="col">Név</th>
                <th scope="col">Cím</th>
                <th scope="col">Technikai azonosító</th>
                <th scope="col">Adószám</th>
                </tr>
                </thead>';
                
        while($row = $result -> fetch_assoc())
        {
            
            $html .= '<tbody>   
                    <tr>
                    <td>'.$row["vevoId"].'</td>
                    <td>'.$row["nev"].'</td>
                    <td>'.$row["cim"].'</td>
                    <td>'.$row["technikai_azonosito"].'</td>
                    <td>'.$row["adoszam"].'</td>
                    </tr>
                    </tbody>';
        }
        $html .="</table>";
    }
    else
    {
        echo '<h3>Nem található ilyen nevű vevő az adatbázisban. Ellenőrizze hogy jól írta be a nevet!</h3>';
    }
}
else
{
    echo '<h3>Nem található ilyen nevű vevő az adatbázisban. Ellenőrizze hogy jól írta be a nevet!</h3>';
}

if(!isset($_POST['keres']))
{
    $result = $conn -> query($sql);
    if(!$result)
    {
        die("Hiba történt a lekérdezésben!");
    }
    else if($result-> num_rows > 0)
    {
        $html .='<thead>
                <tr>
                <th scope="col">Azonosító</th>
                <th scope="col">Név</th>
                <th scope="col">Cím</th>
                <th scope="col">Technikai azonosító</th>
                <th scope="col">Adószám</th>
                </tr>
                </thead>';
        while($row = $result -> fetch_assoc())
        {
            $html .='<tbody>
                    <tr>
                    <th scope="row">'.$row["vevoId"].'</th>
                    <td>'.$row["nev"].'</td>
                    <td>'.$row["cim"].'</td>
                    <td>'.$row["technikai_azonosito"].'</td>
                    <td>'.$row["adoszam"].'</td>
                    </tr>
                    </tbody>';
        }
        $html .="</table>";
    }
}

echo $html;

printHTML("html/Footer.html");
$conn -> close();