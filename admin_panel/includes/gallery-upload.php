
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
</head>
<?php
require_once '../../includes/db_connection.php';
$id=$_GET['id'];
$select=mysqli_query($connection,"SELECT * FROM gallery where gallery.idGallery='$id'");
$row=mysqli_fetch_assoc($select);
?>
<body>
<div class="gallery-upload">
    <h2>Форма для изменения галереи</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="gallery-group">
        <label for="name">Название:</label>
        <input type="text" name="titlefile" value="<?php echo $row["titleGallery"]?>">
    </div>
    <div class="gallery-group">
        <label for="name">Картинка:</label>
        <img src="../../images/gallery/<?php echo $row["imgFullNameGallery"]?>" style="width:250px;height: 200px"></br>
        <input type="file" name="imagefile"/>
    </div>
    <button type="submit" name="update" class="btn btn-primary" value="update">Изменить</button>
</form>
    <?php
    if(isset($_POST['update'])){
        $title=$_POST['titlefile'];
        $image=$_FILES['imagefile']['name'];
        if(isset($image) && ($image!=="")){
            $size=$_FILES['imagefile']['size'];
            $temp=$_FILES['imagefile']['tmp_name'];
            $type=$_FILES['imagefile']['type'];
            move_uploaded_file($temp,"../../images/gallery/$image");
        }
        if ((!($image)))  {
            $query= "UPDATE gallery SET titleGallery = '$title' WHERE gallery.idGallery = $id";
        } else  {
            $query = "UPDATE gallery SET titleGallery='$title', imgFullNameGallery='$image' WHERE gallery.idGallery=$id";
        }
            $update=mysqli_query($connection,$query);
        if($update){
            header("Location:../gallery_panel.php");
        }
        else{
            echo "<script>alert('Ошибка!')</script>";
        }
    }
    ?>
</div>
</body>
</html>
