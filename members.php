<?php

$userEmail=$_SESSION['email'];

$userId=$_SESSION['userid'];

if(isset($_POST['newpost'])){

	if($_POST['newpost']!=""){

		if($_POST['newpost']!=" "){
			
			mysql_query("INSERT INTO ".$TABLE_PREFIX."posts (id, user, content, date_mod, status) VALUES (NULL, '".$userId."', '".mysql_real_escape_string(str_replace("'", "&#39;", $_POST['newpost']))."', CURRENT_TIMESTAMP, '0');");
			
			mysql_query("UPDATE ".$TABLE_PREFIX."lastp SET content= '".mysql_real_escape_string(str_replace("'", "&#39;", $_POST['newpost']))."', date_mod= CURRENT_TIMESTAMP
		WHERE user = ".$userId.";");

		}
	}

}

echo $HEAD;

?>
<tr ><td width="100%" colspan="10" style="vertical-align: top;" class="bordercontent">
<p class="titlecontent"><center>
<form action="./" method="POST" name="inform" ><input type="text" name="newpost" size="40"><input type="submit"  value="social it"></form></center></p>
<?php

$result = mysql_query("SELECT social_username.username, social_lastp.content
FROM social_lastp
INNER JOIN social_contacts ON social_contacts.contact = social_lastp.user
INNER JOIN social_username ON social_username.id = social_contacts.contact
WHERE social_contacts.user = ".$userId."
ORDER BY social_lastp.date_mod DESC
LIMIT 0 , 10");

while($row = mysql_fetch_array($result)){
	
	echo "<div class='contenido'><b>".$row['username']."</b><br><br>".$row['content']."<br><br>Share - Comment</div><hr>";
  
}

?>
<div class='contenido'>Older</div>
</td>

</tr>
</table>
</body>
</html>
