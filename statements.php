<?php

$SITE_LOCATION="HOME";

$MESSAGE="";

$userId=$_SESSION['userid'];

$userEmail=$_SESSION['email'];

$numnotifi=0;

$result = mysql_query("SELECT COUNT(id) AS num FROM social_notifications WHERE social_notifications.user = ".$userId." ;");

if($row = mysql_fetch_array($result)){

	$numnotifi= $row['num'];

}

$HEAD="<html>
	<head>
	<title>Simple Social</title>
	<link rel='stylesheet' type='text/css' href='css/style.css' media='all'>
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
	</script>
	</head>
	<body OnLoad='document.inform.newpost.focus();'>
	<table  bodercolor='#855801' width='100%' class='bordercontent'>
	<tr >
	<td ><a class='logo' href='./'>SocialEngine</a></td>
	<td ><a class='topmenu' href='./contacts.php'>Contacts</a></td>
	<td ><a class='topmenu' href='./notifications.php'>Notifications&nbsp;*&nbsp;
	</a></td><td><a class='topmenu' href='./notifications.php' id='notalert'>".$numnotifi."</a></td>
	<script>
	var statusIntervalId = window.setInterval(update, 30000);

	function update() {
	    $.ajax({
		url: 'check_notifications.php?user=".$userId."',
		dataType: 'text',
		success: function(data) {
		    document.getElementById('notalert').innerHTML=data;
		}
	    });
	}


	</script>

	</td><td width='100%'></td><td ><a class='topmenu' href='./mysocial.php'>".$userEmail."
	</a></td><td ><a class='topmenu'>Settings</a></td><td ><a class='topmenu'>Account </a></td>
	<td ><a class='topmenu'>Help</a></td><td ><a class='topmenu' href='./logout.php'>Logo&nbsp;out</a></td>
	</tr>";

?>


