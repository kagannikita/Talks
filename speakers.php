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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/3fda6315c9.js"></script>
    <title><?php Echo $lang['speakers'];?></title> 
	
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
    <img  class="logo_2" src="images/Second_logo.png" width="80" height="100">
    <div class="search-box">
        <form   class="searchbox" action="search.php" method="POST" name="frmSearch" id="myform">
            <input  class="search-txt-field" type="text" name="keyword" placeholder="SEARCH" value="" class="searchbox-input" onkeyup="buttonUp();" required>
            <button class="searchbox-submit" type="submit" name="search_button">
                <span class="searchbox-icon"><i class="fa fa-search" aria-hidden="true"></i></span></button>
        </form>
        <div class="language">
            <a style="color: white" href="speakers.php?lang=eng">EN</a>
            <a style="color: white" href="speakers.php?lang=kaz">KZ</a>
            <a  style="color: white" href="speakers.php?lang=rus">RU</a>
            <a style="color: white" href="speakers.php?lang=ger">DE</a>
        </div>
    </div>
</div>

<div class="sidebar">
	<a  href="index.php"> 					<?php Echo $lang['home'];?> </a>
	<a href="aboutus.php">					<?php Echo $lang['about'];?></a>
	<a href="archive.php">					<?php Echo $lang['archive'];?></a>
	<a class="active" href="speakers.php">	<?php Echo $lang['speakers'];?></a>
	<a href="gallery.php">					<?php Echo $lang['gallary'];?></a>
           <!-- Work in proggressssss <a href="videos.php">	< ? php Echo $lang['video'];?></a>-->
	<a id="move" href="#contactus">			<?php Echo $lang['contact'];?></a>
    <a id="mob_con" href="contactusmob.php"><?php Echo $lang['contact'];?></a>
</div>
<h2 class='speaker'><?php Echo $lang['speakers'];?></h2>
   
    <?php
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }
	else $page = 1;
    $kol = 10;  //количество записей для вывода
    $art = ($page * $kol) - $kol;
    $res = mysqli_query($connection,
	"SELECT COUNT(*) 
	FROM speaker_t 
	where speaker_t.language_name='{$_SESSION['lang']}'");
    $row = mysqli_fetch_row($res);
    $total = $row[0]; // всего записей
    $str_pag = ceil($total / $kol);
    $result = mysqli_query($connection, 
	"SELECT * FROM speaker_t 
    join speaker_group_id on speaker_group_id.group_id=speaker_t.speaker_group_id
	WHERE speaker_t.language_name='{$_SESSION['lang']}' limit $art,$kol");
    while($myrow = mysqli_fetch_array($result)){

?>
        <div>
	 <a class='bio_all' href="speaker.php?speaker_group_id=<?php echo $myrow['speaker_group_id'];?>">
        <?php echo $myrow['speaker_fullname'];?></a>
            <a class="link2" href="speaker.php?speaker_group_id=<?php echo $myrow['speaker_group_id'];?>"><img class='pics' src='images/speakers/<?php echo $myrow['photo'];?>' onerror="this.src='images/blank-picture.png'"></a>
        </div>

       <?php
        }?>
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
 <li class='page-item ".$c."'><a  class='page-link' href=speakers.php?page=".$i.">".$i." </a></li>";
}?>
    </ul>
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
        <img  class="photo" src="images/Logo RGB.jpg" width="200" height="200">
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
