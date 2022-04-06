<?php
include "connect.php";
date_default_timezone_set('Asia/Jakarta');


//pengecekan tipe harus pdf
$tipe_file = $_FILES['nama_file']['type']; //mendapatkan mime type
if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
{
	$nama_file = trim($_FILES['nama_file']['name']);
	$nopracost = $_POST['nopracost'];
	$tgl_upload = date('Y-m-d G:i:s');
	$queryx = mysqli_query($connect,"SELECT * FROM upload_file where nopracost='$nopracost'");
	if(mysqli_num_rows($queryx) < 1){
	$sql = "INSERT INTO upload_file (nama_file, nopracost, upload_dt) VALUES ('$nama_file', '$nopracost', '$tgl_upload')";
	mysqli_query($connect,$sql); //simpan data judul dahulu untuk mendapatkan id

	//dapatkan id terkahir
	$query = mysqli_query($connect,"SELECT * FROM upload_file ORDER BY id_file DESC LIMIT 1");
	$data  = mysqli_fetch_array($query);

	//mengganti nama pdf
	$nama_baru = $data['nopracost'].".pdf"; //hasil contoh: file_1.pdf
	$file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
	$folder    = "../../temp"; //folder tujuan

	move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
	//update nama file di database
	mysqli_query($connect,"UPDATE upload_file SET nama_file='$nama_baru', upload_dt='$tgl_upload' WHERE id_file='$data[id_file]' ");

	echo "<script>alert('File Berhasil Di Upload');window.location.href='edit_Form_hermetically_sealed.php?nopracost=$nopracost'</script>";
	}
	else
	{
	echo "<script>alert('Anda Sudah Upload sebelumnya');window.location.href='edit_Form_hermetically_sealed.php?nopracost=$nopracost'</script>";	
	}
}
 else
	{
	echo "Gagal Upload File Bukan PDF! <a href='edit_Form_hermetically_sealed.php?nopracost=$nopracost'> Kembali </a>";
	}

?>