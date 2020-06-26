<?php
include("../includes/db_connection.php");
include("../includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>DKU Talks Панель администратора</title>
</head>
<body>
<div class="title">
    <img src="../images/DKU_LOGO_DE%20(1).png" width="80" height="100">
    DKU Talks Панель администратора
</div>
<div class="sidebar" style="margin-top: 3%">
    <a  href="../index.php">Сайт DKU Talks</a>
    <?php if(isset($_SESSION['logged_user'])): ?>
        <a href="group_panel.php" class="active">Форма для создания групп</a>
        <a href="speaker_panel.php" >Форма для добавления спикера</a>
        <a href="article_panel.php">Форма для добавления лекции</a>
        <a href="event_panel.php">Форма для добавления события</a>
        <a href="speaker_article_panel.php">Форма для создания встречи</a>
        <a href="video_panel.php">Форма для добавления видео</a>
        <a href="gallery_panel.php" >Форма для создания фотографий в галерее</a>
    <?php else: header("Location:login.php") ?>
        <a href="login.php">Вход</a>
    <?php endif ?>
</div>
<div class="admin">
    <?php if(isset($_SESSION['logged_user'])): ?>
        <p>Вы вошли как <?php echo $_SESSION['logged_user']->login;?></p><p><a href="logout.php">Выйти</a></p>
    <?php else: ?>
        <a href="login.php">Войти</a>
    <?php endif; ?>
</div>
<div class="gallery-upload">
    <h2>Форма группы спикера</h2>
    <form method="post" action="group_panel.php" enctype="multipart/form-data">
        <div class="gallery-group">
        <label>Название группы спикера</label>
        <input type="text" placeholder="Введите название группы" name="speaker_group_name"/>
        <p style="font-size: 14px;text-align:left;color: red">*Название группы спикера надо запомнить так как в эту группу вы будете записывать значение самого спикера на трех языках</p>
        </div>
        <div class="gallery-group">
            <label>Фотография спикера:</label>
            <input type="file" name="speaker_photo">
        </div>
        <button type="submit" name="add_group_speaker" class="btn btn-primary">Добавить</button>
    </form>
</div>
<div class="gallery-upload" style="margin-top: 15%">
    <h2>Форма группы лекции</h2>
    <form method="post" action="group_panel.php" enctype="multipart/form-data">
        <div class="gallery-group">
            <label>Название группы лекции</label>
            <input type="text" placeholder="Введите название группы" name="article_group_name"/>
            <p style="font-size: 14px;text-align:left;color: red">*Название группы лекции надо запомнить так как в эту группу вы будете записывать значение самой лекции на трех языках</p>
        </div>
        <div class="gallery-group">
            <label>Фотография лекции:</label>
            <input type="file" name="article_photo">
        </div>
        <button type="submit" name="add_group_article" class="btn btn-primary">Добавить</button>
    </form>
</div>
<div class="gallery-upload" style="margin-top: 35%">
    <h2>Форма группы события</h2>
    <form method="post" action="group_panel.php" enctype="multipart/form-data">
        <div class="gallery-group">
            <label>Дата события:</label>
            <input type="date" name="event_date">
        </div>
        <div class="gallery-group">
            <label>Время начала события:</label>
            <input type="time" name="event_time">
        </div>
        <div class="gallery-group">
            <label>Время окончания события:</label>
            <input type="time" name="event_end_time">
        </div>
        <div class="gallery-group">
            <label>Email:</label>
            <input type="email" name="email">
        </div>
        <button type="submit" name="add_group_event" class="btn btn-primary">Добавить</button>
    </form>
</div>
<!--добавление спикер группы -->
<?php
if(isset($_POST['add_group_speaker'])){
    $newFileName=$_POST['speaker_group_name'];
    if ($newFileName){
        $newFileName="speakers";
    }else{
        $newFileName=strtolower(str_replace(" ","-",$newFileName));
    }
    $speaker_group_name=$_POST['speaker_group_name'];
    $speaker_photo=$_FILES['speaker_photo'];
    $fileName=$speaker_photo["name"];
    $fileType=$speaker_photo["type"];
    $fileError=$speaker_photo["error"];
    $fileSize=$speaker_photo["size"];
    $fileTempName=$speaker_photo["tmp_name"];
    $fileExt=explode(".",$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array("jpg","jpeg","png");
    $check=mysqli_query($connection,"SELECT group_name from speaker_group_id where group_name='$speaker_group_name'");
    // Validate file input to check if is not empty
    if (empty($speaker_group_name)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Название группы"'
        );
    }
// Validate file input to check if is with valid extension
    else if (! in_array($fileActualExt, $allowed) and file_exists($fileTempName) ) {
        $response = array(
            "type" => "danger",
            "message" => 'Вы можете записать только файлы форматов jpg,png,jpeg в поле "Фотография спикера"'
        );
    }
// Validate  file size
    else if (($fileSize > 20000000) and file_exists($fileTempName)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы можете загрузить изображение не больше 20Мб"
        );
    }
    else if (mysqli_num_rows($check)==1){
        $response = array(
            "type" => "danger",
            "message" => 'Такая спикер группа уже существует'
        );
    }
    else {
        $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../images/speakers/" . $imageFullName;
        include_once "../includes/db_connection.php";
        $sql = "SELECT * FROM speaker_group_id";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $sql = "INSERT INTO speaker_group_id(group_name,photo) VALUES (?,?)";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed2";
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $speaker_group_name, $imageFullName);
                mysqli_stmt_execute($stmt);
                move_uploaded_file($fileTempName, $fileDestination);
                echo "               <script>
                alert('Данные загружены');
</script>";
                echo "<meta http-equiv='refresh' content='0'>";


            }
        }
    }
}
else if(isset($_POST['add_group_article'])){
    $newFileName=$_POST['article_group_name'];
    if ($newFileName){
        $newFileName="articles";
    }else{
        $newFileName=strtolower(str_replace(" ","-",$newFileName));
    }
    $article_group_name=$_POST['article_group_name'];
    $article_photo=$_FILES['article_photo'];
    $fileName=$article_photo["name"];
    $fileType=$article_photo["type"];
    $fileError=$article_photo["error"];
    $fileSize=$article_photo["size"];
    $fileTempName=$article_photo["tmp_name"];
    $fileExt=explode(".",$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array("jpg","jpeg","png");
    $check=mysqli_query($connection,"select group_name from article_group_id where group_name='$article_group_name'");
    // Validate file input to check if is not empty
    if (empty($article_group_name)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Название группы"'
        );
    }
    else if (! file_exists($fileTempName)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы не выбрали картинку"
        );
    }
