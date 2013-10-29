<?php

if(isset($_POST['useremail'])&&isset($_POST['userpassword'])){

	include 'config.php';

	include 'conn.php';

	include 'statements.php';

	mysql_query("INSERT INTO social_users (id, email, fist_name, last_name, password, signup_date, type, status) VALUES (NULL, '".$_POST['useremail']."', '".$_POST['username']."', '".$_POST['userlastname']."', '".$_POST['userpassword']."', CURRENT_TIMESTAMP, '0', '0');");

	$result= mysql_query("SELECT id from social_users WHERE email = '".$_POST['useremail']."';");

	if($row = mysql_fetch_array($result)){

		$userid= $row['id'];

		mysql_query("INSERT INTO social_contacts (id, user, contact) VALUES (NULL, '".$userid."', '".$userid."');");

		mysql_query("INSERT INTO social_lastp (id, user, content, date_mod) VALUES (NULL, '".$userid."', 'I just joined Simple Social Engine!', CURRENT_TIMESTAMP);");

		mysql_query("INSERT INTO social_username (id, username) VALUES ('".$userid."', '".$_POST['username']."');");

		echo "<html><head><META http-equiv='refresh' content='0;URL=".$SITE_URL."'></head>
		<body><div class='upmsg' ><h2>Contrase&ntilde;a correcta haz <a href='./'>click aqu&iacute; para ingresar.</a></h2></div></body></html>";
			
	}

}else{

echo "<br><br><br><h2><center>Simple Social Engine Sign Up</center></h2><br><br>
	<form action='signup.php' name='registro_Master_Form' method='POST' >
	<table id='form_data' align='center'>
	<tbody>

	<tr >
			<td class='colData'>
			Name:
			</td>
			<td class='colData'>
			<input type='text' name='username' id='userid' size='20'  maxlength='250' value=''  >
			</td>
		  </tr>
	<tr >
			<td class='colData'>
			Lastname:
			</td>
			<td class='colData'>
			<input type='text' name='userlastname' id='userid' size='20'  maxlength='250' value=''  >
			</td>
		  </tr>


	<tr >
			<td class='colData'>
			Email:
			</td>
			<td class='colData'>
			<input type='text' name='useremail' id='userid' size='20'  maxlength='250' value=''  >
			</td>
		  </tr>
	<tr >
			<td class='colData'>
			Password:
			</td>
			<td class='colData'>
			<input type='password' name='userpassword' id='password' size='20'  maxlength='250' value=''  >
			</td>

		  </tr>     
	</tbody>
	<tfoot class='footer1'>
		  <td></td><td></td>
	</tfoot>
	</table>
	<br><br>
	</div>
	<div name='FormButtons' id='FormButtons'> 
	<table align='center'>
			  <tr>
			<td>
			  <b><input type='submit' name='insert' value='Sign up' ></b>
			</td>
			<td>
			</td>
			  </tr>
		  </table>
	<br><br><br><br>
	</form>";
}
?>
