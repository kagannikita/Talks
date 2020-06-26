<?php
require_once '../../includes/db_connection.php';
$id=$_GET['speaker_group_id'];
$select_query="SELECT * from speaker_group_id where group_id='$id'";
$select_result=mysqli_query($connection,$select_query);
$myrow=mysqli_fetch_array($select_result);
$var=$myrow['photo'];
$query="DELETE speaker_article_t,speaker_t,speaker_group_id FROM speaker_t 
left JOIN speaker_group_id on speaker_t.speaker_group_id=speaker_group_id.group_id 
left JOIN speaker_article_t on speaker_group_id.group_id=speaker_article_t.speaker_group_id 
where speaker_t.speaker_group_id='$id' and speaker_article_t.speaker_group_id='$id' and speaker_group_id.group_id='$id'";
    $result=mysqli_query($connection, $query);
    if($result==true){
        echo "Данные удалены";
    unlink("../../images/speakers/$var");
    header("Location:../../index.php");
    }
else{
    echo "Ошибка";
}
?>