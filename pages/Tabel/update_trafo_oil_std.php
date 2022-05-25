<?php

$mysqli->query("UPDATE ms_trafo_oil_std SET kode_fg='$_POST[kode_fg]', kva='$_POST[kva]', serv_condition='$_POST[serv_condition]', vector_group='$_POST[vector_group]', winding='$_POST[winding]', spec='$_POST[spec]', od='$_POST[od]', np='$_POST[np]', hv_bushing='$_POST[hv_bushing]', lv_bushing='$_POST[lv_bushing]' WHERE kode_fg = '$_POST[kode_fg]'");

 echo "<script>alert('Data Berhasil Di Rubah');window.location.href='../index.php?p=trafo_oil_std'</script>";
  
?>