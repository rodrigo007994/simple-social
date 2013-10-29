<?php

if(isset($_POST["email"]) && isset($_POST["password"])){

	$result = mysql_query("SELECT COUNT(id) AS usercount, email, id FROM social_users WHERE status = 0 AND email = '".$_POST["email"]."' AND password = '".$_POST["password"]."' ;");

	if($row = mysql_fetch_array($result)){

		$c = $row['usercount'];

		$useremail=$row['email'];

		$userid=$row['id'];

	}
	if($c==1){

		$_SESSION['userid']=$userid;
		
		$_SESSION['email']=$useremail;
		
		echo "<div class='upmsg' ><h2>Contrase&ntilde;a correcta haz <a href='./'>click aqu&iacute; para ingresar.</a></h2></div>";
		
		echo "<META http-equiv='refresh' content='0;URL=".$SITE_URL."'>";

	}else{
		
		echo "<div class='upmsg' ><h2>Usuario y/o contrase&ntilde;a incorrecta</h2></div>";
	
	}
}

echo "<br><br><br><h2><center>Social Login</center></h2><br><br>".
	"<form action='index.php' method='POST' >".
	"<table id='form_data' align='center'>".
	"<tbody>".
	"<tr class='even'>".
			"<td class='colData'>".
			"Email:".
			"</td>".
			"<td class='colData'>".
			"<input type='text' name='email' id='userid' size='20'  maxlength='250' value=''  >".
			"</td>".
		  "</tr>".
	"<tr class='odd'>".
			"<td class='colData'>".
			"Password:".
			"</td>".
			"<td class='colData'>".
			"<input type='password' name='password' id='password' size='20'  maxlength='250' value=''  >".
			"</td>".
		  "</tr>".     
	"</tbody>".
	"<tfoot class='footer1'>".
		  "<td></td><td></td>".
	"</tfoot>".
	"</table>".
	"<br><br>".
	"</div>".
	"<div name='FormButtons' id='FormButtons'> ".
	"<table align='center'>".
			  "<tr>".
			"<td>".
			  "<b><input type='submit' name='insert' value='Login' ></b>".
			"</td>".
			"<td>".
			"</td>".
			  "</tr>".
		  "</table>".
	"<br><br><br><br>".
	"</form>";

?>
