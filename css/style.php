<?php
header("Content-type: text/css");

session_start();

if (isset($_GET['page'])) {
	$page = $_GET['page'];
	} else {
	$page = $_SESSION['page'];
	}

switch ($page){

	case 'customers':
		$bgcolor = '#fff0d1';
		$bgcolor2 = '#fffbf3';
		$fontcolor = '#5f2c2c';
		break;
	case 'jobs':
		$bgcolor = '#c4e0ff';
		$bgcolor2 = '#f7fbff';
		$fontcolor = '#1a4f8a';
		break;
	case 'equipment':
		$bgcolor= '#ffdae6';
		$bgcolor2 = '#fff7fa';
		$fontcolor = '#942e50';
		break;
		
	case 'service':
		$bgcolor= '#e0ffd4';
		$bgcolor2 = '#f4fff0';
		$fontcolor = '#3d642e';
		break;
	}
	
?>



#navactive{
	border-bottom:2px solid <?=$bgcolor?>;
	border-radius:15px 15px 0px 0px;
	font-weight:bold;
	font-size:20px;
	color:<?=$fontcolor?>;
	background-color:<?=$bgcolor?>;
}

.jobhead {
	width:948px;
	border-bottom: 1px solid #91a4d4;
	height:48px;
	background-color:<?=$bgcolor?>;
	clear:both;
}


.maindisplay {
	width:948px;
	float:left;
	border: 2px solid #3c4a6b;
	border-radius:5px;
	padding-bottom:0px;
	background-color:<?=$bgcolor2?>;
}

.active {
	background-color:<?=$fontcolor?>;
	color:#ffffff;
}

.results th {
	background-color:<?=$bgcolor?>;
}


.sub_results th {
	background-color:<?=$bgcolor2?>;
}