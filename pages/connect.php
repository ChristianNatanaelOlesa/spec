<?php

$server="localhost";
$username="root";
$pw="";
$db="prospect";
$connect=($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $username, $pw));

	if($connect) {
		mysqli_select_db($GLOBALS["___mysqli_ston"], $db) or die("Database tidak ditemukan");
		echo "<b> </b>";
	}else {
		echo "<b> Koneksi Gagal </b>";
	}

?>