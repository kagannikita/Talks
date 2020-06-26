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
    <a href="event_panel.php?lang=eng">EN</a>
    <a href="event_panel.php?lang=rus">RU</a>
    <a href="event_panel.php?lang=ger">DE</a>
</div>
<div class="sidebar" style="margin-top: 3%">
    <a  href="../index.php">Сайт DKU Talks</a>
    <?php if(isset($_SESSION['logged_user'])): ?>
        <a href="group_panel.php" >Форма для создания групп</a>
        <a href="speaker_panel.php">Форма для добавления спикера</a>
        <a href="article_panel.php" >Форма для добавления статьи</a>
        <a href="event_panel.php" class="active">Форма для добавления события</a>
        <a href="speaker_article_panel.php">Форма для создания встречи</a>
        <a href="video_panel.php">Форма для добавления видео</a>
        <a href="gallery_panel.php" >Форма для создания фотографий в галерее</a>
    <?php else: header("Location:login.php") ?>
        <a href="login.php" class="active">Вход</a>
    <?php endif ?>
</div>
<div class="admin">
    <?php if(isset($_SESSION['logged_user'])): ?>
        Вы вошли как <?php echo $_SESSION['logged_user']->login;?><br> <a href="logout.php">Выйти</a>
       <br> Вы добавляете информация на: <?php echo $_SESSION['lang']?>
    <?php else: ?>
        <a href="login.php">Войти</a>
    <?php endif; ?>
</div>
<div class="gallery-upload" style="margin-top: -5%">
    <h2>Форма для добавления события</h2>
    <form action="event_panel.php" method="post">
        <div class="gallery-group">
            <label>Группа события:</label>
            <select name="group" style="width: 100%">
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
            <label>Место встречи</label>
            <input type="text" name="event_place" placeholder="Введите место встречи">
        </div>
        <div class="gallery-group">
            <label>Язык встречи</label>
           <input type="text" name="event_language" placeholder="Введите язык встречи"/>
        </div>
        <div class="gallery-group">
            <label>Стоимость</label>
            <input type="text" name="event_cost" placeholder="Введите стоимость">
        </div>
        <div class="gallery-group">
            <label>Модератор</label>
            <input type="text" name="event_moderator" placeholder="Введите модератора">
        </div>
        <div class="gallery-group">
            <label>Организатор встречи</label>
            <input type="text" name="event_department" placeholder="Введите организатора встречи">
        </div>
        <button type="submit" name="add_event" class="btn btn-primary">Добавить</button>
    </form>
</div>
<?php
require_once "../includes/db_connection.php";
if(isset($_POST['add_event'])){
    $event_group=$_POST['group'];
    $event_place=$_POST['event_place'];
    $event_language=$_POST['event_language'];
    $event_moderator=$_POST['event_moderator'];
    $event_department=$_POST['event_department'];
    $event_cost=$_POST['event_cost'];
    $language_check=mysqli_query($connection,"select event_group_id,language_name from event_t where event_group_id='$event_group'
and language_name='$language'");
    $place_check=mysqli_query($connection,"select event_place,event_group_id from event_t where event_group_id='$event_group'
and event_place='$event_place'");
    if(empty($event_group)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Группа события"'
        );

    }
  else  if(empty($event_place)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Место встречи"'
        );
    }
  else  if(empty($event_language)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Язык встречи"'
        );
    }
  else  if(empty($event_cost)){
      $response = array(
          "type" => "danger",
          "message" => 'Вы незаполнили поле  "Стоимость"'
      );
  }
 else   if(empty($event_moderator)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Модератор"'
        );
    }
 else   if(empty($event_department)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Организатор встречи"'
        );
    }
 else if(mysqli_num_rows($language_check)==1){
     $response = array(
         "type" => "danger",
         "message" => 'Поменяйте язык у каждого события должно три разных языка'
     );
 }
 else if(mysqli_num_rows($place_check)==1){
     $response=array(
         "type" => "danger",
         "message" => 'Данный кабинет занят на соответсвующую дату и время'
     );
 }
 else {
     include_once "../includes/db_connection.php";
     $sql = "SELECT * FROM event_t";
     $stmt = mysqli_stmt_init($connection);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "SQL statement failed1";
     } else {
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         $sql = "INSERT INTO event_t(event_group_id,event_place,event_moderator,event_org_dep,event_cost,event_language,language_name) VALUES (?,?,?,?,?,?,?)";
         if (!mysqli_stmt_prepare($stmt, $sql)) {
             echo "SQL statement failed2";
         } else {
             mysqli_stmt_bind_param($stmt, "sssssss", $event_group,  $event_place, $event_moderator,$event_department,$event_cost,$event_language, $_SESSION['lang']);
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
    <div   class="alert alert-<?php echo $response["type"]; ?> alert-dismissible" id="myAlert" style="margin-top: -7.5%">
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
