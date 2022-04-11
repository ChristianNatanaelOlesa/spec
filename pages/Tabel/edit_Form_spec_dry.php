
<!DOCTYPE html>
<html lang="en">

	<head>
	  <meta charset="utf-8">

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Trafoindo</title>

	  <!-- Google Font: Source Sans Pro -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="../../plugins/plugin_chris/plugins/fontawesome-free/css/all.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="../../plugins/plugin_chris/dist/css/adminlte.min.css">
	</head>

	<?php
if($_GET["nopracost"]){	
	session_start();

  $username=  $_SESSION["username"];
  $created=  $_SESSION["namalengkap"];
  $inisial=  $_SESSION["inisial"];
	
	include ("koneksi.php");
	$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from formspec where noformspec='".$_GET["nopracost"]."'");
	$oilDb = mysqli_fetch_assoc($oil);
	$noprospect=$oilDb["noprospect"];
	$nopracost=$oilDb["noformspec"];

	$type_cooling=$oilDb["type_cooling"];
	$type_trafo=$oilDb["type_trafo"];
	$service_condition=$oilDb["service_condition"];
	$type_cooling1=$oilDb["type_cooling1"];
	$type_cooling2=$oilDb["type_cooling2"];
	$type_windingx=trim($oilDb["type_winding"]);
	$sudden_relay=$oilDb["sudden_relay"];
	$buchholz_relay=$oilDb["buchholz_relay"];
	$botolan= date("Y-m-d");
	$notap=$oilDb["no_tap"];
	$reject_spv=$oilDb["reject_spv"];
  $status_formspec = $oilDb["status"];
	
		switch ($type_windingx) {
				case ($type_windingx=='Cu-Cu'):
					$hv_winding='Copper';
					$lv_winding='Copper';
					break;
				case ($type_windingx=='Cu-Al'):
					$hv_winding='Copper';
					$lv_winding='Aluminium';
					break;
				case ($type_windingx=='Al-Al'):
					$hv_winding='Aluminium';
					$lv_winding='Aluminium';
					break;
				case ($type_windingx=='Al-Cu'):
					$hv_winding='Aluminium';
					$lv_winding='Copper';
					break;
		}
	
	
$nilai_rate11 = round(($oilDb["rate_capacity"]/(($oilDb["primary_voltage"]/1000)*sqrt(3))),2);	
$nilai_rate12 = round(($oilDb["rate_capacityx"]/(($oilDb["primary_voltage"]/1000)*sqrt(3))),2);

		$nilai_rate21 = round(($oilDb["rate_capacity"]/(($oilDb["secondary_voltage"]/1000)*sqrt(3))),2);
		$nilai_rate22 = round(($oilDb["rate_capacityx"]/(($oilDb["secondary_voltage"]/1000)*sqrt(3))),2);
	


	
	$altitude=$oilDb["altitude"];
	$ambient_temp=$oilDb["ambient_temp"];
	$standarisasi=$oilDb["standarisasi"];
	$no_phase=$oilDb["no_phase"];
	$frequency=$oilDb["frequency"];
	$primary_voltage=$oilDb["primary_voltage"];
	$type_winding=$oilDb["type_winding"];

	$madu = mysqli_query($GLOBALS["___mysqli_ston"], "select * from h_rpospect where noprospect='$noprospect'");
	$maduDb = mysqli_fetch_assoc($madu);
	$tanggal=$maduDb['tgl_prospect'];
	$tglbaru = date('d-m-Y', strtotime($tanggal ));
	$project=$maduDb['project'];
	$sales=$maduDb['sales'];
	$segment=$maduDb['segment'];
	$sub_segment=$maduDb['sub_segment'];
	$tahun=$maduDb['tahun'];

  $query_01 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(norequest) countReq from request_material where nopracost='".$_GET["nopracost"]."' and status_supp = 1 and status_upload != 1");
  $data_01 = mysqli_fetch_assoc($query_01);

  $query_02 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jumlahTransaksi from request_material where nopracost='".$_GET["nopracost"]."'");
  $data_02 = mysqli_fetch_assoc($query_02);

	
?>

	<body>
	<!-- Site wrapper -->
		<div class="wrapper">

		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-12">
		            <center><font color="RED"><h1>SPECIFICATION FOR TRANSFORMER</h1></font></center>
		          </div>
		        </div>

		        <div class="row mb-2">
		          <div class="col-sm-6">

		          </div>
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-dashboard"></i> <font color="brown"><strong>Home</strong></font></a></li>
		              <li class="breadcrumb-item"><a href="../?p=new_prospect"><font color="brown"><strong>List New Prospect</strong></font></a></li>
		              <li class="breadcrumb-item"><a href="new_prospect_detail.php?noprospect=<?php echo $noprospect; ?>"><font color="brown"><strong>Prospect</strong></font></a></li>
					  <li class="breadcrumb-item"><a href="new_prospect_detail_more_oil.php?nopracost=<?php echo $nopracost; ?>"><font color="brown"><strong>Detail Prospect</strong></font></a></li>
		              <li class="breadcrumb-item active"><font color="brown"><strong>Form Spec</strong></font></li>  
		            </ol>
		          </div>
				  <div class="col-sm-12">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item active"><font color="black"><strong>Enginneer: <?php echo $_SESSION["namalengkap"] ?></strong></font></li>  
		            </ol>
		          </div>
		        </div>
		      </div><!-- /.container-fluid -->
		    </section>


		<form action="" method="post" class="form-horizontal" name='orangtua'>
			           <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card" >
          <div class="card-body" >

            <div class="row">

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">NO PROSPECT </font></label>
                    <input type="text" Readonly name="noprospect" autofocus  class="form-control" value="<?php echo $noprospect; ?>"/>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">NO SUB PROSPECT </font></label>
                    <input type="text" Readonly name="nopracost" autofocus  class="form-control" value="<?php echo $nopracost;  ?> "/>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">TAHUN PROSPECT</font></label>
                    <input type="text" readonly name="tahun" autofocus  class="form-control" value="<?php echo $maduDb['tahun'];  ?>"/>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">SALES</font></label>
                    <input type="text" Readonly name="sales"  class="form-control" value= "<?php echo $maduDb['sales']; ?>"/>
                  </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">SEGMENT PENJUALAN</font></label>
                    <input type="text" Readonly name="segment" autofocus  class="form-control" value="<?php echo $maduDb['segment']; ?>" />
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">SUB SEGMENT</font></label>
                    <input type="text" Readonly name="sub_segment" autofocus  class="form-control" value="<?php echo $maduDb['sub_segment']; ?>" />
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">PROJECT</font></label>
                    <input type="text" name="project" readonly  class="form-control" value="<?php echo $maduDb['project']; ?>" />
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font color="blue">STATUS</font></label>
                    <input type="text" name="priority" readonly class="form-control" value="<?php echo $maduDb['priority']; ?>" />
                  </div>
              </div>
              
            </div>
			<div class="card-footer" style="background-color:grey;"></div>
          </div>
			
            <!--  <div class="card-footer" style="background-color:black;"></div>-->
			 
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>

      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-body">
            
            <div class="row">

              <div class="col-md-12">
                  <div class="form-group">
                    <label><font size="5" color="blue">1. TYPE  <?php echo $oilDb['type_cooling']; ?> </font>: Self Cooled / <?php echo $oilDb['service_condition']; ?> use / Step Up / Step Down / <?php echo $oilDb['type_trafo']; ?>  Distribution Transformer</label>
                  </div>
              </div>

            </div>


            <div class="form-group row">
            	<label class="col-sm-7 col-form-label"><font size="5" color="blue">2. SERVICE CONDITION </font>: The transformer will be installed at the altitudes :</label>
            	<div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="altitude" readonly class="form-control" size="5" value="<?php echo $oilDb['altitude']; ?>" />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>meters</strong></span>
                    </div>
                </div>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-sm-7 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and the maximum ambient temperature does not exceed:</label>
              <div class="col-sm-3">
              	<div class="input-group mb-6">
                    <input type="text" name="ambient_temp" readonly class="form-control" size="5" value="<?php echo $oilDb['ambient_temp']; ?> " />
                    <div class="input-group-append" >
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>celcius</strong></span>
                    </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-7 col-form-label"><font size="5" color="blue">3. STANDARD</font> : The transformer is designed, manufactured tested and tolerance in accordance with :</label>
              <div class="col-sm-3">
              	<div class="input-group mb-6">
                    <input type="text"  name="standarisasi" readonly class="form-control" value="<?php echo $oilDb['standarisasi']; ?> " />
                </div>     
              </div>
            </div>

          </div>
          <!-- /.card-body -->

         <!-- <div class="card-footer" style="background-color:black;"></div>-->

        </div>
        <!-- /.card -->

      </section>

      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-body">
            
            <div class="row">

              <div class="col-md-3">
                  <div class="form-group">
                    <label><font size="5" color="blue">4. RATING:</font></label>
                  </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-3">
                <label>4. 1.&nbsp;&nbsp;  Number Of Phase :</label>
                <div class="input-group mb-3">
                    <input type="text" name="no_phase" readonly class="form-control" value="<?php echo $oilDb['no_phase']; ?> " />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>phase</strong></span>
                    </div>						
                </div>
              </div>
				  <div class="col-md-4">
				  </div>
              <div class="col-md-3">
                <label>4. 2.&nbsp;&nbsp;  Frequency:</label>
			
                <div class="input-group mb-3">
                    <input type="text" name="frequency" readonly class="form-control" value="<?php echo $oilDb['frequency']; ?> " />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Hz&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
                </div>
              </div>
			  </div>
			  
			 <div class="row">
              <div class="col-md-3">
                <label>4. 3.&nbsp;&nbsp;  Primary Voltage:</label>
                <div class="input-group mb-3">
                    <input type="text" name="primary_voltage" readonly class="form-control" value="<?php echo $oilDb['primary_voltage']; ?> " />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;volt&nbsp;&nbsp;</strong></span>
                    </div>
                </div>
              </div>
					<div class="col-md-4">
				    </div>
              <div class="col-md-3">
                <label>4. 4.&nbsp;&nbsp;  Secondary Voltage:</label>
                <div class="input-group mb-3">
                    <input type="text" name="secondary_voltage" readonly class="form-control" value="<?php echo $oilDb['secondary_voltage']; ?> " />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;volt&nbsp;&nbsp;</strong></span>
                    </div>
                </div>
              </div>
				

            </div>

            <div class="row">

              <div class="col-md-3">
                <label>4. 5.&nbsp;&nbsp;  Rate Primary Current:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="rate_primary_current" readonly value="<?php echo $nilai_rate11 ?>" placeholder="Rate Primary Current" autofocus required >
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: BLUE; background-color: white;"><strong><?php echo $oilDb['type_cooling1']; ?></strong></span>
                    </div>
                </div>	
					<?php
					if ($oilDb['type_cooling2'] == "") {	
					echo '<div class="input-group mb-3" style="visibility: hidden;  display:none;">
                    <input type="number" class="form-control" name="rate_primary_current2" readonly value=""   placeholder="Rate Primary Current" autofocus required >
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: BLUE; background-color: white;"><strong>"'.$oilDb['type_cooling2'].'"</strong></span>
                    </div>
					</div>';
					} else{
					echo '<div class="input-group mb-3">
                    <input type="number" class="form-control" name="rate_primary_current2" readonly value="'.$nilai_rate12.'"   placeholder="Rate Primary Current" autofocus required >
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: BLUE; background-color: white;"><strong>'.$oilDb['type_cooling2'].'</strong></span>
                    </div>
					</div>';
					}
					?>
              </div>
			  
				<div class="col-md-2">
				<label>Winding Connection:</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="winding_connection1"  value="<?php echo $oilDb['winding_connection_primary']; ?>" autofocus required >
                </div>
			</div>
			<div class="col-md-2">
			</div>
			
			 <div class="col-md-3">
                <label>4. 6.&nbsp;&nbsp;  Rate Secondary Current:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="rate_secondary_current" readonly value="<?php echo $nilai_rate21 ?>" autofocus required >
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: blue; background-color: white;"><strong><?php echo $oilDb['type_cooling1']; ?></strong></span>
                    </div>
                </div>
				<?php
					if ($oilDb['type_cooling2'] == "") {	
					echo '<div class="input-group mb-3" style="visibility: hidden;  display:none;">
                    <input type="number" class="form-control" name="rate_secondary_current2" readonly value=""   placeholder="Rate secondary Current" autofocus required >
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: BLUE; background-color: white;"><strong>"'.$oilDb['type_cooling2'].'"</strong></span>
                    </div>
					</div>';
					} else{
					echo '<div class="input-group mb-3">
                    <input type="number" class="form-control" name="rate_secondary_current2" readonly value='.$nilai_rate22.'  placeholder="Rate Secondary Current" autofocus required >
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: BLUE; background-color: white;"><strong>'.$oilDb['type_cooling2'].'</strong></span>
                    </div>
					</div>';
					}
					?>
			</div>
			<div class="col-md-2">
				<label>Winding Connection:</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="winding_connection2"   value="<?php echo $oilDb['winding_connection_secondary']; ?>" autofocus required >
                </div>
			</div>
			
			 </div>
			 </br>
			 
         

         <div class="form-group row">
              <div class="col-md-3">
                <label>4. 7.&nbsp;&nbsp;&nbsp;  Rate Capacity :</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-2">
                    <input type="number" name="rate_capacity" id="rate" class="form-control" readonly value=<?php echo $oilDb['rate_capacity']; ?>  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: blue; background-color: white;" ><strong><?php echo $oilDb['type_cooling1']; ?></strong></span>
                    </div>
                </div>
				</div>
				<div class="col-md-1"> </div>
				<?php
				 if ($oilDb['type_cooling2'] == "N/A" or $oilDb['type_cooling2']== "") {	
				 echo '<div class="col-md-3" style="visibility: hidden;  display:none;">
				  <div class="input-group mb-3">
                    <input type="number" name="rate_capacityx" id="rate2" class="form-control" readonly value="'.$oilDb['rate_capacityx'].'" />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: blue; background-color: white;" ><strong> '.$oilDb['type_cooling2'].' </strong></span>
                    </div>
                </div>
				 </div>'; }
			  else {
				   echo '<div class="col-md-3" >
				  <div class="input-group mb-3">
                    <input type="number" name="rate_capacityx" id="rate2" class="form-control" readonly value="'.$oilDb['rate_capacityx'].'" />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
					<div class="input-group-append">
                      <span class="input-group-text" style="color: blue; background-color: white;" ><strong> '.$oilDb['type_cooling2'].' </strong></span>
                    </div>
                </div>
				 </div>';
				  
			  }
			   ?>
		 </div>
			
        <div class="row">
            <div class="col-md-4">
                  <div class="form-group">
                    <label><font color="brown">Incase of double primary voltage:</font></label>
                    <input type="hidden"  readonly class="form-control"  />
                  </div>
              </div>
			 <div class="col-md-3">
			 </div>
              <div class="col-md-4">
                  <div class="form-group">
                    <label><font color="brown">Capacity will be:</font></label>
                    <input type="hidden" readonly class="form-control"   />
                  </div>
              </div>
            </div>

            <div class="form-group row">
			 <div class="col-md-2">              
			 </div>
              <div class="col-md-1">
                <label>At :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-3">
                    <input type="number" name="incase_primary_voltage1" value="<?php echo $oilDb['incase_primary_voltage1']; ?>" class="form-control"  required  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;KV&nbsp;</strong></span>
                    </div>
              </div>
             </div>
			 <div class="col-md-3">              
			 </div>
              <div class="col-md-2">
                <label>Rate Capacity :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-2">
                    <input type="number" name="rate_capacity_primary1" value="<?php echo $oilDb['rate_capacity1']; ?>" class="form-control"  required  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
              </div>
             </div>
			 </div>
			 <div class="form-group row">
			  <div class="col-md-2">              
			 </div>
              <div class="col-md-1">
                <label>At :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-3">
                    <input type="number" name="incase_primary_voltage2"  value="<?php echo $oilDb['incase_primary_voltage2']; ?>"  class="form-control"  required  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;KV&nbsp;</strong></span>
                    </div>
              </div>
             </div>
			   <div class="col-md-3">              
			   </div>
              <div class="col-md-2">
                <label>Rate Capacity :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-2">
                    <input type="number" name="rate_capacity_primary2"  value="<?php echo $oilDb['rate_capacity2']; ?>" class="form-control" required   />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
              </div>
             </div>
			 </div>
			 
			 <div class="row">
            <div class="col-md-4">
                  <div class="form-group">
                    <label><font color="brown">Incase of double Secondary voltage:</font></label>
                    <input type="hidden"  readonly class="form-control"  />
                  </div>
              </div>
			 <div class="col-md-3">
			 </div>
              <div class="col-md-4">
                  <div class="form-group">
                    <label><font color="brown">Capacity will be:</font></label>
                    <input type="hidden"   readonly class="form-control"   />
                  </div>
              </div>
            </div>

            <div class="form-group row">
			 <div class="col-md-2">              
			 </div>
              <div class="col-md-1">
                <label>At :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-3">
                    <input type="number" name="incase_secondary_voltage1"  value="<?php echo $oilDb['incase_secondary_voltage1']; ?>"   class="form-control" required   />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;KV&nbsp;</strong></span>
                    </div>
              </div>
             </div>
			 <div class="col-md-3">              
			 </div>
              <div class="col-md-2">
                <label>Rate Capacity :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-2">
                    <input type="number" name="rate_capacity_secondary1" value="<?php echo $oilDb['rate_capacity3']; ?>"  class="form-control"  required  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
              </div>
             </div>
			 </div>
			 <div class="form-group row">
			  <div class="col-md-2">              
			 </div>
              <div class="col-md-1">
                <label>At :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-3">
                    <input type="number" name="incase_secondary_voltage2"  value="<?php echo $oilDb['incase_secondary_voltage2']; ?>"  class="form-control" required   />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>&nbsp;KV&nbsp;</strong></span>
                    </div>
              </div>
             </div>
			   <div class="col-md-3">              
			   </div>
              <div class="col-md-2">
                <label>Rate Capacity :</label>
			 </div>
			 <div class="col-md-2">
              <div class="input-group mb-2">
                    <input type="number" name="rate_capacity_secondary2" value="<?php echo $oilDb['rate_capacity4']; ?>" class="form-control"  required  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
              </div>
             </div>
			 </div>
			 
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">4. 8.&nbsp;&nbsp;&nbsp;Additional Taps on High Voltage :</label>
              <div class="col-sm-3">
                <input type="text" name="vektor_group" readonly class="form-control" value="<?php echo $notap; ?> " Taps />
              </div>

              <div class="col-sm-6">
                <input type="text" name="add_tap" value="<?php echo $oilDb['add_tap']; ?>" class="form-control"  />
              </div>
            </div>
			<!--<div class="card-footer" style="background-color:black;"></div>-->
			
            <div class="form-group row">
              <label class="col-md-10 col-form-label"><font size="5" color="blue">5.&nbsp;POLARITY AND PHASOR RELATIONSHIP </font>: The transformer will be subtractive polarity and phasor relationship will be :</label>
              <div class="col-md-2">
                <input type="text" name="vektor_group" readonly class="form-control" value="<?php echo $oilDb['vektor_group']; ?> " />
              </div>
            </div>
			<div class="row">
              <div class="col-md-3">
              </div>

              <div class="col-md-3">
                <label>HV Winding :</label>
              </div>

              <div class="col-md-3">
                <label>LV Winding</label>
              </div>

            </div>
    
			
            <div class="form-group row">
              <div class="col-md-3">
                <label>5.1.&nbsp;&nbsp;&nbsp;&nbsp;Winding Material</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="hv_winding"  class="form-control" readonly value="<?php echo $hv_winding; ?>" >
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="lv_winding"  class="form-control" value="<?php echo $lv_winding; ?>" readonly >
                </div>
              </div>

            </div>

            </div>

          </div>
          <!--<div class="card-footer" style="background-color:black;"></div>-->
       
      </section>

      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-body">

            <div class="row">

              <div class="col-md-6">
                  <div class="form-group">
                    <label><font size="5" color="blue">6.&nbsp;ELECTRIC PERFORMANCE </font> :</label>
                    <input type="hidden" name="primary_voltage_hidden" readonly class="form-control"  />
                  </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-3">
              </div>

              <div class="col-md-3">
                <label>Primary Voltage :</label>
              </div>

              <div class="col-md-3">
                <label>Secondary Voltage :</label>
              </div>

            </div>
		

            <div class="form-group row">
              <div class="col-md-3">
                <label>6.1.&nbsp;&nbsp;&nbsp;&nbsp;Highest System Voltage :</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="hsv_primary"  value="<?php echo $oilDb['hsvp']; ?>" placeholder="Highest System Voltage Primary"class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="hsv_secodary" value="<?php echo $oilDb['hsvs'];?>" placeholder="Highest System Voltage Secondary" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="form-group row">
              <div class="col-md-3">
                <label>6.2.&nbsp;&nbsp;&nbsp;&nbsp;Impulse Test Voltage :</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="impulse_voltage_primary" value="<?php echo $oilDb['impulse_vp']; ?>" placeholder="Impulse Primary" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="impulse_voltage_secondary" value="<?php echo $oilDb['impulse_vs']; ?>" placeholder="Impulse Secondary"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="form-group row">
              <div class="col-md-3">
                <label>6.3.&nbsp;&nbsp;&nbsp;&nbsp;Applied Test Voltage During 1 Minute:</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="applied_voltage_primary" value="<?php echo $oilDb['applied_test1']; ?>" placeholder="Applied Test Voltage Primary" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="text" name="applied_voltage_secondary" value="<?php echo $oilDb['applied_test2']; ?>"  placeholder="Applied Test Voltage Secondary" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-3">
                <label>6.4.&nbsp;&nbsp;&nbsp;&nbsp;Induced Voltage Test :</label>
              </div>

              <div class="col-md-6">
                <label>Apply 2 times of the rate voltage at 200 cycles per second for 30 second</label>
              </div>
            </div>

            <div class="row">

              <div class="col-md-3">
                <label>6.5.&nbsp;&nbsp;&nbsp;&nbsp;Temperature Rise :</label>
              </div>

              <div class="col-md-6">
                <label>The winding temperature rise measured by resistance method will not exceed</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-3">
                    <input type="text" name="temp_rise" readonly value="<?php echo ($oilDb['temp_rise']); ?>" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong><sup>o</sup>C</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">
              
              <div class="col-md-3">

              </div>

              <div class="col-md-6">
                <label>and the the thermal class will not exceed</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-3">
                    <input type="text" name="insulation" readonly value="<?php echo ($oilDb['insulation_thermal']); ?>"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong><sup>o</sup>C</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-3">
                <label>6.6.&nbsp;&nbsp;&nbsp;&nbsp;Losses at Rated Voltage :</label>
              </div>

              <div class="col-md-1">
                <label>Primary</label>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="lose_primary"  readonly  class="form-control" value="<?php echo $oilDb['loses_vp']; ?>"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-1">
                <label>Secondary</label>
              </div>
              
              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="lose_secondary" readonly  class="form-control" value="<?php echo $oilDb['loses_vs']; ?>" />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">
			  <div class="col-md-1">                
			  </div>
              <div class="col-md-2">
                <label>No Load Losses</label>
              </div>

              <div class="col-md-1">

              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="noload_loses" id="batu1" onkeyup="sumi();" value="<?php echo $oilDb['noload_loses']; ?>"  placeholder="No load losses" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>Watt</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">
			  <div class="col-md-1">                
			  </div>
              <div class="col-md-1">
                <label>Load Losses</label>
              </div>

              <div class="col-md-1">
                <div class="input-group mb-1">
                    <input type="text" name="temp_load_loses" value="<?php echo $oilDb['temp_load_loses']; ?>"  required class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong><sup>o</sup>C</strong></span>
                    </div>
                </div>
              </div>
			  <div class="col-md-1">

              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="load_loses" id="batu2" onkeyup="sumi();" value="<?php echo $oilDb['load_loses']; ?>"  placeholder="Load Losses"   class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>Watt</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">
			  <div class="col-md-1">                
			  </div>
              <div class="col-md-1">
                <label>Total Losses</label>
              </div>

              <div class="col-md-2">

              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="total_losses" value="<?php echo $oilDb['total_loses']; ?>"  readonly id="batu3" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>Watt</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-4">
                <label>6.7.&nbsp;&nbsp;&nbsp;&nbsp;Efficiency at % Rated Capacity :</label>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number"  name="eff1" id="ef1" onkeyup="sum();" value="<?php echo $oilDb['effeciency1']; ?>"  placeholder="Effeciency 1" class="form-control"  />
				
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="eff2" id="ef2" onkeyup="sum();" value="<?php echo $oilDb['effeciency2']; ?>"  placeholder="Effeciency 2"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="eff3"  id="ef3" onkeyup="sum();" value="<?php echo $oilDb['effeciency3']; ?>" placeholder="Effeciency 3"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="eff4" id="ef4" onkeyup="sum();" value="<?php echo $oilDb['effeciency4']; ?>" placeholder="Effeciency 4"   class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

            </div>


            <div class="row">

			 <div class="col-md-1">                
			 </div>
			<div class="col-md-1">
                <label>at P.F.</label>
              </div>

              <div class="col-md-1">
                <div class="input-group mb-2">
                    <input type="number" name="pf1" id="pf1" step="any" onkeyup="sum();" value="<?php echo $oilDb['pf1']; ?>" placeholder="PF 1" class="form-control"  />
                </div>
              </div>

              <div class="col-md-1">
              </div>
            

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf1a" id="pf1a"  value="<?php echo $oilDb['pf1a']; ?>" readonly class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf1b"  id="pf1b" readonly value="<?php echo $oilDb['pf1b']; ?>"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf1c" id="pf1c" readonly value="<?php echo $oilDb['pf1c']; ?>" placeholder="% PF 1 C"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

               <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf1d" id="pf1d" readonly value="<?php echo $oilDb['pf1d']; ?>" placeholder="% PF 1 D"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

               <div class="col-md-1">                
			   </div>
			  <div class="col-md-1">
                <label>at P.F.</label>
              </div>

              <div class="col-md-1">
                <div class="input-group mb-2">
                    <input type="text" name="pf2" id="pf2" onkeyup="sum();" value="<?php echo $oilDb['pf2']; ?>" placeholder="PF 2" class="form-control"  />
                </div>
              </div>
			  <div class="col-md-1">
              </div>
            
              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf2a" id="pf2a" readonly value="<?php echo $oilDb['pf2a']; ?>" placeholder="% PF 2 A" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf2b" id="pf2b" readonly  value="<?php echo $oilDb['pf2b']; ?>" placeholder="% PF 2 B"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf2c" id="pf2c" readonly value="<?php echo $oilDb['pf2c']; ?>" placeholder="% PF 2 C"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf2d" id="pf2d" readonly value="<?php echo $oilDb['pf2d']; ?>" placeholder="% PF 2 D"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-4">
                <label>6.8.&nbsp;&nbsp;&nbsp;&nbsp;Exciting Current / Off load Current at Nominal Voltage:</label>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="text" name="existing_current_nominal"  value="<?php echo $oilDb['percent_existing_current']; ?>" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-4">
                <label>6.9.&nbsp;&nbsp;&nbsp;&nbsp;Percent Impedance</label>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="text" name="impedance" id="impedance" onkeyup="sum();" value="<?php echo $oilDb['percent_impedance']; ?>"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-4">
                <label>6.10.&nbsp;&nbsp;Voltage Regulation: </label>
              </div>
			</div>
			<div class="row">

			 <div class="col-md-1">                
			 </div>
			<div class="col-md-1">
                <label>at P.F.</label>
            </div>

              <div class="col-md-1">
                <div class="input-group mb-2">
                    <input type="number" name="pf3" id="pf3" value="<?php echo $oilDb['voltage_regulation1']; ?>"  readonly class="form-control"  />
                </div>
              </div>

              <div class="col-md-1">
              </div>
            

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf3a" id="pf3a" value="<?php echo $oilDb['pf3a']; ?>"  placeholder="pf3a" readonly class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>
				<div class="col-md-1">
             	</div>
			  	<div class="col-md-1">
                <label>Resistance:</label>
				</div>

              <div class="col-md-2"> 
			   <div class="input-group mb-1">
                    <input type="number" name="resist1" id="r1" value="<?php echo $oilDb['r1']; ?>" placeholder="Resistance" readonly  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>			  
              </div>

            </div>

            <div class="row">

               <div class="col-md-1">                
			   </div>
			  <div class="col-md-1">
                <label>at P.F.</label>
              </div>

              <div class="col-md-1">
                <div class="input-group mb-2">
                    <input type="number" name="pf4" id="pf4" value="<?php echo $oilDb['voltage_regulation2']; ?>" readonly class="form-control"  />
                </div>
              </div>
			  <div class="col-md-1">
              </div>
            
              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="pf4a" id="pf4a" value="<?php echo $oilDb['pf4a']; ?>" placeholder="pf4a" readonly  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>
			  	<div class="col-md-1">
             	</div>
			   <div class="col-md-1">
                <label>Reactance:</label>
				</div>

              <div class="col-md-2"> 
			   <div class="input-group mb-1">
                    <input type="number" name="react1" id="r2" value="<?php echo $oilDb['r2']; ?>" placeholder="Reactance" readonly class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>
		  
          <!-- /.card-body -->

        </div>
        <!-- /.card -->

      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <label><font size="5" color="blue">7.&nbsp;&nbsp;ACCESSORIES </font>: The transformer will be furnished with all necessary accessories as follow :</label>
              </div>
            </div>

            <div class="row">
			<div class="col-md-1">
            </div>
              <div class="col-md-6">
                <h5><FONT COLOR='BLUE'><STRONG>GENERAL ACCESORIES</STRONG></FONT></h5>
              </div>
            </div>

             <div class="row">
					<div class="col-md-1"></div>
			   		<div class="col-md-1">
               			 <label>HV Terminal </label>
             		</div>
			  		<div class="col-md-2">   
			  			 <input type="hidden" name="hv_terminal" value="HV Terminal"  class="form-control"  />    
              		</div>
			 
			  		<div class="col-md-6">   
			  			 <input type="text" name="hv_terminal_ket" value="<?php echo $oilDb["hv_terminal_ket"]; ?>" class="form-control"  />    
             		</div>
            </div></br>
			
			<!--2-->
			<div class="row">
					<div class="col-md-1"></div>
			   		<div class="col-md-1">
              			  <label>LV Terminal </label>
             		</div>           
			 
			 		<div class="col-md-2">   
			  			<input type="hidden" name="lv_terminal" value="LV Terminal"  class="form-control"  />    
             		</div>
			 
			 		<div class="col-md-6">   
			 			<input type="text" name="lv_terminal_ket" value="<?php echo $oilDb["lv_terminal_ket"]; ?>"  class="form-control"  /> 
								 
             		</div>
            </div></br>
		  
			<!--3-->
			<div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-1">
                <label>TRANSFORMER BASE </label>
              </div>
              <div class="col-md-2">
                <select name="trafo_base"  required class="form-control" >              
                  <option value="Roller Type">Roller Type</option>                
                  <option value="Skid Type">Skid Type</option>
                </select>               
              </div>
			  <div class="col-md-2">
			     <input type="text"  value="<?php echo $oilDb['tb']; ?>" readonly class="form-control"  />
			  </div>
			  <div class="col-md-6">   
			  <input type="text" name="trafo_base_ket" value="<?php echo $oilDb['tb_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
              </div>
            </div></BR>
			<!--4-->
			<div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-1">
                <label>NAME PLATE </label>
              </div>
              <div class="col-md-2">
                <select name="name_plate"  required class="form-control" >            
                  <option value="Gravoply Type">Gravoply Type</option>                
                  <option value="Stainless steel Type">Stainless steel Type</option>
                </select>               
              </div>
			  <div class="col-md-2">
			     <input type="text"  value="<?php echo $oilDb['name_plate']; ?>" readonly class="form-control"  />
			  </div>
			  <div class="col-md-6">   
			  <input type="text" name="name_plate_ket" value="<?php echo $oilDb['name_plate_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
              </div>
            </div></br>
			<!--5-->
			
			<div class="row">
				  <div class="col-md-1"></div>
			 	  <div class="col-md-2">
               			 <label>ANTI VIBRATION PAD </label>
             	  </div>             
			 	  <div class="col-md-2">   
			  			<input type="hidden" name="anti_vibration" value="Anti Vibration Pad"  class="form-control"  />    
             	  </div>
           	</div></br>
		  
			<div class="row">
				  <div class="col-md-1"></div>
			 	  <div class="col-md-2">
                		<label>CONNECTING ROD</label>
             	  </div>             
			 	  <div class="col-md-2">   
			  			<input type="hidden" name="connecting_rod" value="Connecting Rod"  class="form-control"  />    
             	  </div>
            </div></br>
		
		
			<!--11-->
			<div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-2">
                <label>EARTHING THERMINAL </label>
              </div>             
			  <div class="col-md-2">   
			  <input type="hidden" name="earthing_therminal" value="Earthing Therminal"  class="form-control"  />    
              </div>
            </div></br>
			<!-- 7-->
			<div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-1">
                <label>LIFTING LUG </label>
              </div>             
			  <div class="col-md-2">   
			  <input type="hidden" name="lifting_lug" value="Lifting Lug"  class="form-control"  />    
              </div>
            </div>
			</br>
			<!-- 7-->
			
			<div class="row">
			<div class="col-md-1">
            </div>
              <div class="col-md-6">
                <h5><FONT COLOR='BLUE'><STRONG>SPECIAL ACCESORIES OF TRANSFORMER</STRONG></FONT></h5>
              </div>
            </div>

     
	  
      <?php
        if ($oilDb['enclosure'] == "N/A" or $oilDb['enclosure'] == "") {			
        echo '
      <div class="row" style="visibility: hidden;  display:none;">
        <div class="col-md-1"> 
                </div>
        <div class="col-md-3">   
          <input type="text" value="ECLOSURE" readonly class="form-control"  />   
                </div>
        <div class="col-md-2">   
          <input type="text" name="cable_box"  value="'.$oilDb['enclosure'].'" readonly class="form-control"  />    
                </div>
        <div class="col-md-6">   
          <input type="text" name="cable_box_ket"  placeholder="Keterangan"  class="form-control"  />    
        </div>
      </div>';
      }else{
        echo '
      <div class="row">
        <div class="col-md-1"> 
                </div>
        <div class="col-md-3">   
          <input type="text" value="ENCLOSURE" readonly class="form-control"  />    
                </div>
        <div class="col-md-2">   
          <input type="text" name="cable_box"  value="'.$oilDb['enclosure'].'" readonly class="form-control"  />    
                </div>
        <div class="col-md-6">   
          <input type="text" name="cable_box_ket"  placeholder="Keterangan" value="'.$oilDb['enclosure_ket'].'"  class="form-control"  />    
        </div>
      </div>';
      }
      ?>
	  <?php
        if ($oilDb['dig_thermo'] == "NO" or $oilDb['dig_thermo'] == "") {			
        echo '
      <div class="row" style="visibility: hidden;  display:none;">
        <div class="col-md-1"> 
                </div>
        <div class="col-md-3">   
          <input type="text" value="DIGITAL THERMOMETER" readonly class="form-control"  />   
                </div>
        <div class="col-md-2">   
          <input type="text" name="dig_thermo"  value="'.$oilDb['dig_thermo'].'" readonly class="form-control"  />    
                </div>
        <div class="col-md-6">   
          <input type="text" name="dig_thermo_ket"  placeholder="Keterangan"  class="form-control"  />    
        </div>
      </div>';
      }else{
        echo '
      <div class="row">
        <div class="col-md-1"> 
                </div>
        <div class="col-md-3">   
          <input type="text" value="DIGITAL THERMOMETER" readonly class="form-control"  />    
                </div>
        <div class="col-md-2">   
          <input type="text" name="dig_thermo"  value="'.$oilDb['dig_thermo'].'" readonly class="form-control"  />    
                </div>
        <div class="col-md-6">   
          <input type="text" name="dig_thermo_ket"  placeholder="Keterangan" value="'.$oilDb['dig_thermo_ket'].'"  class="form-control"  />    
        </div>
      </div>';
      }
      ?>
	   <?php
        if ($oilDb['cool_fans'] == "NO" or $oilDb['cool_fans'] == "") {			
        echo '
      <div class="row" style="visibility: hidden;  display:none;">
        <div class="col-md-1"> 
                </div>
        <div class="col-md-3">   
          <input type="text" value="COOLING FANS" readonly class="form-control"  />   
                </div>
        <div class="col-md-2">   
          <input type="text" name="cool_fans"  value="'.$oilDb['cool_fans'].'" readonly class="form-control"  />    
                </div>
        <div class="col-md-6">   
          <input type="text" name="cool_fans_ket"  placeholder="Keterangan"  class="form-control"  />    
        </div>
      </div>';
      }else{
        echo '
      <div class="row">
        <div class="col-md-1"> 
                </div>
        <div class="col-md-3">   
          <input type="text" value="COOLING FANS" readonly class="form-control"  />    
                </div>
        <div class="col-md-2">   
          <input type="text" name="cool_fans"  value="'.$oilDb['cool_fans'].'" readonly class="form-control"  />    
                </div>
        <div class="col-md-6">   
          <input type="text" name="cool_fans_ket"  placeholder="Keterangan" value="'.$oilDb['cool_fans_ket'].'"  class="form-control"  />    
        </div>
      </div>';
      }
      ?>
	
      <?php
        if ($oilDb['tap_changer'] == "N/A" or $oilDb['tap_changer'] == "") {			
			
        echo '
      <div class="row" style="visibility: hidden;  display:none;">
        <div class="col-md-1"> 
         </div>
        <div class="col-md-3">   
          <input type="text"  value="TAP CHANGER" readonly   class="form-control"  />    
                </div>
        <div class="col-md-2">   
          <input type="text" name="tap_changer" value="'.$oilDb['tap_changer'].'" readonly class="form-control"  />    
                </div>
        <div class="col-md-6">   
          <input type="text" name="tap_changer_ket"  placeholder="Keterangan"  class="form-control"  />    
        </div>
      </div>';
      }else{
        echo '
      <div class="row">
         <div class="col-md-1"> 
         </div>
        <div class="col-md-3">   
          <input type="text"  value="TAP CHANGER" readonly   class="form-control"  />    
         </div>
        <div class="col-md-2">   
          <input type="text" name="tap_changer" value="'.$oilDb['tap_changer'].'" readonly class="form-control"  />    
        </div>
        <div class="col-md-6">   
          <input type="text" name="tap_changer_ket"  placeholder="Keterangan" value="'.$oilDb['tap_changer_ket'].'" class="form-control"  />    
        </div>
      </div>';
      }
      ?>
	 

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
            <input type="text"  value="TERMINAL CONTROL BOX" readonly  class="form-control"  />    
          </div>  
          <div class="col-md-1">
            <select name="terminal_control_box" id="ddlModel4_1"  class="form-control" >   
			   <option value=""></option>
              <option value="NO">NO</option>
			 <option value="YES">YES</option> 
            </select>               
          </div>
		<div class="col-md-1">   
          <input type="text" id="tm1" readonly name="terminal_control_box_ok" value="<?php echo $oilDb['terminal_control_box']; ?>" class="form-control"  />    
        </div>  
          <div class="col-md-6">   
          <input type="text" name="terminal_control_box_ket" id="txtOther4_1" value="<?php echo $oilDb['terminal_control_box_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
            <input type="text"  value="SURGE ARRESTER" readonly  class="form-control"  />    
          </div>  
          <div class="col-md-1">
            <select name="surge_arrester" id="ddlModel4_2"  class="form-control" >   
			   <option value=""></option>
			  <option value="NO">NO</option>
              <option value="YES">YES</option> 
            </select>               
          </div>
		  <div class="col-md-1">   
          <input type="text" id="tm1" readonly name="surge_arrester_ok" value="<?php echo $oilDb['surge_arrester']; ?>" class="form-control"  />    
        </div>  
          <div class="col-md-6">   
          <input type="text" name="surge_arrester_ket" id="txtOther4_2"  value="<?php echo $oilDb['surge_arrester_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
            <input type="text"  value="NEUTRAL CT" readonly  class="form-control"  />    
          </div>  
          <div class="col-md-1">
            <select name="neutral_ct" id="ddlModel4_3"  class="form-control" >            
			 <option value=""></option>
			<option value="NO">NO</option>
			 <option value="YES">YES</option> 
            </select>               
          </div>
		   <div class="col-md-1">   
          <input type="text" id="tm1" readonly name="neutral_ct_ok" value="<?php echo $oilDb['neutral_ct']; ?>" class="form-control"  />    
        </div> 
          <div class="col-md-6">   
          <input type="text" name="neutral_ct_ket" id="txtOther4_3" value="<?php echo $oilDb['neutral_ct_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
            <input type="text"  value="DIFFERENTIAL CT" readonly  class="form-control"  />    
          </div>  
          <div class="col-md-1">
            <select name="dct" id="ddlModel4_4"  class="form-control" >  
			  <option value=""></option>
			 <option value="NO">NO</option>
              <option value="YES">YES</option>  
            </select>               
          </div>
		<div class="col-md-1">   
          <input type="text" id="tm1" readonly name="dct_ok"  value="<?php echo $oilDb['dct']; ?>" class="form-control"  />    
        </div>
          <div class="col-md-6">   
          <input type="text" name="dct_ket" id="txtOther4_4"  value="<?php echo $oilDb['dct_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

     

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris6" id="baris6" value="<?php echo $oilDb['baris6']; ?>" placeholder="6"  class="form-control"  />    
                </div>
          <div class="col-md-1">
            <select name="baris6a" id="ddlModel4_14"  class="form-control" >             
              <option value=""></option>
			 <option value="NO">NO</option>
			 <option value="YES">YES</option>  
            </select>               
          </div>
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly name="baris6a_ok"  value="<?php echo $oilDb['baris6a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   		  
          <input type="text" name="baris6_ket" id="baris6_ket"  value="<?php echo $oilDb['baris6_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris7" id="baris7" value="<?php echo $oilDb['baris7']; ?>" placeholder="7"  class="form-control"  />    
                </div>
          <div class="col-md-1">
            <select name="baris7a" id="ddlModel4_15" class="form-control" >           
              <option value=""></option>
			 <option value="NO">NO</option>
			 <option value="YES">YES</option> 
            </select>               
          </div>
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly name="baris7a_ok"  value="<?php echo $oilDb['baris7a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris7_ket" id="baris7_ket"  value="<?php echo $oilDb['baris7_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>
	  
      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris8" id="baris8" value="<?php echo $oilDb['baris8']; ?>" placeholder="8"  class="form-control"  />    
                </div>
          <div class="col-md-1">
            <select name="baris8a" id="ddlModel4_16"  class="form-control" >           
               <option value=""></option>
			  <option value="NO">NO</option>
			  <option value="YES">YES</option>  
            </select>               
          </div>
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly name="baris8a_ok" value="<?php echo $oilDb['baris8a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris8_ket" id="baris8_ket"  value="<?php echo $oilDb['baris8_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>
	  <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris9" id="baris9" value="<?php echo $oilDb['baris9']; ?>" placeholder="8"  class="form-control"  />    
                </div>
          <div class="col-md-1">
            <select name="baris9a" id="ddlModel4_17"  class="form-control" >           
               <option value=""></option>
			  <option value="NO">NO</option>
			  <option value="YES">YES</option>  
            </select>               
          </div>
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly name="baris9a_ok" value="<?php echo $oilDb['baris9a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris9_ket" id="baris9_ket"  value="<?php echo $oilDb['baris9_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>
	   <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris10" id="baris10" value="<?php echo $oilDb['baris10']; ?>" placeholder="8"  class="form-control"  />    
                </div>
          <div class="col-md-1">
            <select name="baris10a" id="ddlModel4_18"  class="form-control" >           
               <option value=""></option>
			  <option value="NO">NO</option>
			  <option value="YES">YES</option>  
            </select>               
          </div>
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly name="baris10a_ok" value="<?php echo $oilDb['baris10a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris10_ket" id="baris10_ket"  value="<?php echo $oilDb['baris10_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>
	  

      </section>
  <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <label><font size="5" color="blue">8.&nbsp;&nbsp;TRANSFORMER TESTING</font></label>
              </div>
            </div>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-6">
                <h5><FONT COLOR='BLUE'><STRONG>SPECIAL TEST</STRONG></FONT></h5>
				</div>					
            </div>
			<?php
			 if ($oilDb['sp_slt'] == "NO" or $oilDb['sp_slt'] == "") {				  
				echo '<div class="row" style="visibility: hidden;  display:none;">
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="SOUND LEVEL TEST" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text"  name="sp_slt" value="'.$oilDb['sp_slt'].'" readonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="sp_slt_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }
			 else {
				echo '<div class="row" >
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="SOUND LEVEL TEST" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text"  name="sp_slt" value="'.$oilDb['sp_slt'].'" readonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="sp_slt_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }
				 
			?>
			
				
			<?php
			 if ($oilDb['sp_pd'] == "NO" or $oilDb['sp_pd'] == "") {				  
				echo '<div class="row" style="visibility: hidden;  display:none;">
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="PARTIAL DISCHARGER" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text" name="sp_pd" value="'.$oilDb['sp_pd'].'" eadonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="sp_pd_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }
			 else {
				echo '<div class="row" >
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="PARTIAL DISCHARGER" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text" name="sp_pd" value="'.$oilDb['sp_pd'].'" readonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="sp_pd_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }				 
			?>	
			<?php
			 if ($oilDb['sp_zero'] == "NO" or $oilDb['sp_zero'] =="") {				  
				echo '<div class="row" style="visibility: hidden;  display:none;">
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="ZERO SEQUENCE IMPEDANCE)" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text" name="sp_zero"  value="'.$oilDb['sp_zero'].'" eadonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="sp_zero_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }
			 else {
				echo '<div class="row" >
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="ZERO SEQUENCE IMPEDANCE)" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text"  name="sp_zero"  value="'.$oilDb['sp_zero'].'" readonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="sp_zero_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }				 
			?>
					
					
			
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-6">
                <h5><FONT COLOR='RED'><STRONG>TYPE TEST</STRONG></FONT></h5>
				</div>
            </div>
			<?php
			 if ($oilDb['test_temp_rise'] == "NO" or $oilDb['test_temp_rise'] == "") {				  
				echo '<div class="row" style="visibility: hidden;  display:none;">
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="TEMPERATURE RISE" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text" name="test_temp_rise" value="'.$oilDb['test_temp_rise'].'" eadonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="test_temp_rise_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }
			 else {
				echo '<div class="row" >
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="TEMPERATURE RISE" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text" name="test_temp_rise" value="'.$oilDb['test_temp_rise'].'" readonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="test_temp_rise_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }				 
			?>
			<?php
			 if ($oilDb['test_impulse'] =="NO" or $oilDb['test_impulse'] == "") {				  
				echo '<div class="row" style="visibility: hidden;  display:none;">
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="LIGHTNING IMPULSE" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text" name="test_impulse"  value="'.$oilDb['test_impulse'].'" eadonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="test_impulse_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }
			 else {
				echo '<div class="row" >
					<div class="col-md-1"></div>
					<div class="col-md-3">   
						<input type="text"  value="LIGHTNING IMPULSE" readonly  class="form-control"  />    
					</div> 
					<div class="col-md-1">   
						<input type="text" name="test_impulse"  value="'.$oilDb['test_impulse'].'" readonly  class="form-control"  />    
					</div>  
					<div class="col-md-6">   
						<input type="text" name="test_impulse_ket" placeholder="Silakan beri keterangan" class="form-control"  />   
					</div>     
				</div>';
			 }				 
			?>
		  </div>
  </div>	
	  
</div>


<!-- test -->
 <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <label><font size="5" color="blue">9.&nbsp;&nbsp;PAINTING SYSTEM AND COLOR </font> </label>
              </div>
            </div>

          

            <div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-3">
                <label>PAINTING SYSTEM </label>
              </div>
              <div class="col-md-2">
                <select name="painting_system" class="form-control" >               
                  <option value="Painting C2">Painting C2</option>                
                  <option value="Painting C3">Painting C3</option>    
				  <option value="Painting C4">Painting C4</option>    
				  <option value="Painting C5">Painting C5</option>    
                </select>               
              </div> 
			  <div class="col-md-2">   
			  <input type="text" readonly value="<?php echo $oilDb['painting_system']; ?>" placeholder="Keterangan"  class="form-control"  />    
              </div>
			 
			  <div class="col-md-4">   
			  <input type="text" name="painting_system_ket" value="<?php echo $oilDb['painting_system_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
              </div>
            </div>
			
			       <div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-3">
                <label>PAINTING COLOR </label>
              </div>
              <div class="col-md-8">
                 <input type="text" name="painting_color" value="<?php echo $oilDb['painting_color']; ?>" placeholder="Painting Color"  class="form-control"  />             
              </div>  			
			 
			  
            </div>
</div>
</div>

<div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <label><font size="5" color="blue">10.&nbsp;GENERAL NOTES </font> </label>
              </div>
            </div>
			
			 <div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-3">
                <label>NOTES</label>
              </div>
              <div class="col-md-8">
                 <textarea id="general_notes" name="general_notes"  rows="4" placeholder="General notes"  class="form-control"><?php echo $oilDb['general_notes'] ?>
				 </textarea>
              </div>
            </div>
</div>
</div>

<?php if ($data_02['jumlahTransaksi'] > 0) { ?>
  <div class="card">
  <div class="card-body">

    <div class="row">
      <div class="col-md-12">
        <label><font size="5" color="blue">11.&nbsp;&nbsp;REQUEST MATERIAL</font> </label>
      </div>
    </div>

    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="text-align: center">NO.</th>
           <th style="text-align: center;">Nama Barang</th>
           <th style="text-align: center;">Qty Barang</th>
           <th style="text-align: center;">Detail Barang</th>
           <th style="text-align: center;">Drawing</th>
           <th style="text-align: center;">Status</th>
          </tr>
        </thead>
                
        <?php
        include ("koneksi.php");
        $oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from formspec where noformspec='".$_GET["nopracost"]."'");
        $oilDb = mysqli_fetch_assoc($oil);
        $nopracost=$oilDb["noformspec"];

        $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from request_material where nopracost = '$nopracost' order by norequest asc");

        if(mysqli_num_rows($query) == 0){
              echo '<tr><td colspan="6">Tidak Ada Data.</td></tr>';
        }else{
        
        $no = 1;
        while( $data=mysqli_fetch_array($query) ){
        ?>

        <tbody>
          <tr>
            <td style="text-align: center;"><?php echo $no; ?></td>
            <td style="text-align: center;"><?php echo $data['nama_barang']; ?></td>
            <td style="text-align: center;"><?php echo $data['qty_barang']; ?></td>
            <td style="text-align: center;"><?php echo $data['detail_barang']; ?></td>
            <?php if ($data['nama_file'] == '') { ?>
              <td style="text-align: center" bgcolor="red"><a href="temp/<?php echo $data['nama_file'] ?>" target=\"_BLANK\"></a></td>
            <?php } else if ($data['nama_file'] !=''){ ?>
              <td style="text-align: center"><a href="../../temp/drawing_request/<?php echo $data['nama_file'] ?>" target=\"_BLANK\">View</a></td>
            <?php } ?>
            <td style="text-align: center;">
              <?php if ($data['status'] == 106) {
                     echo '<span class="badge bg-success">COMPLETED</span>';
                    }else if ($data['status'] == 104) {
                     echo '<span class="badge bg-success">COMPLETED</span>';
                    }else {
                     echo '<span class="badge bg-primary">IN PROGRESS</span>';
                    }
              ?>
            </td>
          </tr>

          <?php 
          $no++;
          }
        }
        ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<hr size="12px"><br>

<div class="card">
  <div class="card-body">
    <div class="row">   
      <div class="col-md-2">  
        <label><font size="5" color="blue">12. DRAWING FILE </font> </label>
      </div>  

      <div class="col-md-7">
          <table border="1" align="center" cellpadding="5">
          <thead>
          <tr>
          <th style="text-align: center">NO.</th>
          <th style="text-align: center;">Nama File</th>
          <th style="text-align: center;">Upload Date</th>
          <th style="text-align: center;">View</th>
          <th style="text-align: center;">Hapus</th>
          </tr>
          </thead>
            <?php
            include ("koneksi.php");
            $oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where nopracost='".$_GET["nopracost"]."'");
            $oilDb = mysqli_fetch_assoc($oil);
            $nopracost=$oilDb["nopracost"];

            $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from upload_file where nopracost = '$nopracost' order by id_file asc");

            if(mysqli_num_rows($query) < 1){
            echo '<tr><td colspan="3">Tidak Ada Data.</td></tr>';
            }else{                
            $no = 1;
            while($data=mysqli_fetch_array($query)){
            echo ' <tbody>
            <tr>
            <td style="text-align: center;">'.$no.'</td>
            <td style="text-align: center;">'.$data['nama_file'].'</td>
            <td style="text-align: center;">'.$data['upload_dt'].'</td>
            <td style="text-align: center;"><a href="../../temp/drawing_request/'.$data['nama_file'].'" target=\"_BLANK\">Lihat File</a></td>
            <td style="text-align: center;"><a href="hapus_pdf_edit_dry.php?id_file='.$data['id_file'].'&nopracost='.$data['nopracost'].'">Hapus File</a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>';
            $no++;
            }
            }
            ?>
            </table>
      </div>
    </div>
  </div>
</div>
      <?php
      if ($reject_spv=="")
      {
      echo '<div class="card" style="visibility: hidden;  display:none;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <label><font size="5" color="red">12.&nbsp;ALASAN REJECT</font> </label>
            </div>
          </div>
      
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-3">
            <label><font size="5" color="red">NOTES</font></label>
            </div>
            <div class="col-md-8">
              <textarea id="reject_spv" name="reject_spv"  rows="4" placeholder="General notes"  class="form-control" disabled>'.$reject_spv.'
              </textarea>
            </div>
          </div>
        </div>
      </div>'; }
      else
      {
        echo '<div class="card" >
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <label><font size="5" color="red">13.&nbsp;ALASAN REJECT</font> </label>
            </div>
          </div>
      
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-3">
            <label><font size="5" color="red">NOTES</font></label>
            </div>
            <div class="col-md-8">
              <textarea id="reject_spv" name="reject_spv"  rows="4" placeholder="General notes"  class="form-control" disabled>'.$reject_spv.'
              </textarea>
            </div>
          </div>
        </div>
      </div>'; }
      ?>
<?php } else { ?>
<hr size="12px"><br>

<div class="card">
  <div class="card-body">
    <div class="row">   
      <div class="col-md-2">  
        <label><font size="5" color="blue">11. DRAWING FILE </font> </label>
      </div>  

      <div class="col-md-7">
          <table border="1" align="center" cellpadding="5">
          <thead>
          <tr>
          <th style="text-align: center">NO.</th>
          <th style="text-align: center;">Nama File</th>
          <th style="text-align: center;">Upload Date</th>
          <th style="text-align: center;">View</th>
          <th style="text-align: center;">Hapus</th>
          </tr>
          </thead>
            <?php
            include ("koneksi.php");
            $oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where nopracost='".$_GET["nopracost"]."'");
            $oilDb = mysqli_fetch_assoc($oil);
            $nopracost=$oilDb["nopracost"];

            $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from upload_file where nopracost = '$nopracost' order by id_file asc");

            if(mysqli_num_rows($query) < 1){
            echo '<tr><td colspan="3">Tidak Ada Data.</td></tr>';
            }else{                
            $no = 1;
            while($data=mysqli_fetch_array($query)){
            echo ' <tbody>
            <tr>
            <td style="text-align: center;">'.$no.'</td>
            <td style="text-align: center;">'.$data['nama_file'].'</td>
            <td style="text-align: center;">'.$data['upload_dt'].'</td>
            <td style="text-align: center;"><a href="../../temp/drawing_request/'.$data['nama_file'].'" target=\"_BLANK\">Lihat File</a></td>
            <td style="text-align: center;"><a href="hapus_pdf_edit_dry.php?id_file='.$data['id_file'].'&nopracost='.$data['nopracost'].'">Hapus File</a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>';
            $no++;
            }
            }
            ?>
            </table>
      </div>
    </div>
  </div>
</div>
      <?php
      if ($reject_spv=="")
      {
      echo '<div class="card" style="visibility: hidden;  display:none;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <label><font size="5" color="red">12.&nbsp;ALASAN REJECT</font> </label>
            </div>
          </div>
      
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-3">
            <label><font size="5" color="red">NOTES</font></label>
            </div>
            <div class="col-md-8">
              <textarea id="reject_spv" name="reject_spv"  rows="4" placeholder="General notes"  class="form-control" disabled>'.$reject_spv.'
              </textarea>
            </div>
          </div>
        </div>
      </div>'; }
      else
      {
        echo '<div class="card" >
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <label><font size="5" color="red">12.&nbsp;ALASAN REJECT</font> </label>
            </div>
          </div>
      
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-3">
            <label><font size="5" color="red">NOTES</font></label>
            </div>
            <div class="col-md-8">
              <textarea id="reject_spv" name="reject_spv"  rows="4" placeholder="General notes"  class="form-control" disabled>'.$reject_spv.'
              </textarea>
            </div>
          </div>
        </div>
      </div>'; }
      ?>
<?php } ?>




			<div class="form-actions margin-bottom" style="text-align:center;">			
		
			
		
			<input type="submit" name="pasien" value="SAVE TO DRAFT" class="btn btn-primary" /> 
			<a href="print_Form_spec_dry.php?noprospect=<?php echo $noprospect; ?>&nopracost=<?php echo $nopracost; ?>" onclick="return confirm('Jika anda baru menambahkan perubahan pada kolom, tolong SAVE TO DRAFT dahulu. baru kemudian Preview Spec. Lanjut Preview? ')" class="btn btn-warning"  target="_BLANK">PREVIEW SPEC</a>
      <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-req">REQUEST MATERIAL</a>
			<a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg">UPLOAD DRAWING</a>
			<input type="submit" name="closing" value="&nbsp;&nbsp;&nbsp;CLOSE&nbsp;&nbsp;&nbsp;" class="btn btn-success" /> 
			<?php if ($status_formspec == 2 and $data_01['countReq'] > 0) { ?>
        <input type="submit" name="supervisor" onclick="return confirm('Pastikan semua kolom sudah terinput semua. Dan Drawing sudah terupload. Yakin mau release? ')" value="RELEASE TO SUPERVISOR" class="btn btn-secondary" /> 
      <?php } else { ?>
      <button onclick="return confirm('REQUEST MATERIAL SEDANG DI PROSES OLEH PURCHASING. TUNGGU HINGGA STATUS REQUEST MATERIAL COMPLETED SEMUA')" class="btn btn-secondary" />RELEASE TO SUPERVISOR </button>
      <?php } ?>
		
			</br></br>

			<div style="text-align:center;">		
			</div>	  
			</div>

		</form>

    <div class="modal fade" id="modal-req">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">REQUEST MATERIAL</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="create_request_material.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" Readonly name="noprospect" autofocus  class="form-control" value="<?php echo $noprospect; ?>" hidden/>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" Readonly name="nopracost" autofocus  class="form-control" value="<?php echo $nopracost; ?>" hidden/>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" Readonly name="created_by" autofocus  class="form-control" value="<?php echo $username;  ?> " hidden/>
                      </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 400px; text-align:center;">Nama Barang</th>
                          <th style="width: 100px; text-align:center;">Qty</th>
                          <th style="width: 450px; text-align:center;">Detail Barang</th>
                          <th style="width: 150px; text-align:center;">Butuh Drawing ?</th>
                          <th style="width: 100px; text-align:center;"><button type="button" class="btn btn-primary" id="btn-tambah">Tambah</button></th>
                        </tr>
                      </thead>
                      <tbody id="tbl-top-body"></tbody>
                    </table>
                  </div>
                </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-12">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <button type="submit" name="request" class="btn btn-primary">Submit</button>
                    </div>
                  </div>

              </form>

              <hr>
                <b>List Request Material</b>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center">NO.</th>
                     <th style="text-align: center;">Nama Barang</th>
                     <th style="text-align: center;">Qty Barang</th>
                     <th style="text-align: center;">Detail Barang</th>
                     <th style="text-align: center;">Drawing</th>
                     <th style="text-align: center;">Status</th>
                    </tr>
                  </thead>
                
                <?php
                include ("koneksi.php");
                $oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from formspec where noformspec='".$_GET["nopracost"]."'");
                $oilDb = mysqli_fetch_assoc($oil);
                $nopracost=$oilDb["noformspec"];

                $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from request_material where nopracost = '$nopracost' order by norequest asc");

                if(mysqli_num_rows($query) < 1){
                      echo '<tr><td colspan="6">Tidak Ada Data.</td></tr>';
                }else{
                
                $no = 1;
                while($data=mysqli_fetch_array($query)){
                ?>
                <tbody>
                  <tr>
                    <td style="text-align: center;"><?php echo $no; ?></td>
                    <td style="text-align: center;"><?php echo $data['nama_barang']; ?></td>
                    <td style="text-align: center;"><?php echo $data['qty_barang']; ?></td>
                    <td style="text-align: center;"><?php echo $data['detail_barang']; ?></td>
                    <?php if ($data['nama_file'] == '') { ?>
                      <td style="text-align: center" bgcolor="red"><a href="temp/<?php echo $data['nama_file'] ?>" target=\"_BLANK\"></a></td>
                    <?php } else if ($data['nama_file'] !=''){ ?>
                      <td style="text-align: center"><a href="../../temp/drawing_request/<?php echo $data['nama_file'] ?>" target=\"_BLANK\">View</a></td>
                    <?php } ?>
                    <td style="text-align: center;">
                    <?php if ($data['status'] == 106) {
                       echo '<span class="badge bg-success">COMPLETED</span>';
                      }else if ($data['status'] == 104) {
                       echo '<span class="badge bg-success">COMPLETED</span>';
                      }else {
                       echo '<span class="badge bg-primary">IN PROGRESS</span>';
                      }
                    ?>
            </td>
                  </tr>

                  <?php 
                  $no++;
                  }
                }
                ?>
                </tbody>
                
                
                </table>


            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

     <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload File Drawing Tender/Prospect</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="upload_pdf_edit_dry.php" method="POST" enctype="multipart/form-data">
                <table class="table table-bordered">

                  <tr>
                    <td>Nama File</td>
                    <td colspan="2"><input type="text" class="form-control" name="nopracost" placeholder="No Pracost" value="<?php echo $nopracost; ?>" readonly></td>
                  </tr> 
                  <tr>
                    <td>Upload File PDF</td>
                    <td><input type="file" name="nama_file" required></td>
                    <td style="text-align:center"><input type="submit" value="Upload File"></td>
                  </tr>
                </table>
              </form>

              <hr>
                <b>List File PDF</b>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center">NO.</th>
                     <th style="text-align: center;">Nama File</th>
                     <th style="text-align: center;">Upload Date</th>
                     <th style="text-align: center;">View</th>
                     <th style="text-align: center;">Hapus</th>
                    </tr>
                  </thead>
                
                <?php
                include ("koneksi.php");
                $oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where nopracost='".$_GET["nopracost"]."'");
                $oilDb = mysqli_fetch_assoc($oil);
                $nopracost=$oilDb["nopracost"];

                $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from upload_file where nopracost = '$nopracost' order by id_file asc");

                if(mysqli_num_rows($query) < 1){
                      echo '<tr><td colspan="3">Tidak Ada Data.</td></tr>';
                }else{
                
                $no = 1;
                while($data=mysqli_fetch_array($query)){
                  echo ' <tbody>
                  <tr>
                  <td style="text-align: center;">'.$no.'</td>
                   <td style="text-align: center;">'.$data['nama_file'].'</td>
                   <td style="text-align: center;">'.$data['upload_dt'].'</td>
                   <td style="text-align: center;"><a href="../../temp/'.$data['nama_file'].'" target=\"_BLANK\">Lihat File</a></td>
                   <td style="text-align: center;"><a href="hapus_pdf_edit_dry.php?id_file='.$data['id_file'].'&nopracost='.$data['nopracost'].'">Hapus File</a></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>';
                $no++;
              }
            }
                ?>
                
                </table>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	</div>
	</body>


</html>
<?php

	
?>



<?php
	if(isset($_POST["pasien"])){
		if($_POST["pasien"]){
	
				include_once("sambung.php");
				$tb= date("Y-m-d"); 
						if ($oilDb['enclosure'] == "N/A" ) {
							$cable_box=$oilDb['enclosure'];
							$cable_box_ket="";
					   }
						else {
							$cable_box=$_POST['cable_box'];
							$cable_box_ket=$_POST['cable_box_ket'];
						}
					    if ($oilDb['tap_changer'] == "N/A" ) {
							$tap_changer=$oilDb['tap_changer'];
							$tap_changer_ket="";
						}
						else {
							$tap_changer=$_POST['tap_changer'];
							$tap_changer_ket=$_POST['tap_changer_ket'];							
						}
						if ($oilDb['dig_thermo'] == "" ) {
							$dig_thermo=$oilDb['dig_thermo'];
							$dig_thermo_ket="";
						}
						else {
							$dig_thermo=$_POST['dig_thermo'];
							$dig_thermo_ket=$_POST['dig_thermo_ket'];							
						}
						
						if ($oilDb['cool_fans'] == "" ) {
							$cool_fans=$oilDb['cool_fans'];
							$cool_fans_ket="";
						}
						else {
							$cool_fans=$_POST['cool_fans'];
							$cool_fans_ket=$_POST['dig_thermo_ket'];							
						}
					
						
if ($_POST['terminal_control_box']=="") {
	$terminal_control_box_x=$_POST['terminal_control_box_ok']; } else {
	$terminal_control_box_x=$_POST['terminal_control_box']; }
	
if ($_POST['surge_arrester']=='') {
	$surge_arrester_x=$_POST['surge_arrester_ok']; } else {
	$surge_arrester_x=$_POST['surge_arrester']; }	
	
if ($_POST['neutral_ct']=='') {
	$neutral_ct_x=$_POST['neutral_ct_ok']; } else {
	$neutral_ct_x=$_POST['neutral_ct']; }	
	
if ($_POST['dct']==$oilDb['dct']) {
	$dct_x=$_POST['dct_ok'];} else {
	$dct_x=$_POST['dct']; }
	
if ($_POST['baris6a']=='') {
	$baris6a_x=$_POST['baris6a_ok'];} else {
	$baris6a_x=$_POST['baris6a']; }
	
if ($_POST['baris7a']=='') {
	$baris7a_x=$_POST['baris7a_ok']; } else {
	$baris7a_x=$_POST['baris7a']; }
	
if ($_POST['baris8a']=='') {
	$baris8a_x=$_POST['baris8a_ok']; } else {
	$baris8a_x=$_POST['baris8a']; }
	
if ($_POST['baris9a']=='') {
	$baris9a_x=$_POST['baris9a_ok'];} else {
	$baris9a_x=$_POST['baris9a']; }
	
if ($_POST['baris10a']=='') {
	$baris10a_x=$_POST['baris10a_ok']; } else {
	$baris10a_x=$_POST['baris10a']; }

				
						$query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from formspec where noformspec = '$nopracost'");
						if(mysqli_num_rows($query) < 1){						
							mysqli_query($GLOBALS["___mysqli_ston"], "insert into formspec ( noprospect,noformspec,created,project,tgl_formspec,tahun,sales,segment,sub_segment,type_cooling,service_condition,type_trafo,altitude,ambient_temp,standarisasi,no_phase,frequency,primary_voltage,secondary_voltage,rate_primary_current,winding_connection_primary,rate_secondary_current,winding_connection_secondary,rate_capacity,incase_primary_voltage1,rate_capacity1,incase_primary_voltage2,rate_capacity2,incase_secondary_voltage1,rate_capacity3,incase_secondary_voltage2,rate_capacity4,no_tap,add_tap,vektor_group,type_winding,hv_winding,lv_winding,hsvp,hsvs,impulse_vp,impulse_vs,applied_test1,applied_test2,winding_temp,oil_temp,loses_vp,loses_vs,noload_loses,temp_load_loses,load_loses,total_loses,effeciency1,effeciency2,effeciency3,effeciency4,pf1,pf1a,pf1b,pf1c,pf1d,pf2,pf2a,pf2b,pf2c,pf2d,percent_existing_current,percent_impedance,voltage_regulation1,voltage_regulation2,pf3a,r1,pf4a,r2,hvb,hvb1,hvb_ket,lvb,lvb1,lvb_ket,tb,tb_ket,name_plate,name_plate_ket,drain_valve,drain_valve_ket,filter_valve,filter_valve_ket,type_oil,type_oil_ket,earthing_terminal,lifting_lug,safety_device,safety_device_ket,temp_indicator,temp_indicator_ket,oil_indicator,oil_indicator_ket,presure_device,presure_device_ket,winding_indicator,winding_indicator_ket,sudden_relay,sudden_relay_ket,buchholz_relay,buchholz_relay_ket,vacuum_gauge,vacuum_gauge_ket,enclosure,enclosure_ket,tap_changer,tap_changer_ket,terminal_control_box,terminal_control_box_ket,surge_arrester,surge_arrester_ket,neutral_ct,neutral_ct_ket,dct,dct_ket,thermometer_pocket,thermometer_pocket_ket,membrane_separator,membrane_separator_ket,pressure_monitor,pressure_monitor_ket,sovfbr,sovfbr_ket,sampling,sampling_ket,radiator_valve,radiator_valve_ket,radiator_cooling_fans,radiator_cooling_fans_ket,jacking_lug,jacking_lug_ket,ladder,ladder_ket,baris6,baris6a,baris6_ket,baris7,baris7a,baris7_ket,baris8,baris8a,baris8_ket,status,priority,rate_capacityx,type_cooling1,type_cooling2,rate_primary_current2,rate_secondary_current2,painting_system,painting_color,general_notes,painting_system_ket,update_oleh,sp_slt,sp_pd,sp_zero,sp_slt_ket,sp_pd_ket,sp_zero_ket,test_temp_rise,test_impulse,test_temp_rise_ket,test_impulse_ket,dig_thermo,dig_thermo_ket,cool_fans,cool_fans_ket) values ('".$_POST["noprospect"]."','".$_POST["nopracost"]."','$created','".$_POST["project"]."','$tb','".$_POST["tahun"]."','".$_POST["sales"]."','".$_POST["segment"]."','".$_POST["sub_segment"]."','$type_cooling','$service_condition','$type_trafo','$altitude','$ambient_temp','$standarisasi','$no_phase','$frequency','$primary_voltage','".$_POST["secondary_voltage"]."','".$_POST["rate_primary_current"]."','".$_POST["winding_connection1"]."','".$_POST["rate_secondary_current"]."','".$_POST["winding_connection2"]."','".$_POST["rate_capacity"]."','".$_POST["incase_primary_voltage1"]."','".$_POST["rate_capacity_primary1"]."','".$_POST["incase_primary_voltage2"]."','".$_POST["rate_capacity_primary2"]."','".$_POST["incase_secondary_voltage1"]."','".$_POST["rate_capacity_secondary1"]."','".$_POST["incase_secondary_voltage2"]."','".$_POST["rate_capacity_secondary2"]."','".$_POST["no_tap"]."','".$_POST["add_tap"]."','".$_POST["vektor_group"]."','$type_winding','".$_POST["hv_winding"]."','".$_POST["lv_winding"]."','".$_POST["hsv_primary"]."','".$_POST["hsv_secodary"]."','".$_POST["impulse_voltage_primary"]."' ,'".$_POST["impulse_voltage_secondary"]."','".$_POST["applied_voltage_primary"]."','".$_POST["applied_voltage_secondary"]."','".$_POST["winding_temp"]."','".$_POST["oil_temp"]."','".$_POST["lose_primary"]."','".$_POST["lose_secondary"]."','".$_POST["noload_loses"]."','".$_POST["temp_load_loses"]."','".$_POST["load_loses"]."','".$_POST["total_losses"]."','".$_POST["eff1"]."','".$_POST["eff2"]."','".$_POST["eff3"]."','".$_POST["eff4"]."','".$_POST["pf1"]."','".$_POST["pf1a"]."','".$_POST["pf1b"]."','".$_POST["pf1c"]."','".$_POST["pf1d"]."','".$_POST["pf2"]."','".$_POST["pf2a"]."','".$_POST["pf2b"]."','".$_POST["pf2c"]."','".$_POST["pf2d"]."','".$_POST["existing_current_nominal"]."','".$_POST["impedance"]."','".$_POST["pf3"]."','".$_POST["pf4"]."','".$_POST["pf3a"]."','".$_POST["resist1"]."','".$_POST["pf4"]."','".$_POST["react1"]."','".$_POST["hvb"]."','".$_POST["hvb1"]."','".$_POST["hvb_ket"]."','".$_POST["lvb"]."','".$_POST["lvb1"]."','".$_POST["lvb_ket"]."','".$_POST["trafo_base"]."','".$_POST["trafo_base_ket"]."','".$_POST["name_plate"]."','".$_POST["name_plate_ket"]."','".$_POST["drain_valve"]."','".$_POST["drain_valve_ket"]."','".$_POST["filter_valve"]."','".$_POST["filter_valve_ket"]."','".$_POST["type_oil"]."','".$_POST["type_oil_ket"]."','".$_POST["earthing_therminal"]."','".$_POST["lifting_lug"]."','$isd','$isd_ket','$temp_indicator','$temp_indicator_ket','$oil_indicator','$oil_indicator_ket','$presure_device','$presure_device_ket','$winding_indicator','$winding_indicator_ket','$presure_relay','$presure_relay_ket','$buccholz_relay','$buccholz_relay_ket','$vacuum_gauge','$vacuum_gauge_ket','$cable_box','$cable_box_ket','$tap_changer','$tap_changer_ket','".$_POST["terminal_control_box"]."','".$_POST["terminal_control_box_ket"]."','".$_POST["surge_arrester"]."','".$_POST["surge_arrester_ket"]."','".$_POST["neutral_ct"]."','".$_POST["neutral_ct_ket"]."','".$_POST["dct"]."','".$_POST["dct_ket"]."','".$_POST["thermometer_pocket"]."','".$_POST["thermometer_pocket_ket"]."','".$_POST["membrane_separator"]."','".$_POST["membrane_separator_ket"]."','".$_POST["pressure_monitor"]."','".$_POST["pressure_monitor_ket"]."','".$_POST["sovfbr"]."','".$_POST["sovfbr_ket"]."','".$_POST["sampling"]."','".$_POST["sampling_ket"]."','".$_POST["radiator_valve"]."','".$_POST["radiator_valve_ket"]."','".$_POST["radiator_cooling_fans"]."','".$_POST["radiator_cooling_fans_ket"]."','".$_POST["jacking_lug"]."','".$_POST["jacking_lug_ket"]."','".$_POST["ladder"]."','".$_POST["ladder_ket"]."','".$_POST["baris6"]."','".$_POST["baris6a"]."','".$_POST["baris6_ket"]."','".$_POST["baris7"]."','".$_POST["baris7a"]."','".$_POST["baris7_ket"]."','".$_POST["baris8"]."','".$_POST["baris8a"]."','".$_POST["baris8_ket"]."',2,'".$_POST["priority"]."','".$_POST["rate_capacityx"]."','$type_cooling1','$type_cooling2','".$_POST["rate_primary_current2"]."','".$_POST["rate_secondary_current2"]."','".$_POST["painting_system"]."','".$_POST["painting_color"]."','".$_POST["general_notes"]."','".$_POST["painting_system_ket"]."','$created','".$_POST["sp_slt"]."','".$_POST["sp_pd"]."','".$_POST["sp_zero"]."','".$_POST["sp_slt_ket"]."','".$_POST["sp_pd_ket"]."','".$_POST["sp_zero_ket"]."','".$_POST["test_temp_rise"]."','".$_POST["test_impulse"]."','".$_POST["test_temp_rise_ket"]."','".$_POST["test_impulse_ket"]."','".$_POST["dig_thermo"]."','".$_POST["dig_thermo_ket"]."','".$_POST["cool_fans"]."','".$_POST["cool_fans_ket"]."')");
							
							mysqli_query($GLOBALS["___mysqli_ston"], "update oil_prospect set status=3 where nopracost='$nopracost'");
							
								$queryx = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where (noprospect = '$noprospect' and status != 3)");
								if(mysqli_num_rows($queryx) < 1){							
									mysqli_query($GLOBALS["___mysqli_ston"], "update h_rpospect set status=3 where noprospect='$noprospect'");
									echo"<script>alert('Data Sukses tersimpan');window.location.href='../?p=form_spec_open'</script>";
									}
								else
								{
									echo"<script>alert('Data Sukses tersimpan');window.location.href='new_prospect_detail.php?noprospect=".$noprospect."'</script>";									
								}
									
								?>
							
							<div class="alert alert-success" role="alert">
							<b>Berhasil mengirim Request Klarifikasi ke Sales </b>
							</div>
						<?php	
						}
						else
						{
							
							
						mysqli_query($GLOBALS["___mysqli_ston"], "update formspec set painting_system='".$_POST["painting_system"]."',painting_system_ket='".$_POST["painting_system_ket"]."',general_notes='".$_POST["general_notes"]."',rate_secondary_current2='".$_POST["rate_secondary_current2"]."' ,rate_primary_current2='".$_POST["rate_primary_current2"]."',painting_color='".$_POST["painting_color"]."',type_cooling1='$type_cooling1',type_cooling2='$type_cooling2',status=2,priority='".$_POST["priority"]."',rate_capacityx='".$_POST["rate_capacityx"]."',baris6='".$_POST["baris6"]."',baris6a='$baris6a_x',baris6_ket='".$_POST["baris6_ket"]."',baris7='".$_POST["baris7"]."',baris7a='$baris7a_x',baris7_ket='".$_POST["baris7_ket"]."',baris8='".$_POST["baris8"]."',baris8a='$baris8a_x',baris8_ket='".$_POST["baris8_ket"]."',baris9='".$_POST["baris9"]."',baris9a='$baris9a_x',baris9_ket='".$_POST["baris9_ket"]."',baris10='".$_POST["baris10"]."',baris10a='$baris10a_x',baris10_ket='".$_POST["baris10_ket"]."',terminal_control_box_ket='".$_POST["terminal_control_box_ket"]."',surge_arrester='$surge_arrester_x',surge_arrester_ket='".$_POST["surge_arrester_ket"]."',neutral_ct='$neutral_ct_x',neutral_ct_ket='".$_POST["neutral_ct_ket"]."',dct='$dct_x',dct_ket='".$_POST["dct_ket"]."',enclosure='$cable_box',enclosure_ket='$cable_box_ket',tap_changer='$tap_changer',tap_changer_ket='$tap_changer_ket',terminal_control_box='$terminal_control_box_x',hv_terminal_ket='".$_POST["hv_terminal_ket"]."',lv_terminal_ket='".$_POST["lv_terminal_ket"]."',tb='".$_POST["trafo_base"]."',tb_ket='".$_POST["trafo_base_ket"]."',name_plate='".$_POST["name_plate"]."',name_plate_ket='".$_POST["name_plate_ket"]."',r2='".$_POST["react1"]."',pf4a='".$_POST["pf4a"]."',r1='".$_POST["resist1"]."',pf3a='".$_POST["pf3a"]."',voltage_regulation2='".$_POST["pf4"]."' ,percent_impedance='".$_POST["impedance"]."',voltage_regulation1='".$_POST["pf3"]."',percent_existing_current='".$_POST["existing_current_nominal"]."',pf1='".$_POST["pf1"]."',pf1a='".$_POST["pf1a"]."',pf1b='".$_POST["pf1b"]."',pf1c='".$_POST["pf1c"]."',pf1d='".$_POST["pf1d"]."',pf2='".$_POST["pf2"]."',pf2a='".$_POST["pf2a"]."',pf2b='".$_POST["pf2b"]."',pf2c='".$_POST["pf2c"]."',pf2d='".$_POST["pf2d"]."',effeciency1='".$_POST["eff1"]."',effeciency2='".$_POST["eff2"]."',effeciency3='".$_POST["eff3"]."',effeciency4='".$_POST["eff4"]."',loses_vp='".$_POST["lose_primary"]."',loses_vs='".$_POST["lose_secondary"]."',noload_loses='".$_POST["noload_loses"]."',temp_load_loses='".$_POST["temp_load_loses"]."',load_loses='".$_POST["load_loses"]."',total_loses='".$_POST["total_losses"]."',vektor_group='".$_POST["vektor_group"]."',hsvp='".$_POST["hsv_primary"]."',hsvs='".$_POST["hsv_secodary"]."',impulse_vp='".$_POST["impulse_voltage_primary"]."',impulse_vs='".$_POST["impulse_voltage_secondary"]."',applied_test1='".$_POST["applied_voltage_primary"]."',applied_test2='".$_POST["applied_voltage_secondary"]."',rate_capacity4='".$_POST["rate_capacity_secondary2"]."',incase_secondary_voltage2='".$_POST["incase_secondary_voltage2"]."',rate_capacity3='".$_POST["rate_capacity_secondary1"]."',incase_secondary_voltage1='".$_POST["incase_secondary_voltage1"]."',rate_capacity2='".$_POST["rate_capacity_primary2"]."',incase_primary_voltage2='".$_POST["incase_primary_voltage2"]."',rate_capacity1='".$_POST["rate_capacity_primary1"]."',incase_primary_voltage1='".$_POST["incase_primary_voltage1"]."',winding_connection_secondary='".$_POST["winding_connection2"]."',winding_connection_primary='".$_POST["winding_connection1"]."',update_oleh='$created',sp_slt='".$_POST["sp_slt"]."',sp_pd='".$_POST["sp_pd"]."',sp_zero='".$_POST["sp_zero"]."',sp_slt_ket='".$_POST["sp_slt_ket"]."',sp_pd_ket='".$_POST["sp_pd_ket"]."',sp_zero_ket='".$_POST["sp_zero_ket"]."',test_temp_rise='".$_POST["test_temp_rise"]."',test_impulse='".$_POST["test_impulse"]."',test_temp_rise_ket='".$_POST["test_temp_rise_ket"]."',test_impulse_ket='".$_POST["test_impulse_ket"]."',dig_thermo='".$_POST["dig_thermo"]."',dig_thermo_ket='".$_POST["dig_thermo_ket"]."',cool_fans='".$_POST["cool_fans"]."',cool_fans_ket='".$_POST["cool_fans_ket"]."',add_tap='".$_POST["add_tap"]."'  where noformspec ='$nopracost'");
						
							mysqli_query($GLOBALS["___mysqli_ston"], "update oil_prospect set status=3 where nopracost='$nopracost'");
							
								$queryx = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where (noprospect = '$noprospect' and status != 3)");
								if(mysqli_num_rows($queryx) < 1){							
									mysqli_query($GLOBALS["___mysqli_ston"], "update h_rpospect set status=3 where noprospect='$noprospect'");								
									}
								else
								{
																		
								}
									
						
						echo"<script>window.location.href='edit_Form_spec_dry.php?nopracost=".$nopracost."'</script>";
					
						
						} ?>
							
				<?php
				
				}
				else if(isset($_POST["pasien"])){
					echo "<center><div class='alert alert-warning alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
					</div><center>";
												}
	}
	
?>

<?php
	if(isset($_POST["supervisor"])){
		if($_POST["supervisor"]){
			$query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from upload_file where nopracost = '$nopracost' order by id_file asc");
					if(mysqli_num_rows($query) < 1){
						echo"<script>alert('Drawing belum di-Upload! Tolong Upload Drawing dahulu!');window.location.href='edit_Form_spec_dry.php?nopracost=".$nopracost."'</script>";
						}
	
				include_once("sambung.php");
				$tb= date("Y-m-d"); 
						if ($oilDb['enclosure'] == "N/A" ) {
							$cable_box=$oilDb['enclosure'];
							$cable_box_ket="";
					   }
						else {
							$cable_box=$_POST['cable_box'];
							$cable_box_ket=$_POST['cable_box_ket'];
						}
					    if ($oilDb['tap_changer'] == "N/A" ) {
							$tap_changer=$oilDb['tap_changer'];
							$tap_changer_ket="";
						}
						else {
							$tap_changer=$_POST['tap_changer'];
							$tap_changer_ket=$_POST['tap_changer_ket'];							
						}
						if ($oilDb['dig_thermo'] == "" ) {
							$dig_thermo=$oilDb['dig_thermo'];
							$dig_thermo_ket="";
						}
						else {
							$dig_thermo=$_POST['dig_thermo'];
							$dig_thermo_ket=$_POST['dig_thermo_ket'];							
						}
						
						if ($oilDb['cool_fans'] == "" ) {
							$cool_fans=$oilDb['cool_fans'];
							$cool_fans_ket="";
						}
						else {
							$cool_fans=$_POST['cool_fans'];
							$cool_fans_ket=$_POST['dig_thermo_ket'];							
						}
if ($_POST['terminal_control_box']=="") {
	$terminal_control_box_x=$_POST['terminal_control_box_ok']; } else {
	$terminal_control_box_x=$_POST['terminal_control_box']; }
	
if ($_POST['surge_arrester']=='') {
	$surge_arrester_x=$_POST['surge_arrester_ok']; } else {
	$surge_arrester_x=$_POST['surge_arrester']; }	
	
if ($_POST['neutral_ct']=='') {
	$neutral_ct_x=$_POST['neutral_ct_ok']; } else {
	$neutral_ct_x=$_POST['neutral_ct']; }	
	
if ($_POST['dct']==$oilDb['dct']) {
	$dct_x=$_POST['dct_ok'];} else {
	$dct_x=$_POST['dct']; }
	
if ($_POST['baris6a']=='') {
	$baris6a_x=$_POST['baris6a_ok'];} else {
	$baris6a_x=$_POST['baris6a']; }
	
if ($_POST['baris7a']=='') {
	$baris7a_x=$_POST['baris7a_ok']; } else {
	$baris7a_x=$_POST['baris7a']; }
	
if ($_POST['baris8a']=='') {
	$baris8a_x=$_POST['baris8a_ok']; } else {
	$baris8a_x=$_POST['baris8a']; }
	
if ($_POST['baris9a']=='') {
	$baris9a_x=$_POST['baris9a_ok'];} else {
	$baris9a_x=$_POST['baris9a']; }
	
if ($_POST['baris10a']=='') {
	$baris10a_x=$_POST['baris10a_ok']; } else {
	$baris10a_x=$_POST['baris10a']; }

						
						mysqli_query($GLOBALS["___mysqli_ston"], "update formspec set painting_system='".$_POST["painting_system"]."',painting_system_ket='".$_POST["painting_system_ket"]."',general_notes='".$_POST["general_notes"]."',rate_secondary_current2='".$_POST["rate_secondary_current2"]."' ,rate_primary_current2='".$_POST["rate_primary_current2"]."',painting_color='".$_POST["painting_color"]."',type_cooling1='$type_cooling1',type_cooling2='$type_cooling2',status=3,priority='".$_POST["priority"]."',rate_capacityx='".$_POST["rate_capacityx"]."',baris6='".$_POST["baris6"]."',baris6a='$baris6a_x',baris6_ket='".$_POST["baris6_ket"]."',baris7='".$_POST["baris7"]."',baris7a='$baris7a_x',baris7_ket='".$_POST["baris7_ket"]."',baris8='".$_POST["baris8"]."',baris8a='$baris8a_x',baris8_ket='".$_POST["baris8_ket"]."',baris9='".$_POST["baris9"]."',baris9a='$baris9a_x',baris9_ket='".$_POST["baris9_ket"]."',baris10='".$_POST["baris10"]."',baris10a='$baris10a_x',baris10_ket='".$_POST["baris10_ket"]."',terminal_control_box_ket='".$_POST["terminal_control_box_ket"]."',surge_arrester='$surge_arrester_x',surge_arrester_ket='".$_POST["surge_arrester_ket"]."',neutral_ct='$neutral_ct_x',neutral_ct_ket='".$_POST["neutral_ct_ket"]."',dct='$dct_x',dct_ket='".$_POST["dct_ket"]."',enclosure='$cable_box',enclosure_ket='$cable_box_ket',tap_changer='$tap_changer',tap_changer_ket='$tap_changer_ket',terminal_control_box='$terminal_control_box_x',hv_terminal_ket='".$_POST["hv_terminal_ket"]."',lv_terminal_ket='".$_POST["lv_terminal_ket"]."',tb='".$_POST["trafo_base"]."',tb_ket='".$_POST["trafo_base_ket"]."',name_plate='".$_POST["name_plate"]."',name_plate_ket='".$_POST["name_plate_ket"]."',r2='".$_POST["react1"]."',pf4a='".$_POST["pf4a"]."',r1='".$_POST["resist1"]."',pf3a='".$_POST["pf3a"]."',voltage_regulation2='".$_POST["pf4"]."' ,percent_impedance='".$_POST["impedance"]."',voltage_regulation1='".$_POST["pf3"]."',percent_existing_current='".$_POST["existing_current_nominal"]."',pf1='".$_POST["pf1"]."',pf1a='".$_POST["pf1a"]."',pf1b='".$_POST["pf1b"]."',pf1c='".$_POST["pf1c"]."',pf1d='".$_POST["pf1d"]."',pf2='".$_POST["pf2"]."',pf2a='".$_POST["pf2a"]."',pf2b='".$_POST["pf2b"]."',pf2c='".$_POST["pf2c"]."',pf2d='".$_POST["pf2d"]."',effeciency1='".$_POST["eff1"]."',effeciency2='".$_POST["eff2"]."',effeciency3='".$_POST["eff3"]."',effeciency4='".$_POST["eff4"]."',loses_vp='".$_POST["lose_primary"]."',loses_vs='".$_POST["lose_secondary"]."',noload_loses='".$_POST["noload_loses"]."',temp_load_loses='".$_POST["temp_load_loses"]."',load_loses='".$_POST["load_loses"]."',total_loses='".$_POST["total_losses"]."',vektor_group='".$_POST["vektor_group"]."',hsvp='".$_POST["hsv_primary"]."',hsvs='".$_POST["hsv_secodary"]."',impulse_vp='".$_POST["impulse_voltage_primary"]."',impulse_vs='".$_POST["impulse_voltage_secondary"]."',applied_test1='".$_POST["applied_voltage_primary"]."',applied_test2='".$_POST["applied_voltage_secondary"]."',rate_capacity4='".$_POST["rate_capacity_secondary2"]."',incase_secondary_voltage2='".$_POST["incase_secondary_voltage2"]."',rate_capacity3='".$_POST["rate_capacity_secondary1"]."',incase_secondary_voltage1='".$_POST["incase_secondary_voltage1"]."',rate_capacity2='".$_POST["rate_capacity_primary2"]."',incase_primary_voltage2='".$_POST["incase_primary_voltage2"]."',rate_capacity1='".$_POST["rate_capacity_primary1"]."',incase_primary_voltage1='".$_POST["incase_primary_voltage1"]."',winding_connection_secondary='".$_POST["winding_connection2"]."',winding_connection_primary='".$_POST["winding_connection1"]."',update_oleh='$created',sp_slt='".$_POST["sp_slt"]."',sp_pd='".$_POST["sp_pd"]."',sp_zero='".$_POST["sp_zero"]."',sp_slt_ket='".$_POST["sp_slt_ket"]."',sp_pd_ket='".$_POST["sp_pd_ket"]."',sp_zero_ket='".$_POST["sp_zero_ket"]."',test_temp_rise='".$_POST["test_temp_rise"]."',test_impulse='".$_POST["test_impulse"]."',test_temp_rise_ket='".$_POST["test_temp_rise_ket"]."',test_impulse_ket='".$_POST["test_impulse_ket"]."',dig_thermo='".$_POST["dig_thermo"]."',dig_thermo_ket='".$_POST["dig_thermo_ket"]."',cool_fans='".$_POST["cool_fans"]."',cool_fans_ket='".$_POST["cool_fans_ket"]."',tgl_propost='$tb',status=3  where noformspec ='$nopracost'");
						
						mysqli_query($GLOBALS["___mysqli_ston"], "update oil_prospect set status=3 where nopracost='$nopracost'");
							
						$queryx = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where (noprospect = '$noprospect' and status != 3)");
								if(mysqli_num_rows($queryx) < 1){							
									mysqli_query($GLOBALS["___mysqli_ston"], "update h_rpospect set status=3 where noprospect='$noprospect'");								
									}
								else
								{
																		
								}	
				
					//echo"<script>window.location.href='edit_Form_Hermetically_Sealed.php?nopracost=".$nopracost."'</script>";//
					echo"<script>window.location.href='../?p=form_spec_progress'</script>";
					
				}
				
				else if(isset($_POST["supervisor"])){
					echo "<center><div class='alert alert-warning alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
					</div><center>";
												}
	
												
	}
	
?>
<?php
	if(isset($_POST["closing"])){
		if($_POST["closing"]){
				$queryx = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where (noprospect = '$noprospect' and status != 3)");
								if(mysqli_num_rows($queryx) < 1){
									echo"<script>window.location.href='../?p=form_spec_open'</script>";
									}
								else
								{
									echo"<script>window.location.href='new_prospect_detail.php?noprospect=".$noprospect."'</script>";									
								}
		}
	}
?>

  <!-- jQuery -->
  <script src="../../plugins/plugin_chris/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/plugin_chris/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../plugins/plugin_chris/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../plugins/plugin_chris/dist/js/demo.js"></script>



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
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport25]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport25").show();
				 $("#dvPassport25").focus();
            } else {
                $("#dvPassport25").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport26]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport26").show();
				 $("#dvPassport26").focus();
            } else {
                $("#dvPassport26").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport27]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport27").show();
				 $("#dvPassport27").focus();
            } else {
                $("#dvPassport27").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport28]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport28").show();
				 $("#dvPassport28").focus();
            } else {
                $("#dvPassport28").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport29]").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport29").show();
				 $("#dvPassport29").focus();
            } else {
                $("#dvPassport29").hide();
            }
        });
    });
