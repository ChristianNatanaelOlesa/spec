<?php 

   include "connect.php";

   $kode_fg        = $_GET['kode_fg'];

   mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM ms_trafo_std_oil WHERE kode_fg ='$kode_fg'");

   echo "<script>alert('Data Berhasil Di Delete');window.location.href='../index.php?p=trafo_oil_std'</script>";

?>