<?php

include 'config.php';

include 'conn.php';

$result = mysql_query("SELECT COUNT(id) AS num FROM social_notifications WHERE social_notifications.user = ".$_GET["user"]." ;");

if($row = mysql_fetch_array($result)){

	echo $row['num'];
}

mysql_close($con);

?>
