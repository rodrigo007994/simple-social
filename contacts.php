<?php
session_start();

include 'config.php';

include 'conn.php';

include 'statements.php';

if(isset($_SESSION['userid'])){

	include 'contactsmembers.php';

}else{

	include 'login.php';

}

mysql_close($con);

?>
