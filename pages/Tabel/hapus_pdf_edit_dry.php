<?php
include "connect.php";

$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from upload_file where nopracost='".$_GET["nopracost"]."'");
$oilDb = mysqli_fetch_assoc($oil);
$nopracost=$oilDb["nopracost"];
$nama_file=$oilDb["nama_file"];

mysqli_query($connect,"delete from upload_file where id_file='".$_GET["id_file"]."'");




echo "<script>alert('File Berhasil Di Hapus');window.location.href='edit_Form_spec_dry.php?nopracost=$nopracost'</script>";

?>