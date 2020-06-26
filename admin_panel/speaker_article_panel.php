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
    <a  href="../../index.php">Сайт DKU Talks</a>
    <?php if(isset($_SESSION['logged_user'])): ?>
        <a href="group_panel.php" >Форма для создания групп</a>
        <a href="speaker_panel.php">Форма для добавления спикера</a>
        <a href="article_panel.php" >Форма для добавления лекции</a>
        <a href="event_panel.php">Форма для добавления события</a>
        <a href="speaker_article_panel.php" class="active">Форма для создания встречи</a>
        <a href="video_panel.php">Форма для добавления видео</a>
        <a href="gallery_panel.php" >Форма для создания фотографий в галерее</a>
    <?php else: header("Location:login.php") ?>
        <a  class="active" href="signup.php">Регистрация</a>
        <a href="login.php">Вход</a>
    <?php endif ?>
</div>
<div class="admin">
    <?php if(isset($_SESSION['logged_user'])): ?>
        <p>Вы вошли как <?php echo $_SESSION['logged_user']->login;?></p> <a href="logout.php">Выйти</a>
    <?php else: ?>
        <a href="login.php">Войти</a>
    <?php endif; ?>
</div>
<div class="gallery-upload" style="margin-top: -4%">
    <h2>Форма для создания встречи 1</h2>
    <form action="speaker_article_panel.php" method="post">
        <div class="gallery-group">
            <label>Спикер</label>
            <select name="speaker" style="width: 100%">
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
                <label>Лекция</label>
                <select name="article" style="width: 100%">
                    <option></option>
                    <?php
                    $result=mysqli_query($connection,"select * from article_group_id");
                    while($myrow=mysqli_fetch_array($result)){
                        echo "<option value=".$myrow['group_id'].">".$myrow['group_name']."</option>";
                    }
                    ?>
                </select>
            </div>
        <button type="submit" name="add_speaker_article" class="btn btn-primary">Добавить</button>
    </form>
</div>
<div class="gallery-upload" style="margin-top: 12%">
    <h2>Форма для создания встречи 2</h2>
    <form action="speaker_article_panel.php" method="post">
        <div class="gallery-group">
            <label>Событие</label>
            <select name="event" style="width: 100%">
                <option></option>
                <?php
                $result=mysqli_query($connection,"select * from event_group_id");
                while($myrow=mysqli_fetch_array($result)){
                    $event_date=date("j F Y",strtotime($myrow['event_date']));
                    echo "<option value=".$myrow['group_id'].">".$event_date." ".$myrow['event_time']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="gallery-group">
            <label>Лекция</label>
            <select name="article" style="width: 100%">
                <option></option>
                <?php
                $result=mysqli_query($connection,"select * from article_group_id");
                while($myrow=mysqli_fetch_array($result)){
                    echo "<option value=".$myrow['group_id'].">".$myrow['group_name']."</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="add_event_article" class="btn btn-primary">Добавить</button>
    </form>
</div>
<?php
require_once "../includes/db_connection.php";
if(isset($_POST['add_speaker_article'])){
    $speaker=$_POST['speaker'];
    $article=$_POST['article'];
    $check=mysqli_query($connection,"SELECT speaker_group_id,article_group_id from speaker_article_t where speaker_group_id='$speaker' and article_group_id='$article'");
    if(empty($speaker)){
        $response = array(
            "type" => "danger",
            "message" => 'Незаполнено поле "Спикер"'
        );
    }
    else if(empty($article)){
        $response = array(
            "type" => "danger",
            "message" => 'Незаполнено поле "Лекция"'
        );
    }
    else if(mysqli_num_rows($check)==1){
        $response = array(
            "type" => "danger",
            "message" => 'У спикера уже есть такая лекция'
        );
    }
    else {
    $result=mysqli_query($connection,"INSERT INTO `speaker_article_t` (  `speaker_group_id`, `article_group_id`) VALUES (  '$speaker', '$article');");
    if($result==true){
        echo "<meta http-equiv='refresh' content='0'>";
    }}
}
else if(isset($_POST['add_event_article'])){
    $event=$_POST['event'];
    $article=$_POST['article'];
    $check=mysqli_query($connection,"SELECT event_group_id,article_group_id from event_article_t where event_group_id='$event' and article_group_id='$article'");
    if(empty($event)){
        $response = array(
            "type" => "danger",
            "message" => 'Незаполнено поле "Событие"'
        );
    }
    else if(empty($article)){
        $response = array(
            "type" => "danger",
            "message" => 'Незаполнено поле "Лекция"'
        );
    }
    else if(mysqli_num_rows($check)==1){
        $response = array(
            "type" => "danger",
            "message" => 'У лекция уже есть такое событие'
        );
    }
    else {
        $result=mysqli_query($connection,"INSERT INTO `event_article_t` (  `event_group_id`, `article_group_id`) VALUES (  '$event', '$article');");
        if($result==true){
            echo "
            <script>
            alert('Данные загружены');
            </script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }}
}
?>
<?php if(!empty($response)) { ?>
    <div   class="alert alert-<?php echo $response["type"]; ?> alert-dismissible" id="myAlert" style="margin-top: -7%">
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

