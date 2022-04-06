

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

  <style type="text/css">

    html, body {
      height: 100%;

    }

    #wrapper {

      margin-top: 2%;
      margin-left: 1%;
      margin-right: 1%;
      margin-bottom: 2%;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      border: 3px solid;
    }

    table {
    border: none;
    }

    .column {
      float: left;
      width: 50%;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

  </style>


  <?php

if($_GET["nopracost"]){ 
  session_start();
  include ("koneksi.php");
    $oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where nopracost='".$_GET["nopracost"]."'");
  $oilDb = mysqli_fetch_assoc($oil);
  $noprospect=$oilDb["noprospect"];
  $nopracost=$oilDb["nopracost"];

  $madu = mysqli_query($GLOBALS["___mysqli_ston"], "select * from h_rpospect where noprospect='$noprospect'");
  $maduDb = mysqli_fetch_assoc($madu);
  $tanggal=$maduDb['tgl_prospect'];
  $tglbaru = date('d-m-Y', strtotime($tanggal));
?>

<body>

<div id="wrapper" style="page-break-after:always;">

  <br>

  <div class="row">
    <div class="col-sm-6">
      <br>
      <img src="../../assets/img/logo.png" style="width:80%" alt="Logo-Trafindo">
    </div>    

    <div class="col-sm-6">
      <i class="far fa-building"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Address. Jl. Hayam Wuruk 4 FX, Jakarta 10120</font> <br>
      <i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Phone. (62-21) 385 0703, 386 1865, 351 7113, 345 1384</font> <br>
      <i class="fas fa-fax"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Fax. (62-21) 385 0702, 386 1865</font> <br>
      <i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Email. sales@trafoindonesia.com ; trafo@trafoindonesia.com</font> <br>
      <i class="fas fa-globe"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">www.trafoindonesia.com</font> <br>
      <i class="fas fa-industry"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Address. Jl. Siliwangi, Tangerang (Factory I, II, III & IV)</font> <br>
    </div>
    <!-- /.col -->

  </div>

  <br><br>

  <div class="row">
    <div class="col-sm-12">
      <center><b><font color="black" size="6">DETAIL PROSPECT DRY</font></b></center>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <b><hr></b>
    </div>
  </div>

  <br>

  <div class="row">
  <div class="column">
    <table>
      <tbody>
      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td colspan="3"><h4>GENERAL INFORMATION</h4><td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>No Prospect</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $noprospect; ?></h6>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>No Sub Prospect</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $nopracost;  ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Tahun Prospect</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $maduDb['tahun'];  ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Nama Sales</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $maduDb['sales']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Segmen Penjualan</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $maduDb['segment']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Sub Segmen Penjualan</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $maduDb['sub_segment']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Project</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $maduDb['project']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Status Stage</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $maduDb['priority']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td colspan="3"><h4>ELECTRICAL CHARATERISTIC</h4><td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Insulatiom Thermal</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['insulation_thermal']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Temperature Rise</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['temp_rise']; ?></h6></td>
      </tr>
	   <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Type of Cooling</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['type_cooling']; ?></h6></td>
      </tr>
	  

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Rate Capacity</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['rate_capacity']; ?>&nbsp;&nbsp;KVA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $oilDb['type_cooling1']; ?></strong></h6></td>
		
      </tr>
	    <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6></h6></td>
        <td><h6>&nbsp;</h6></td>
		<?php
		if ($oilDb['rate_capacity2']=="0"){
			$ratex="";
			$ratexkva="";
		}
		else {
			$ratex=$oilDb['rate_capacity2'];
			$ratexkva="KVA";
		}
		?>
        <td><h6><?php echo $ratex; ?>&nbsp;&nbsp;<?php echo $ratexkva; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $oilDb['type_cooling2']; ?></strong></h6></td>	
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>No Of Phase</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['no_phase']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Frequency</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['frequency']; ?>&nbsp;&nbsp;Hz</h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Primary Voltage</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['primary_voltage']; ?>&nbsp;&nbsp;Volt</h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Secondary Voltage</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['secondary_voltage']; ?>&nbsp;&nbsp;Volt</h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Vektor Group</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['vektor_group']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Type of Winding</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['type_winding']; ?></h6></td>
      </tr>

     

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>Tap Changer</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['tap_changer']; ?></h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td><h6>No Of Tap</h6></td>
        <td><h6>:</h6></td>
        <td><h6><?php echo $oilDb['no_tap']; ?>&nbsp;&nbsp;Taps</h6></td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td colspan="3"><h4>TRANSFORMER TESTING</h4><td>
      </tr>

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td colspan="3"><h6><strong>SPECIAL TEST</strong></h6><td>
      </tr>
	  <?php 
	  if ($oilDb['sp_slt'] == '' or $oilDb['sp_slt'] == "NO" ) {
	  echo '';
	  }
	  else
	  { echo '<tr>
        <td style="width: 10%">&nbsp;</td>
        <td style="white-space: nowrap;"><h6>SOUND LEVEL(NOISE)</h6></td>
        <td><h6>:</h6></td>
        <td><h6>'.$oilDb['sp_slt'].'</h6></td>
      </tr>';
	  }
	  ?>
	   <?php 
	  if ($oilDb['sp_pd'] == '' or $oilDb['sp_pd'] == "NO" ) {
	  echo '';
	  }
	  else
	  { echo '<tr>
        <td style="width: 10%">&nbsp;</td>
        <td style="white-space: nowrap;"><h6>PARTIAL DISCHARGER</h6></td>
        <td><h6>:</h6></td>
        <td><h6>'.$oilDb['sp_pd'].'</h6></td>
      </tr>';
	  }
	  ?>     
       <?php 
	  if ($oilDb['sp_zero'] == '' or $oilDb['sp_zero'] == "NO" ) {
	  echo '';
	  }
	  else
	  { echo '<tr>
        <td style="width: 10%">&nbsp;</td>
        <td style="white-space: nowrap;"><h6>ZERO SEQUENCE IMPEDANCE</h6></td>
        <td><h6>:</h6></td>
        <td><h6>'.$oilDb['sp_zero'].'</h6></td>
      </tr>';
	  }
	  ?>  
   

      <tr>
        <td style="width: 10%">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>

    </table>

  </div>

  <div class="column">
    <table>
        <tr>
          <td colspan="3" style="width: 1%"><h4>GENERAL CONDITION</h4></td>
        </tr>

        <tr>
          <td style="white-space: nowrap;"><h6>Category</h6></td>
          <td><h6>:</h6></td>
          <td style="white-space: nowrap;"><h6><?php echo $oilDb['category']; ?></h6></td>
        </tr>

        <tr>
          <td style="white-space: nowrap;"><h6>Type of Transformer</h6></td>
          <td><h6>:</h6></td>
          <td style="word-wrap: break-word; white-space: nowrap;"><h6><?php echo $oilDb['type_trafo']; ?></h6></td>
        </tr>

        <tr>
          <td style="white-space: nowrap;"><h6>Service Condition</h6></td>
          <td><h6>:</h6></td>
          <td><h6><?php echo $oilDb['service_condition']; ?></h6></td>
        </tr>

        <tr>
          <td style="white-space: nowrap;"><h6>Altitude</h6></td>
          <td><h6>:</h6></td>
          <td><h6><?php echo $oilDb['altitude']; ?>&nbsp;&nbsp;mdpl</h6></td>
        </tr>

        <tr>
          <td style="white-space: nowrap;"><h6>Ambient Temp</h6></td>
          <td><h6>:</h6></td>
          <td><h6><?php echo $oilDb['ambient_temp']; ?>&nbsp;&nbsp;Celcius</h6></td>
        </tr>

        <tr>
          <td style="white-space: nowrap;"><h6>International Standard</h6></td>
          <td><h6>:</h6></td>
          <td style="white-space: nowrap;"><h6><?php echo $oilDb['standarisasi']; ?></h6></td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3" style="width: 1%; white-space: nowrap;"><h4>PROTECTION & ACCESORIES</h4></td>
        </tr>

        <?php if (($oilDb['dig_thermo']) == 'N/A' or $oilDb['dig_thermo'] == 'NO' ) {
          echo '';
        }else{
          echo '<tr>
          <td style="white-space: nowrap;"><h6>Digital Thermometer</h6></td>
          <td><h6>:</h6></td>
          <td><h6>'.$oilDb['dig_thermo'].'</h6></td>
          <td>&nbsp;</td>
        </tr>';
        } ?>

        <?php if (($oilDb['cool_fans']) == 'NO') {
          echo '';
        }else{
          echo '<tr>
          <td style="white-space: nowrap;"><h6>Cooling Fans</h6></td>
          <td><h6>:</h6></td>
          <td><h6>'.$oilDb['cool_fans'].'</h6></td>
          <td>&nbsp;</td>
        </tr>';
        } ?>

        <?php if ($oilDb['enclosure'] == 'N/A' or $oilDb['enclosure'] == 'NO' ) {
          echo '';
        }else{
          echo '<tr>
          <td style="white-space: nowrap;"><h6>Enclosure</h6></td>
          <td><h6>:</h6></td>
          <td><h6>'.$oilDb['enclosure'].'</h6></td>
          <td>&nbsp;</td>
        </tr>';
        } ?>


        <?php if (($oilDb['dig_thermo'] == 'N/A') or ($oilDb['dig_thermo'] == 'NO')) {
          echo '<tr>
                  <td colspan="3">&nbsp;</td>
                </tr>';
        }else{
          echo '';
        } ?>

        <?php if (($oilDb['cool_fans']) == 'NO') {
          echo '<tr>
                  <td colspan="3">&nbsp;</td>
                </tr>';
        }else{
          echo '';
        } ?>

        <?php if (($oilDb['enclosure'] == 'N/A') or ($oilDb['enclosure'] == "NO")) {
          echo '<tr>
                  <td colspan="3">&nbsp;</td>
                </tr>';
        }else{
          echo '';
        } ?>


        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
		 <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
		 <tr>
          <td colspan="1"></td>
        </tr>
		
        <tr>
          <td colspan="3" style="width: 1%"><h6><strong>TYPE TEST</strong></h6></td>
        </tr>
		
	    <?php 
		if ($oilDb['test_impulse'] == '' or $oilDb['test_impulse'] == "NO" ) {
		echo '';
		}
		else
		{ echo '<tr>       
        <td style="white-space: nowrap;"><h6>LIGHTNING IMPULSE</h6></td>
        <td><h6>:</h6></td>
        <td><h6>'.$oilDb['test_impulse'].'</h6></td>
		</tr>';
		}
		?>  
		
         <?php 
		if ($oilDb['test_temp_rise'] == '' or $oilDb['test_temp_rise'] == "NO" ) {
		echo '';
		}
		else
		{ echo '<tr>
        
        <td style="white-space: nowrap;"><h6>TEMPERATURE RISE</h6></td>
        <td><h6>:</h6></td>
        <td><h6>'.$oilDb['test_temp_rise'].'</h6></td>
		</tr>';
		}
		?>  
     

    </table>
  </div>

  <table>
    <tr>
      <td style="width: 50px">&nbsp;</td>
      <td colspan="3"><h4>NOTES</h4></td>
    </tr>
    <tr>
      <td style="width: 50px">&nbsp;</td>
      <td><h6>Catatan 1</h6></td>
      <td><h6>:</h6></td>
      <td><h6><?php echo $oilDb['notes1']; ?></h6></td>
    </tr>

    <tr>
      <td style="width: 50px">&nbsp;</td>
      <td><h6>Catatan 2</h6></td>
      <td><h6>:</h6></td>
      <td><h6><?php echo $oilDb['notes2']; ?></h6></td>
    </tr>

    <tr>
      <td style="width: 50px">&nbsp;</td>
      <td><h6>Catatan 3</h6></td>
      <td><h6>:</h6></td>
      <td><h6><?php echo $oilDb['notes3']; ?></h6></td>
    </tr>
  </table>

<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>

  </body>

</html>

  <!-- jQuery -->
  <script src="../../plugins/plugin_chris/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/plugin_chris/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../plugins/plugin_chris/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../plugins/plugin_chris/dist/js/demo.js"></script>

<?php } ?>  
