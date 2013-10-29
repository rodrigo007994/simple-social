<?php

if(isset($_POST['nitiid'])){

	mysql_query("DELETE FROM social_notifications WHERE social_notifications.id = '".$_POST['nitiid']."' AND social_notifications.user = '".$userId."';");

}

echo $HEAD.$MESSAGE;

?>
<tr >
<td width="100%" colspan="10" style="vertical-align: top;" class="bordercontent">
<?php

$result = mysql_query("SELECT * FROM social_notifications WHERE social_notifications.user = ".$userId." ORDER BY social_notifications.noti_date DESC LIMIT 0 , 20;");

while($row = mysql_fetch_array($result)){

	echo "<div class='contenido'><b>".$row['msg']."</b> ".$row['n']."<br><br><form action='./notifications.php' method='POST' name='noti' ><input type='hidden' name='nitiid' value='".$row['id']."' ><input type='submit'  value='Delete'></form> - Comment</div><hr>";

}
?>
</td></tr>
</table>
</body>
</html>
