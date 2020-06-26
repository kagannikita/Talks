<!DOCTYPE html>
<?php
include("includes/db_connection.php");
require "includes/db.php";
include("languageconfig.php");
?>
<html>
<head>
    <link rel="stylesheet" href="css/jiophone2.css">
    <link rel="stylesheet" href="css/iphone4portrait.css">
    <link rel="stylesheet" href="css/nokialumia520.css">
    <link rel="stylesheet" href="css/iphone5portrait.css">
    <link rel="stylesheet" href="css/galaxys3.css">
    <link rel="stylesheet" href="css/galaxynote3.css">
    <link rel="stylesheet" href="css/galaxys6.css">
    <link rel="stylesheet" href="css/iphone6portrait.css">
    <link rel="stylesheet" href="css/lgoptimusl70portrait.css">
    <link rel="stylesheet" href="css/iphonexportrait.css">
    <link rel="stylesheet" href="css/iphone6+portrait.css">
    <link rel="stylesheet" href="css/windowsphoneportrait.css">
    <link rel="stylesheet" href="css/nokian9portrait.css">
    <link rel="stylesheet" href="css/iphone4landscape.css">
    <link rel="stylesheet" href="css/iphone5landscape.css">
    <link rel="stylesheet" href="css/lgoptimusl70landscape.css">
    <link rel="stylesheet" href="css/iphone6landscape.css">
    <link rel="stylesheet" href="css/iphone6+landscape.css">
    <link rel="stylesheet" href="css/windowsphonelandscape.css">
    <link rel="stylesheet" href="css/iphonexlandscape.css">
    <link rel="stylesheet" href="css/nokian9landscape.css">
    <link rel="stylesheet" href="css/tablets.css">
    <link rel="stylesheet" href="css/nexus9.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/3fda6315c9.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <title><?php Echo $lang['gallary'];?></title>
</head>
<body>
<div class="title">
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a  href="index.php"> <?php Echo $lang['home'];?> </a>
            <a href="aboutus.php">				<?php Echo $lang['about'];?></a>
            <a href="archive.php">				<?php Echo $lang['archive'];?></a>
            <a href="speakers.php">				<?php Echo $lang['speakers'];?></a>
            <a href="gallery.php">				<?php Echo $lang['gallary'];?></a>
           <!-- Work in proggressssss <a href="videos.php">	< ? php Echo $lang['video'];?></a>-->
            <a id="mob_con" href="contactusmob.php"><?php Echo $lang['contact'];?></a>
        </div>
    </div>
    <span  class="menu-but" style="font-size:30px;cursor:pointer;color:green;" onclick="openNav()">&#9776;</span>
    <img  class="logo" src="images/DKU_LOGO_DE (1).png" width="80" height="100">
    <img  class="logo" src="images/Second_logo.png" width="80" height="100">
    <div class="search-box">
        <form   class="searchbox" action="search.php" method="POST" name="frmSearch" id="myform">
            <input  class="search-txt-field" type="text" name="keyword" placeholder="SEARCH" value="" class="searchbox-input" onkeyup="buttonUp();" required>
            <button class="searchbox-submit" type="submit" name="search_button">
                <span class="searchbox-icon"><i class="fa fa-search" aria-hidden="true"></i></span></button>
        </form>
        <div class="language">
            <a  style="color: white" href="gallery.php?lang=eng">EN</a>
            <a  style="color: white" href="gallery.php?lang=kaz">KZ</a>
            <a  style="color: white" href="gallery.php?lang=rus">RU</a>
            <a  style="color: white" href="gallery.php?lang=ger">DE</a>
        </div>
    </div>
</div>
<div class="sidebar">
	<a  href="index.php"> 					<?php Echo $lang['home'];?> </a>
	<a href="aboutus.php">					<?php Echo $lang['about'];?></a>
	<a href="archive.php">					<?php Echo $lang['archive'];?></a>
	<a href="speakers.php">					<?php Echo $lang['speakers'];?></a>
	<a class="active" href="gallery.php">	<?php Echo $lang['gallary'];?></a>
           <!-- Work in proggressssss <a href="videos.php">	< ? php Echo $lang['video'];?></a>-->
	<a id="move" href="#contactus">			<?php Echo $lang['contact'];?></a>
    <a id="mob_con" href="contactusmob.php"><?php Echo $lang['contact'];?></a>
