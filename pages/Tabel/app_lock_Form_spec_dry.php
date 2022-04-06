
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
	
	include ("koneksi.php");
	$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from formspec where noformspec='".$_GET["nopracost"]."'");
	$oilDb = mysqli_fetch_assoc($oil);
	$noprospect=$oilDb["noprospect"];
	$nopracost=$oilDb["noformspec"];
	$created=  $_SESSION["namalengkap"];
	$type_cooling=$oilDb["type_cooling"];
	$type_trafo=$oilDb["type_trafo"];
	$service_condition=$oilDb["service_condition"];
	$type_cooling1=$oilDb["type_cooling1"];
	$type_cooling2=$oilDb["type_cooling2"];
	$type_windingx=$oilDb["type_winding"];
	$sudden_relay=$oilDb["sudden_relay"];
	$buchholz_relay=$oilDb["buchholz_relay"];
	$botolan= date("Y-m-d");
	$notap=$oilDb["no_tap"];
	
		switch ($type_windingx) {
				case ($type_windingx='Cu-Cu'):
					$hv_winding='Copper';
					$lv_winding='Copper';
					break;
				case ($type_windingx='Cu-Al'):
					$hv_winding='Copper';
					$lv_winding='Aluminium';
					break;
				case ($type_windingx='Al-Al'):
					$hv_winding='Aluminium';
					$lv_winding='Aluminium';
					break;
				case ($type_windingx='Al-Cu'):
					$hv_winding='Aluminium';
					$lv_winding='Copper';
					break;
		}
		
	$nilai_rate11 = round(($oilDb["rate_capacity"]/(($oilDb["primary_voltage"]/1000)*sqrt(3))),2);
	$nilai_rate21 = round(($oilDb["rate_capacity"]/(($oilDb["secondary_voltage"]/1000)*sqrt(3))),2);
	if ($oilDb["rate_capacity2"]<>0)
	{
	$nilai_rate12 = round(($oilDb["rate_capacity2"]/(($oilDb["primary_voltage"]/1000)*sqrt(3))),2);
		$nilai_rate22 = round(($oilDb["rate_capacity2"]/(($oilDb["secondary_voltage"]/1000)*sqrt(3))),2);
	}
	

	


	
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
					 <center><font color="RED"><h1>MENUNGGU APPROVAL SUPERVISOR</h1></font></center>
		          </div>
		        </div>

		        <div class="row mb-2">
		          <div class="col-sm-6">

		          </div>
		         
				  <div class="col-sm-12">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item active"><font color="black"><strong>Created by: <?php echo $oilDb["created"]; ?></strong></font></li>  
					  <li class="breadcrumb-item active"><font color="black"><strong>Propost by by: <?php echo $oilDb["update_oleh"]; ?></strong></font></li>  
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
                    <input type="text" class="form-control" name="winding_connection1" readonly  value="<?php echo $oilDb['winding_connection_primary']; ?>" autofocus required >
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
                    <input type="number" class="form-control" name="rate_secondary_current2" readonly value="'.$nilai_rate22.'"   placeholder="Rate Secondary Current" autofocus required >
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
                    <input type="text" class="form-control" name="winding_connection2"  readonly  value="<?php echo $oilDb['winding_connection_secondary']; ?>" autofocus required >
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
                    <input type="number" name="incase_primary_voltage1" readonly  value="<?php echo $oilDb['incase_primary_voltage1']; ?>" class="form-control"   />
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
                    <input type="number" name="rate_capacity_primary1" readonly value="<?php echo $oilDb['rate_capacity1']; ?>" class="form-control"   />
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
                    <input type="number" name="incase_primary_voltage2" readonly value="<?php echo $oilDb['incase_primary_voltage2']; ?>"  class="form-control"   />
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
                    <input type="number" name="rate_capacity_primary2" readonly  value="<?php echo $oilDb['rate_capacity2']; ?>" class="form-control"   />
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
                    <input type="number" name="incase_secondary_voltage1"  readonly value="<?php echo $oilDb['incase_secondary_voltage1']; ?>"   class="form-control"   />
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
                    <input type="number" name="rate_capacity_secondary1" readonly  value="<?php echo $oilDb['rate_capacity3']; ?>"  class="form-control"   />
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
                    <input type="number" name="incase_secondary_voltage2" readonly  value="<?php echo $oilDb['incase_secondary_voltage2']; ?>"  class="form-control"   />
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
                    <input type="number" name="rate_capacity_secondary2" readonly  value="<?php echo $oilDb['rate_capacity4']; ?>" class="form-control"   />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KVA</strong></span>
                    </div>
              </div>
             </div>
			 </div>
			 
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">4. 8.&nbsp;&nbsp;&nbsp;Additional Taps on High Voltage :</label>
              <div class="col-sm-3">
                <input type="number" name="no_tap" readonly class="form-control" value="<?php echo $notap; ?>" &nbsp;&nbsp;Taps " />
              </div>

              <div class="col-sm-6">
                <input type="text" name="add_tap" readonly value="<?php echo $oilDb['add_tap']; ?>" class="form-control"  />
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
                    <input type="number" name="hsv_primary"  readonly value="<?php echo $oilDb['hsvp']; ?>" placeholder="Highest System Voltage Primary"class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="number" name="hsv_secodary" readonly value="<?php echo $oilDb['hsvs'];?>" placeholder="Highest System Voltage Secondary" class="form-control"  />
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
                    <input type="number" name="impulse_voltage_primary" readonly value="<?php echo $oilDb['impulse_vp']; ?>" placeholder="Impulse Primary" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="number" name="impulse_voltage_secondary" readonly value="<?php echo $oilDb['impulse_vs']; ?>" placeholder="Impulse Secondary"  class="form-control"  />
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
                    <input type="number" name="applied_voltage_primary" readonly value="<?php echo $oilDb['applied_test1']; ?>" placeholder="Applied Test Voltage Primary" class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>KV</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-6">
                    <input type="number" name="applied_voltage_secondary" readonly value="<?php echo $oilDb['applied_test2']; ?>"  placeholder="Applied Test Voltage Secondary" class="form-control"  />
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
                    <input type="text" name="winding_temp" readonly value="<?php echo ($oilDb['temp_rise']); ?>" class="form-control"  />
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
                <label>and the oil temperature rise will not exceed</label>
              </div>

              <div class="col-md-3">
                <div class="input-group mb-3">
                    <input type="text" name="oil_temp" readonly value="<?php echo ($oilDb['insulation_thermal']); ?>"  class="form-control"  />
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
                    <input type="number" name="noload_loses" id="batu1" onkeyup="sumi();" readonly value="<?php echo $oilDb['noload_loses']; ?>"  placeholder="No load losses" class="form-control"  />
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
                    <input type="text" name="temp_load_loses" readonly value="<?php echo $oilDb['temp_load_loses']; ?>"  required class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong><sup>o</sup>C</strong></span>
                    </div>
                </div>
              </div>
			  <div class="col-md-1">

              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="load_loses" id="batu2" onkeyup="sumi();" readonly value="<?php echo $oilDb['load_loses']; ?>"  placeholder="Load Losses"   class="form-control"  />
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
                    <input type="number"  name="eff1" id="ef1" onkeyup="sum();" readonly value="<?php echo $oilDb['effeciency1']; ?>"  placeholder="Effeciency 1" class="form-control"  />
				
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="eff2" id="ef2" onkeyup="sum();" readonly  value="<?php echo $oilDb['effeciency2']; ?>"  placeholder="Effeciency 2"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="eff3"  id="ef3" onkeyup="sum();" readonly value="<?php echo $oilDb['effeciency3']; ?>" placeholder="Effeciency 3"  class="form-control"  />
                    <div class="input-group-append">
                      <span class="input-group-text" style="color: RED; background-color: white;"><strong>%</strong></span>
                    </div>
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="input-group mb-2">
                    <input type="number" name="eff4" id="ef4" onkeyup="sum();" readonly value="<?php echo $oilDb['effeciency4']; ?>" placeholder="Effeciency 4"   class="form-control"  />
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
                    <input type="number" name="pf1" id="pf1" step="any" onkeyup="sum();" readonly  value="<?php echo $oilDb['pf1']; ?>" placeholder="PF 1" class="form-control"  />
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
                    <input type="number" name="pf2" id="pf2" onkeyup="sum();" readonly value="<?php echo $oilDb['pf2']; ?>" placeholder="PF 2" class="form-control"  />
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
                    <input type="number" name="existing_current_nominal" readonly  value="<?php echo $oilDb['percent_existing_current']; ?>" class="form-control"  />
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
                    <input type="number" name="impedance" id="impedance" onkeyup="sum();" readonly value="<?php echo $oilDb['percent_impedance']; ?>"  class="form-control"  />
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
                    <input type="number" name="pf3a" id="pf3a" readonly value="<?php echo $oilDb['pf3a']; ?>"  placeholder="pf3a" readonly class="form-control"  />
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
                    <input type="number" name="resist1" id="r1" readonly value="<?php echo $oilDb['r1']; ?>" placeholder="Resistance" readonly  class="form-control"  />
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
                    <input type="number" name="pf4a" id="pf4a" readonly value="<?php echo $oilDb['pf4a']; ?>" placeholder="pf4a" readonly  class="form-control"  />
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
                    <input type="number" name="react1" id="r2" readonly value="<?php echo $oilDb['r2']; ?>" placeholder="Reactance" readonly class="form-control"  />
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
			  			 <input type="hidden" name="hv_terminal" value="HV Terminal"  class="form-control" readonly  />    
              		</div>
			 
			  		<div class="col-md-6">   
			  			 <input type="text" name="hv_terminal_ket" value="<?php echo $oilDb["hv_terminal_ket"]; ?>" readonly class="form-control"  />    
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
			 			<input type="text" name="lv_terminal_ket" value="<?php echo $oilDb["lv_terminal_ket"]; ?>"  readonly class="form-control"  /> 
								 
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
			     <input type="text"  value="<?php echo $oilDb['tb']; ?>" readonly class="form-control"  />
			  </div>
			  <div class="col-md-6">   
			  <input type="text" name="trafo_base_ket" readonly value="<?php echo $oilDb['tb_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
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
			     <input type="text"  value="<?php echo $oilDb['name_plate']; ?>" readonly class="form-control"  />
			  </div>
			  <div class="col-md-6">   
			  <input type="text" name="name_plate_ket" value="<?php echo $oilDb['name_plate_ket']; ?>" readonly  class="form-control"  />    
              </div>
            </div></br>
			<!--5-->
			
			
				<!--6-->
			
			
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
        if ($oilDb['enclosure'] == "NO" or $oilDb['enclosure'] == "") {			
        echo '
      <div class="row" style="visibility: hidden;  display:none;">
        <div class="col-md-1"> 
                </div>
        <div class="col-md-3">   
          <input type="text" value="ENCLOSURE" readonly class="form-control"  />   
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
          <input type="text" name="cable_box_ket"  placeholder="Keterangan" readonly class="form-control"  />    
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
          <input type="text" value="DIGITAL THERMOMETERE" readonly class="form-control"  />   
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
          <input type="text" name="dig_thermo_ket"  placeholder="Keterangan" readonly class="form-control"  />    
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
          <input type="text" name="cool_fans_ket"  placeholder="Keterangan" readonly class="form-control"  />    
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
          <input type="text" name="tap_changer_ket"  placeholder="Keterangan" readonly class="form-control"  />    
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
          <input type="text" id="tm1" readonly  value="<?php echo $oilDb['terminal_control_box']; ?>" class="form-control"  />    
        </div>  
          <div class="col-md-6">   
          <input type="text" name="terminal_control_box_ket" id="txtOther4_1" value="<?php echo $oilDb['terminal_control_box_ket']; ?>"  placeholder="Keterangan" readonly class="form-control"  />    
        </div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
            <input type="text"  value="SURGE ARRESTER" readonly  class="form-control"  />    
          </div>  
        
		  <div class="col-md-1">   
          <input type="text" id="tm1" readonly  value="<?php echo $oilDb['surge_arrester']; ?>" class="form-control"  />    
        </div>  
          <div class="col-md-6">   
          <input type="text" name="surge_arrester_ket" id="txtOther4_2" readonly value="<?php echo $oilDb['surge_arrester_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
            <input type="text"  value="NEUTRAL CT" readonly  class="form-control"  />    
          </div>  
        
		   <div class="col-md-1">   
          <input type="text" id="tm1" readonly  value="<?php echo $oilDb['neutral_ct']; ?>" class="form-control"  />    
        </div> 
          <div class="col-md-6">   
          <input type="text" name="neutral_ct_ket" id="txtOther4_3" readonly value="<?php echo $oilDb['neutral_ct_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
            <input type="text"  value="DIFFERENTIAL CT" readonly  class="form-control"  />    
          </div>  
        
		<div class="col-md-1">   
          <input type="text" id="tm1" readonly  value="<?php echo $oilDb['dct']; ?>" class="form-control"  />    
        </div>
          <div class="col-md-6">   
          <input type="text" name="dct_ket" id="txtOther4_4" readonly value="<?php echo $oilDb['dct_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

      
      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris6" id="baris6" value="<?php echo $oilDb['baris6']; ?>" placeholder="6" readonly class="form-control"  />    
                </div>
        
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly  value="<?php echo $oilDb['baris6a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris6_ket" id="baris6_ket" readonly value="<?php echo $oilDb['baris6_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris7" id="baris7" value="<?php echo $oilDb['baris7']; ?>" placeholder="7" readonly  class="form-control"  />    
                </div>
       
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly  value="<?php echo $oilDb['baris7a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris7_ket" id="baris7_ket" readonly value="<?php echo $oilDb['baris7_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>
	  
      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris8" id="baris8" value="<?php echo $oilDb['baris8']; ?>" placeholder="6" readonly class="form-control"  />    
                </div>
         
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly  value="<?php echo $oilDb['baris8a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris8_ket" id="baris8_ket" readonly value="<?php echo $oilDb['baris8_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>
	   <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris9" id="baris9" value="<?php echo $oilDb['baris9']; ?>" placeholder="9" readonly class="form-control"  />    
                </div>
        
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly  value="<?php echo $oilDb['baris9a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris9_ket" id="baris9_ket" readonly value="<?php echo $oilDb['baris9_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
      </div>
	   <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-3">   
          <input type="text" name="baris10" id="baris10" value="<?php echo $oilDb['baris10']; ?>" placeholder="10" readonly class="form-control"  />    
                </div>
        
		  <div class="col-md-1">   
            <input type="text" id="tm1" readonly  value="<?php echo $oilDb['baris10a']; ?>" class="form-control"  />    
           </div>
          <div class="col-md-6">   
          <input type="text" name="baris10_ket" id="baris6_ket" readonly value="<?php echo $oilDb['baris10_ket']; ?>"  placeholder="Keterangan"  class="form-control"  />    
        </div>     
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
			  <input type="text" readonly value="<?php echo $oilDb['painting_system']; ?>" placeholder="Keterangan"  class="form-control"  />    
              </div>
			 
			  <div class="col-md-4">   
			  <input type="text" name="painting_system_ket" readonly value="<?php echo $oilDb['painting_system_ket']; ?>" placeholder="Keterangan"  class="form-control"  />    
              </div>
            </div>
			
			       <div class="row">
				<div class="col-md-1">
				</div>
			   <div class="col-md-3">
                <label>PAINTING COLOR </label>
              </div>
              <div class="col-md-8">
                 <input type="text" name="painting_color" readonly value="<?php echo $oilDb['painting_color']; ?>" placeholder="Painting Color"  class="form-control"  />             
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
                 <textarea id="general_notes" name="general_notes" readonly  rows="4" placeholder="General notes"  class="form-control"><?php echo $oilDb['general_notes'] ?>
				 </textarea>
              </div>
            </div>
</div>
</div>



			<hr size="12px">
<br>
			


			<div class="form-actions margin-bottom" style="text-align:center;">			
			<?php
				$queryc = mysqli_query($GLOBALS["___mysqli_ston"], "select * from upload_file where nopracost = '$nopracost' order by id_file asc");
				$xaDb = mysqli_fetch_assoc($queryc);
				$dodol=$xaDb["nama_file"];			
			?>
			
			<a href="../?p=form_spec_wait_approve" class="btn btn-warning" >BALIK</a>
			<a href="print_Form_spec_dry.php?noprospect=<?php echo $noprospect; ?>&nopracost=<?php echo $nopracost; ?>"  class="btn btn-primary"  target="_BLANK">PREVIEW PDF FORM SPEC</a>
			<a href="../../temp/<?php echo $dodol;?>"  class="btn btn-secondary"  target="_BLANK">PREVIEW PDF DRAWING</a>
			
		
			<input type="submit" name="app"  onclick="return confirm('Anda sudah yakin Approve? Akan langsung terkirim ke Sales ')" value="APPROVE" class="btn btn-success" /> 
			
			<!--<input type="submit" name="reject"  onclick="return confirm('Mohon jelaskan alasan reject di form berikut ')" value="REJECT" class="btn btn-danger" />  -->
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg" onclick="return confirm('Mohon jelaskan alasan reject di form berikut ')" value="REJECT">REJECT  </button>
			<div class="modal fade" id="modal-lg">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
						<h4 class="modal-title">ALASAN REJECT</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
						</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<input type="hidden" Readonly name="nopracost" autofocus  class="form-control" value="<?php echo $nopracost;  ?> "/>
										</div>
									</div>
								</div>
								<textarea rows="10" class="form-control" name="reject_spv" placeholder="Tulis Alasan Reject Disini" required></textarea>
							</div>
								<div class="modal-footer justify-content-between">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" name="reject" class="btn btn-primary" onclick="return confirm('Yakin Ingin Reject ? Mohon Periksa alasan reject..')" value="Submit Reject">Submit</button>
								</div>
					</div>
				<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div> 
			
			</br></br>

			<div style="text-align:center;">		
			</div>	  
			</div>

		</form>
	</div>
	</body>


</html>
<?php
  
  if(isset($_POST["reject"])){
    if($_POST["reject"]){
      $tgl_reject= date("Y-m-d");
      $reject_spv= $_POST['reject_spv'];
      
        mysqli_query($GLOBALS["___mysqli_ston"], "update formspec set status=0, reject_spv='$reject_spv', tgl_reject='$tgl_reject' where noformspec ='$nopracost'");
        echo"<script>window.location.href='../?p=form_spec_reject_spv'</script>";
              
    }
  }
?>


<?php
	if(isset($_POST["app"])){
		if($_POST["app"]){
				mysqli_query($GLOBALS["___mysqli_ston"], "update formspec set status=4 where noformspec ='$nopracost'");
				mysqli_query($GLOBALS["___mysqli_ston"], "update oil_prospect set status=4 where nopracost ='$nopracost'");
				$queryx = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where (noprospect = '$noprospect' and status != 4)");
				mysqli_query($GLOBALS["___mysqli_ston"], "update h_rpospect set status=4 where noprospect='$noprospect'");
				echo"<script>window.location.href='../?p=form_spec_terima_sales'</script>";
							
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
        $("#baris6a_ket").show();
                $("#baris6a_ket").focus();
            } else {           
        $("#baris6a_ket").hide();   
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_15").change(function () {
            if ($(this).val() == "YES") {               
        $("#baris6b_ket").show();
                $("#baris6b_ket").focus();
            } else {                            
        $("#baris6b_ket").hide();    
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModel4_16").change(function () {
            if ($(this).val() == "YES") {               
        $("#baris6c_ket").show();
                $("#baris6c_ket").focus();
            } else {                         
        $("#baris6c_ket").hide();    
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


</body>
</html>	
</div>
<?php } ?>