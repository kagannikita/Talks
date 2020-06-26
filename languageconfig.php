<?php

	if(!isset($_SESSION['lang'])){
		$_SESSION['lang']="eng";
	}
	
	else if(isset($_GET['lang']) && $_SESSION ['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
		
		if($_GET['lang'] == "eng")
			$_SESSION['lang']= "eng";
		
		else if($_GET['lang'] == "kaz")
			$_SESSION['lang']= "kaz";
		
		else if($_GET['lang'] == "rus")
			$_SESSION['lang']= "rus";
		
		else
			$_SESSION['lang']= "ger";
	}

	require_once "translation/".$_SESSION['lang'].".php";
?>