</div>
<section class="gallery-links">
<div class="wrapper">
<h2 class="gallery_title"><?php Echo $lang['gallary'];?></h2>
    <div class="masonry">
        <?php
		if (isset($_GET['page'])){
		$page = $_GET['page'];
		}else $page = 1;
		$kol = 60;  //количество записей для вывода
		$art = ($page * $kol) - $kol;
		include_once'includes/db_connection.php';
            $stmt=mysqli_stmt_init($connection);
			$res = mysqli_query($connection,
			"SELECT COUNT(*)from gallery join gallery_group on gallery.group_id=gallery_group.group_id where language_name='{$_SESSION['lang']}'");
			$row = mysqli_fetch_row($res);
			$total = $row[0]; // всего записей
			$str_pag = ceil($total / $kol);
			$sql="select * from gallery  join gallery_group on gallery.group_id=gallery_group.group_id where language_name='{$_SESSION['lang']}' limit $art,$kol ";
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement failed3";
            }else{
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                while($row=mysqli_fetch_assoc($result)){
              echo '<div class="item">';
if (isset($_SESSION['logged_user'])):
    echo '
                <a style="margin:15px"  href="admin_panel/includes/delete_gallery.php?group_id='.$row['group_id'].'" class="btn btn-danger">Удалить</a>
        <a  href="admin_panel/includes/update_gallery.php?group_id='.$row['group_id'].'&id='.$row['id'].'" class="btn btn-success">Изменить</a>';?>
              <?php endif;?>
        <?php echo '
<a  class ="gallery_photo" data-fancybox="gallery" data-caption="'.$row["gallery_title"].'" href="images/gallery/'.$row["image"].'">
						<img src="images/gallery/'.$row["image"].'"></a></div>';?>
        <script type='text/javascript'>
$('[data-fancybox]').fancybox({
loop:true,
buttons:[
    'zoom',
    'share',
    'slideShow',
    'fullscreen',
    'download',
'thumbs',
'close'
],
animationEffect:'zoom-in-out',
transitionEffect:'fade'
});
</script>
                    <?php echo "";}
            }?>
    </div>
</div>
    <ul class='pagination'>
        <?php for ($i = 1; $i <= $str_pag; $i++){
            if($page==$i)
            {
                $c="active";
            }
            else
            {
                $c="";
            }
            echo " 
 <li class='page-item ".$c."'><a  class='page-link' href=gallery.php?page=".$i.">".$i." </a></li>";
        }?>
    </ul>
</section>
<a href="#" id="back-to-top" title="Back to top">&uarr;</a>
<section  id="contactus" >
    <h2 class="contact-title_eng"><?php echo $lang['contact']?></h2>
    <div class="first_eng">
        <p><a  style="color: black" href="<?php echo $lang['link']?>"><?php echo $lang['university']?></a><?php echo $lang['building']?></p>
        <p><?php echo $lang['address']?></p>
        <p><?php echo $lang['kazakhstan']?></p>
        <p><?php echo $lang['tell']?>: 355 05 51(ext.233), +7707 625 42 55</p>
        <p><?php echo $lang['part']?>: <b>beken.aisulu@dku.kz</b></p>
    </div>
    <div class="second_eng">
        <b><?php echo $lang['per']?></b>
        <p><?php echo $lang['respons']?></p>
        <p><?php echo $lang['mail']?>: beimenbetov@dku.kz</p>
        <p><?php echo $lang['assistant']?></p>
        <p><?php echo $lang['mail']?>: beken.aisulu@dku.kz</p>
    </div>
    <div class="photos_eng">
        <img  class="photo" src="images/DAAD-logo.png" width="200" height="200">
        <img   class="photo" src="images/Logo RGB.jpg" width="200" height="200">
        <img  class="photo" src="images/702px-Auswärtiges_Amt_Logo.svg.png" width="200" height="200">
    </div>
    <div class="finans_eng">
        <p><?php echo $lang['finans']?></p>
    </div>
</section>
</body>
<script src="scripts/fullscreenmenu.js"></script>
<script src="scripts/resetsearch.js"></script>
<script src="scripts/scroll.js"></script>
<script src="scripts/script.js"></script>
<script src="scripts/to_top.js"></script>
<script src="scripts/search.js"></script>
</html>
