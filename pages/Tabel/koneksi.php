<?php
	$server = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root", ""));
	$db = mysqli_select_db($GLOBALS["___mysqli_ston"],"prospect");
	
	if(!$server){
		echo "Maaf, Kata pak Henryanto Gagal tersambung dengan server !";
	}
	if(!$db){
		echo "Maaf, Kata pak Henryanto Gagal tersambung dengan database !";
	}
?>