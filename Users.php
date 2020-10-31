<?php
//init.php meghívása kell

$modal='<div class="modal fade" id="UpdataUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidded="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Módosítás</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="Update.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="id" id="id" class="form-control" placeholder="ID" >
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="nev" id="nev" class="form-control" placeholder="Felhasználónév">
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="cim" id="cim" class="form-control" placeholder="Cím">
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control" placeholder="E-mail cím">
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="jelszo" id="jelszo" class="form-control" placeholder="Jelszó">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezár</button>
                <button type="submit" id="" name="updateData" class="btn btn-secondary">Mentés</button>
            </div>
        </form>
    </div>
</div>
</div>';

require_once('config/init.php');

printHTML("html/Header.html");
echo menu();

$sql="SELECT * FROM `felhasznalok` WHERE `rendszergazdaE` != 1";
if(!empty($_SESSION['id']))
{
    $html = '<table>';
    $html .= file_get_contents("html/Users.html");

    $result = $conn -> query($sql);
    if(!$result)
    {
        die("Hiba történt a lekérdezésben!");
    }
    else if($result-> num_rows > 0)
    {
        $html .='<thead>
                <tr>
                <th>Azonosító</th>
                <th scope="col">Név</th>
                <th scope="col">Cím</th>
                <th scope="col">E-mail cím</th>
                <th scope="col">Jelszó</th>
                <th scope="col">#</th>
                <th scope="col">Műveletek</th>
                </tr>
                </thead>';
        while($row = $result -> fetch_assoc())
        {
            $id=$row["felhasznaloId"];
            $html .='<tbody>
                    <tr id="'.$id.'">
                    <td data-label="Azonosító">'.$id.'</td>
                    <td data-label="Név">'.$row["nev"].'</td>
                    <td data-label="Cím">'.$row["cim"].'</td>
                    <td data-label="E-mail cím">'.$row["email"].'</td>
                    <td data-label="Jelszó">'.$row["jelszo"].'</td>
                    <td data-label="#"><input type="checkbox" name="torol_felhasznalo" class="kijelol" value='.$row["felhasznaloId"].'></td>
                    <td data-label="Műveletek"><button type="submit" class="btn btn-success updateUser">Módosítás</button></td>
                    </tr>
                    </tbody>';
        }
        $html .="</table></div>";
    }
}
else
{
    header("Location: index.php");
}



echo $html;
echo $modal;

printHTML("html/Footer.html");
$conn->close();