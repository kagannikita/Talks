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
    <title>Форма для изменения лекции</title>
</head>
<?php
require_once '../../includes/db_connection.php';
$id=$_GET['article_id'];
$article_group_id=$_GET['article_group_id'];
$select=mysqli_query($connection,
"select * from article_t 
	JOIN article_group_id on article_t.article_group_id=article_group_id.group_id
	join event_article_t on article_group_id.group_id=event_article_t.article_group_id
    JOIN event_group_id on event_article_t.event_group_id=event_group_id.group_id
    JOIN event_t on event_group_id.group_id=event_t.event_group_id
	where 
	article_t.article_id='$id' 
	and 
	article_group_id.group_id='$article_group_id'
	AND
    article_t.language_name=event_t.language_name");
$row=mysqli_fetch_assoc($select);
$old_photo=$row['image'];
$event_id=$row['event_id'];
$event_group_id=$row['event_group_id'];
?>
<body>
<a  style="position: absolute;top: 6%;" href="../../index.php">Вернуться на главную страницу</a>
<div class="gallery-upload" style="margin-top: 0%">
    <h2>Форма для изменения лекции\Евента</h2>
    <form action="" method="post" enctype="multipart/form-data">
		<div class="gallery-group">
            <label for="name">Название лекции:</label>
            <input type="text" name="article_title" value='<?php echo $row['article_title']?>'>
        </div>
		<div class="gallery-group">
            <label>Дата события:</label>
            <input type="date" name="event_date" 	value="<?php echo $row['event_date']?>">
        </div>
		<div class="gallery-group">
            <label>Время события:</label>
            <input type="time" name="event_time" 	value="<?php echo $row['event_time']?>">
        </div>
		<div class="gallery-group">
            <label>Место встречи</label>
            <input type="text" name="event_place" 	value="<?php echo $row['event_place']?>">
        </div>
		<div class="gallery-group">
            <label>Язык встречи</label>
            <input type="text" name="event_language" 	value="<?php echo $row['event_language']?>">
        </div>
        <div class="gallery-group">
            <label>Модератор</label>
            <input type="text" name="event_moderator" 	value="<?php echo $row['event_moderator']?>">
        </div>
		<div class="gallery-group">
            <label>Организатор встречи</label>
            <input type="text" name="event_department" 	value="<?php echo $row['event_org_dep']?>">
        </div>
		<div class="gallery-group">
            <label>Email:</label>
            <input type="email" name="email"			value="<?php echo $row['email']?>">
        </div>
		<div class="gallery-group">
            <label>Стоимость</label>
            <input type="text" name="event_cost" 		value="<?php echo $row['event_cost']?>">
        </div>
		<div class="gallery-group">
            <label for="name">Текст артикля:</label>
            <textarea type="text" name="article_text"  style="width: 100%;height: 119px">
			<?php echo $row["article_text"]?>
            </textarea>
        </div>
		<div class="gallery-group">
            <label for="name">Фото артикля:</label>
            <img src="../../images/articles/<?php echo $row['image']?>" style="width:300px;height: 350px"></br>
            <input type="file" name="article_image"/>
        </div>
		<button type="submit" name="update" class="btn btn-primary" value="update">Изменить</button>
	</form>
	<?php
		$QueryForAuthor="SELECT speaker_group_id,speaker_group_id.group_name,article_group_id,connections_id from speaker_article_t
JOIN article_group_id on speaker_article_t.article_group_id=article_group_id.group_id
JOIN speaker_group_id on speaker_article_t.speaker_group_id=speaker_group_id.group_id
WHERE speaker_article_t.article_group_id='$article_group_id'";
	$result2=mysqli_query($connection, $QueryForAuthor);
	//тут вывод авторов
			?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class='gallery-group'>
		<label> Удаление Спикера</label>
			<select name="speaker_group_id" style="width: 100%">
                <?php
                while ($myrow2=mysqli_fetch_array($result2)){?>
				<?php
				echo "<option value=".$myrow2['connections_id'].">".$myrow2['group_name']."</option>";}
                ?>
            </select>
		</div>
			<button type="submit" name="delete_speaker" class="btn btn-primary" value="delete_speaker">Удалить</button>
	</form>
	<form action="" method="post">
        <div class="gallery-group">
            <label>Добавление спикера</label>
            <select name="speaker" style="width: 100%">
                <?php
                $select1=mysqli_query($connection,
                    "select * from speaker_group_id");
                while($myrow=mysqli_fetch_array($select1)){
                    echo "<option value=".$myrow['group_id'].">".$myrow['group_name']."</option>";}
                ?>
            </select>
        </div>
        <button type="submit" name="add_article" class="btn btn-primary">Добавить</button>
    </form>
	<?php
if(isset($_POST['add_article'])){
	$speaker=$_POST['speaker'];
	$speaker_article_check=mysqli_query($connection,"SELECT speaker_group_id,article_group_id from speaker_article_t
where speaker_group_id='$speaker' and article_group_id='$article_group_id'");
		if(empty($speaker)){
			$response = array(
				"type" => "danger",
				"message" => 'Незаполнено поле "Спикер"'
				);
		}
		else if (mysqli_num_rows($speaker_article_check)==1){
            $response = array(
                "type" => "danger",
                "message" => 'У спикера есть уже такая же лекция"'
            );
        }
		else {
			$result=mysqli_query($connection,"INSERT INTO `speaker_article_t` (  `speaker_group_id`, `article_group_id`) 
			VALUES ( '$speaker', '$article_group_id');");
				if($result==true){
                    echo "<meta http-equiv='refresh' content='0'>
<script>
                alert('Данные загружены');
                </script>";
				}	
		}	
}
	//кнопка удаления спикера
		if(isset($_POST['delete_speaker'])){
		$connection_id=$_POST['speaker_group_id'];
		$query="DELETE FROM speaker_article_t where
				speaker_article_t.connections_id='$connection_id'";
            $result=mysqli_query($connection, $query);
            if($result==true){
                echo "<meta http-equiv='refresh' content='0'>";
                   }
            else{
                echo "Ошибка";
            }
		}
	//изменения статьи
    if(isset($_POST['update'])){
        $article_title=$_POST['article_title'];
		$event_date=$_POST['event_date'];
		$event_place=$_POST['event_place'];
		$event_language=$_POST['event_language'];
		$event_time=$_POST['event_time'];
		$event_moderator=$_POST['event_moderator'];
		$event_org_dep=$_POST['event_department'];
		$email=$_POST['email'];
		$event_cost=$_POST['event_cost'];
		$article_text=$_POST['article_text'];
		$article_image=$_FILES['article_image']['name'];
		$time_place_check=mysqli_query($connection,"select event_group_id,event_place from event_t
where event_group_id='$event_group_id' and event_place='$event_place'");
        $size=$_FILES['article_image']['size'];
        $temp=$_FILES['article_image']['tmp_name'];
        $fileExt=explode(".",$article_image);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array("jpg","png","jpeg");
       if(empty($article_title)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Название лекции"'
           );
       }
       else if(empty($event_date)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Дата события"'
           );
       }
       else if(empty($event_time)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Время встречи"'
           );
       }
       else if(empty($event_place)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Место встречи"'
           );
       }
       else if(empty($event_language)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Язык встречи"'
           );
       }
       else if(empty($event_moderator)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Модератор"'
           );
       }
       else if(empty($event_org_dep)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Организатор встречи"'
           );
       }
       else if(empty($email)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Email"'
           );
       }
       else if(empty($event_cost)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Стоимость"'
           );
       }
       else if(empty($article_text)){
           $response = array(
               "type" => "danger",
               "message" => 'Вы незаполнили поле  "Текст артикля"'
           );
       }
