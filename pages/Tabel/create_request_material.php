<?php
include "fungsi_romawi.php";
include "connect.php";
date_default_timezone_set('Asia/Jakarta');

$noprospect		= $_POST['noprospect'];
$nopracost		= $_POST['nopracost'];
$created_by		= $_POST['created_by'];
$nama_barang	= $_POST['nama_barang'];
$qty_barang		= $_POST['qty_barang'];
$detail_barang	= $_POST['detail_barang'];
$status_drawing	= $_POST['status_drawing'];
$created_dt		= date('Y-m-d H:i:s');

$bulan 			= date('n');
$romawi 		= getRomawi($bulan);
$tahun 			= date ('Y');
$format_request	= "/RQM/".$romawi."/".$tahun;

$status			= 100; //ENGGINER REQUEST MATERIAL KE PURCHASING

$query_request 	= mysqli_query($connect,"select max(id_request) as maxidRequest FROM request_material");
$data_request 	= mysqli_fetch_array($query_request);
$no_request 	= $data_request['maxidRequest'];

for($i = 0; $i < sizeof($nama_barang); $i++){
	$noUrutRequest 	= $no_request + $i + 1;
	$kode_request 	= sprintf("%04s", $noUrutRequest);
	$norequest 		= $kode_request.$format_request;

	$sql = "INSERT INTO request_material (noprospect, nopracost, norequest, created_by, nama_barang, qty_barang, detail_barang, status, status_drawing, created_dt) VALUES ('$noprospect', '$nopracost', '$norequest', '$created_by', '$nama_barang[$i]', '$qty_barang[$i]', '$detail_barang[$i]', '$status', '$status_drawing[$i]', '$created_dt')";

	mysqli_query($connect,$sql);
}

$sql = "UPDATE formspec set status=100 where noformspec='$nopracost'";

mysqli_query($connect,$sql);

echo "<script>alert('Berhasil Request Material');window.location.href='edit_Form_hermetically_sealed.php?nopracost=$nopracost'</script>";

?>