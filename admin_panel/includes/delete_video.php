<?php
require_once '../../includes/db_connection.php';
$id=$_GET['group_id'];
$select_query="SELECT * from video_group where id='$id'";
$select_result=mysqli_query($connection,$select_query);
$myrow=mysqli_fetch_array($select_result);
$var=$myrow['image'];
$var1=$myrow['video'];
$query="Delete video,video_group from video  join video_group on video.group_id=video_group.id where video_group.id='$id'";
$result=mysqli_query($connection, $query);
if($result==true){
    unlink("../../images/posters/$var");
unlink("../../video/$var1");
    echo "Данные удалены";
  header("Location:../../index.php");
}
else{
    echo "Ошибка";
}
?>

