<?php
include("../includes/db_connection.php");
include("../includes/db.php");
include ("../languageconfig.php");
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
        <a href="gallery_panel.php?lang=eng">EN</a>
        <a href="gallery_panel.php?lang=rus">RU</a>
        <a href="gallery_panel.php?lang=ger">DE</a>
    </div>
    <div class="sidebar" style="margin-top: 3%">
        <a  href="../index.php">Сайт DKU Talks</a>
        <?php if(isset($_SESSION['logged_user'])): ?>
            <a href="group_panel.php" >Форма для создания групп</a>
            <a href="speaker_panel.php">Формы для добавления спикера</a>
            <a href="article_panel.php">Формы для добавления лекцти</a>
            <a href="event_panel.php">Форма для добавления события</a>
            <a href="speaker_article_panel.php">Форма для создания встречи</a>
            <a href="video_panel.php">Форма для добавление видео</a>
            <a href="gallery_panel.php" class="active">Форма для создания фотографий в галерее</a>
        <?php else: header("Location:login.php") ?>
            <a href="login.php">Вход</a>
        <?php endif ?>
    </div>
    <div class="admin">
        <?php if(isset($_SESSION['logged_user'])): ?>
            <p>Вы вошли как <?php echo $_SESSION['logged_user']->login;?></p><p><a href="logout.php">Выйти</a></p><p><a href="../gallery.php">Перейти в галерею</a></p>
        <?php else: ?>
            <a href="login.php">Войти</a>
        <?php endif; ?>
        Вы добавляете информация на: <?php echo $_SESSION['lang']?>
    </div>
    <div class="gallery-upload" style="margin-top: -9%">
        <h2>Форма для добавления  групп фотографии в галерее</h2>
        <form action="gallery_panel.php" method="post" enctype="multipart/form-data">
            <div class="gallery-group">
                <label>Название группы галереи:</label>
                <input  type="text" name="group"/>
                <p style="font-size: 14px;text-align:left;color: red">*Название группы галереи надо запомнить так как в эту группу вы будете записывать значение названия фотографий на трех языках</p>
            </div>
            <div class="gallery-group">
                <label>Фотография:</label>
                <input  type="file" name="image"/>
            </div>
            <button type="submit" name="add_gallery_group" class="btn btn-primary">Добавить</button>
    </form>
    </div>
    <div class="gallery-upload" style="margin-top: 13%">
        <h2>Форма для добавления  названия фотографии в галерее</h2>
        <form action="gallery_panel.php" method="post" enctype="multipart/form-data">
            <div class="gallery-group">
                <label>Галерея группа:</label>
                <select name="group" style="width: 100%">
                    <option></option>
                    <?php
                    $result=mysqli_query($connection,"select * from gallery_group");
                    while($myrow=mysqli_fetch_array($result)){
                        echo "<option value=".$myrow['group_id'].">".$myrow['group_name']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="gallery-group">
                <label>Название фотографии:</label>
                <input  type="text" name="image_name"/>
            </div>
            <button type="submit" name="add_gallery" class="btn btn-primary">Добавить</button>
        </form>
    </div>
<?php
if(isset($_POST['add_gallery_group'])){
    $newFileName=$_POST['group'];
    if ($newFileName){
        $newFileName="gallery";
    }else{
        $newFileName=strtolower(str_replace(" ","-",$newFileName));
    }
    $gallery_group=$_POST['group'];
    $file=$_FILES['image'];
    $fileName=$file["name"];
    $fileType=$file["type"];
    $fileError=$file["error"];
    $fileSize=$file["size"];
    $fileTempName=$file["tmp_name"];
    $fileExt=explode(".",$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array("jpg","png","jpeg");
    // Validate file input to check if is not empty
    $check=mysqli_query($connection,"select group_name from gallery_group where group_name='$gallery_group'");
    if (empty($gallery_group)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Название группы галереи"'
        );
    }
    else if(mysqli_num_rows($check)==1){
        $response = array(
            "type" => "danger",
            "message" => 'Такая галерея группа уже существует'
        );
    }
    else if (! file_exists($fileTempName)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы не выбрали фотографию"
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
    else if (($fileSize > 20000000)) {
        $response = array(
            "type" => "danger",
            "message" => "Вы можете загрузить  не больше 20Мб"
        );
    }
    else {
        include_once "../includes/db_connection.php";
        $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../images/gallery/" . $imageFullName;
        $sql = "SELECT * FROM gallery_group";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $sql = "INSERT INTO gallery_group (group_name ,image)  VALUES (?,?)";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed2";
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $gallery_group,$imageFullName);
                mysqli_stmt_execute($stmt);
                move_uploaded_file($fileTempName, $fileDestination);
                echo "
               <script>
                alert('Данные загружены');
</script><meta http-equiv='refresh' content='0'>";
            }
        }
    }
}
else if(isset($_POST['add_gallery'])){
    $gallery_group=$_POST['group'];
    $image_name=$_POST['image_name'];
    // Validate file input to check if is not empty
    if (empty($gallery_group)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Галерея группы"'
        );
    }
   else if (empty($image_name)){
        $response = array(
            "type" => "danger",
            "message" => 'Вы незаполнили поле  "Название фотографии"'
        );
    }
    else {
        include_once "../includes/db_connection.php";
        $sql = "SELECT * FROM gallery";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed1";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $sql = "INSERT INTO gallery(group_id ,gallery_title,language_name)  VALUES (?,?,?)";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed2";
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $gallery_group,$image_name,$_SESSION['lang']);
                mysqli_stmt_execute($stmt);
                echo "
               <script>
                alert('Данные загружены');
</script><meta http-equiv='refresh' content='0'>";
            }
        }
    }
}
?>
    <?php if(!empty($response)) { ?>
        <div   class="alert alert-<?php echo $response["type"]; ?> alert-dismissible" id="myAlert" style="margin-top: -12.3%">
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
