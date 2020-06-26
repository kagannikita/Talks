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
    <title>Форма для изменения видео</title>
</head>
<?php
require_once '../../includes/db_connection.php';
$id=$_GET['video_id'];
$video_group_id=$_GET['group_id'];
$select=mysqli_query($connection,"select * from video join video_group on video.group_id=video_group.id 
where video.video_id='$id' and video_group.id='$video_group_id'");
$row=mysqli_fetch_array($select);
$old_poster=$row['image'];
$old_video=$row['video'];
?>
<body>
<a style="position: absolute; top:7%;" href="../../videos.php">Вернуться к видео</a>
<div class="gallery-upload" style="margin-top: 0%">
    <h2>Форма для изменения видео</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="gallery-group">
            <label for="name">Название видео:</label>
            <input type="text" name="video_title" value="<?php echo $row["video_title"]?>">
        </div>
        <div class="gallery-group">
            <label for="name">Описание видео:</label>
            <textarea style="width: 100%" name="video_description"><?php echo $row["description"]?></textarea>
        </div>
        <div class="gallery-group">
            <label for="name">Постер:</label>
            <img src="../../images/posters/<?php echo $row["image"]?>" style="width:300px;height: 350px"></br>
            <input type="file" name="poster"/>
        </div>
        <div class="gallery-group">
            <label for="name">Видео:</label>
            <p><?php echo $row["video"]?></p>
            <input type="file" name="video">
        </div>
        <button type="submit" name="update" class="btn btn-primary" value="update">Изменить</button>
    </form>
</div>

<?php
if(isset($_POST['update'])){
    $video_title=$_POST['video_title'];
    $description=$_POST['video_description'];
    $poster=$_FILES['poster']['name'];
    $video=$_FILES['video']['name'];
    $fileExt=explode(".",$video);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array("mp4","mkv");
    $fileExt1=explode(".",$poster);
    $fileActualExt1=strtolower(end($fileExt1));
    $allowed1=array("jpg","png","jpeg");
    $size=$_FILES['video']['size'];
    $temp=$_FILES['video']['tmp_name'];
    $size1=$_FILES['poster']['size'];
    $temp1=$_FILES['poster']['tmp_name'];
    if(isset($poster) && ($poster!=="")){
        $poster_size=$_FILES['poster']['size'];
        $poster_temp=$_FILES['poster']['tmp_name'];
        $type=$_FILES['poster']['type'];
        move_uploaded_file($temp,"../../images/posters/$poster");
    }
    if(isset($video) && ($video!=="")){
        $video_size1=$_FILES['video']['size'];
        $video_temp1=$_FILES['video']['tmp_name'];
        $type=$_FILES['video']['type'];
        move_uploaded_file($temp,"../../video/$video");
    }
    if (empty($video_title)){
        $response = array(
            "type" => "danger",
            "message" => 'Незаполнено поле "Название видео"'
        );
    }
    else  if (empty($description)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Описание видео"'
        );
    }
    else  if (! file_exists($temp1)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы не выбрали постер для видеофайла"
        );
    }
    else if (! in_array($fileActualExt1, $allowed1)) {
        $response = array(
            "type" => "danger",
            "message" => 'Вы можете записать только файлы форматы jpeg,jpg,png в поле "Постер"'
        );
    }
    else if (($size1 > 20000000)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы можете изображение  не больше 20Мб"
        );
    }
    else if (! file_exists($temp)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы не выбрали видеозапись"
        );
    }
    // Validate file input to check if is with valid extension
    else if (! in_array($fileActualExt, $allowed)) {
        $response = array(
            "type" => "danger",
            "message" => 'Вы можете записать только видео-файлы форматы mp4,mkv в поле "Видео"'
        );
    }
    // Validate  file size
    else if (($size > 2000000000)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы можете загрузить видеофайл не больше 2Гб"
        );
    }
    else {
        if ((!($poster)) and (!($video))) {
            $query = "Update video 
set video.video_title='$video_title',
 video.description='$description'
where video.video_id='$id'";
        } else if ((!($poster))) {
            $query = "Update video
        inner join video_group on video.group_id=video_group.id
        set video.video_title='$video_title',
         video.description='$description',
         video_group.video='$video'
        where video.video_id='$id' and video_group.id='$video_group_id'
        ";
            unlink("../../video/$old_video");
        } else if ((!($video))) {
            $query = "Update video
        inner join video_group on video.group_id=video_group.id
        set video.video_title='$video_title',
         video.description='$description',
         video_group.image='$poster'
        where video.video_id='$id' and video_group.id='$video_group_id'
        ";
            unlink("../../images/posters/$old_poster");
        } else {
            $query = "Update video
        inner join video_group on video.group_id=video_group.id
        set video.video_title='$video_title',
         video.description='$description',
         video_group.image='$poster',
          video_group.video='$video'
        where video.video_id='$id' and video_group.id='$video_group_id'
        ";
            unlink("../../images/posters/$old_poster");
            unlink("../../video/$old_video");
        }
        $update = mysqli_query($connection, $query);
        if ($update) {
            echo "<meta http-equiv='refresh' content='0'>
<script>
                alert('Данные загружены');
                </script>";
        } else {
            echo "<script>alert('Ошибка!')</script>";
        }
    }
}
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
