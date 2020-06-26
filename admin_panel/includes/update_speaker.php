
<!--изменение-->
<html>
<head>
    <link rel="stylesheet" href="../../css/forms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма для изменения спикера</title>
</head>
<?php
require_once '../../includes/db_connection.php';
$id=$_GET['speaker_id'];
$speaker_group_id=$_GET['speaker_group_id'];
$select=mysqli_query($connection,"select * from speaker_t 
	JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
	where speaker_t.speaker_id='$id' 
	and speaker_group_id.group_id='$speaker_group_id'");
$row=mysqli_fetch_assoc($select);
$old_photo=$row['photo'];
?>
<body>
<a style="position: absolute;top: 6%" href="../../speakers.php">Вернуться к спикерам</a>
<div class="gallery-upload" style="margin-top: 0%">
    <h2>Форма для изменения спикера</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="gallery-group">
            <label for="name">ФИО спикера:</label>
            <input type="text" name="speaker_fullname" value="<?php echo $row["speaker_fullname"]?>">
        </div>
        <div class="gallery-group">
            <label for="name">Биография спикера:</label>
            <textarea type="text" name="speaker_bio"  style="width: 100%;height: 119px">
<?php echo $row["speaker_bio"]?>
            </textarea>
        </div>
        <div class="gallery-group">
            <label for="name">Страна спикера:</label>
            <input type="text" name="speaker_country" value="<?php echo $row["speaker_country"]?>">
        </div>
        <div class="gallery-group">
            <label for="name">Место работы спикера:</label>
            <input type="text" name="speaker_workplace" value="<?php echo $row["speaker_workplace"]?>">
        </div>
        <div class="gallery-group">
            <label for="name">Фото спикера:</label>
            <img src="../../images/speakers/<?php echo $row["photo"]?>" style="width:300px;height: 350px"></br>
            <input type="file" name="speaker_photo"/>
        </div>
        <button type="submit" name="update" class="btn btn-primary" value="update">Изменить</button>
    </form>

    <?php
    if(isset($_POST['update'])){
        $speaker_fullname=$_POST['speaker_fullname'];
        $speaker_bio=$_POST['speaker_bio'];
        $speaker_workplace=$_POST['speaker_workplace'];
        $speaker_country=$_POST['speaker_country'];
        $speaker_photo=$_FILES['speaker_photo']['name'];
        if(isset($speaker_photo) && ($speaker_photo!=="")){
            $size=$_FILES['speaker_photo']['size'];
            $temp=$_FILES['speaker_photo']['tmp_name'];
            $type=$_FILES['speaker_photo']['type'];
            $fileExt=explode(".",$speaker_photo);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array("jpg","png","jpeg");
            move_uploaded_file($temp,"../../images/speakers/$speaker_photo");
        }
        if(empty($speaker_fullname)){
            $response = array(
                "type" => "danger",
                "message" => 'Незаполнено поле "ФИО спикера" '
            );
        }
        else if(empty($speaker_bio)) {
            $response = array(
                "type" => "danger",
                "message" => 'Незаполнено поле "Биография спикера" '
            );
        }
        else if(empty($speaker_country)) {
            $response = array(
                "type" => "danger",
                "message" => 'Незаполнено поле "Страна спикера" '
            );
        }
        else if(empty($speaker_workplace)) {
            $response = array(
                "type" => "danger",
                "message" => 'Незаполнено поле "Место работы спикера" '
            );
        }
        else if (! file_exists($temp)) {
            $response = array(
                "type" => "danger",
                "message" => "Вы не выбрали фотографию спикера"
            );
        }
        // Validate file input to check if is with valid extension
        else if (! in_array($fileActualExt, $allowed)) {
            $response = array(
                "type" => "danger",
                "message" => 'Вы можете записать только видео-файлы форматы jpg,png,jpeg в поле "Фотография спикера"'
            );
        }
        // Validate  file size
        else if (($size > 20000000)) {
            $response = array(
                "type" => "danger",
                "message" => "Вы можете загрузить изображение не больше 20Мб"
            );
        }
        else{
        if ((!($speaker_photo)))  {
            $query= "UPDATE speaker_t
inner JOIN speaker_group_id         on speaker_t.speaker_group_id=speaker_group_id.group_id
set speaker_t.speaker_fullname='$speaker_fullname',
speaker_t.speaker_workplace='$speaker_workplace',
speaker_t.speaker_country='$speaker_country',
speaker_t.speaker_bio='$speaker_bio'
where speaker_t.speaker_id='$id'";
        } else  {
            $query = "UPDATE speaker_t
inner JOIN speaker_group_id         on speaker_t.speaker_group_id=speaker_group_id.group_id
set speaker_t.speaker_fullname='$speaker_fullname',
speaker_t.speaker_workplace='$speaker_workplace',
speaker_t.speaker_country='$speaker_country',
speaker_t.speaker_bio='$speaker_bio',
speaker_group_id.photo='$speaker_photo'
where speaker_t.speaker_id='$id' and speaker_group_id.group_id='$speaker_group_id'";
            unlink("../../images/speakers/$old_photo");
        }
        $update=mysqli_query($connection,$query);
        if($update){
            echo "<meta http-equiv='refresh' content='0'>
<script>
                alert('Данные загружены');
                </script>
";
        }
        else{
            echo "<script>alert('Ошибка!')</script>";
        }
    }}
    ?>
</div>
<?php
$select=mysqli_query($connection,
"SELECT speaker_group_id,article_group_id.group_name,article_group_id,connections_id from speaker_article_t
JOIN article_group_id on speaker_article_t.article_group_id=article_group_id.group_id
JOIN speaker_group_id on speaker_article_t.speaker_group_id=speaker_group_id.group_id
WHERE speaker_article_t.speaker_group_id='$speaker_group_id'");
?>
<div class="gallery-upload" style="margin-top: 53%">
    <h2>Форма для изменения лекций у спикера</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <div class='gallery-group'>
    <label> Удаление Лекции</label>
        <select name='connection_id' style='width: 100%'>
            <?php
        while($row=mysqli_fetch_assoc($select)){
                echo "<option value='".$row['connections_id']."'>".$row['group_name']."</option>";}?>
		</select>
	</div>
        <button type="submit" name="delete_articles" class="btn btn-primary" value="delete_articles">Удалить</button>
    </form>

        <?php
		if(isset($_POST['delete_articles'])){
			$connection_id=$_POST['connection_id'];
			$query="DELETE FROM speaker_article_t where
				speaker_article_t.connections_id='$connection_id'";
				$result=mysqli_query($connection, $query);
				if($result==true){
                    echo "<meta http-equiv='refresh' content='0'>";
					echo "Данные удалены";
					}
				else{
					echo "Ошибка";
				}
		}
        ?>
    <form action="" method="post">
        <div class="gallery-group">
            <label>Добавление лекции</label>
            <select name="article" style="width: 100%">
                <?php
                $select1=mysqli_query($connection,
                    "select * from article_group_id");
                while($myrow=mysqli_fetch_array($select1)){
                    echo "<option value=".$myrow['group_id'].">".$myrow['group_name']."</option>";}
                ?>
            </select>
        </div>
        <button type="submit" name="add_article" class="btn btn-primary">Добавить</button>
    </form>
</div>
<?php
if(isset($_POST['add_article'])){
$article=$_POST['article'];
$speaker_article_check=mysqli_query($connection,"select speaker_group_id,article_group_id from speaker_article_t
where speaker_group_id='$speaker_group_id' and article_group_id='$article'");
 if(empty($article)){
$response = array(
"type" => "danger",
"message" => 'Незаполнено поле "Статья"'
);
}
 else if(mysqli_num_rows($speaker_article_check)==1){
     $response = array(
         "type" => "danger",
         "message" => 'У спикера уже есть такая лекция"'
     );
 }
else {
$result=mysqli_query($connection,"INSERT INTO `speaker_article_t` (  `speaker_group_id`, `article_group_id`) VALUES (  '$speaker_group_id', '$article');");
if($result==true){
    echo "<meta http-equiv='refresh' content='0'>";
}}}
?>
<?php if(!empty($response)) { ?>
    <div   class="alert alert-<?php echo $response["type"]; ?> alert-dismissible" id="myAlert">
        <?php echo $response["message"]; ?>
        <a href="#" class="close">&times;</a>
    </div>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".close").click(function(){
                $("#myAlert").alert("close");
            });
        });
    </script>
<?php }?>
</body>
</html>

