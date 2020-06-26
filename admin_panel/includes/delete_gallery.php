<?php
require_once '../../includes/db_connection.php';
$id=$_GET['group_id'];
$select_query="SELECT * from gallery_group where group_id='$id'";
$select_result=mysqli_query($connection,$select_query);
$myrow=mysqli_fetch_array($select_result);
$var=$myrow['image'];
$query="Delete gallery,gallery_group from gallery  join gallery_group on gallery.group_id=gallery_group.group_id where gallery_group.group_id='$id'";
$result=mysqli_query($connection, $query);
if($result==true){
    echo "Данные удалены";
    unlink("../../images/gallery/$var");
    header("Location:../../index.php");
}
else{
    echo "Ошибка";
}
?>
