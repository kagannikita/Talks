<?php
include("includes/db_connection.php");
require ("includes/db.php");
include("languageconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/3fda6315c9.js"></script>
	<title>DKU Talks</title>
	
</head>
<body>
<!-- -->
<div class="title">
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="index.php"> <?php Echo $lang['home'];?> </a>
            <a href="aboutus.php">				<?php Echo $lang['about'];?></a>
            <a href="archive.php">				<?php Echo $lang['archive'];?></a>
            <a href="speakers.php">				<?php Echo $lang['speakers'];?></a>
            <a href="gallery.php">				<?php Echo $lang['gallary'];?></a>
           <!-- Work in proggressssss <a href="videos.php">	< ? php Echo $lang['video'];?></a>-->
            <a id="mob_con" href="contactusmob.php"><?php Echo $lang['contact'];?></a>
        </div>
    </div>
    <span  class="menu-but" style="font-size:30px;cursor:pointer;color:green;" onclick="openNav()">&#9776;</span>
  <img  class="logo" src="images/DKU_LOGO_DE (1).png" >
  <img  class="logo_2" src="images/Second_logo.png" >
    </div>

            <div class="search-box">
                <form   class="searchbox" action="search.php" method="POST" name="frmSearch" id="myform">
                    <input  class="search-txt-field" type="text" name="keyword" placeholder="  SEARCH" value="" class="searchbox-input" onkeyup="buttonUp();" required>
                    <button class="searchbox-submit" type="submit" name="search_button">
                        <span class="searchbox-icon"><i class="fa fa-search" aria-hidden="true"></i></span></button>
                </form>
                <div class="language">
                    <a  style="color: white" href="index.php?lang=eng">EN</a>
					<a  style="color: white" href="index.php?lang=kaz">KZ</a>
                    <a  style="color: white" href="index.php?lang=rus">RU</a>
                    <a  style="color: white" href="index.php?lang=ger">DE</a>
                </div>
            </div>
</div>
<!--Панель с сылками по сайту-->
<div class="sidebar">
	<a class="active" href="index.php"> <?php Echo $lang['home'];?> </a>
	<a href="aboutus.php">				<?php Echo $lang['about'];?></a>
	<a href="archive.php">				<?php Echo $lang['archive'];?></a>
	<a href="speakers.php">				<?php Echo $lang['speakers'];?></a>
	<a href="gallery.php">				<?php Echo $lang['gallary'];?></a>
           <!-- Work in proggressssss <a href="videos.php">	< ? php Echo $lang['video'];?></a>-->
    <a id="move" href="#contactus">        <?php Echo $lang['contact'];?></a>
    <a id="mob_con" href="contactusmob.php"><?php Echo $lang['contact'];?></a>
</div>
<!--Вкладки в которых отмечаются только месец и в начале стоит upcoming-->
<div charset="UTF-8" class="tab">
    <button class="tablinks" onclick="openCity(event, 'Upcoming')"><?php echo $lang['upcoming']?></button>
	<button class="tablinks" id="defaultOpen" onclick="openCity(event, '<?php echo date('F', strtotime('0 month'));?>')"><?php
        $lang['month'];
    $mon=strftime('%B', strtotime('0 month'));
   echo iconv($lang['encoding'], 'UTF-8//IGNORE', $mon);?></button>
	<button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+1 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+1 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
	<button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+2 month'));?>')"><?php  $lang['month'];
        $mon=strftime('%B', strtotime('+2 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
	<button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+3 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+3 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
    <button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+4 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+4 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
	<button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+5 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+5 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
	<button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+6 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+6 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
	<button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+7 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+7 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);
        ?></button>
	<button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+8 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+8 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
    <button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+9 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+9 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
    <button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+10 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+10 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon);?></button>
    <button class="tablinks" onclick="openCity(event, '<?php echo date('F', strtotime('+11 month'));?>')"><?php
        $lang['month'];
        $mon=strftime('%B', strtotime('+11 month'));
        echo iconv($lang['encoding'], 'utf-8', $mon); ?></button>

