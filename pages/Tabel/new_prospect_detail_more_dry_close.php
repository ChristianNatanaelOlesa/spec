<?php
if($_GET["nopracost"]){
session_start();
include ("koneksi.php");
$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where nopracost='".$_GET["nopracost"]."'");
$oilDb = mysqli_fetch_assoc($oil);
$noprospect=$oilDb["noprospect"];
$nopracost=$oilDb["nopracost"];
$bagong=$oilDb["type_trafo"];
								switch ($bagong) {
								case ($bagong=='Hermetically Sealed - Corrugated'):
									$link="Form_Hermetically_Sealed .php";
									break;	
								case ($bagong=='Conservator - Corrugated'):
									$link="Form_Conservator_Corrugated.php";
									break;	
								case ($bagong=='Conservator - Panel'):
									$link="Form_Conservator_Panel.php";
									break;	
								case ($bagong=='Nitrogen Type'):
									$link="Form_Nitrogen_Type.php";
									break;
							}




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
        DETAIL PROSPECT  DRY CLOSE
        </font></strong></center></h2>
		<h3><center><strong><font color="RED">
        TENDER PROSPECT
        </font></strong></center></h3>
          <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> <font color="brown"><strong>Home</strong></font></a></li>
            <li><a href="../?p=new_prospect"><font color="brown"><strong>List New Prospect</strong></font></a></li>
			<li><a href="new_prospect_detail.php?noprospect=<?php echo $noprospect; ?>"><font color="brown"><strong>Prospect</strong></font></a></li>
			<li class="active"><font color="brown"><strong>Detail Prospect</strong></font></li>            
          </ol>
        </section>
<div class="box">
	<header>
		<h3 class="alert alert-info text-center" role="alert"><strong>GENERAL INFORMATION</strong></h3>
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
			<label class="control-label col-lg-3">Status Stage</label>
			<div class="col-lg-3">															
			<strong>	<input type="text" name="priority" readonly class="form-control" value="<?php echo $maduDb['priority']; ?> " /></strong>	
			</div>							
		</div>
		<header>
		<h3 class="alert alert-info text-center" role="alert"><STRONG>GENERAL CONDITION</STRONG></h3>
		</header>
		<div class="form-group">
			<label class="control-label col-lg-3">Catagory</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="category" readonly class="form-control" value="<?php echo $oilDb['category']; ?> " /></strong>			
			</div>			
		</div>	
		
		<div class="form-group">				
			<label class="control-label col-lg-3">Type of Transformer</label>
			<div class="col-lg-3">			
			<strong><input type="text" name="type_trafo" readonly class="form-control" value="<?php echo $oilDb['type_trafo']; ?> " /></strong>				
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Service Condition</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="service_condition" readonly class="form-control" value="<?php echo $oilDb['service_condition']; ?> " /></strong>			
			</div>			
		</div>	
		
		<div class="form-group">
			<label class="control-label col-lg-3">Altitude</label>								
			<div class="col-lg-1">								
			<strong><input type="text" name="altitude" readonly class="form-control" value="<?php echo $oilDb['altitude']; ?> " /></strong>			
			</div>	
		</div>	
		
		<div class="form-group">
			<label class="control-label col-lg-3">Ambient Temp</label>																
			<div class="col-lg-1">								
			<strong><input type="text" name="ambient_temp" readonly class="form-control" value="<?php echo $oilDb['ambient_temp']; ?> " /></strong>			
			</div>	
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">International Standard</label>	
			<div class="col-lg-3">
			<strong><input type="text" name="standarisasi" readonly class="form-control" value="<?php echo $oilDb['standarisasi']; ?> " /></strong>			
			</div>	
		</div>
		
		<header>
		<h3 class="alert alert-info text-center" role="alert"><strong>ELECTRICAL CHARATERISTIC</strong></h3>
		</header>
		<div class="form-group">
			<label class="control-label col-lg-3">Insulatiom Thermal</label>
			<div class="col-lg-3">													
			<strong><input type="text" name="insulation_thermal" readonly class="form-control" value="<?php echo $oilDb['insulation_thermal']; ?> " /></strong>			
			</div>	
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Temperature Rise</label>
			<div class="col-lg-3">													
			<strong><input type="text" name="temp_rise" readonly class="form-control" value="<?php echo $oilDb['temp_rise']; ?> " /></strong>			
			</div>	
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Rate Capacity</label>
			<div class="col-lg-3">
			<strong><input type="text" name="rate_capacity" readonly class="form-control" value="<?php echo $oilDb['rate_capacity']; ?> " /></strong>			
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">No Of Phase</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="no_phase" readonly class="form-control" value="<?php echo $oilDb['no_phase']; ?> " /></strong>				
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Frequency</label>								
			<div class="col-lg-3">
			<strong><input type="text" name=frequency" readonly class="form-control" value="<?php echo $oilDb['frequency']; ?> " /></strong>			
			</div>	
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Primary Voltage</label>
			<div class="col-lg-3">
			<strong><input type="text" name="primary_voltage" readonly class="form-control" value="<?php echo $oilDb['primary_voltage']; ?> " /></strong>			
			</div>	
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Secondary Voltage&nbsp</label>
			<div class="col-lg-3">
			<strong><input type="text" name="secondary_voltage" readonly class="form-control" value="<?php echo $oilDb['secondary_voltage']; ?> " /></strong>			
			</div>	
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Vektor Group</label>								
			<div class="col-lg-3">															
			<strong><input type="text" name="vektor_group" readonly class="form-control" value="<?php echo $oilDb['vektor_group']; ?> " /></strong>												
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Type of Winding</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="type_winding" readonly class="form-control" value="<?php echo $oilDb['type_winding']; ?> " /></strong>			
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Type of Cooling</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="type_cooling" readonly class="form-control" value="<?php echo $oilDb['type_cooling']; ?> " /></strong>			
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Tap Changer</label>
			<div class="col-lg-3">															
			<strong><input type="text" name="tap_changer" readonly class="form-control" value="<?php echo $oilDb['tap_changer']; ?> " /></strong>			
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">No Of Tap</label>
			<div class="col-lg-3">													
			<strong><input type="text" name="no_tap" readonly class="form-control" value="<?php echo $oilDb['no_tap']; ?> " /></strong>			
			</div>
		</div>
	
		<header>	
		<h3 class="alert alert-info text-center" role="alert"><strong>PROTECTION & ACCESORIES</strong></h3>
		</header>
			<div class="form-group">
			<label class="control-label col-lg-3">Digital Thermometer</label>
			<div class="col-lg-3">
			<strong><input type="text" name="dig_thermo" readonly class="form-control" value="<?php echo $oilDb['dig_thermo']; ?> " /></strong>											
			</div>	
			</div>
			
			<div class="form-group">
			<label class="control-label col-lg-3">Cooling Fans</label>
			<div class="col-lg-3">
			<strong><input type="text" name="cool_fans" readonly class="form-control" value="<?php echo $oilDb['cool_fans']; ?> " /></strong>											
			</div>
			</div>
		
			<div class="form-group">
			<label class="control-label col-lg-3">Enclosure</label>									
			<div class="col-lg-3">
			<strong><input type="text" name="enclosure" readonly class="form-control" value="<?php echo $oilDb['enclosure']; ?> " /></strong>										
			</div>	
			</div>
		
		<header>
		<h3 class="alert alert-info text-center" role="alert"><strong>NOTES</strong></h3>
		</header>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Catatan 1</label>
			<div class="col-lg-9">
			<strong><input type="text" name="notes1" readonly class="form-control" value="<?php echo $oilDb['notes1']; ?> " /></strong>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Catatan 2</label>
			<div class="col-lg-9">								
			<strong><input type="text" name="notes2" readonly class="form-control" value="<?php echo $oilDb['notes2']; ?> " /></strong>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-3">Catatan 3</label>
			<div class="col-lg-9">								
			<strong><input type="text" name="notes3" readonly class="form-control" value="<?php echo $oilDb['notes3']; ?> " /></strong>
			</div>	
		</div>
		<hr size="12px">
			<!--<div class="form-actions margin-bottom" style="text-align:center;">
			<input type="submit" name="pasien" value="MINTA KLARIFIKASI" class="btn btn-danger" />          <a href="?menu=data_user" class="btn btn-success" >BUAT FORM SPEC</a> <a href="?menu=data_user" class="btn btn-warning" >BATAL</a>
			</div>-->
			<div class="form-actions margin-bottom" style="text-align:center;">
			 <a href="new_prospect_detail_close.php?noprospect=<?php echo $noprospect; ?>" class="btn btn-warning" >CLOSE</a>
			</div>
	</form>
</body>
</html>
<?php
	if(isset($_POST["pasien"])){
				include_once("sambung.php");		
				mysqli_query($GLOBALS["___mysqli_ston"], "update oil_prospect set category_klari='".$_POST["category_klari"]."',type_trafo_klari='".$_POST["type_trafo_klari"]."',service_condition_klari='".$_POST["service_condition_klari"]."',status=1,altitude_klari='".$_POST["altitude_klari"]."',ambient_temp_klari='".$_POST["ambient_temp_klari"]."',standarisasi_klari='".$_POST["standarisasi_klari"]."',temp_rise_klari='".$_POST["temp_rise_klari"]."' ,insulation_thermal_klari='".$_POST["insulation_thermal_klari"]."',rate_capacity_klari='".$_POST["rate_capacity_klari"]."',no_phase_klari='".$_POST["no_phase_klari"]."',frequency_klari='".$_POST["frequency_klari"]."',primary_voltage_klari='".$_POST["primary_voltage_klari"]."',secondary_voltage_klari='".$_POST["secondary_voltage_klari"]."',vektor_group_klari='".$_POST["vektor_group_klari"]."',type_winding_klari='".$_POST["type_winding_klari"]."' ,type_cooling_klari='".$_POST["type_cooling_klari"]."' ,tap_changer_klari='".$_POST["tap_changer_klari"]."' ,no_tap_klari='".$_POST["no_tap_klari"]."',dig_thermo_klari='".$_POST["dig_thermo_klari"]."',cool_fans_klari='".$_POST["cool_fans_klari"]."',enclosure_klari='".$_POST["enclosure_klari"]."',notes1_klari='".$_POST["notes1_klari"]."',notes2_klari='".$_POST["notes2_klari"]."' ,notes3_klari='".$_POST["notes3_klari"]."',status=1 where nopracost='$nopracost'");
				
				//mysqli_query($GLOBALS["___mysqli_ston"], "update oil_prospect set category_klari='".$_POST["category_klari"]."',type_trafo_klari='".$_POST["type_trafo_klari"]."',service_condition_klari='".$_POST["service_condition_klari"]."',status=1,altitude_klari='".$_POST["altitude_klari"]."',ambient_temp_klari='".$_POST["ambient_temp_klari"]."' where nopracost='$nopracost'");
				
				mysqli_query($GLOBALS["___mysqli_ston"], "update h_rpospect set status=1 where noprospect='$noprospect'");
				echo"<script>alert('Data Sukses tersimpan');window.location.href='new_prospect_detail.php?noprospect=".$noprospect."'</script>";?>
				<div class="alert alert-success" role="alert">
					<b>Berhasil mengirim Request Klarifikasi ke Sales </b>
				</div>
				<?php
				}else if(isset($_POST["pasien"])){
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
        $("input[name=btnPassport]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport").show();
				 $("#dvPassport").focus();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport1]").click(function () {
            if ($(this).val() == "Yes") {
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
            if ($(this).val() == "Yes") {
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
            if ($(this).val() == "Yes") {
                $("#dvPassport3").show();
				 $("#dvPassport3").focus();
            } else {
                $("#dvPassport3").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport4]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport4").show();
				 $("#dvPassport4").focus();
            } else {
                $("#dvPassport4").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport5]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport5").show();
				 $("#dvPassport5").focus();
            } else {
                $("#dvPassport5").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport6]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport6").show();
				 $("#dvPassport6").focus();
            } else {
                $("#dvPassport6").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport7]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport7").show();
				 $("#dvPassport7").focus();
            } else {
                $("#dvPassport7").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport8]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport8").show();
				 $("#dvPassport8").focus();
            } else {
                $("#dvPassport8").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport9]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport9").show();
				 $("#dvPassport9").focus();
            } else {
                $("#dvPassport9").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport10]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport10").show();
				 $("#dvPassport10").focus();
            } else {
                $("#dvPassport10").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport11]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport11").show();
				 $("#dvPassport11").focus();
            } else {
                $("#dvPassport11").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport12]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport12").show();
				 $("#dvPassport12").focus();
            } else {
                $("#dvPassport12").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport13]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport13").show();
				 $("#dvPassport13").focus();
            } else {
                $("#dvPassport13").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport14]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport14").show();
				 $("#dvPassport14").focus();
            } else {
                $("#dvPassport14").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport15]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport15").show();
				 $("#dvPassport15").focus();
            } else {
                $("#dvPassport15").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport16]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport16").show();
				 $("#dvPassport16").focus();
            } else {
                $("#dvPassport16").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport17]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport17").show();
				 $("#dvPassport17").focus();
            } else {
                $("#dvPassport17").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport18]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport18").show();
				 $("#dvPassport18").focus();
            } else {
                $("#dvPassport18").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport19]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport19").show();
				 $("#dvPassport19").focus();
            } else {
                $("#dvPassport19").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport20]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport20").show();
				 $("#dvPassport20").focus();
            } else {
                $("#dvPassport20").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport21]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport21").show();
				 $("#dvPassport21").focus();
            } else {
                $("#dvPassport21").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport22]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport22").show();
				 $("#dvPassport22").focus();
            } else {
                $("#dvPassport22").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport23]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport23").show();
				 $("#dvPassport23").focus();
            } else {
                $("#dvPassport23").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport24]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport24").show();
				 $("#dvPassport24").focus();
            } else {
                $("#dvPassport24").hide();
            }
        });
    });
</script>

</body>
</html>	
</div>
<?php } ?>