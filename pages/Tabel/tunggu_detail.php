<?php
if($_GET["noprospect"]){
session_start();
include ("koneksi.php");


$madu = mysqli_query($GLOBALS["___mysqli_ston"], "select * from h_rpospect where noprospect='".$_GET["noprospect"]."'");
$maduDb = mysqli_fetch_assoc($madu);
$noprospect=$maduDb["noprospect"];
$tanggal=$maduDb['tgl_prospect'];
$tglbaru = date('d-m-Y', strtotime($tanggal ));

$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where noprospect='".$_GET["noprospect"]."' and status='1'");
$oilDb = mysqli_fetch_assoc($oil);
$nopracost=$oilDb["id"];
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
        <h3><center><strong><font color="black">
             DETAIL PROSPECT YANG BELUM DKLARIFIKASI OLEH SALES 
        </font></strong></center></h3>
          <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> <font color="brown"><strong>Home</strong></font></a></li>
            <li><a href="../?p=tunggu"><font color="brown"><strong>List Tunggu Klarifikasi</strong></font></a></li>
            <li class="active"><font color="brown"><strong>Detail Prospect</strong></font></li>
            
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

   <tr>
    <td width ="32%">Status Prospect </td>
    <td width="68%">: <?php echo $maduDb["status"];?></td>
  </tr>
  </table>
					<div class="table-responsive" >
  
					<table width="100%" border="2"  class="table table-striped table-bordered table-hover">
					<tr>		
						<td width="2px"><div align="left"><strong>No Sub Prospect</strong></div></td>
						<td width="10px"><div align="left"><strong>Jenis</strong></div></td>
						<td width="10px"><div align="left"><strong>Catagory</strong></div></td>
						<td width="10px"><div align="left"><strong>Service Condition </strong></div></td>
						<td width="10px"><div align="left"><strong>Int Standard</strong></div></td>
						<td width="10px"><div align="left"><strong>Action</strong></div></td>
						<?php
						$pasienSql = "select * from oil_prospect where noprospect='$noprospect' and status=1";
						$pasienQry = mysqli_query( $server, $pasienSql)  or die ("Query pasien salah : ".mysqli_error($GLOBALS["___mysqli_ston"]));
						$nomor  = 0; 
						while ($pasien = mysqli_fetch_array($pasienQry)) {
						$nomor++;	
						$botol=$pasien['tipeprospect'];
						$botak=$pasien['nopracost'];

								switch ($botol) {
								case ($botol=='OIL'):
									$link="klarifikasi_detail_oil_tunggu.php";
									break;	
								case ($botol=='DRY'):
									$link="klarifikasi_detail_dry_tunggu.php";
									break;	
								case ($botol=='CTVT'):
									$link="new_prospect_detail_more_ctvt_tunggu.php";
									break;	
							}	
						?>
					<tr>
						<td><?php echo $pasien['nopracost'];?></td>  
						<td><?php echo $pasien['tipeprospect'];?></td>						
						<td><?php echo $pasien['category'];?></td>
						<td><?php echo $pasien['service_condition'];?></td>
						<td><?php echo $pasien['standarisasi'];?></td>  
						
						<td>						
						
						<a href="<?php echo $link; ?>?nopracost=<?php echo $botak; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> More Detail </a>							
						<!--<a href="new_prospect_detail_more_.php?sender=hapus&noprospect=<?php echo $row['noprospect']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Hapus'> Klarifikasi </a>-->
						<!--<a href="?menu=edit_data_memo&aksi=edit&nmr=<?php echo $pasien['nomemo']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Edit Data ini'> Create Form Spec</a>-->	
						
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