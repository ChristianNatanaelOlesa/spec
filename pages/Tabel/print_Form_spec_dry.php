
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

    #halaman_pertama {

      margin-top: 1%;
      border: 3px solid;
    }

    #halaman_kedua {
      margin-top: 1%;
      border: 3px solid;
    }

    table {
    border: none;
    border-collapse: collapse;
    }

    td {
        white-space: nowrap;
    }

    tr {
        font-size: 13px;
    }



    .kolom {
      float: left;
    }

    .left {
      width: 35%;
    }

    .right {
      width: 65%;
    }

    /* Clear floats after the columns */
    .baris:after {
      content: "";
      display: table;
      clear: both;
    }

}
  </style>

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
  $type_windingx=trim($oilDb["type_winding"]);
  $sudden_relay=$oilDb["sudden_relay"];
  $buchholz_relay=$oilDb["buchholz_relay"];
  $botolan= date("Y-m-d");
  $username = $oilDb["created"];
  $update = $oilDb["update_oleh"];
  $tgl_app= $oilDb["tgl_rilis"];
  $app_by= $oilDb["app_by"];
  $inisial= $oilDb["inisial"];
  $sitor =$oilDb["status"];
  
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


  
?>

<body>

<div id="halaman_pertama">

    <br>

    <div class="row">
      <div class="col-sm-6">
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="../../assets/img/logo.png" style="width:90%" alt="Logo-Trafindo">
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
    <div class="row">
      <div class="col-sm-12">
        <center><b><font color="black" size="6">SPECIFICATION FOR TRANSFORMER &nbsp;&nbsp;</font></b></center>
		
      </div>
    </div>

    <b><hr></b>
    
    <br>

    <table>
      <tbody>
        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 80px"><strong>1. </strong></td>
          <td colspan="14"><strong>TYPE  <?php echo $oilDb['type_cooling']; ?> :</strong>  Self Cooled / <?php echo $oilDb['service_condition']; ?> use / Step Up / Step Down / <?php echo $oilDb['type_trafo']; ?> Distribution Transformer</td>
        </tr>

        <tr>
          <td colspan="16">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 80px"><strong>2. </strong></td><!-- NOMOR -->
          <td colspan="6"><strong>SERVICE CONDITION :</strong> The transformer will be installed at the altitudes below</td>
          <td>&nbsp;</td>
          <td style="text-align:center; width: 30px; border:1px solid;"><strong><?php echo $oilDb['altitude']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>meters</strong></td>
          <td colspan="5">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 80px">&nbsp;</td>
          <td colspan="5">and the maximum ambient temperature does not exceed</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td style="text-align:center; width: 30px; border:1px solid;"><strong><?php echo $oilDb['ambient_temp']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong><sup>o</sup>C</strong></td>
          <td colspan="5">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="16">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px;"><strong>3. </strong></td><!-- NOMOR -->
          <td colspan="7"><strong>STANDARD : </strong> The transformer is designed, manufactured tested and tolerance in accordance with : </td>
          <td style="text-align:center; width: 30px; white-space: nowrap; border:1px solid;">&nbsp;<strong><?php echo $oilDb['standarisasi']; ?></strong>&nbsp;</td>
          <td colspan="8">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="16">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 80px"><strong>4. </strong></td><!-- NOMOR -->
          <td colspan="13"><strong>RATING</strong></td>
          <td style="width: 30px">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px;">4 - 1</td><!-- NOMOR -->
          <td>Number of Phase</td>
          <td style="width: 15px;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align: center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['no_phase']; ?></strong></td>
          <td>&nbsp;</td>
          <td><strong>phase</strong></td>
          <td>4 - 2</td><!-- NOMOR -->
          <td colspan="3">Frequency</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td colspan="2" style="width: 100px; text-align: center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['frequency']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Hz</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px;">4 - 3</td><!-- NOMOR -->
          <td>Primary Voltage</td>
          <td style="width: 15px;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['primary_voltage']; ?></strong></td>
          <td>&nbsp;</td>
          <td style="width: 20px;"><strong>Volt</strong></td>
          <td style="width: 40px">4 - 4</td><!-- NOMOR -->
          <td colspan="3">Secondary Voltage</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['secondary_voltage']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Volt</strong></td>
        </tr> 

        <?php if (($oilDb['type_cooling']) == 'ANAF') {
          echo '
				 <tr>
                  <td style="width: 30px">&nbsp;</td>
                  <td style="width: 40px">&nbsp;</td>
                  <td>Winding Connection</td>
                  <td style="width: 15px;">&nbsp;</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$oilDb['winding_connection_primary'].'</strong></td>
                  <td colspan="2">&nbsp;</td>
                  <td style="width: 40px">&nbsp;</td>
                  <td colspan="3">Winding Connection</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$oilDb['winding_connection_secondary'].'</strong></td>
                  <td style="text-align:center;">&nbsp;</td>
                </tr>
		  
				<tr>
                  <td style="width: 30px">&nbsp;</td>
                  <td style="width: 40px;">4 - 5</td>
                  <td>Rated Primary Current&nbsp;&nbsp; &nbsp;<strong>['.$type_cooling1.']</strong></td>
                  <td style="width: 15px;">&nbsp;</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$nilai_rate11.'</strong></td>
                  <td style="width:20px;">&nbsp;</td>
                  <td style="width:20px;"><strong>A </strong></td>
                  <td style="width: 40px">4 - 6</td>
                  <td colspan="3" style="white-space:nowrap;">Rated Secondary Current&nbsp;&nbsp; <strong> ['.$type_cooling1.']</strong></td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$nilai_rate21.'</strong></td>
                  <td>&nbsp;&nbsp;&nbsp;<strong>A</strong></td>
                  <td style="width:20px;">&nbsp;</td>
                </tr>

          

                <tr>
                  <td style="width: 30px">&nbsp;</td>
                  <td style="width: 40px;">&nbsp;</td>
                  <td>Rated Primary Current &nbsp;&nbsp; <strong>   ['.$type_cooling2.']</strong></td>
                  <td style="width: 15px;">&nbsp;</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>&nbsp;'.$nilai_rate12.'&nbsp;</strong></td>
                  <td style="width:20px;">&nbsp;</td>
                  <td style="width:20px;"><strong>A</strong></td>
                  <td style="width: 40px"></td>
                  <td colspan="3" style="white-space:nowrap;">Rated Secondary Current &nbsp;<strong> ['.$type_cooling2.']</strong></td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$nilai_rate22.'</strong></td>
                  <td>&nbsp;&nbsp;&nbsp;<strong>A</strong></td>
                  <td style="width:20px;">&nbsp;</td>
                  <td style="width:20px;">&nbsp;</td>
                </tr>

                <tr>
                  <td style="width: 30px">&nbsp;</td>
                  <td style="width: 40px">4 - 7</td>
                  <td>Rated Capacity &nbsp;&nbsp;<strong> ('.$type_cooling1.')</strong></td>
                  <td style="width: 15px;">&nbsp;</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$oilDb['rate_capacity'].'  </strong></td>
                  <td>&nbsp;</td>
                  <td><strong>kVA</strong></td>
                  <td style="width: 40px">&nbsp;</td>
                  <td colspan="3" style="white-space:nowrap;">Rate Capacity &nbsp;&nbsp;<strong>('.$type_cooling2.')</strong></td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$oilDb['rate_capacityx'].'</strong></td>
                  <td>&nbsp;&nbsp;&nbsp;<strong>KVA</strong></td>
                </tr>';
        }else{
          echo '
				  <tr>
                  <td style="width: 30px">&nbsp;</td>
                  <td style="width: 40px">&nbsp;</td>
                  <td>Winding Connection</td>
                  <td style="width: 15px;">&nbsp;</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$oilDb['winding_connection_primary'].'</strong></td>
                  <td colspan="2">&nbsp;</td>
                  <td style="width: 40px">&nbsp;</td>
                  <td colspan="3">Winding Connection</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$oilDb['winding_connection_secondary'].'</strong></td>
                  <td style="text-align:center;">&nbsp;</td>
                </tr>
		  
		  
				<tr>
                  <td style="width: 30px">&nbsp;</td>
                  <td style="width: 40px;">4 - 5</td>
                  <td>Rated Primary Current &nbsp;&nbsp;<strong>('.$type_cooling1.')</strong></td>
                  <td style="width: 15px;">&nbsp;</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$nilai_rate11.'</strong></td>
                  <td style="width:20px;">&nbsp;</td>
                  <td style="width:20px;"><strong>A</strong></td>
                  <td style="width: 40px">4 - 6</td>
                  <td colspan="3" style="white-space:nowrap;">Rated Secondary Current &nbsp;&nbsp; <strong>('.$type_cooling1.')</strong></td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong>'.$nilai_rate21.'</strong></td>
                  <td>&nbsp;&nbsp;&nbsp;<strong>A</strong></td>
                  <td style="width:20px;">&nbsp;</td>
                </tr>

            

                 <tr>
                  <td style="width: 30px">&nbsp;</td>
                  <td style="width: 40px">4 - 7</td>
                  <td>Rated Capacity &nbsp;&nbsp; <strong>('.$type_cooling1.')</strong></td>
                  <td style="width: 15px;">&nbsp;</td>
                  <td style="width: 10px; text-align: center;">:</td>
                  <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;">'.$oilDb['rate_capacity'].' </td>
				  <td style="width:20px;">&nbsp;</td>
                  <td style="width:20px;"><strong>KVA</strong></td>
                  <td colspan = "9">&nbsp;&nbsp;</td>
				
                </tr>';
        } ?>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="5">Incase of double primary voltage,</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="7">Capacity will be :</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td style="width: 100px; text-align:center;">&nbsp;</td>
          <td style="width: 15px; text-align: center;">At</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['incase_primary_voltage1']==0)
				{ $incase_primary_voltage1="";}
				else {$incase_primary_voltage1=$oilDb['incase_primary_voltage1'];    }
				?>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $incase_primary_voltage1; ?></strong></td>
          <td>&nbsp;</td>
          <td><strong>Volt</strong></td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="3">Rated Capacity</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['rate_capacity1']==0)
				{ $rate_capacity1xx="";}
				else {$rate_capacity1xx=$oilDb['rate_capacity1'];    }
				?>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $rate_capacity1xx; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>kVA</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td style="width: 100px; text-align:center;">&nbsp;</td>
          <td style="width: 15px; text-align: center;">At</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['incase_primary_voltage2']==0)
				{ $incase_primary_voltage2="";}
				else {$incase_primary_voltage2=$oilDb['incase_primary_voltage2'];    }
				?>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $incase_primary_voltage2; ?></strong></td>
          <td>&nbsp;</td>
          <td><strong>Volt</strong></td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="3">Rated Capacity</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['rate_capacity2']==0)
				{ $rate_capacity2xx="";}
				else {$rate_capacity2xx=$oilDb['rate_capacity2'];    }
				?>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $rate_capacity2xx; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>kVA</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="5">Incase of double secondary voltage,</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="7">Capacity will be :</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td style="width: 100px; text-align:center;">&nbsp;</td>
          <td style="width: 15px; text-align: center;">At</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['incase_secondary_voltage1']==0)
				{ $incase_secondary_voltage1="";}
				else {$incase_secondary_voltage1=$oilDb['incase_secondary_voltage1'];    }
				?>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $incase_secondary_voltage1; ?></strong></td>
          <td>&nbsp;</td>
          <td><strong>Volt</strong></td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="3">Rated Capacity</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['rate_capacity3']==0)
				{ $rate_capacity3xx="";}
				else {$rate_capacity3xx=$oilDb['rate_capacity3'];    }
				?>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $rate_capacity3xx; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>kVA</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td style="width: 100px; text-align:center;">&nbsp;</td>
          <td style="width: 15px; text-align: center;">At</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['incase_secondary_voltage2']==0)
				{ $incase_secondary_voltage2="";}
				else {$incase_secondary_voltage2=$oilDb['incase_secondary_voltage2'];    }
				?>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $incase_secondary_voltage2; ?></strong></td>
          <td>&nbsp;</td>
          <td><strong>Volt</strong></td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="3">Rated Capacity</td>
          <td style="width: 10px; text-align: center;">:</td>
				<?php
				if ($oilDb['rate_capacity3']==0)
				{ $rate_capacity3xx="";}
				else {$rate_capacity3xx=$oilDb['rate_capacity3'];    }
				?>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $rate_capacity3xx; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>kVA</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">4 - 8</td>
          <td colspan="2">Additional Taps on High Voltage </td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap;"><strong>&nbsp;</strong></td>				
          <td colspan="7" style="white-space: nowrap; text-align: center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['no_tap']; ?>&nbsp;&nbsp;Taps&nbsp;&nbsp;(<?php echo $oilDb['add_tap']; ?>)</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td colspan="16">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px"><strong>5. </strong></td>
          <td colspan="11"><strong>POLARITY AND PHASOR RELATIONSHIP : </strong> The transformer will be subtractive polarity and phasor relationship will be :</td>
          <td colspan="2" style="text-align: center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['vektor_group']; ?></strong></td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">5 - 1</td>
          <td colspan="2">Winding Material</td>
          <td style="width: 10px; text-align: center;"></td>
          <td style="white-space: nowrap; text-align: center; white-space: nowrap;"><strong>HV Winding:</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td style="white-space: nowrap; text-align: center; white-space: nowrap;"><strong>LV Winding:</strong></td>
          <td colspan="5">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td style="width: 10px; text-align: center;"></td>
          <td style="white-space: nowrap; text-align: center; white-space: nowrap; border:1px solid;"><strong><?php echo $hv_winding; ?>:</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td style="white-space: nowrap; text-align: center; white-space: nowrap; border:1px solid;"><strong><?php echo $lv_winding; ?></strong></td>
          <td colspan="5">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="16">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px"><strong>6. </strong></td>
          <td colspan="14"><strong>ELECTRIC PERFORMANCE :</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="5">&nbsp;</td>
          <td style="text-align:center"><strong>Primary Voltage</strong></td>
          <td colspan="4">&nbsp;</td>
          <td colspan="4" style="text-align:center"><strong>Secondary Voltage</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 1</td>
          <td>Highest System Voltage</td>
          <td colspan="3">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['hsvp']; ?></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Volt</strong></td>
          <td colspan="3">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['hsvs'];?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Volt</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 2</td>
          <td>Impulse Test Voltage </td>
          <td colspan="3">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['impulse_vp']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Volt</strong></td>
          <td colspan="3">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['impulse_vs']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Volt</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 3</td>
          <td>Applied Test Voltage During 1 Minute</td>
          <td colspan="3">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['applied_test1']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Volt</strong></td>
          <td colspan="3">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['applied_test2']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Volt</strong></td>
        </tr>

        <tr>
          <td colspan="16">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 4</td>
          <td>Induced Voltage Test :</td>
          <td colspan="12" style="white-space:nowrap;">Apply 2 times of the rate voltage at 200 cycles per second for 30 second</td>
          <td style="width: 40px">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 5</td>
          <td>Temperature Rise : </td>
          <td colspan="10" style="white-space:nowrap;">The winding temperature rise measured by resistance method will not exceed </td>
          <td colspan="2" style="width: 100px; text-align:center; border:1px solid;"><strong><?php echo ($oilDb['temp_rise']); ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong><sup>o</sup>C</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="10" style="white-space:nowrap;">and the the thermal class will not exceed</td>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo ($oilDb['insulation_thermal']); ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong><sup>o</sup>C</strong></td>
        </tr>

        <tr>
          <td colspan="16">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 6</td>
          <td>Losses at Rated Voltage</td>
          <td colspan="3" style="white-space:nowrap; text-align: center;"><strong>Primary Side</strong></td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['loses_vp']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>kV</strong></td>
          <td>&nbsp;</td>
          <td colspan="2" style="white-space:nowrap; text-align: center;"><strong>Secondary Side</strong></td>
          <td style="width: 10px; text-align: center;">:</td>
          <td colspan="2" style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['loses_vs']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>kV</strong></td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td>No Load Losses</td>
          <td colspan="3" style="white-space:nowrap;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['noload_loses']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Watt</strong></td>
          <td colspan="7" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td>Load Losses <strong>(<?php echo $oilDb['temp_load_loses']; ?> <sup>o</sup>C)</strong></td>
          <td colspan="3" style="white-space:nowrap;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['load_loses']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Watt</strong></td>
          <td colspan="7" style="white-space:nowrap;">&nbsp;</td>
        </tr>

         <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td>Total Losses</td>
          <td colspan="3" style="white-space:nowrap;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['total_loses']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>Watt</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 7</td>
          <td>Efficiency  at % Rated Capacity </td>
          <td colspan="3" style="white-space:nowrap;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid; border-color: black; "><strong><?php echo $oilDb['effeciency1']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['effeciency2']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['effeciency3']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['effeciency4']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td colspan="4" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td>at P.F. = <strong><?php echo $oilDb['pf1']; ?></strong></td>
          <td colspan="3" style="white-space:nowrap;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf1a']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf1b']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf1c']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf1d']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td colspan="4" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td>at P.F. = <strong><?php echo $oilDb['pf2']; ?></strong></td>
          <td colspan="3" style="white-space:nowrap;">&nbsp;</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf2a']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf2b']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf2c']; ?></strong></td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf2d']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td colspan="4" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 8</td>
          <td colspan="4">Exciting Current / Off load Current at Nominal Voltage</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['percent_existing_current']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 9</td>
          <td colspan="4">Percent  Impedance</td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['percent_impedance']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td colspan="7" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">6 - 10</td>
          <td colspan="4">Voltage Regulation at P.F. = <strong><?php echo $oilDb['voltage_regulation1']; ?></strong></td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf3a']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td style="text-align:right;"><strong>Resistence :</strong>&nbsp;&nbsp;</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['r1']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td colspan="4" style="white-space:nowrap;">&nbsp;</td>
        </tr>

        <tr>
          <td style="width: 30px">&nbsp;</td>
          <td style="width: 40px">&nbsp;</td>
          <td colspan="4">Voltage Regulation at P.F. = <strong><?php echo $oilDb['voltage_regulation2']; ?></strong></td>
          <td style="width: 10px; text-align: center;">:</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['pf4a']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td style="text-align:right;"><strong>Reactance &nbsp;:</strong>&nbsp;&nbsp;</td>
          <td style="width: 100px; text-align:center; white-space: nowrap; border:1px solid;"><strong><?php echo $oilDb['r2']; ?></strong></td>
          <td>&nbsp;&nbsp;&nbsp;<strong>%</strong></td>
          <td colspan="4" style="white-space:nowrap;">&nbsp;</td>
        </tr>


      </tbody>
    </table>

