<?php

  include ("koneksi.php");


$query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from upload_file where id_file='".$_GET["id_file"]."'");
  $data = mysqli_fetch_assoc($query);
?>
<hr>
<b>Judul:</b> <?php echo $data['nama_file'];?>
<hr>
 <embed src="../../temp/<?php echo $data['nama_file'];?>" type="application/pdf" width="100%" height="100%" >