<?php
include "connect.php";
date_default_timezone_set('Asia/Jakarta');

mysqli_query($connect, "UPDATE ms_trafo_std_oil SET kva='$_POST[kva]', serv_condition='$_POST[serv_condition]', vector_group='$_POST[vector_group]', winding='$_POST[winding]', spec='$_POST[spec]', od='$_POST[od]', np='$_POST[np]', hv_bushing='$_POST[hv_bushing]', lv_bushing='$_POST[lv_bushing]' WHERE kode_fg = '$_POST[kode_fg]'");

  echo "<script>alert('Berhasil Edit Data');window.location.href='index.php?p=trafo_oil_std'</script>";
?>