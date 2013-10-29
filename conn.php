<?php

$con = mysql_connect($DB_HOST,$DB_USER_NAME,$DB_USER_PASSWORD);

if (!$con){

	die('Could not connect: ' . mysql_error());

}

mysql_select_db($DATA_BASE);

?>
