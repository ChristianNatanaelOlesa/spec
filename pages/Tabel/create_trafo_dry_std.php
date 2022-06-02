<?php
session_start();
include "connect.php";
date_default_timezone_set('Asia/Jakarta');

$kode_fg			= $_POST['kode_fg'];
$kva				= $_POST['kva'];
$vector_group		= $_POST['vector_group'];
$winding			= $_POST['winding'];
$spec				= $_POST['spec'];
$od					= $_POST['od'];
$np					= $_POST['np'];
$wiring				= $_POST['wiring'];
$created_dt			= date('Y-m-d H:i:s');
$created_by			= $_SESSION['namalengkap'];

mysqli_query($connect,"INSERT INTO ms_trafo_std_dry (kode_fg, kva, vector_group, winding, spec, od, np, wiring, created_dt, created_by) VALUES ('$kode_fg', '$kva', '$vector_group', '$winding', '$spec', '$od', '$np', '$wiring', '$created_dt', '$created_by')");

echo "<script>alert('Berhasil Menambahkan Data');window.location.href='index.php?p=trafo_dry_std'</script>";

?>