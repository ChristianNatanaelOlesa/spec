<?php
session_start();
include "connect.php";
date_default_timezone_set('Asia/Jakarta');

$kode_fg			= $_POST['kode_fg'];
$kva				= $_POST['kva'];
$serv_condition		= $_POST['serv_condition'];
$vector_group		= $_POST['vector_group'];
$winding			= $_POST['winding'];
$spec				= $_POST['spec'];
$od					= $_POST['od'];
$np					= $_POST['np'];
$hv_bushing			= $_POST['hv_bushing'];
$lv_bushing			= $_POST['lv_bushing'];
$created_dt			= date('Y-m-d H:i:s');
$created_by			= $_SESSION['namalengkap'];

mysqli_query($connect,"INSERT INTO ms_trafo_std_oil (kode_fg, kva, serv_condition, vector_group, winding, spec, od, np, hv_bushing, lv_bushing, created_dt, created_by) VALUES ('$kode_fg', '$kva', '$serv_condition', '$vector_group', '$winding', '$spec', '$od', '$np', '$hv_bushing','$lv_bushing', '$created_dt', '$created_by')");

echo "<script>alert('Berhasil Menambahkan Data');window.location.href='index.php?p=trafo_oil_std'</script>";

?>