</script>

<script>
function sumi() {
      var txtFirstNumberValue = document.getElementById('batu1').value;
      var txtSecondNumberValue = document.getElementById('batu2').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('batu3').value = result;
      }
}
</script>

<script>
function sum() {
      var rate = document.getElementById('rate').value;
      var ef1 = document.getElementById('ef1').value;
	  var ef2 = document.getElementById('ef2').value;
	  var ef3 = document.getElementById('ef3').value;
	  var ef4 = document.getElementById('ef4').value;
	  var pf1 = document.getElementById('pf1').value;
	  var pf2 = document.getElementById('pf2').value;
      var batu1 = document.getElementById('batu1').value;	
      var batu2 = document.getElementById('batu2').value;
	  var impedance = document.getElementById('impedance').value;
	  document.getElementById('pf3').value = pf1;	
	  document.getElementById('pf4').value = pf2;	
	  
      var result = ((parseInt(rate) * ( parseInt(ef1)/100)*parseFloat(pf1)*100))/(parseInt(rate)*( parseInt(ef1)/100)*parseFloat(pf1)+(parseInt(batu1)/1000)+(parseInt(batu2)/1000)* ( parseInt(ef1)/100)* ( parseInt(ef1)/100));
	 
	     if (!isNaN(result)) {		
           document.getElementById('pf1a').value = (result.toFixed(2));		  
      }	  
	  
      var result2 = ((parseInt(rate) * ( parseInt(ef2)/100)*parseFloat(pf1)*100))/(parseInt(rate)*( parseInt(ef2)/100)*parseFloat(pf1)+(parseInt(batu1)/1000)+(parseInt(batu2)/1000)* ( parseInt(ef2)/100)* ( parseInt(ef2)/100));
	 
	     if (!isNaN(result2)) {		
           document.getElementById('pf1b').value = (result2.toFixed(2));		  
      }
	  
	  var result3 = ((parseInt(rate) * ( parseInt(ef3)/100)*parseFloat(pf1)*100))/(parseInt(rate)*( parseInt(ef3)/100)*parseFloat(pf1)+(parseInt(batu1)/1000)+(parseInt(batu2)/1000)* ( parseInt(ef3)/100)* ( parseInt(ef3)/100));
	 
	     if (!isNaN(result3)) {		
           document.getElementById('pf1c').value = (result3.toFixed(2));		  
      }
	 var result4 = ((parseInt(rate) * ( parseInt(ef4)/100)*parseFloat(pf1)*100))/(parseInt(rate)*( parseInt(ef4)/100)*parseFloat(pf1)+(parseInt(batu1)/1000)+(parseInt(batu2)/1000)* ( parseInt(ef4)/100)* ( parseInt(ef4)/100));
	 
	     if (!isNaN(result4)) {		
           document.getElementById('pf1d').value = (result4.toFixed(2));		  
      }
	  //dua//
	 var result5 = ((parseInt(rate) * ( parseFloat(ef1)/100)*parseFloat(pf2)*100))/(((parseInt(rate)*( parseFloat(ef1)/100))*parseFloat(pf2))+((parseFloat(batu1)/1000)+(parseFloat(batu2)/1000)* ( parseFloat(ef1)/100)* ( parseFloat(ef1)/100)));
	
	
	     if (!isNaN(result5)) {		
           document.getElementById('pf2a').value = (result5.toFixed(2));	  
		}
	  var result6 = ((parseInt(rate) * ( parseFloat(ef2)/100)*parseFloat(pf2)*100))/(((parseInt(rate)*( parseFloat(ef2)/100))*parseFloat(pf2))+((parseFloat(batu1)/1000)+(parseFloat(batu2)/1000)* ( parseFloat(ef2)/100)* ( parseFloat(ef2)/100)));
	
	
	     if (!isNaN(result6)) {		
           document.getElementById('pf2b').value = (result6.toFixed(2));	  
		}
	  var result7 = ((parseInt(rate) * ( parseFloat(ef3)/100)*parseFloat(pf2)*100))/(((parseInt(rate)*( parseFloat(ef3)/100))*parseFloat(pf2))+((parseFloat(batu1)/1000)+(parseFloat(batu2)/1000)* ( parseFloat(ef3)/100)* ( parseFloat(ef3)/100)));
	
	
	     if (!isNaN(result7)) {		
           document.getElementById('pf2c').value = (result7.toFixed(2));	  
		}
	var result8 = ((parseInt(rate) * ( parseFloat(ef4)/100)*parseFloat(pf2)*100))/(((parseInt(rate)*( parseFloat(ef4)/100))*parseFloat(pf2))+((parseFloat(batu1)/1000)+(parseFloat(batu2)/1000)* ( parseFloat(ef4)/100)* ( parseFloat(ef4)/100)));
	
	
	     if (!isNaN(result7)) {		
           document.getElementById('pf2d').value = (result8.toFixed(2));	  
		}
	var resistance = (((parseFloat(batu2)/1000)*100)/(parseFloat(rate)));
	var reactance = Math.sqrt(( Math.pow ((parseFloat(impedance)),2))-( Math.pow ((parseFloat(resistance)),2)));
	var pf3a = (parseFloat(resistance))+(Math.pow((parseFloat(reactance)),2)/200);
	//var pf4a = ((((parseFloat(pf2))-(parseFloat(reactance)))/200) * ((parseFloat(pf2))*((parseFloat(reactance))))+((parseFloat(pf2)))*((parseFloat(resistance))+(0.6*(parseFloat(reactance)))));//
	var pf4a = ((((parseFloat(pf2))* (parseFloat(resistance)))+(0.6*(parseFloat(reactance))))+  ((parseFloat(pf2))*(parseFloat(reactance))-(0.6*(parseFloat(resistance))))*   ((parseFloat(pf2)*(parseFloat(reactance))-(0.6*(parseFloat(resistance))))/200))

	
	     if (!isNaN(result7)) {		
           document.getElementById('r1').value = (resistance.toFixed(2));	  
		   document.getElementById('r2').value = (reactance.toFixed(2));
		   document.getElementById('pf3a').value = (pf3a.toFixed(2));	
		   document.getElementById('pf4a').value = (pf4a.toFixed(2));
		}
	 var resisx = document.getElementById('r1').value; 
	
}
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModels").change(function () {
            if ($(this).val() == "Plug in Bushing Type") {               
				$("#txtOther").show();
                $("#txtOther").focus();
				$("#txtOthers").show();
                $("#txtOthers").focus();
            } else {              
				$("#txtOther").hide(); 	
				$("#txtOthers").hide(); 	
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels1").change(function () {
            if ($(this).val() == "Plug in Bushing Type") {               
				$("#txtOther1").show();
                $("#txtOther1").focus();
				$("#txtOthers1").show();
                $("#txtOthers1").focus();
            } else {              
				$("#txtOther1").hide(); 	
				$("#txtOthers1").hide(); 	
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_1").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_1").show();
                $("#txtOther4_1").focus();
        $("#txtOther4_1").show();
                $("#txtOther4_1").focus();
            } else {              
        $("#txtOther4_1").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_2").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_2").show();
                $("#txtOther4_2").focus();
        $("#txtOther4_2").show();
                $("#txtOther4_2").focus();
            } else {              
        $("#txtOther4_2").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_3").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_3").show();
                $("#txtOther4_3").focus();
        $("#txtOther4_3").show();
                $("#txtOther4_3").focus();
            } else {              
        $("#txtOther4_3").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_4").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_4").show();
                $("#txtOther4_4").focus();
        $("#txtOther4_4").show();
                $("#txtOther4_4").focus();
            } else {              
        $("#txtOther4_4").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_5").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_5").show();
                $("#txtOther4_5").focus();
        $("#txtOther4_5").show();
                $("#txtOther4_5").focus();
            } else {              
        $("#txtOther4_5").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_6").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_6").show();
                $("#txtOther4_6").focus();
        $("#txtOther4_6").show();
                $("#txtOther4_6").focus();
            } else {              
        $("#txtOther4_6").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_7").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_7").show();
                $("#txtOther4_7").focus();
        $("#txtOther4_7").show();
                $("#txtOther4_7").focus();
            } else {              
        $("#txtOther4_7").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_8").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_8").show();
                $("#txtOther4_8").focus();
        $("#txtOther4_8").show();
                $("#txtOther4_8").focus();
            } else {              
        $("#txtOther4_8").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_9").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_9").show();
                $("#txtOther4_9").focus();
        $("#txtOther4_9").show();
                $("#txtOther4_9").focus();
            } else {              
        $("#txtOther4_9").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_10").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_10").show();
                $("#txtOther4_10").focus();
        $("#txtOther4_10").show();
                $("#txtOther4_10").focus();
            } else {              
        $("#txtOther4_10").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_11").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_11").show();
                $("#txtOther4_11").focus();
        $("#txtOther4_11").show();
                $("#txtOther4_11").focus();
            } else {              
        $("#txtOther4_11").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_12").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_12").show();
                $("#txtOther4_12").focus();
        $("#txtOther4_12").show();
                $("#txtOther4_12").focus();
            } else {              
        $("#txtOther4_12").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_13").change(function () {
            if ($(this).val() == "YES") {               
        $("#txtOther4_13").show();
                $("#txtOther4_13").focus();
        $("#txtOther4_13").show();
                $("#txtOther4_13").focus();
            } else {              
        $("#txtOther4_13").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_14").change(function () {
            if ($(this).val() == "YES") {               
        $("#baris6_ket").show();
		$("#baris6_ket").removeAttr("disabled");
                $("#baris6_ket").focus();
            } else {                            
        $("#baris6_ket").hide();   
		$("#baris6_ket").attr("disabled", "disabled");   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_15").change(function () {
            if ($(this).val() == "YES") {               
        $("#baris7_ket").show();
		$("#baris7_ket").removeAttr("disabled");
                $("#baris7_ket").focus();
            } else {                            
        $("#baris7_ket").hide();   
		$("#baris7_ket").attr("disabled", "disabled"); 
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_16").change(function () {
            if ($(this).val() == "YES") {               
         $("#baris8_ket").show();
		$("#baris8_ket").removeAttr("disabled");
                $("#baris8_ket").focus();
            } else {                            
        $("#baris8_ket").hide();   
		$("#baris8_ket").attr("disabled", "disabled");  
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_17").change(function () {
            if ($(this).val() == "YES") {               
         $("#baris9_ket").show();
		$("#baris9_ket").removeAttr("disabled");
                $("#baris9_ket").focus();
            } else {                            
        $("#baris9_ket").hide();   
		$("#baris9_ket").attr("disabled", "disabled");  
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModel4_18").change(function () {
            if ($(this).val() == "YES") {               
         $("#baris10_ket").show();
		$("#baris10_ket").removeAttr("disabled");
                $("#baris10_ket").focus();
            } else {                            
        $("#baris10_ket").hide();   
		$("#baris10_ket").attr("disabled", "disabled");  
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ovaltine").change(function () {
            if ($(this).val() == "") {
                $("#safety").removeAttr("disabled");
				$("#safety").hide();
				$("#safety1").hide();
				$("#safety_ket").hide();               
            } else {
                $("#safety").attr("disabled", "disabled"); 
				$("#safety").show();
				$("#safety1").show();
				$("#safety_ket").show();  				
            }
        });
    });
</script>

<script>
    $(function(){
        $('#btn-tambah').on('click', function(){
            $('#tbl-top-body').append(`
              <tr>
                <td>
                  <input type="text" id="nama_barang" name="nama_barang[]" class="form-control" style="width: 100%;" required>
                </td>
                <td>
                  <input type="number" id="qty_barang" name="qty_barang[]" class="form-control" style="width: 100%;" required>
                </td>
                <td>
                  <input type="text" id="detail_barang" name="detail_barang[]" class="form-control" style="width: 100%;" required>
                </td>
                <td>
                  <select class="form-control select2" name="status_drawing[]" required>
                    <option selected="selected"></option>
                    <option name="status_drawing[]" value="YES">YES</option>
                    <option name="status_drawing[]" value="NO">NO</option>
                  </select>
                </td>
                <td style="text-align:center;"><button type="button" class="btn btn-danger removeItem">Remove</button></td>
              </tr>
            `);

            $('.removeItem').on('click', function(){
                $(this).closest("tr").remove();
            })
        })
    })
</script>


</body>
</html>	
</div>
<?php } ?>