// Validate file input to check if is with valid extension
       else if (! in_array($fileActualExt, $allowed)) {
           $response = array(
               "type" => "danger",
               "message" => 'Вы можете записать только  форматы jpg,png,jpeg в поле "Фотография"'
           );
       }
// Validate  file size
       else if (($size > 20000000)) {
           $response = array(
               "type" => "danger",
               "message" => "Вы можете загрузить  не больше 20Мб"
           );
       }
       else {
           if (isset($article_image) && ($article_image !== "")) {
               $size = $_FILES['article_image']['size'];
               $temp = $_FILES['article_image']['tmp_name'];
               $type = $_FILES['article_image']['type'];
               move_uploaded_file($temp, "../../images/articles/$article_image");
           }
           if ((!($article_image))) {
               $query =
                   "UPDATE event_t 
				JOIN event_group_id ON event_t.event_group_id=event_group_id.group_id
				JOIN event_article_t ON event_group_id.group_id=event_article_t.event_group_id
				JOIN article_group_id on event_article_t.article_group_id=article_group_id.group_id
				JOIN article_t ON article_group_id.group_id=article_t.article_group_id 
				SET
				article_t.article_title='$article_title',
				article_t.article_text='$article_text',
				event_group_id.event_time='$event_time',
				event_group_id.event_date='$event_date',
				event_group_id.email='$email',
				event_t.event_place='$event_place',
				event_t.event_moderator='$event_place',
				event_t.event_org_dep='$event_org_dep',
				event_t.event_cost='$event_cost',
				event_t.event_language='$event_language'
				WHERE	
					event_t.event_id='$event_id'
					and
					event_t.event_group_id='$event_group_id'
					and
					article_t.article_id='$id' 
					and 
					article_group_id.group_id='$article_group_id'
					and
					article_t.language_name=event_t.language_name";
           } else {
               $query =
                   "UPDATE event_t 
					JOIN event_group_id ON event_t.event_group_id=event_group_id.group_id
					JOIN event_article_t ON event_group_id.group_id=event_article_t.event_group_id
					JOIN article_group_id on event_article_t.article_group_id=article_group_id.group_id
					JOIN article_t ON article_group_id.group_id=article_t.article_group_id 
					SET
					article_group_id.image='$article_image',
					article_t.article_title='$article_title',
					article_t.article_text='$article_text',
					event_group_id.event_time='$event_time',
					event_group_id.event_date='$event_date',
					event_group_id.email='$email',
					event_t.event_place='$event_place',
					event_t.event_moderator='$event_place',
					event_t.event_org_dep='$event_org_dep',
					event_t.event_cost='$event_cost',
					event_t.event_language='$event_language'
					WHERE	
						event_t.event_id='$event_id'
						and
						event_t.event_group_id='$event_group_id'
						and
						article_t.article_id='$id' 
						and 
						article_group_id.group_id='$article_group_id'
						and
						article_t.language_name=event_t.language_name";
               unlink("../../images/articles/$old_photo");
           }
           $update = mysqli_query($connection, $query);
           if ($update) {
               header("Location:../../index.php");
           } else {
               echo "<script>alert('Ошибка!')</script>";
           }
       }
    }
    ?>
</div>
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