// Validate file input to check if is with valid extension
    else if (! in_array($fileActualExt, $allowed)) {
        $response = array(
            "type" => "danger",
            "message" => 'Вы можете записать только файлы форматов jpg,png,jpeg в поле "Фотография спикера"'
        );
    }
// Validate  file size
    else if (($fileSize > 20000000)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы можете загрузить изображение не больше 20Мб"
        );
    }
    else if(mysqli_num_rows($check)==1){
        $response = array(
            "type" => "danger",
            "message" => 'Такая группа лекции уже существует"'
        );
    }
    else {
        $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../images/articles/" . $imageFullName;
        include_once "../includes/db_connection.php";
        $sql = "SELECT * FROM article_group_id";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $sql = "INSERT INTO article_group_id(group_name,image) VALUES (?,?)";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed2";
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $article_group_name, $imageFullName);
                mysqli_stmt_execute($stmt);
                move_uploaded_file($fileTempName, $fileDestination);
                echo "<meta http-equiv='refresh' content='0'>
               <script>
                alert('Данные загружены');
</script>";


            }
        }
    }
}
else if(isset($_POST['add_group_event'])){
    $event_date=$_POST['event_date'];
    $event_end_time=$_POST['event_end_time'];
    $event_time=$_POST['event_time'];
    $email=$_POST['email'];
    // Validate file input to check if is not empty
    if (empty($event_date)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Дата события"'
        );
    }
    else if (empty($event_time)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Время начала события"'
        );
    }
    else if (empty($event_end_time)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Время окончания события"'
        );
    }
    else if (empty($email)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Email"'
        );
    }
    else {
        include_once "../includes/db_connection.php";
        $sql = "SELECT * FROM event_group_id";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $sql = "INSERT INTO event_group_id(event_date,event_time,email) VALUES (?,?,?)";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed2";
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $event_date,$event_time,$email);
                mysqli_stmt_execute($stmt);
                echo "               <script>
                alert('Данные загружены');
</script>
<meta http-equiv='refresh' content='0'>";
            }
            }
        }

}
?>
<?php if(!empty($response)) { ?>
    <div   class="alert alert-<?php echo $response["type"]; ?> alert-dismissible" id="myAlert" style="margin-top: -8%">
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