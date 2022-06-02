<?php
include "connect.php";
date_default_timezone_set('Asia/Jakarta');

mysqli_query($connect, "UPDATE ms_trafo_std_dry SET kva='$_POST[kva]', vector_group='$_POST[vector_group]', winding='$_POST[winding]', spec='$_POST[spec]', od='$_POST[od]', np='$_POST[np]', wiring='$_POST[wiring]' WHERE kode_fg = '$_POST[kode_fg]'");

  echo "<script>alert('Berhasil Edit Data');window.location.href='index.php?p=trafo_dry_std'</script>";
?>