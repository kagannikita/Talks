<?php
require_once '../../includes/db_connection.php';
$article_id=$_GET['article_group_id'];
$event_id=$_GET['event_group_id'];
$select_query="SELECT * from article_group_id where group_id='$article_id'";
$select_result=mysqli_query($connection,$select_query);
$myrow=mysqli_fetch_array($select_result);
$var=$myrow['image'];
$query="delete  article_group_id,article_t,event_article_t,speaker_article_t,event_t,event_group_id from event_t
  left  JOIN event_group_id ON event_t.event_group_id=event_group_id.group_id
  left  JOIN event_article_t ON event_group_id.group_id=event_article_t.event_group_id
   left JOIN article_group_id on event_article_t.article_group_id=article_group_id.group_id
  left  JOIN article_t ON article_group_id.group_id=article_t.article_group_id
 left JOIN speaker_article_t on article_group_id.group_id=speaker_article_t.article_group_id
  where article_group_id.group_id='$article_id' and
  article_t.article_group_id='$article_id' and
  event_article_t.event_group_id='$event_id' and
  event_group_id.group_id='$event_id' AND
  event_t.event_group_id='$event_id' AND
  speaker_article_t.article_group_id='$article_id'";
$result=mysqli_query($connection, $query);
if($result==true){
    unlink("../../images/articles/$var");
    header("Location:../../index.php");
}
else{
    echo "Ошибка";
}
?>
