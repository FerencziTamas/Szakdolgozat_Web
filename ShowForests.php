<?php
//init.php meghívása kell
require_once('config/init.php');

printHTML("html/Header.html");
echo menu();

$html = file_get_contents("html/ShowForests.html");
$html .= '<table>';

$sql = "SELECT erdok.erdeszeti_azonosito, erdok.helyrajzi_szam, erdok.kor, erdok.terulet, fa_hasznalat_modjai.rovidites AS hasznalatId, erdogazdalkodok.erdogazNev AS egKod FROM erdok INNER JOIN erdogazdalkodok ON erdok.egKod=erdogazdalkodok.egKod INNER JOIN fa_hasznalat_modjai ON erdok.hasznalatId=fa_hasznalat_modjai.hasznalatId";

//területre
if(isset($_POST['terulet']))
{
    if(isset($_POST['csokkeno']))
    {
        ///////////////////////////////////////////terület csökkenő///////////////////////////////////////////
        $sql .= " ORDER BY `erdok`.`terulet` DESC";
        $result=$conn -> query($sql);
        if($result-> num_rows > 0)
        {
            $html .='<thead>
                        <th>Erdészeti azonosító</th>
                        <th>Helyrajzi szám</th>
                        <th>Kor</th>
                        <th>Terület</th>
                        <th>Fahasználat módja</th>
                        <th>Erdőgazdálkodó</th>
                        </thead>';
            while($row = $result -> fetch_assoc())
            {
                $html .='<tbody><tr>
                            <td data-label="Erdészeti azonosító">'.$row["erdeszeti_azonosito"].'</td>
                            <td data-label="Helyrajzi szám">'.$row["helyrajzi_szam"].'</td>
                            <td data-label="Kor">'.$row["kor"].'</td>
                            <td data-label="Terület">'.$row["terulet"].'</td>
                            <td data-label="Fahasználat módja">'.$row["hasznalatId"].'</td>
                            <td data-label="Erdőgazdálkodó">'.$row["egKod"].'</td>
                            </tr>
                            </tbody>';
            }
            $html .="</table>";  
        }
    } 
    else if(isset($_POST['novekvo']))
    {
        ///////////////////////////////////////////terület növekvő///////////////////////////////////////////
        $sql .= " ORDER BY `erdok`.`terulet` ASC";
        $result=$conn -> query($sql);
        if($result-> num_rows > 0)
        {
            $html .='<thead>
                        <th>Erdészeti azonosító</th>
                        <th>Helyrajzi szám</th>
                        <th>Kor</th>
                        <th>Terület</th>
                        <th>Fahasználat módja</th>
                        <th>Erdőgazdálkodó</th>
                        </thead>';
            while($row = $result -> fetch_assoc())
            {
                $html .='<tbody><tr>
                            <td>'.$row["erdeszeti_azonosito"].'</td>
                            <td>'.$row["helyrajzi_szam"].'</td>
                            <td>'.$row["kor"].'</td>
                            <td>'.$row["terulet"].'</td>
                            <td>'.$row["hasznalatId"].'</td>
                            <td>'.$row["egKod"].'</td>
                            </tr>
                            </tbody>';
            }
            $html .="</table>";  
        }
    }
    else
    {
        ///////////////////////////////////////////csak terület///////////////////////////////////////////
        $sql .= " ORDER BY `erdok`.`terulet`";
        $result=$conn -> query($sql);
        if($result-> num_rows > 0)
        {
            $html .='<thead>
                        <th>Erdészeti azonosító</th>
                        <th>Helyrajzi szám</th>
                        <th>Kor</th>
                        <th>Terület</th>
                        <th>Fahasználat módja</th>
                        <th>Erdőgazdálkodó</th>
                        </thead>';
            while($row = $result -> fetch_assoc())
            {
                $html .='<tbody><tr>
                            <td>'.$row["erdeszeti_azonosito"].'</td>
                            <td>'.$row["helyrajzi_szam"].'</td>
                            <td>'.$row["kor"].'</td>
                            <td>'.$row["terulet"].'</td>
                            <td>'.$row["hasznalatId"].'</td>
                            <td>'.$row["egKod"].'</td>
                            </tr>
                            </tbody>';
            }
            $html .="</table>";  
        }
    }
} 
else if(isset($_POST['kor']))
{
    ///////////////////////////////////////////kor csökkenő///////////////////////////////////////////
    if(isset($_POST['csokkeno']))
    {
        $sql .= " ORDER BY `erdok`.`kor` DESC";
        $result=$conn -> query($sql);
        if($result-> num_rows > 0)
        {

            $html .='<thead>
                        <th>Erdészeti azonosító</th>
                        <th>Helyrajzi szám</th>
                        <th>Kor</th>
                        <th>Terület</th>
                        <th>Fahasználat módja</th>
                        <th>Erdőgazdálkodó</th>
                        </thead>';
            while($row = $result -> fetch_assoc())
            {
                $html .='<tbody><tr>
                            <td>'.$row["erdeszeti_azonosito"].'</td>
                            <td>'.$row["helyrajzi_szam"].'</td>
                            <td>'.$row["kor"].'</td>
                            <td>'.$row["terulet"].'</td>
                            <td>'.$row["hasznalatId"].'</td>
                            <td>'.$row["egKod"].'</td>
                            </tr>
                            </tbody>';
            }
            $html .="</table>";  
        }
    }
    else if(isset($_POST['novekvo']))
    {
        ///////////////////////////////////////////kor növekvő///////////////////////////////////////////
        $sql .= " ORDER BY `erdok`.`kor` ASC";
        $result=$conn -> query($sql);
        if($result-> num_rows > 0)
        {

            $html .='<thead>
                        <th>Erdészeti azonosító</th>
                        <th>Helyrajzi szám</th>
                        <th>Kor</th>
                        <th>Terület</th>
                        <th>Fahasználat módja</th>
                        <th>Erdőgazdálkodó</th>
                        </thead>';
            while($row = $result -> fetch_assoc())
            {
                $html .='<tbody><tr>
                            <td>'.$row["erdeszeti_azonosito"].'</td>
                            <td>'.$row["helyrajzi_szam"].'</td>
                            <td>'.$row["kor"].'</td>
                            <td>'.$row["terulet"].'</td>
                            <td>'.$row["hasznalatId"].'</td>
                            <td>'.$row["egKod"].'</td>
                            </tr>
                            </tbody>';
            }
            $html .="</table>";  
        }
    }
    else
    {
        ///////////////////////////////////////////csak kor///////////////////////////////////////////
        $sql .= " ORDER BY `erdok`.`kor`";
        $result=$conn -> query($sql);
        if($result-> num_rows > 0)
        {

            $html .='<thead>
                        <th>Erdészeti azonosító</th>
                        <th>Helyrajzi szám</th>
                        <th>Kor</th>
                        <th>Terület</th>
                        <th>Fahasználat módja</th>
                        <th>Erdőgazdálkodó</th>
                        </thead>';
            while($row = $result -> fetch_assoc())
            {
                $html .='<tbody><tr>
                            <td>'.$row["erdeszeti_azonosito"].'</td>
                            <td>'.$row["helyrajzi_szam"].'</td>
                            <td>'.$row["kor"].'</td>
                            <td>'.$row["terulet"].'</td>
                            <td>'.$row["hasznalatId"].'</td>
                            <td>'.$row["egKod"].'</td>
                            </tr>
                            </tbody>';
            }
            $html .="</table>";  
        }
    }
    
}
else
{
    ///////////////////////////////////////////semmi sincs kijelölve///////////////////////////////////////////
    $result=$conn -> query($sql);
    if($result-> num_rows > 0)
    {

        $html .='<thead>
                    <th>Erdészeti azonosító</th>
                    <th>Helyrajzi szám</th>
                    <th>Kor</th>
                    <th>Terület</th>
                    <th>Fahasználat módja</th>
                    <th>Erdőgazdálkodó</th>
                    </thead>';
        while($row = $result -> fetch_assoc())
        {
            $html .='<tbody><tr>
                        <td>'.$row["erdeszeti_azonosito"].'</td>
                        <td>'.$row["helyrajzi_szam"].'</td>
                        <td>'.$row["kor"].'</td>
                        <td>'.$row["terulet"].'</td>
                        <td>'.$row["hasznalatId"].'</td>
                        <td>'.$row["egKod"].'</td>
                        </tr>
                        </tbody>';
        }
        $html .="</table>";  
    }
}

echo $html;
printHTML("html/Footer.html");

$conn -> close();