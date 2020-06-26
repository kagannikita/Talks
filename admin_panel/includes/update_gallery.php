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
    <title>Форма для изменения фотографии</title>
</head>
<?php
require_once '../../includes/db_connection.php';
$id=$_GET['id'];
$gallery_group_id=$_GET['group_id'];
$select=mysqli_query($connection,"select * from gallery  join gallery_group on gallery.group_id=gallery_group.group_id
where gallery.id='$id' and gallery_group.group_id='$gallery_group_id'");
$row=mysqli_fetch_array($select);
$old_photo=$row['image'];
?>
<body>
<a style="position: absolute; top:7%;" href="../../gallery.php">Вернуться к галерее</a>
<div class="gallery-upload" style="margin-top: 0%">
    <h2>Форма для изменения фотографии</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="gallery-group">
            <label for="name">Название фотографии:</label>
            <input type="text" name="gallery_title" value="<?php echo $row["gallery_title"]?>">
        </div>
        <div class="gallery-group">
            <label for="name">Фотография:</label>
            <img src="../../images/gallery/<?php echo $row["image"]?>" style="width:300px;height: 350px"></br>
            <input type="file" name="image"/>
        </div>
        <button type="submit" name="update" class="btn btn-primary" value="update">Изменить</button>
    </form>
</div>
<?php
if(isset($_POST['update'])){
$gallery_title=$_POST['gallery_title'];
$image=$_FILES['image']['name'];
    $size=$_FILES['image']['size'];
    $temp=$_FILES['image']['tmp_name'];
    $fileExt=explode(".",$image);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array("jpg","png","jpeg");
if(isset($image) && ($image!=="")){
$size=$_FILES['image']['size'];
$temp=$_FILES['image']['tmp_name'];
$type=$_FILES['image']['type'];

move_uploaded_file($temp,"../../images/gallery/$image");
}
if(empty($gallery_title)){
    $response = array(
        "type" => "danger",
        "message" => "Вы можете загрузить видеофайл не больше 2Гб"
    );
}
else if (! file_exists($temp)) {
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
else if (($size > 20000000)) {
    $response = array(
        "type" => "danger",
        "message" => "Вы можете загрузить  не больше 20Мб"
    );
}
else {
if ((!($image)))  {
$query= "Update gallery 
set gallery.gallery_title='$gallery_title'
where gallery.id='$id'";
} else  {
$query = "Update gallery 
inner join gallery_group ON  gallery.group_id=gallery_group.group_id
set gallery.gallery_title='$gallery_title',
gallery_group.image='$image'
where gallery.id='$id' and gallery_group.group_id='$gallery_group_id'";
unlink("../../images/gallery/$old_photo");
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
}}
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
