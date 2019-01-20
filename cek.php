<?php
// mengecek ada tidaknya session untuk username
if (!isset($_SESSION['pelanggan'])) {
	echo "<meta http-equiv='refresh' content='1;url=login.php'>";
	exit;
}
 
?>