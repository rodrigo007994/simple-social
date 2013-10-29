<?php


if(isset($_POST['deletecontact'])){

	mysql_query("DELETE FROM social_contacts WHERE social_contacts.contact = '".$_POST['deletecontact']."' AND social_contacts.user = '".$userId."';");

	mysql_query("DELETE FROM social_contacts WHERE social_contacts.user = '".$_POST['deletecontact']."' AND social_contacts.contact = '".$userId."';");

}

if(isset($_POST['newcontact'])){

	if($_POST['newcontact']!=""){

		if($_POST['newcontact']!=" "){

			if($userEmail!=$_POST['newcontact']){

				$result = mysql_query("SELECT social_users.id FROM social_users WHERE social_users.email = '".$_POST['newcontact']."';");

			if($row = mysql_fetch_array($result)){

				$result0 = mysql_query("SELECT social_invitations.id FROM social_invitations WHERE social_invitations.contact = '".$row['id']."' AND social_invitations.user = '".$userId."';");

			if(!$row0 = mysql_fetch_array($result0)){
				
				$result0 = mysql_query("SELECT social_contacts.id FROM social_contacts WHERE social_contacts.contact = '".$row['id']."' AND social_contacts.user = '".$userId."';");

			if(!$row0 = mysql_fetch_array($result0)){

				$h=1;

				$result2 = mysql_query("SELECT social_invitations.id FROM social_invitations WHERE social_invitations.user = '".$row['id']."' AND social_invitations.contact = '".$userId."';");
				
				if($row2 = mysql_fetch_array($result2)){

					mysql_query("INSERT INTO social_contacts (id, user, contact) VALUES (NULL, '".$userId."', '".$row['id']."');");
					
					mysql_query("INSERT INTO social_contacts (id, user, contact) VALUES (NULL, '".$row['id']."', '".$userId."');");
					
					mysql_query("INSERT INTO social_notifications (id, user, msg, noti_date) VALUES (NULL, '".$row['id']."', '".$userEmail." just added you.', CURRENT_TIMESTAMP);");

					mysql_query("DELETE FROM social_invitations WHERE social_invitations.user = '".$row['id']."' AND social_invitations.contact = '".$userId."';");

					$MESSAGE=$_POST['newcontact']." was addes succesfully to your contacts!";

					$h=2;

				}

				if($h==1){
					
					mysql_query("INSERT INTO social_invitations (id, user, contact) VALUES (NULL, '".$userId."', '".$row['id']."');");

					mysql_query("INSERT INTO social_notifications (id, user, msg, noti_date) VALUES (NULL, '".$row['id']."', '".$userEmail." wants to add you to his contacts.', CURRENT_TIMESTAMP);");

					$MESSAGE="Invitation sent succesfully to ".$_POST['newcontact']."!";

				}


				  



			}else{ 
				$MESSAGE="You already have this contact.";
			}

			}else{ 
				$MESSAGE="Invitation alredy sent.";
			}

			}

			}else{ 
				$MESSAGE="You cant add yourself.";
			}


		}
	}

}

echo $HEAD.$MESSAGE;

?>

<tr >
<td width="100%" colspan="10" style="vertical-align: top;" class="bordercontent">
<p class="titlecontent"><center>
<br><br>
<br>
<form action="./contacts.php" method="POST" name="incontact" ><input type="text" name="newcontact" size="40"><input type="submit"  value="Add new contact"></form></center></p>
<?php
$result = mysql_query("SELECT social_username.username, social_contacts.contact, social_users.email FROM social_contacts INNER JOIN social_username ON social_contacts.contact = social_username.id INNER JOIN social_users ON social_contacts.contact = social_users.id WHERE social_contacts.user = ".$userId."  AND social_contacts.contact != ".$userId." ORDER BY social_username.username DESC LIMIT 0 , 5;");
while($row = mysql_fetch_array($result)){
  echo "<div class='contenido'><b>".$row['username']."</b> ".$row['email']."<br><br><form action='./contacts.php' method='POST' name='incontact' ><input type='hidden' name='deletecontact' value='".$row['contact']."' ><input type='submit'  value='Delete'></form> - Comment</div><hr>";
}

?>
<div class='contenido'>Older</div>
<hr>
Invitations<br>
<?php
$result = mysql_query("SELECT social_username.username, social_users.email FROM social_invitations INNER JOIN social_username ON social_invitations.user = social_username.id INNER JOIN social_users ON social_invitations.user = social_users.id WHERE social_invitations.contact = ".$userId." ORDER BY social_username.username DESC LIMIT 0 , 10;");
while($row = mysql_fetch_array($result)){
	
	echo "<div class='contenido'><b>".$row['username']."</b> ".$row['email']."<br><br><form action='./contacts.php' method='POST' name='incontact' ><input type='hidden' name='newcontact' value='".$row['email']."' ><input type='submit'  value='Add'></form> - Comment</div><hr>";

}
?>
</td></tr>
</table>
</body>
</html>