</div>

<!--Контент Вкладок-->
<!--Контент upcoming-->
<div id="Upcoming" class="tabcontent">
<?php

// выборка для которая ограничивется переменной 
$QueryForUpcomming="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		event_date>CURRENT_DATE()
		
		ORDER BY event_date asc";

$result=mysqli_query($connection, $QueryForUpcomming);
		
while	($DataForUpcomming=mysqli_fetch_array($result)){
$var	=$DataForUpcomming['event_date'];
$var1	=$DataForUpcomming['event_time'];
$var2	=$DataForUpcomming['article_id'];
echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
	?>
	<a style='color: green' href="article.php?article_group_id=<?php echo $DataForUpcomming['article_group_id'];?>"><?php echo $DataForUpcomming['article_title'];?></a><?php echo"</p>";?>
	<?php
	echo	
	"<p class='bottom'>";

	$QueryForUpcommingAuthor="select * from speaker_t 
	JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
	JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
	JOIN article_group_id 		on  article_group_id.group_id=speaker_article_t.article_group_id
	JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
	JOIN language_t 			on speaker_t.language_name=language_t.language_name
	where article_t.article_id=$var2 and
	language_t.language_name='{$_SESSION['lang']}'";

$result2=mysqli_query($connection, $QueryForUpcommingAuthor);
									
	while ($myrow2=mysqli_fetch_array($result2)){?>
	
    <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
			<?php echo " | " ,$myrow2['speaker_fullname']?>
    </a> 	<?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
    <?php
    echo $myrow2['speaker_workplace']; 
    "</div></p>";
    };?>
</div>
<!--Контент следующего месеца--> 
<div id="March" class="tabcontent">
    <?php
	$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 03 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a style='color: olive;font-weight: 600;'  href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: rgb(0, 204, 255);' href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a   style='color: green;' href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="April" class="tabcontent">
<?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 04 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a  style='color: olive;font-weight: 600;'  href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: color: rgb(0, 204, 255);'  href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: green;' href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="May" class="tabcontent">
<?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 05 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<div style='color: black;font-weight: 600;'>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a style='color: olive;font-weight: 600;'  href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</div>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<div style=' color: black;'>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: color: black;'  href="article.php?article_group_id=<?php echo $myrow['article_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</div>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<div style='color: green;'>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: green' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</div>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div    id="June" class="tabcontent">
    <?php
	$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 06 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a   style='color: olive;font-weight: 600;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: black;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: black;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="July" class="tabcontent">
    <?php
	$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 07 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a  style='color: olive;font-weight: 600;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: rgb(0, 204, 255);' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: green;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="August" class="tabcontent">
    <?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 08 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a style='color: olive;font-weight: 600;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};?>
		
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: rgb(0, 204, 255);'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: green;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="September" class="tabcontent">
    <?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 09 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a style='color: olive;font-weight: 600;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};?>
		
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: rgb(0, 204, 255);'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a   style='color: green;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="October" class="tabcontent">
    <?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 10 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a  style='color: olive;font-weight: 600;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};?>
		
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: rgb(0, 204, 255);'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: green;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="November" class="tabcontent">
<?php
    $Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 11 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a style='color: olive;font-weight: 600;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};?>
		
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: rgb(0, 204, 255);' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: green;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="December" class="tabcontent">
    <?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 12 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a style='color: olive;font-weight: 600;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};?>
		
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: rgb(0, 204, 255);' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: green;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="January" class="tabcontent">
    <?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 01 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a style='color: olive;font-weight: 600;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};?>
		
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: rgb(0, 204, 255);'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a  style='color: green;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>

<div id="February" class="tabcontent">
      <?php
$Query="SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	

WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name and
		MONTH(event_date) = 02 ORDER BY event_date";
$result=mysqli_query($connection,$Query);

while($myrow=mysqli_fetch_array($result)){

$var=	$myrow['event_date'];
$var1=	$myrow['event_time'];
$var2=	$myrow['article_id'];

    if($var==date("Y-m-d")){
        echo"
		<p>	
		".date("H:i", strtotime($var1) )."
		".date("d.m.Y", strtotime($var) )." "
        ?>
        <a  style='color: olive;font-weight: 600;' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
		$QueryForAuthor="select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'";
								
        $result2=mysqli_query($connection, $QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
				<?php echo " | " 	.$myrow2['speaker_fullname']			?>
            </a><?php echo ""		.$myrow2['speaker_workplace']." | ";
		};?>
		
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var<date("Y-m-d")){
        echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a    style='color: rgb(0, 204, 255);' href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	"<p class='bottom'>";
        $result2=mysqli_query($connection,$QueryForAuthor);

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";
    }
    else if($var>date("Y-m-d")){
    echo"<p>
	".date("H:i", strtotime($var1) )."
	".date("d.m.Y", strtotime($var) )."
	"
        ?>
        <a style='color: green;'  href="article.php?article_group_id=<?php echo $myrow['event_group_id'];?>"><?php echo $myrow['article_title'];?></a><?php echo"</p>";?>
        <?php
        echo	
		"<p class='bottom'>";
        $result2=mysqli_query($connection,"select * from speaker_t 
								JOIN speaker_group_id 		on speaker_t.speaker_group_id=speaker_group_id.group_id
								JOIN speaker_article_t 		on speaker_group_id.group_id=speaker_article_t.speaker_group_id
								JOIN article_group_id 		on article_group_id.group_id=speaker_article_t.article_group_id
								JOIN article_t 				on article_group_id.group_id=article_t.article_group_id
								JOIN language_t 			on speaker_t.language_name=language_t.language_name
								where article_t.article_id=$var2 and
								language_t.language_name='{$_SESSION['lang']}'");

        while ($myrow2=mysqli_fetch_array($result2)){?>
            <a class="link" href=speaker.php?speaker_group_id=<?php echo $myrow2['speaker_group_id'];?>>
                <?php echo " | " ,$myrow2['speaker_fullname']?>
            </a> <?php echo "".$myrow2['speaker_workplace']." | ";};?></p>
        <?php
        echo $myrow2['speaker_workplace'];
        "</p></div>";

    }};?>
</div>
<div class="nearest-event">
<?php $nearest_photo=mysqli_query($connection,"
SELECT * FROM `event_t`
join language_t 		on language_t.language_name			=event_t.language_name
JOIN event_group_id 	on event_t.event_group_id			=event_group_id.group_id
join event_article_t 	on event_article_t.event_group_id	=event_group_id.group_id
join article_group_id 	on event_article_t.article_group_id	=article_group_id.group_id
JOIN article_t 			on article_t.article_group_id		=article_group_id.group_id	
WHERE 	language_t.language_name='{$_SESSION['lang']}' and 
		article_t.language_name=language_t.language_name 
ORDER BY ABS( DATEDIFF( event_date, NOW() ) ) 
LIMIT 1");
 $myrow3=mysqli_fetch_array($nearest_photo);?>
    <a   href="article.php?article_group_id=<?php echo $myrow3['article_group_id'];?>">  <img class='pic' src='images/articles/<?php echo $myrow3['image']?>'></a>
</div>
<a href="#" id="back-to-top" title="Back to top">&uarr;</a>

<section  id="contactus" >
  <h2 class="contact-title_eng"><?php echo $lang['contact']?></h2>
  <div class="first_eng">
<p><a  style="color: black" href="https://dku.kz/en/"><?php echo $lang['university']?></a><?php echo $lang['building']?></p>
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
<img  class="photo"src="images/Logo RGB.jpg" width="200" height="200">
<img class="photo" src="images/702px-Auswärtiges_Amt_Logo.svg.png" width="200" height="200">
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