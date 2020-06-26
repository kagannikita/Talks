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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>DKU Talks Панель администратора</title>
</head>
<body>

<div class="title">
    <img src="../images/DKU_LOGO_DE%20(1).png" width="80" height="100">
    DKU Talks Панель администратора
    <a  class="language" href="article_panel.php?lang=eng">EN</a>
    <a class="language" href="article_panel.php?lang=rus">RU</a>
    <a  class="language" href="article_panel.php?lang=ger">DE</a>
</div>
<div class="sidebar" style="margin-top: 3%">
    <a  href="../index.php">Сайт DKU Talks</a>
    <?php if(isset($_SESSION['logged_user'])): ?>
        <a href="group_panel.php" >Форма для создания групп</a>
        <a href="speaker_panel.php">Форма для добавления спикера</a>
        <a href="article_panel.php" class="active">Форма для добавления лекции</a>
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
        Вы вошли как <?php echo $_SESSION['logged_user']->login;?><br><a href="logout.php">Выйти</a>
    <?php else: ?>
        <a href="login.php">Войти</a>
    <?php endif; ?>
    <br>
    Вы добавляете информацию на: <?php echo $_SESSION['lang']?>
</div>
<div class="gallery-upload" style="margin-top: -5%;">
    <h2>Форма для добавления лекции</h2>
    <form action="article_panel.php" method="post" enctype="multipart/form-data">
        <div class="gallery-group">
            <label>Группа лекции:</label>
            <select name="group" style="width: 100%">
                <option></option>
                <?php
                $result=mysqli_query($connection,"select * from article_group_id");
                while($myrow=mysqli_fetch_array($result)){
                    echo "<option value=".$myrow['group_id'].">".$myrow['group_name']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="gallery-group">
            <label>Название лекции</label>
            <input type="text"   placeholder="Введите название лекции" name="article_name">
        </div>
        <div class="gallery-group">
            <label>Описание лекции</label>
            <textarea type="text"   placeholder="Введите описание лекции" name="description" style="width: 100%; height:200px"></textarea>
        </div>
        <button type="submit" name="add_article" class="btn btn-primary">Добавить</button>
    </form>
</div>
<?php
if(isset($_POST['add_article'])){
    $article_group=$_POST['group'];
    $articleTitle=$_POST['article_name'];
    $description=$_POST['description'];
$check=mysqli_query($connection,"select article_group_id,language_name from article_t where article_group_id='$article_group' and language_name='$language'");
// Validate file input to check if is not empty
if (empty($article_group)){
    $response = array(
        "type" => "danger",
        "message" => 'Вы незаполнили поле  "Группа лекции"'
    );
}
else if (empty($articleTitle)){
    $response = array(
        "type" => "danger",
        "message" => 'Вы незаполнили поле  "Название лекции"'
    );
}
else if (empty($description)){
    $response = array(
        "type" => "danger",
        "message" => 'Вы незаполнили поле  "Описание лекции"'
    );
}
else if(mysqli_num_rows($check)==1){
    $response = array(
        "type" => "danger",
        "message" => 'Поменяйте язык у лекции группы должно быть три разных языка"'
    );
}
else {
    include_once "../includes/db_connection.php";
    $sql = "SELECT * FROM article_t";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed1";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $sql = "INSERT INTO article_t(article_group_id,article_title,article_text,language_name) VALUES (?,?,?,?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed2";
        } else {
            mysqli_stmt_bind_param($stmt, "ssss",$article_group, $articleTitle, $description, $_SESSION['lang']);
            mysqli_stmt_execute($stmt);
            echo "<meta http-equiv='refresh' content='0'>";
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