<?php if (($oilDb['type_cooling']) == 'ANAF') {
  echo '<br> <br><br> <br><br> ';
}else{
  echo '<br> <br><br> <br> <br> <br>';
} ?>    
    
</div><!-- end wrapper -->



<!-- end wrapper -->

<div id="halaman_kedua">
  <!-- <div class="row">
    <div class="col-sm-8">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To.
    </div>  -->  

    <!-- <div class="col-sm-2">
      <font size="3">Date</font>
    </div> -->

    <!-- <div class="col-sm-2">
      <font size="3"> 20 JANUARY 2021</font>
    </div> -->
    <!-- /.col -->


  <div class="row">
    <div class="col-sm-8">
      &nbsp;
    </div>    

    <div class="col-sm-2">
      <font size="3">Prospect No:</font>
    </div>

    <div class="col-sm-2">
      <font size="3"><?php echo $nopracost;?>  </font>
    </div>
    <!-- /.col -->
  </div>

  <br>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>7.</strong>&nbsp; <strong>ACCESSORIES : </strong> The transformer will be furnished with all necessary accessories as follow :</font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>GENERAL ACCESORIES</strong></font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HV TERMINAL</font>
    </div>

    <div class="col-sm-2">
      <font size="2">&nbsp;&nbsp;<?php echo  $oilDb['hvb']?></font>
    </div>	

   

    <div class="col-sm-5">
      <font size="2"><?php echo  $oilDb['hv_terminal_ket']?></font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LV TERMINAL</font>
    </div>
	

    <div class="col-sm-2">
      <font size="2">&nbsp;&nbsp;<?php echo   $oilDb['lvb']?></font>
    </div>
	

    <div class="col-sm-5">
      <font size="2"><?php echo $oilDb['lv_terminal_ket']?></font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TRANSFORMER BASE</font>
    </div>

    <div class="col-sm-2">
      <font size="2">&nbsp;&nbsp;<?php echo  $oilDb['tb']?></font>
    </div>
    <div class="col-sm-5">
      <font size="2"><?php echo $oilDb['tb_ket']?></font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NAME PLATE</font>
    </div>

    <div class="col-sm-2">
      <font size="2">&nbsp;&nbsp;<?php echo $oilDb['name_plate']?></font>
    </div>

    <div class="col-sm-5">
      <font size="2"><?php echo $oilDb['name_plate_ket']?></font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ANTI VIBARTION PAD</font>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CONNECTING ROD</font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EARTHING TERMINAL</font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LIFTING LUG</font>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>SPECIAL ACCESORIES OF TRANSFORMER</strong></font>
    </div>
  </div>
  
  
      <?php if (($oilDb['enclosure']) != 'N/A' OR ($oilDb['enclosure']) == '') {
        echo '<div class="row">
        <div class="col-sm-4">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENCLOSURE</font>
        </div>
        <div class="col-sm-2">
          <font size="2">:&nbsp;&nbsp;'.$oilDb['enclosure'].'</font>
        </div>
        <div class="col-sm-6">
          <font size="2">'.$oilDb['enclosure_ket'].'</font>
        </div>
      </div>';
      }else{
        echo '';
      } ?>
	      <?php if (($oilDb['dig_thermo']) != 'N/A' OR ($oilDb['dig_thermo']) == '') {
        echo '<div class="row">
        <div class="col-sm-4">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIGITAL THERMOMETER</font>
        </div>
        <div class="col-sm-2">
          <font size="2">:&nbsp;&nbsp;'.$oilDb['dig_thermo'].'</font>
        </div>
        <div class="col-sm-6">
          <font size="2">'.$oilDb['dig_thermo_ket'].'</font>
        </div>
      </div>';
      }else{
        echo '';
      } ?>
	   <?php if (($oilDb['cool_fans']) != 'NO' OR ($oilDb['cool_fans']) == '' ) {
        echo '<div class="row">
        <div class="col-sm-4">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COOLING FANS</font>
        </div>
        <div class="col-sm-2">
          <font size="2">:&nbsp;&nbsp;'.$oilDb['cool_fans'].'</font>
        </div>
        <div class="col-sm-6">
          <font size="2">'.$oilDb['cool_fans_ket'].'</font>
        </div>
      </div>';
      }else{
        echo '';
      } ?>


      <?php if (($oilDb['tap_changer']) != 'N/A' OR ($oilDb['tap_changer']) == '') {
        echo '<div class="row">
        <div class="col-sm-4">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TAP CHANGER</font>
        </div>
        <div class="col-sm-2">
          <font size="2">:&nbsp;&nbsp;'.$oilDb['tap_changer'].'</font>
        </div>
        <div class="col-sm-6">
          <font size="2">'.$oilDb['tap_changer_ket'].'</font>
        </div>
      </div>';
      }else{
        echo '';
      } ?>

    


      <?php if (($oilDb['surge_arrester']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SURGE ARRESTER</font>
                  </div>
				  
				  <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['surge_arrester'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['surge_arrester_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>

      <?php if (($oilDb['terminal_control_box']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TERMINAL CONTROL BOX</font>
                  </div>
				   <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['terminal_control_box'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['terminal_control_box_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>

      <?php if (($oilDb['neutral_ct']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NEUTRAL CT</font>
                  </div>

                 <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['neutral_ct'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['neutral_ct_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>

      <?php if (($oilDb['dct']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIFFERENTIAL CT</font>
                  </div>

                  <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['dct'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['dct_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>
		
		 <?php if (($oilDb['baris6a']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$oilDb['baris6'].'</font>
                  </div>

                  <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['baris6a'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['baris6_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>
		<?php if (($oilDb['baris7a']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$oilDb['baris7'].'</font>
                  </div>

                  <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['baris7a'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['baris7_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>
		<?php if (($oilDb['baris8a']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$oilDb['baris8'].'</font>
                  </div>

                  <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['baris8a'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['baris8_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>
		<?php if (($oilDb['baris9a']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$oilDb['baris9'].'</font>
                  </div>

                  <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['baris9a'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['baris9_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>
		<?php if (($oilDb['baris10a']) == 'YES') {
          echo '<div class="row">
                  <div class="col-sm-4">
                    <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$oilDb['baris10'].'</font>
                  </div>

                  <div class="col-sm-2">
					<font size="2">:&nbsp;&nbsp;'.$oilDb['baris10a'].'</font>
				 </div>

                  <div class="col-sm-6">
                    <font size="2">'.$oilDb['baris10_ket'].'</font>
                  </div>
                </div>';
        }else{
          echo '';
        } ?>
		
		</br>
     

    

  <div class="baris">
    <div class="kolom left">
      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>8.</strong>&nbsp;&nbsp;<strong>TRANSFORMER TESTING</strong></font>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ROUTINE TEST</strong></font>
        </div>
      </div>

     

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp; Transformer Turn Ratio, Polarity & Vector group test</font>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp; Measurement of No load loss and Exciting current</font>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp; Measurement of impedance and load loss</font>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.&nbsp; Separate source voltage withstand test (Potential test)</font>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.&nbsp; Induced potential test</font>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.&nbsp; Insulation resistance test</font>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.&nbsp; Winding resistance measurement</font>
        </div>
      </div>

    </div>

    <div class="kolom right">
      <br>

	  <?php if ($oilDb['sp_slt']== 'YES' or $oilDb['sp_pd']== 'YES' or $oilDb['sp_zero']== 'YES')   {  
       echo '<div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;<strong>SPECIAL TEST</strong></font>
        </div>
      </div>'; } else {
	   echo ""; }
	  ?>
	  
	  <?php
	   if ($oilDb['sp_slt'] == "NO" or $oilDb['sp_slt'] == "") {				  
		echo '<div class="row" style="visibility: hidden;  display:none;">      
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;SOUND LEVEL TEST</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'.$oilDb['sp_slt'].'/font>
        </div>

        <div class="col-sm-6">
          <font size="2">'.$oilDb['sp_slt_ket'].'</font>
        </div>
      </div>';
	   }
	   else
	   {
		echo '<div class="row" ">      
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;SOUND LEVEL TEST</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['sp_slt'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['sp_slt_ket'].'</font>
        </div>
	   </div>'; }
	   ?>
		   
	   

	  <?php
       if ($oilDb['sp_pd'] == "NO" or $oilDb['sp_pd'] == "") {				  
		echo '<div class="row" style="visibility: hidden;  display:none;">   
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;PARTIAL DISCHARGER</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['sp_pd'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['sp_pd_ket'].'</font>
        </div>
	   </div>'; } else {
		echo '<div class="row" >   
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;PARTIAL DISCHARGER</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['sp_pd'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['sp_pd_ket'].'</font>
        </div>
	   </div>'; }
	   ?>

       <?php
       if ($oilDb['sp_zero'] == "NO" or $oilDb['sp_zero'] == "") {				  
		echo '<div class="row" style="visibility: hidden;  display:none;">   
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;ZERO SEQUENCE IMPEDANCE</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['sp_zero'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['sp_zero_ket'].'</font>
        </div>
	   </div>'; }else {
		  echo '<div class="row" >   
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;ZERO SEQUENCE IMPEDANCE</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['sp_zero'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['sp_zero_ket'].'</font>
        </div>
	   </div>'; 
	   }
	   ?>

     
	   <?php if ($oilDb['test_temp_rise']== 'YES' or $oilDb['test_impulse']== 'YES' )   {  
       echo '<div class="row">
        <div class="col-sm-12">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;<strong>TYPE TEST</strong></font>
        </div>
      </div>'; } else {
	   echo ""; }
	  ?>

       <?php
       if ($oilDb['test_temp_rise'] == "NO" or $oilDb['test_temp_rise'] == "") {				  
		echo '<div class="row" style="visibility: hidden;  display:none;"> 
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;TEMPERATURE RISE</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['test_temp_rise'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['test_temp_rise_ket'].'</font>
        </div>
	   </div>'; } else {
		 echo '<div class="row" > 
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;TEMPERATURE RISE</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['test_temp_rise'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['test_temp_rise_ket'].'</font>
        </div>
	   </div>';  
	   }
	   ?>
	   <?php
       if ($oilDb['test_impulse'] == "NO" or $oilDb['test_impulse'] == "") {				  
		echo '<div class="row" style="visibility: hidden;  display:none;"> 
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;LIGHTNING IMPULSE</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['test_impulse'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['test_impulse_ket'].'</font>
        </div>
	   </div>'; }else {
		 echo '<div class="row" > 
        <div class="col-sm-5">
          <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;LIGHTNING IMPULSE</font>
        </div>

        <div class="col-sm-1">
          <font size="2">:&nbsp;&nbsp;'. $oilDb['test_impulse'].'</font>
        </div>

        <div class="col-sm-6">
          <font size="2">'. $oilDb['test_impulse_ket'].'</font>
        </div>
	   </div>';  
	   }
	   ?>
	

      


    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;</font>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>9.</strong>&nbsp; <strong>PAINTING SYSTEM AND COLOR</strong></font>
    </div>
	<div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp; PAINTING SYSTEM  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;<font size="2"><?php echo $oilDb['painting_system'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><?php echo $oilDb['painting_system_ket'] ?> </font></font>
    </div>
	<div class="col-sm-12">
      <font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp; PAINTING COLOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;<font size="2"><?php echo $oilDb['painting_color'] ?> </font></font>
    </div>
	
  </div>
  <br>

<div class="row" >
    <div class="col-sm-12">
      <font size="2" style="margin-left: 30px;"><strong>10.&nbsp;&nbsp;GENERAL NOTES</strong></font>
    </div>
  </div>

  <div class="b" style="margin-left: 55px;">
     <font size="2"><?php echo nl2br($oilDb['general_notes']) ?></font>
  </div>
 <br></br>
 

 

  <div class="row">
    <div class="col-sm-6">
      <font size="2">&nbsp;&nbsp;</font>
    </div>	
    <div class="col-sm-6" style="border: 2px solid;">
      <font size="2">Date Release :</font>
	  <?php 
	  $tgl=$oilDb["tgl_rilis"];
	  $tglbaru = date('d-m-Y', strtotime($tgl ));
	  if ($sitor<>4) {
		echo ""; }
		else {
		echo $tglbaru;
		}
	  ?>	 
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-6"  style="border: 2px solid;">	 
      <font size="2" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROPOSER :</font>
	  <?php echo $inisial;?>
    </div>
    <div class="col-sm-6" style="border: 2px solid; " >
		<?php 
		if ($sitor<>4) {
		echo ""; }
		else {
		echo $app_by;
		}
		?>
      <br>
    </div>
  </div>

<div style="text-align:right;"><strong>TP/V.11-03/19 (Rev./ Tgl. Form : 0/29-07-2019)&nbsp;</strong></div>
</br>
<!-- ./wrapper -->
<!-- Page specific script -->
</div>

<?php } ?>  

    <script>
      window.addEventListener("load", window.print());
    </script>


    <!-- jQuery -->
    <script src="../../plugins/plugin_chris/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/plugin_chris/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../plugins/plugin_chris/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../plugins/plugin_chris/dist/js/demo.js"></script>

  </body>

</html>