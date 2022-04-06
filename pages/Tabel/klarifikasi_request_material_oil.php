<?php
if($_GET["nopracost"]){	
	session_start();
	include ("koneksi.php");
		$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select a.noprospect, b.* from formspec a inner join request_material b ON a.noformspec = b.nopracost where b.norequest='".$_GET["norequest"]."'");
	$oilDb = mysqli_fetch_assoc($oil);
	$noprospect=$oilDb["noprospect"];
	$nopracost=$oilDb["nopracost"];
	$norequest=$oilDb["norequest"];

	$madu = mysqli_query($GLOBALS["___mysqli_ston"], "select * from h_rpospect where noprospect='$noprospect'");
	$maduDb = mysqli_fetch_assoc($madu);
	$tanggal=$maduDb['tgl_prospect'];
	$tglbaru = date('d-m-Y', strtotime($tanggal ));
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
        <h2><center><strong><font color="RED">
        FORM APPROVAL
        </font></strong></center></h2>
          <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> <font color="brown"><strong>Home</strong></font></a></li>
            <li><a href="../?p=minta_material"><font color="brown"><strong>Request Material</strong></font></a></li>
			<li><a href="detail_request_material.php?noprospect=<?php echo $noprospect; ?>"><font color="brown"><strong>Detail Request Material</strong></font></a></li> 
			<li class="active"><font color="brown"><strong>Form Approval</strong></font></li>            
          </ol>
        </section>
<div class="box">
	<header>
		<h3 class="alert alert-danger text-center" role="alert"><strong>GENERAL INFORMATION</strong></h3>
	</header>	
	<div class="body">
	<form action="" method="post" class="form-horizontal" name='orangtua'>
		<div class="form-group">
			<label class="control-label col-lg-3">No Prospect </label>
			<div class="col-lg-3">
			<strong><input type="text" Readonly name="noprospect" autofocus required class="form-control" value="<?php echo $noprospect; ?>"/></strong>
			</div>			
		</div>		
		<div class="form-group">
			<label class="control-label col-lg-3">No Sub Prospect </label>
			<div class="col-lg-3">
			<strong><input type="text" Readonly name="nopracost" autofocus required class="form-control" value="<?php echo $nopracost;  ?> "/></strong>
			</div>	
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">No Request </label>
			<div class="col-lg-3">
			<strong><input type="text" Readonly name="norequest" autofocus required class="form-control" value="<?php echo $norequest;  ?> "/></strong>
			</div>	
		</div>
		<div class="form-group">								
			<label  class="control-label col-lg-3">Tahun Prospect</label> 
			<div class="col-lg-3">								
			<input type="text" readonly name="Tahun" autofocus required class="form-control" value="<?php echo $maduDb['tahun'];  ?>"/></strong>								  
			</div>	
		</div>		
		<div class="form-group">	
			<label class="control-label col-lg-3">Nama Sales</label>																					
			<div class="col-lg-3">
			<strong>	<input type="text" Readonly name="sales"  class="form-control" value= " <?php echo $maduDb['sales']; ?>  "/></strong>
			</div>	
		</div>
		<div class="form-group">	
			<label class="control-label col-lg-3">Segmen Penjualan </label>
			<div class="col-lg-3">
			<strong>	<input type="text" Readonly name="segment" autofocus required class="form-control" value=<?php echo $maduDb['segment']; ?>  /> </strong>
			</div>			
		</div>
		<div class="form-group">	
			<label class="control-label col-lg-3">Sub Segmen Penjualan </label>
			<div class="col-lg-3">															
			<strong>	<input type="text" Readonly name="sub_segment" autofocus required class="form-control" value="<?php echo $maduDb['sub_segment']; ?> " />	</strong>
			</div>	
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">Project </label>
			<div class="col-lg-3">
			<strong>	<input type="text" name="customer" readonly required class="form-control" value="<?php echo $maduDb['project']; ?> " /> </strong>
			</div>	
		</div>
		<div class="form-group">						
			<label class="control-label col-lg-3">Status Stage</label>
			<div class="col-lg-3">															
			<strong>	<input type="text" name="priority" readonly class="form-control" value="<?php echo $maduDb['priority']; ?> " /></strong>	
			</div>							
		</div>
		<header>
		<h3 class="alert alert-danger text-center" role="alert"><STRONG>DETAIL BARANG</STRONG></h3>
		</header>
		<div class="form-group">
			<label class="control-label col-lg-3">Nama Barang</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="nama_barang" readonly class="form-control" value="<?php echo $oilDb['nama_barang']; ?> " /></strong>			
			</div>	
		</div>
		<div class="form-group">				
			<label class="control-label col-lg-3">Detail Barang</label>
			<div class="col-lg-3">			
			<strong><input type="text" name="detail_barang" readonly class="form-control" value="<?php echo $oilDb['detail_barang']; ?> " /></strong>				
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3">Quantity Barang</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="qty_barang" readonly class="form-control" value="<?php echo $oilDb['qty_barang']; ?> " /></strong>			
			</div>				
		</div>

		<div class="form-group">
			<label class="control-label col-lg-3">Supplier Barang</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="supp_barang" readonly class="form-control" value="<?php echo $oilDb['supp_barang']; ?> " /></strong>			
			</div>	
			<div class="col-lg-2">
				<input type="button" value="Alasan Reject ?" name = "btnPassport1" class="btn btn-primary" />			
				<input type="button" value="Batal" name = "btnPassport1" class="btn btn-primary" />
			</div>
			<div class="col-lg-4" id="dvPassport1" style="display: none">	
			<input type="text" id="supp_klari" name="supp_klari"  autofocus class="form-control" placeholder = "Tuliskan alasan reject "/>
			</div>				
		</div>		

		<div class="form-group">
			<label class="control-label col-lg-3">Harga Barang</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="harga_barang" readonly class="form-control" value="<?php echo $oilDb['harga_barang']; ?> " /></strong>			
			</div>	
			<div class="col-lg-2">
				<input type="button" value="Alasan Reject ?" name = "btnPassport2" class="btn btn-primary" />			
				<input type="button" value="Batal" name = "btnPassport2" class="btn btn-primary" />
			</div>
			<div class="col-lg-4" id="dvPassport2" style="display: none">	
			<input type="text" id="harga_klari" name="harga_klari"  autofocus class="form-control" placeholder = "Tuliskan alasan reject "/>
			</div>				
		</div>	

		<?php if ($oilDb['keterangan'] != '') { ?>
		<header>
		<h3 class="alert alert-success text-center" role="alert"><strong>KETERANGAN TAMBAHAN</strong></h3>
		</header>
		
		<div class="form-group">
			<label class="control-label col-lg-3">KETERANGAN</label>
			<div class="col-lg-9">
			<strong><input type="text" name="notes" readonly class="form-control" value="<?php echo $oilDb['keterangan']; ?> " /></strong>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-2">
			<input type="button" value="Alasan Reject ?" name = "btnPassport3" class="btn btn-primary" />
			<input type="button" value="Batal" name = "btnPassport3" class="btn btn-primary" />
			</div>
			<div class="col-lg-6" id="dvPassport3" style="display: none">	
			<input type="text" id="keterangan_klari" name="keterangan_klari" autofocus class="form-control" placeholder ="Tuliskan alasan reject" />
			</div>
		</div>
		<?php } ?>
		
		
			<hr size="12px">
			
			<div class="form-actions margin-bottom" style="text-align:center;">



			<input type="submit" name="reject" onclick="return confirm('Apa anda yakin ingin reject ? Request akan di kembalikan ke purchasing')" value="REJECT" class="btn btn-danger" /> 
 
			<input type="submit" name="setuju" value="ACCEPT" class="btn btn-success" />

			<a href="detail_request_material.php?noprospect=<?php echo $noprospect; ?>" class="btn btn-warning" >BATAL</a>
			</div>
	</form>
</body>
</html>
<?php
	if(isset($_POST["reject"])){
		include_once("koneksi.php");		

		$reject_dt	= date('Y-m-d H:i:s');
		$reject_by	= $_SESSION['username'];
		$status		= 103;

		if ($_POST['supp_klari'] != '' or $_POST['harga_klari'] != '') {
			mysqli_query($GLOBALS["___mysqli_ston"], "update request_material set supp_klari='".$_POST["supp_klari"]."', harga_klari='".$_POST["harga_klari"]."', status='$status', reject_dt='$reject_dt', reject_by='$reject_by' where norequest='$norequest'");
		
			
			echo"<script>alert('Request Berhasil di Reject');window.location.href='detail_request_material.php?noprospect=$noprospect'</script>";
		} else{
			echo"<script>alert('Harap Mengisi Alasan Reject');window.location.href='klarifikasi_request_material_oil.php?nopracost=$nopracost&norequest=$norequest'</script>";
		}

		?>
		<?php
		}else if(isset($_POST["reject"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
	      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<b>Gagal menambah ke database!!</b>
		</div><center>";
				}
?>

<?php
	if(isset($_POST["setuju"])){
				$tb= date("Y-m-d"); 
				include_once("sambung.php");
				$approve_dt	= date('Y-m-d H:i:s');
				$approve_by	= $_SESSION['username'];		
				$status		= 2;

				mysqli_query($GLOBALS["___mysqli_ston"], "update request_material set status='$status', approve_dt='$approve_dt', approve_by='$approve_by' where norequest='$norequest'");

				$query_approve = mysqli_query($GLOBALS["___mysqli_ston"], "select count(norequest) as countApp from request_material where nopracost='$nopracost' and status != 2");
				$data_app = mysqli_fetch_assoc($query_approve);

				if ($data_app['countApp'] == 0) {
					mysqli_query($GLOBALS["___mysqli_ston"], "update formspec set status='$status' where noformspec='$nopracost'");

					echo"<script>alert('Semua Request Sudah Di Approve');window.location.href='../?p=minta_material'</script>";
				}
				
					
				echo"<script>alert('Data Sukses tersimpan');window.location.href='detail_request_material.php?noprospect=$noprospect'</script>";?>
				<?php
				}else if(isset($_POST["setuju"])){
				echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
				</div><center>";
				}
?>
<script type="text/javascript" src="../../assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4"></script>
<script type="text/javascript" src="../../assets/js/poper-min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../assets/js/slim-min.js"integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>   
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/savy.min.js"></script>

<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport1]").click(function () {
            if ($(this).val() == "Alasan Reject ?") {
                $("#dvPassport1").show();
				 $("#dvPassport1").focus();
            } else {
                $("#dvPassport1").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport2]").click(function () {
            if ($(this).val() == "Alasan Reject ?") {
                $("#dvPassport2").show();
				 $("#dvPassport2").focus();
            } else {
                $("#dvPassport2").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport3]").click(function () {
            if ($(this).val() == "Alasan Reject ?") {
                $("#dvPassport3").show();
				 $("#dvPassport3").focus();
            } else {
                $("#dvPassport3").hide();
            }
        });
    });
</script>

</body>
</html>	
</div>
<?php } ?>