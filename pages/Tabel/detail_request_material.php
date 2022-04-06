<?php
if($_GET["noprospect"]){
session_start();
include ("koneksi.php");


$madu = mysqli_query($GLOBALS["___mysqli_ston"], "select * from h_rpospect where noprospect='".$_GET["noprospect"]."'");
$maduDb = mysqli_fetch_assoc($madu);
$noprospect=$maduDb["noprospect"];
$tanggal=$maduDb['tgl_prospect'];
$tglbaru = date('d-m-Y', strtotime($tanggal ));

$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select a.*, b.* FROM formspec a INNER JOIN request_material b ON a.noformspec = b.nopracost where a.noprospect='".$_GET["noprospect"]."' group by b.nopracost ORDER BY created_dt desc");
$oilDb = mysqli_fetch_assoc($oil);
?>

<!DOCTYPE html>
	<link rel="stylesheet" href="../../assets/css/bootstrap.css" />
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="stylesheet" href="../../assets/css/theme.css" />
    <link rel="stylesheet" href="../../assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../../assets/css/font-awesome.css" />
	<link rel="stylesheet" href="../../assets/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">

	
<head>
<title>Trafoindo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <style>
	h2 {
	text-align: left;
	}
	h3 {
	text-align: left;
	}
	</style>	
	
</head>

<body>
<div class="panel panel-default">
		<script src="../../assets/js/jquery.min.js"></script>	
		<section class="content-header">
		<!--<h4>Selamat datang <?php echo $_SESSION["namalengkap"] ?> <small></small></h4>-->
        <h2><center><strong><font color="blue">
             DETAIL REQUEST MATERIAL 
        </font></strong></center></h2>
        <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> <font color="brown"><strong>Home</strong></font></a></li>
            <li><a href="../?p=minta_material"><font color="brown"><strong>Request Material</strong></font></a></li>
			<li class="active"><font color="brown"><strong>Detail Request Material</strong></font></li>            
          </ol>
        </section>
		

<div class="box">
	
	<div class="table-responsive" >
	<table width="100%" border="1" class="table table-striped table-bordered table-hover">
 
  <tr>
    <td width ="32%">Nomor Prospect</td>
    <td width="68%">: <?php echo $maduDb["noprospect"];?></td>
  </tr>
  <tr>
    <td width ="32%">Nomor Prospect</td>
    <td width="68%">: <?php echo $oilDb["noformspec"];?></td>
  </tr>
  <tr>
    <td width ="32%">Tanggal Prospect</td>
    <td width="68%">: <?php echo $tglbaru;?></td>
  </tr>
   <tr>
    <td width ="32%">Nama Sales</td>
    <td width="68%">: <?php echo $maduDb["sales"];?></td>
  </tr>
    <tr>
    <td width ="32%">Segment Penjualan</td>
    <td width="68%">: <?php echo $maduDb["segment"];?></td>
  </tr>
    <tr>
    <td width ="32%">Sub Segment </td>
    <td width="68%">: <?php echo $maduDb["sub_segment"];?></td>
  </tr>
    </tr>
    <tr>
    <td width ="32%">Project </td>
    <td width="68%">: <?php echo $maduDb["project"];?></td>
  </tr>
  </table>
					<div class="table-responsive" >
  
					<table width="100%" border="2"  class="table table-striped table-bordered table-hover">
					<tr>		
						<td width="10%;"><div align="center"><strong>No Request</strong></div></td>
						<td width="20%;"><div align="center"><strong>Nama</strong></div></td>
						<td width="5%;"><div align="center"><strong>Qty</strong></div></td>
						<td width="10%;"><div align="center"><strong>Harga</strong></div></td>
						<td width="25%;"><div align="center"><strong>Detail</strong></div></td>
						<td width="15%;"><div align="center"><strong>Supplier</strong></div></td>
						<td width="20%;"><div align="center"><strong>Drawing</strong></div></td>
						<td width="5%;"><div align="center"><strong>Action</strong></div></td>
						<?php
						$pasienSql = "select * FROM request_material where nopracost='$oilDb[noformspec]' and status = 102 ORDER BY created_dt desc";
						$pasienQry = mysqli_query( $server, $pasienSql)  or die ("Query pasien salah : ".mysqli_error($GLOBALS["___mysqli_ston"]));
						$nomor  = 0; 
						while ($pasien = mysqli_fetch_array($pasienQry)) {
						$nomor++;	
						$botol=$oilDb["tipeprospect"];
						$norequest=$pasien['norequest'];
						$nopracost=$pasien['nopracost'];

						switch ($botol) {
								case ($botol=='OIL'):
									$link="klarifikasi_request_material_oil.php";
									break;	
								case ($botol=='DRY'):
									$link="klarifikasi_request_material_dry.php";
									break;	
								}
						?>
					<tr>
						<td style="text-align: center;"><?php echo $pasien['norequest'];?></td>  
						<td style="text-align: center;"><?php echo $pasien['nama_barang'];?></td>						
						<td style="text-align: center;"><?php echo $pasien['qty_barang'];?></td>
						<td style="text-align: center;"><?php echo $pasien['harga_barang'];?></td>
						<td style="text-align: center;"><?php echo $pasien['detail_barang'];?></td> 
						<td style="text-align: center;"><?php echo $pasien['supp_barang'];?></td>
						<td style="text-align: center">
							<?php if ($pasien['status_drawing'] == 'YES' and $pasien['nama_file'] != '') { ?>
								<a href="../../temp/<?php echo $pasien['nama_file'] ?>" target=\"_BLANK\">View</a>
							<?php } else if ($pasien['status_drawing'] == 'NO' and $pasien['nama_file'] == '') { ?>
								<font color="red"><b>Tidak Perlu Drawing</b></font>	
							<?php } ?>
							</td>
						
						<td>						
						
						<a href="<?php echo $link; ?>?nopracost=<?php echo $nopracost; ?>&norequest=<?php echo $norequest; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> Detail </a>								
						
						</td>
					</tr>
					<?php } ?>        
					</table>
					</div>
					
					

</body>
</html>
	
<script type="text/javascript" src="../../assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4"></script>
<script type="text/javascript" src="../../assets/js/poper-min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../assets/js/slim-min.js"integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>   
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/savy.min.js"></script>
</body>
</html>	
</div>
<?php } ?>