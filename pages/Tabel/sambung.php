<?php
	$server = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root", ""));
	$db = mysqli_select_db($GLOBALS["___mysqli_ston"],"prospect");
	
	if(!$server){
		echo "gagal !";
	}
	if(!$db){
		echo "gagal lagi !";
	}
?>