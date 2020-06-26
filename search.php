<?php
include("includes/db_connection.php");
require "includes/db.php";
include("languageconfig.php");
header("Cache-Control: no cache");
?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://kit.fontawesome.com/3fda6315c9.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<title>DKU Talks</title>
</head>
<body>
<div class="title">
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="index.php"> 					<?php Echo $lang['home'];?> </a>
            <a href="aboutus.php">					<?php Echo $lang['about'];?></a>
            <a href="archive.php">					<?php Echo $lang['archive'];?></a>
            <a href="speakers.php">					<?php Echo $lang['speakers'];?></a>
            <a href="gallery.php">					<?php Echo $lang['gallary'];?></a>
           <!-- Work in proggressssss <a href="videos.php">	< ? php Echo $lang['video'];?></a>-->
            <a id="mob_con" href="contactusmob.php"><?php Echo $lang['contact'];?></a>
        </div>
    </div>
    <span  class="menu-but" style="font-size:30px;cursor:pointer;color:green;" onclick="openNav()">&#9776;</span>
  <img   class= "logo"src="images/DKU_LOGO_DE (1).png" width="80" height="100">
  <img  class="logo_2" src="images/Second_logo.png" width="80" height="100">
    <div class="search-box">
        <form   class="searchbox" action="search.php" method="POST" name="frmSearch">
            <input  class="search-txt-field" type="text" name="keyword" placeholder="SEARCH" value="" class="searchbox-input" onkeyup="buttonUp();" required>
            <button class="searchbox-submit" type="submit" name="search_button">
                <span class="searchbox-icon"><i class="fa fa-search" style="position: absolute; top: 19%;left: 25%;" aria-hidden="true"></i></span></button>
        </form>
        <div class="language">
        <a  style="color: white" href="search.php?lang=eng">EN</a>
        <a  style="color: white" href="search.php?lang=kaz">KZ</a>
        <a  style="color: white" href="search.php?lang=rus">RU</a>
        <a  style="color: white" href="search.php?lang=ger">DE</a>
        </div>
    </div>
	
</div>
<div class="sidebar">
	<a href="index.php"> 				<?php Echo $lang['home'];?> </a>
	<a href="aboutus.php">				<?php Echo $lang['about'];?></a>
	<a href="archive.php">				<?php Echo $lang['archive'];?></a>
	<a href="speakers.php">				<?php Echo $lang['speakers'];?></a>
	<a href="gallery.php">				<?php Echo $lang['gallary'];?></a>
           <!-- Work in proggressssss <a href="videos.php">	< ? php Echo $lang['video'];?></a>-->
	<a id="move" href="#contactus">		<?php Echo $lang['contact'];?></a>
    <a id="mob_con" href="contactusmob.php"><?php Echo $lang['contact'];?></a>
</div>
<div id='search_para' class="search_results">
<?php
	 echo "---".$lang['s_speaker']."---"; ?><br>
	<?php if(isset($_POST['search_button'])){
		$search=mysqli_real_escape_string($connection,$_POST['keyword']);
		$result ="SELECT * FROM speaker_t where speaker_fullname 	like '%$search%' 
												or speaker_workplace like '%$search%'
												";
		$rescheck= mysqli_query($connection, $result);
		$check= mysqli_num_rows($rescheck);
		if($check > 0){
		while($row=mysqli_fetch_array($rescheck)){?>
				<a class="link1" href="speaker.php?speaker_group_id=<?php echo $row['speaker_group_id'];?>">
                    <?php echo $row['speaker_fullname']." "?></a>
<?php echo $row['speaker_bio']."</br>---</br>";
		}
		}
		else{
                    echo $lang['no_result'];?></br><?php echo "";
		}
	}
	
	Echo "---".$lang['s_event']."---";?></br>
    <?php
	if(isset($_POST['search_button'])){
		$search_a_article=mysqli_real_escape_string($connection,$_POST['keyword']);
		$result="SELECT * FROM event_t
            join language_t         on language_t.language_name            =event_t.language_name
            JOIN event_group_id     on event_t.event_group_id            =event_group_id.group_id
            join event_article_t     on event_article_t.event_group_id    =event_group_id.group_id
            join article_group_id     on event_article_t.article_group_id    =article_group_id.group_id
            JOIN article_t             on article_t.article_group_id        =article_group_id.group_id 
            where
            (article_t.language_name=language_t.language_name)
            and
            (article_title like '%$search%'
            or
            article_text like '%$search%'
            or
            event_date like '%$search%'
            or
            event_moderator like '%$search%'
            or 
            event_place like '%$search%'
            or
            event_org_dep like '%$search%'
            or 
            email like '%$search%')";
		$rescheck= mysqli_query($connection, $result);
		$check= mysqli_num_rows($rescheck);
		
		if($check > 0){
		while($row=mysqli_fetch_assoc($rescheck)){?>
		<div style="flex-direction:row; color:green;">
				<a class="link1" href="article.php?article_group_id=<?php echo $row['article_group_id'];?>">
                    <?php echo date("H:i", strtotime($row['event_time']) )." ".date("d.m.Y", strtotime($row['event_date']))." | ".$row['article_title'].""?></a>
 </div><?php echo $row['article_text']?></br>---</br>
    <?php echo "";
		}
		}
		else{
                   echo $lang['no_result'];?></br>
                    <?php echo "";
		}
	}
/*	Echo "---".$lang['s_video']."---";?></br>
  <?php
	if(isset($_POST['search_button'])){
		$search_a_video=mysqli_real_escape_string($connection,$_POST['keyword']);
		$result="select * FROM video join video_group on video.group_id=video_group.id
						where 
						video_title like '%$search%'
						or
						description like '%$search%'";
		$rescheck= mysqli_query($connection, $result);
		$check= mysqli_num_rows($rescheck);
		
		if($check > 0){
		while($row=mysqli_fetch_assoc($rescheck)){?>
				<a class="link1" href="video.php?group_id=<?php echo $row['group_id'];?>">
				<?php echo $row['video_title'].""?></a></br>
    <?php
		}
		}
		else{
                   echo $lang['no_result'];?></br>
                    <?php echo "";
		}
	}*/
	Echo "---".$lang['s_photo']."---";?></br>
                    <?php
	if(isset($_POST['search_button'])){
		$search_a_video=mysqli_real_escape_string($connection,$_POST['keyword']);
		$result="select * from gallery join gallery_group on gallery.group_id=gallery_group.group_id
where gallery.gallery_title like '%$search%'";
		$rescheck= mysqli_query($connection, $result);
		$check= mysqli_num_rows($rescheck);

		if($check > 0){
		    echo "<div class='masonry' style='margin-top: 0%;margin-left: -1%'>";
		while($row=mysqli_fetch_assoc($rescheck)){
				echo 
				'<div class="item"> <a class ="gallery_photo" data-fancybox="gallery" data-caption="'.$row["gallery_title"].'" href="images/gallery/'.$row["image"].'">
					<div>
						<img src="images/gallery/'.$row["image"].'">
					</div>
				</a></div>';
		}
		}
		else{
                   echo $lang['no_result'];?></br>
    <?php echo "</div>";
		}
	}
	
	?>
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
</div>
</div>
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
<script src="scripts/to_top.js"></script>
<script src="scripts/search.js"></script>
</html>
