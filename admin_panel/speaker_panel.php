<?php
include("../includes/db_connection.php");
include("../includes/db.php");
include("../languageconfig.php");
$language=$_SESSION['lang'];
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
    <a class="language" href="speaker_panel.php?lang=eng">EN</a>
    <a class="language" href="speaker_panel.php?lang=rus">RU</a>
    <a class="language" href="speaker_panel.php?lang=ger">DE</a>
</div>
<div class="sidebar" style="margin-top: 3%">
    <a  href="../index.php">Сайт DKU Talks</a>
    <?php if(isset($_SESSION['logged_user'])): ?>
        <a href="group_panel.php" >Форма для создания групп</a>
        <a href="speaker_panel.php" class="active">Форма для добавления спикера</a>
        <a href="article_panel.php">Форма для добавления лекции</a>
        <a href="event_panel.php">Форма для добавления события</a>
        <a href="speaker_article_panel.php">Форма для создания встречи</a>
    <a href="video_panel.php">Форма для добавления видео</a>
        <a href="gallery_panel.php" >Форма для создания фотографий в галерее</a>
    <?php else: header("Location:login.php") ?>
        <a href="login.php">Вход</a>
    <?php endif ?>
</div>
<div class="admin" style="margin-top: -47%">
    <?php if(isset($_SESSION['logged_user'])): ?>
        <p>Вы вошли как <?php echo $_SESSION['logged_user']->login;?></p><p><a href="logout.php">Выйти</a></p><p><a href="../speakers.php">Перейти к спикерам</a></p>
    <?php else: ?>
        <a href="login.php">Войти</a>
    <?php endif; ?>
    Вы добавляете информация на: <?php echo $_SESSION['lang']?>
</div>
<div class="gallery-upload" style="margin-top: -9%">
<h2>Форма заполнение спикера</h2>
<form action="speaker_panel.php" method="post" enctype="multipart/form-data">
    <div class="gallery-group">
        <label>Группа спикера:</label>
        <select name="group" style="width: 100%">
            <option></option>
            <?php
            $result=mysqli_query($connection,"select * from speaker_group_id");
            while($myrow=mysqli_fetch_array($result)){
                echo "<option value=".$myrow['group_id'].">".$myrow['group_name']."</option>";
            }
            ?>
        </select>
    </div>
    <div class="gallery-group">
        <label>ФИО спикера:</label>
        <input type="text"   placeholder="Введите имя спикера" name="name">
        <p style="font-size: 14px;text-align:left;color: red">*В имя спикера включается его степень имя,фамилия и отчество</p>
    </div>
    <div class="gallery-group">
        <label>Место работы:</label>
        <input type="text"  placeholder="Введите место работы" name="workplace"/>
    </div>
    <div class="gallery-group">
        <label>Страна:</label>
        <input type="text" placeholder="Введите страну" name="country">
    </div>
    <div class="gallery-group">
        <label>Биография спикера:</label>
        <textarea type="text"   placeholder="Введите биографию спикера" name="bio" style="width: 100%; height:200px"></textarea>
    </div>
    <button type="submit" name="add_speaker" class="btn btn-primary">Добавить</button>
</form>
</div>
<?php
if(isset($_POST['add_speaker'])){
    $speaker_group=$_POST['group'];
    $speaker_name=$_POST['name'];
    $speaker_workplace=$_POST['workplace'];
    $speaker_country=$_POST['country'];
    $speaker_bio=$_POST['bio'];
    $check=mysqli_query($connection,"select speaker_group_id,language_name from speaker_t where speaker_group_id='$speaker_group' and language_name='$language'");
    if (empty($speaker_group)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Группа спикера"'
        );
    }
    else if (empty($speaker_name)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "ФИО спикера"'
        );
    }
    else if (empty($speaker_workplace)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Место работы спикера"'
        );
    }
    else if (empty($speaker_country)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Страна"'
        );
    }
    else if (empty($speaker_bio)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Биография спикера"'
        );
    }
    else if(mysqli_num_rows($check)==1){
        $response = array(
            "type" => "danger",
            "message" => 'Поменяйте язык у  группы спикера может быть только три разных языка "'
        );
    }
   else{
        include_once "../includes/db_connection.php";
        $sql = "SELECT * FROM speaker_t";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $sql = "INSERT INTO speaker_t(speaker_group_id,speaker_fullname,speaker_workplace,speaker_bio,speaker_country,language_name) VALUES (?,?,?,?,?,?)";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed2";
            } else {
                mysqli_stmt_bind_param($stmt, "ssssss",$speaker_group, $speaker_name, $speaker_workplace, $speaker_bio, $speaker_country,$_SESSION['lang']);
                mysqli_stmt_execute($stmt);
                echo "<meta http-equiv='refresh' content='0'>";?>
                <script>
                alert("Данные загружены");
</script>
<?php
            }
        }
    }
}
?>
<?php if(!empty($response)) { ?>
    <div   class="alert alert-<?php echo $response["type"]; ?> alert-dismissible" id="myAlert" style="margin-top: -12.5%">
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