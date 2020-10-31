<?php
//init.php meghívása kell
require_once('config/init.php');

printHTML("html/Header.html");
echo menu();

$html = file_get_contents("html/ShowCustomers.html");
$html .= '<table>';

$sql = "SELECT * FROM `vevok`";

if(isset($_POST['csokkeno2']))
{
    $sql .= " ORDER BY vevoId DESC";
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
                    <td data-label="Azonosító" scope="row">'.$row["vevoId"].'</td>
                    <td data-label="Név">'.$row["nev"].'</td>
                    <td data-label="Cím">'.$row["cim"].'</td>
                    <td data-label="Technikai azonosító">'.$row["technikai_azonosito"].'</td>
                    <td data-label="Adószám">'.$row["adoszam"].'</td>
                    </tr>
                    </tbody>';
        }
        $html .="</table>";
        
    }
}
else if(isset($_POST['novekvo2']))
{
    $sql .= " ORDER BY vevoId ASC";
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
        $html .="</table></div>";
        
    }
}
else
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
                    <td data-label="Azonosító" scope="row">'.$row["vevoId"].'</td>
                    <td data-label="Név">'.$row["nev"].'</td>
                    <td data-label="Cím">'.$row["cim"].'</td>
                    <td data-label="Technikai azonosító">'.$row["technikai_azonosito"].'</td>
                    <td data-label="Adószám">'.$row["adoszam"].'</td>
                    </tr>
                    </tbody>';
        }
        $html .="</table>";
    }
}

echo $html;

printHTML("html/Footer.html");
$conn -> close();