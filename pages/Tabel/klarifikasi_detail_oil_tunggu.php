<?php
if($_GET["nopracost"]){	
	session_start();
	include ("sambung.php");
	$oil = mysqli_query($GLOBALS["___mysqli_ston"], "select * from oil_prospect where nopracost='".$_GET["nopracost"]."'");
	$oilDb = mysqli_fetch_assoc($oil);
	$noprospect=$oilDb["noprospect"];
	$nopracost=$oilDb["nopracost"];
	

	$madu = mysqli_query($GLOBALS["___mysqli_ston"], "select * from h_rpospect where noprospect='$noprospect'");
	$maduDb = mysqli_fetch_assoc($madu);
	$tanggal=$maduDb['tgl_prospect'];
	$tglbaru = date('d-m-Y', strtotime($tanggal ));
	
	

	if(isset($_POST["pasien"])){		
		include_once("sambung.php");
		echo $oilDb['secondary_voltage_klari'];
							if ($_POST["selectBoxal"]=="other") {								
								$standarisasix=($_POST["standarisasi1"]);
							}
							else
							{
								$standarisasix=($_POST["selectBoxal"]);
							}
							
							if ($_POST["tulip"]=="other") {								
								$altitudex=($_POST["altitude1"]);
							}
							else
							{
								$altitudex=($_POST["tulip"]);
							}
							
							if ($_POST["mawar"]=="other") {								
								$ambient_tempx=($_POST["ambient_temp1"]);
							}
							else
							{
								$ambient_tempx=($_POST["mawar"]);
							}
							
							
							if ($_POST["selectBoxal"]=="other") {							
								$standarisasix=($_POST["standarisasi1"]);
							}
							else
							{
								$standarisasix=($_POST["selectBoxal"]);								
							}
							
							if ($_POST["temp_rise"]=="other") {							
								$temp_risex=($_POST["standarisasi1"]);
							}
							else
							{
								$temp_risex=($_POST["temp_rise1"]);								
							}
							
							if ($_POST["selectBoxon"]=="Other") {							
								$frequencyx=($_POST["frequency"]);								
							}
							else
							{
								$frequencyx=($_POST["selectBoxon"]);									
							}
							
							if ($_POST["device"]=="YES") {							
								$safety_devicex=($_POST["safety_device1"]);								
							}
							else
							{
								$safety_devicex="N/A";									
							}
							
								if ($_POST["temp_indicators"]=="YES") {							
								$temp_indicatorx=($_POST["temp_indicator1"]);								
							}
							else
							{
								$temp_indicatorx="N/A";									
							}
							
							if ($_POST["oil_indicators"]=="YES") {							
								$oil_indicatorx=($_POST["oil_indicator1"]);								
							}
							else
							{
								$oil_indicatorx="N/A";									
							}
							if ($_POST["presure_devices"]=="YES") {							
								$presure_devicex=($_POST["presure_device1"]);								
							}
							else
							{
								$presure_devicex="N/A";									
							}
							if ($_POST["winding_indicators"]=="YES") {							
								$winding_indicatorx=($_POST["winding_indicator1"]);								
							}
							else
							{
								$winding_indicatorx="N/A";									
							}
							
							if ($_POST["presure_relays"]=="YES") {							
								$presure_relayx=($_POST["presure_relay1"]);								
							}
							else
							{
								$presure_relayx="N/A";									
							}
							
							if ($_POST["winding_indicators"]=="YES") {							
								$winding_indicatorx=($_POST["winding_indicator1"]);								
							}
							else
							{
								$winding_indicatorx="N/A";									
							}
							
							if ($_POST["buccholz_relays"]=="YES") {
								{$buccholz_relayx=($_POST["buccholz_relay1"]);}								
							}
							else
							{
								$buccholz_relayx="N/A";									
							}
							
							if ($_POST["vacuum_gauges"]=="YES") {							
								$vacuum_gaugex=($_POST["vacuum_gauge1"]);								
							}
							else
							{
								$vacuum_gaugex="N/A";									
							}
							
							if ($_POST["enclosures"]=="YES") {							
								$enclosurex=($_POST["enclosure1"]);								
							}
							else
							{
								$enclosurex="N/A";									
							}
						
							
							//rumus baru//
							if ($oilDb['temp_rise_klari']=="") {
								$temp_rise=$_POST["temp_rise"];
							}
							else
							{
								$temp_rise=$temp_risex;
							}
							
							if ($oilDb['standarisasi_klari']=="") {
								$standarisasi=$oilDb["standarisasi"];
							}
							else
							{
								$standarisasi=$standarisasix;
							}
							
							if ($oilDb['rate_capacity_klari']=="") {
								$rate_capacity=$_POST["rate_capacity"];
							}
							else
							{
								$rate_capacity=$_POST["rate_capacity1"];
							}
							
							if ($oilDb['no_phase_klari']=="") {
								$no_phase=$_POST["no_phase"];
							}
							else
							{
								$no_phase=$_POST["no_phase1"];
							}
							
							if ($oilDb['frequency_klari']=="") {
								$frequency=$_POST["frequency"];
							}
							else
							{
								$frequency=$frequencyx;
							}
							
							if ($oilDb['primary_voltage_klari']=="") {
								$primary_voltage=$_POST["primary_voltage"];
							}
							else
							{
								$primary_voltage=$_POST["primary_voltage1"];
							}
							
							if ($oilDb['altitude_klari']=="") {
								$altitude=$_POST["altitude"];
							}
							else
							{
								$altitude=$altitudex;
							}
							
							if ($oilDb['ambient_temp_klari']=="") {
								$ambient_temp=$_POST["ambient_temp"];
							}
							else
							{
								$ambient_temp=$ambient_tempx;
							}
							
							if ($oilDb['secondary_voltage_klari']=="") {
								$secondary_voltage=$_POST["secondary_voltage"];
							}
							else
							{
								$secondary_voltage=$_POST["secondary_voltage1"];
							}
							
							if ($oilDb['vektor_group_klari']=="") {
								$vektor_group=$_POST["vektor_group"];
							}
							else
							{
								$vektor_group=$_POST["vektor_group1"];
							}
							
							if ($oilDb['type_winding_klari']==""){
								$type_winding=$_POST["type_winding"];
							}
							else
							{
								$type_winding=$_POST["type_winding1"];
							}
							
							if ($oilDb['type_cooling_klari']==""){
								$type_cooling=$_POST["type_cooling"];
							}
							else
							{
								$type_cooling=$_POST["type_cooling1"];
							}
							
							if ($oilDb['tap_changer_klari']==""){
								$tap_changer=$_POST["tap_changer"];
							}
							else
							{
								$tap_changer=$_POST["tap_changer1"];
							}
							
							if ($oilDb['no_tap_klari']==""){
								$no_tap=$_POST["no_tap"];
							}
							else
							{
								$no_tap=$_POST["no_tap1"];
							}
							
							if ($oilDb['type_oil_klari']==""){
								$type_oil=$_POST["type_oil"];
							}
							else
							{
								$type_oil=$_POST["type_oil1"];
							}
							
							if ($oilDb['safety_device_klari']==""){
								$safety_device=$_POST["safety_device"];
							}
							else
							{
								$safety_device=$safety_devicex;
							}
							
							if ($oilDb['temp_indicator_klari']==""){
								$temp_indicator=$_POST["temp_indicator"];
							}
							else
							{
								$temp_indicator=$temp_indicatorx;
							}
							
							if ($oilDb['oil_indicator_klari']==""){
								$oil_indicator=$_POST["oil_indicator"];
							}
							else
							{
								$oil_indicator=$oil_indicatorx;
							}
							
							if ($oilDb['presure_device_klari']==""){
								$presure_device=$_POST["presure_device"];
							}
							else
							{
								$presure_device=$presure_devicex;
							}
							if ($oilDb['winding_indicator_klari']==""){
								$winding_indicator=$_POST["winding_indicator"];
							}
							else
							{
								$winding_indicator=$winding_indicatorx;
							}
							
							if ($oilDb['presure_relay_klari']==""){
								$presure_relay=$_POST["presure_relay"];
							}
							else
							{
								$presure_relay=$presure_relayx;
							}
							if ($oilDb['winding_indicator_klari']==""){
								$winding_indicator=$_POST["winding_indicator"];
							}
							else
							{
								$winding_indicator=$winding_indicatorx;
							}
							
							if ($oilDb['buccholz_relay_klari']==""){
								$buccholz_relay=$_POST["buccholz_relay"];
							}
							else
							{
								$buccholz_relay=$buccholz_relayx;
							}
							if ($oilDb['vacuum_gauge_klari']==""){
								$vacuum_gauge=$_POST["vacuum_gauge"];
							}
							else
							{
								$vacuum_gauge=$vacuum_gaugex;
							}
							
							if ($oilDb['enclosure_klari']==""){
								$enclosure=$_POST["enclosure"];
							}
							else
							{
								$enclosure=$enclosurex;
							}
							if ($oilDb['notes1_klari']==""){
								$notes1=$_POST["notes1"];
							}
							else
							{
								$notes1=$_POST["notes1_1"];
							}
							
							if ($oilDb['notes2_klari']==""){
								$notes2=$_POST["notes2"];
							}
							else
							{
								$notes2=$_POST["notes2_1"];
							}
							if ($oilDb['notes3_klari']==""){
								$notes3=$_POST["notes3"];
							}
							else
							{
								$notes3=$_POST["notes3_1"];
							}
							if ($oilDb['category_klari']==""){
								$category=$_POST["category"];
							}
							else
							{
								$category=$_POST["category1"];
							}
						
				
				mysqli_query($GLOBALS["___mysqli_ston"], "update oil_prospect set category='$category',type_trafo='".$_POST["type_trafo1"]."',service_condition='".$_POST["service_condition1"]."',altitude='$altitude',ambient_temp='$ambient_temp',standarisasi='$standarisasi',temp_rise='$temp_rise',rate_capacity='$rate_capacity',no_phase='$no_phase',frequency='$frequency',primary_voltage='$primary_voltage',secondary_voltage='$secondary_voltage',vektor_group='$vektor_group',type_winding='$type_winding',type_cooling='$type_cooling',tap_changer='$tap_changer',no_tap='$no_tap',type_oil='$type_oil',safety_device='$safety_device',temp_indicator='$temp_indicator',oil_indicator='$oil_indicator',presure_device='$presure_device',winding_indicator='$winding_indicator',presure_relay='$presure_relay',winding_indicator='$winding_indicator',buccholz_relay='$buccholz_relay',vacuum_gauge='$vacuum_gauge',enclosure='$enclosure' ,notes1='$notes1',notes2='$notes2',notes3='$notes3',status=2 where nopracost='$nopracost'");
				echo $vektor_group;
				
				
				mysqli_query($GLOBALS["___mysqli_ston"], "update h_rpospect set status=2 where noprospect='$noprospect'");
				echo"<script>alert('Data Sukses tersimpan');window.location.href='../index_sales.php?page=klarifikasi'</script>";?>						
				<?php		
				}
	else if(isset($_POST["pasien"])){
				echo "<center><div class='alert alert-warning alert-dismissable'>
                 <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
				</div><center>";
				}
	
?>
<!DOCTYPE html>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../bootstrap/css/main.css" />
    <link rel="stylesheet" href="../../bootstrap/css/theme.css" />
    <link rel="stylesheet" href="../../bootstrap/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../../bootstrap/css/font-awesome.css" />
	<link rel="stylesheet" href="../../bootstrap/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">	
<head>
<title>Trafoindo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />	
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
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
		<script src="../bootstrap/js/jquery.min.js"></script>	
		<section class="content-header">		
        <h2><center><strong><font color="RED">
        KLARIFIKASI DETAIL PROSPECT  OIL
        </font></strong></center></h2>
          <ol class="breadcrumb">
			<li><a href="../?p=home"><strong>Home</strong></a></li>		  
			<li><a href="../?p=tunggu"><strong>List Tunggu Klarifikasi</strong></a></li>
			<li><a href="tunggu_detail.php?noprospect=<?php echo $noprospect; ?>"><font color="brown"><strong>Detail Klarifikasi Prospect</strong></font></a></li>
			<li class="active"><font color="brown"><strong>Detail Klarifikasi Oil</strong></font></li> 		           
          </ol>
        </section>
<div class="box">
	<header>
		<h3 class="alert alert-danger text-center" role="alert"><strong>GENERAL INFORMATION</strong></h3>
	</header>	
	<div class="body">
	<form action="" method="post" class="form-horizontal" name='pasien'>
			<div class="form-group">
				<label class="control-label col-lg-3">No Prospect </label>
				<div class="col-lg-3">
				<strong><input type="text" Readonly  autofocus required class="form-control" value="<?php echo $noprospect; ?>"/></strong>
				</div>		
			
				<label class="control-label col-lg-3">No Sub Prospect </label>
				<div class="col-lg-3">
				<strong><input type="text" Readonly  autofocus required class="form-control" value="<?php echo $nopracost;  ?> "/></strong>
				</div>	
			</div>
			
			<div class="form-group">								
				<label  class="control-label col-lg-3">Tahun Prospect</label> 
				<div class="col-lg-3">								
				<input type="text" readonly  autofocus required class="form-control" value="<?php echo $maduDb['tahun'];  ?>"/></strong>								  
				</div>	
				
				<label class="control-label col-lg-3">Nama Sales</label>																					
				<div class="col-lg-3">
				<strong>	<input type="text" Readonly   class="form-control" value= " <?php echo $maduDb['sales']; ?>  "/></strong>
				</div>	
			</div>
			<div class="form-group">	
				<label class="control-label col-lg-3">Segmen Penjualan </label>
				<div class="col-lg-3">
				<strong>	<input type="text" Readonly  autofocus required class="form-control" value=<?php echo $maduDb['segment']; ?>  /> </strong>
				</div>			
			
				<label class="control-label col-lg-3">Sub Segmen Penjualan </label>
				<div class="col-lg-3">															
				<strong>	<input type="text" Readonly  autofocus required class="form-control" value="<?php echo $maduDb['sub_segment']; ?> " />	</strong>
				</div>	
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">Project</label>
				<div class="col-lg-3">
				<strong>	<input type="text"  readonly required class="form-control" value="<?php echo $maduDb['project']; ?> " /> </strong>
				</div>	
			
				<label class="control-label col-lg-3">Status Stage</label>
				<div class="col-lg-3">															
				<strong>	<input type="text"  readonly class="form-control" value="<?php echo $maduDb['priority']; ?> " /></strong>	
				</div>							
			</div>
		
			<header>
			<h3 class="alert alert-danger text-center" role="alert"><STRONG>GENERAL CONDITION</STRONG></h3>
			</header>
		
			<div class="form-group">
				<label class="control-label col-lg-3">Catagory</label>
				<div class="col-lg-3">															
				<strong><input type="text" name="category" readonly class="form-control" value="<?php echo $oilDb['category']; ?> " /></strong>			
				</div>			
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text"  readonly class="form-control" value="<?php echo $oilDb['category_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">				
				<label class="control-label col-lg-3">Type of Transformer</label>
				<div class="col-lg-3">			
				<strong><input type="text" name="type_trafo" readonly class="form-control" value="<?php echo $oilDb['type_trafo']; ?> " /></strong>				
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text"  readonly class="form-control" value="<?php echo $oilDb['type_trafo_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			
			<div class="form-group">
				<label class="control-label col-lg-3">Service Condition</label>
				<div class="col-lg-3">															
				<strong><input type="text" name="service_condition" readonly class="form-control" value="<?php echo $oilDb['service_condition']; ?> " /></strong>			
				</div>
			
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text"  readonly class="form-control" value="<?php echo $oilDb['service_condition_klari']; ?> " /></strong>			
				</div>
			</div> </br> 
			
			<div class="form-group">
				<label class="control-label col-lg-3">Altitude</label>								
				<div class="col-lg-3">								
				<strong><input type="text"  name="altitude" readonly class="form-control" value="<?php echo $oilDb['altitude']; ?> " /></strong>			
				</div>													
			
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" readonly class="form-control" value="<?php echo $oilDb['altitude_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Ambient Temp</label>																
				<div class="col-lg-3">								
				<strong><input type="text"  name="ambient_temp" readonly class="form-control" value="<?php echo $oilDb['ambient_temp']; ?> " /></strong>			
				</div>					
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text"  readonly class="form-control" value="<?php echo $oilDb['ambient_temp_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">International Standard</label>	
				<div class="col-lg-3">
				<strong><input type="text" name="standarisasi" readonly class="form-control" value="<?php echo $oilDb['standarisasi']; ?> " /></strong>			
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="standarisasi_klari" readonly class="form-control" value="<?php echo $oilDb['standarisasi_klari']; ?> " /></strong>			
				</div>
			</div> </br>
				
			<div class="form-group">
				<label class="control-label col-lg-3">Winding Temperature</label>
				<div class="col-lg-3">													
				<strong><input type="text" name="winding_temp" readonly class="form-control" value="<?php echo $oilDb['winding_temp']; ?> " /></strong>			
				</div>
		
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" readonly class="form-control" value="<?php echo $oilDb['winding_temp_klari']; ?> " /></strong>			
				</div>
			</div> </br>
				<div class="form-group">
				<label class="control-label col-lg-3">Oil Temperature</label>
				<div class="col-lg-3">													
				<strong><input type="text" name="oil_temp" readonly class="form-control" value="<?php echo $oilDb['oil_temp']; ?> " /></strong>			
				</div>
		
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" readonly class="form-control" value="<?php echo $oilDb['oil_temp_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Temperature Rise</label>
				<div class="col-lg-3">													
				<strong><input type="text" name="temp_rise" readonly class="form-control" value="<?php echo $oilDb['temp_rise']; ?> " /></strong>			
				</div>
		
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" readonly class="form-control" value="<?php echo $oilDb['temp_rise_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Rate Capacity</label>
				<div class="col-lg-3">
				<strong><input type="text"  name="rate_capacity" readonly class="form-control" value="<?php echo $oilDb['rate_capacity']; ?> " /></strong>			
				</div>						
			
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text"  readonly class="form-control" value="<?php echo $oilDb['rate_capacity_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">No Of Phase</label>
				<div class="col-lg-3">															
				<strong><input type="text" name="no_phase" readonly class="form-control" value="<?php echo $oilDb['no_phase']; ?> " /></strong>				
				</div>				
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text"  readonly class="form-control" value="<?php echo $oilDb['no_phase_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Frequency</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="frequency" readonly class="form-control" value="<?php echo $oilDb['frequency']; ?> " /></strong>			
				</div>	
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text"  readonly class="form-control" value="<?php echo $oilDb['frequency_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Primary Voltage</label>
				<div class="col-lg-3">
				<strong><input type="text"  name="primary_voltage" readonly class="form-control" value="<?php echo $oilDb['primary_voltage']; ?> " /></strong>			
				</div>	
			
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" readonly class="form-control" value="<?php echo $oilDb['primary_voltage_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Secondary Voltage&nbsp</label>
				<div class="col-lg-3">
				<strong><input type="text" name="secondary_voltage" readonly class="form-control" value="<?php echo $oilDb['secondary_voltage']; ?> " /></strong>			
				</div>		
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="secondary_voltage_klari" id="secondary_voltage_klari" readonly class="form-control" value="<?php echo $oilDb['secondary_voltage_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Vektor Group</label>								
				<div class="col-lg-3">															
				<strong><input type="text" name="vektor_group" readonly class="form-control" value="<?php echo $oilDb['vektor_group']; ?> " /></strong>												
				</div>		
			
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="vektor_group_klari" readonly class="form-control" value="<?php echo $oilDb['vektor_group_klari']; ?> " /></strong>			
				</div>
			</div> </br>
		
			<div class="form-group">
				<label class="control-label col-lg-3">Type of Winding</label>
				<div class="col-lg-3">															
				<strong><input type="text" name="type_winding" readonly class="form-control" value="<?php echo $oilDb['type_winding']; ?> " /></strong>			
				</div>						
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="type_winding_klari" readonly class="form-control" value="<?php echo $oilDb['type_winding_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Type of Cooling</label>
				<div class="col-lg-3">															
				<strong><input type="text" name="type_cooling" readonly class="form-control" value="<?php echo $oilDb['type_cooling']; ?> " /></strong>			
				</div>						
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="type_cooling_klari" readonly class="form-control" value="<?php echo $oilDb['type_cooling_klari']; ?> " /></strong>			
				</div>
				</div> </br>
				
			<div class="form-group">
				<label class="control-label col-lg-3">Tap Changer</label>
				<div class="col-lg-3">															
				<strong><input type="text" name="tap_changer" readonly class="form-control" value="<?php echo $oilDb['tap_changer']; ?> " /></strong>			
				</div>	
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="tap_changer_klari" readonly class="form-control" value="<?php echo $oilDb['tap_changer_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">No Of Tap</label>
				<div class="col-lg-3">													
				<strong><input type="text" name="no_tap" readonly class="form-control" value="<?php echo $oilDb['no_tap']; ?> " /></strong>			
				</div>							
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="no_tap_klari" readonly class="form-control" value="<?php echo $oilDb['no_tap_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Type Of Oil</label>
				<div class="col-lg-3">															
				<strong><input type="text" name="type_oil" readonly class="form-control" value="<?php echo $oilDb['type_oil']; ?> " /></strong>			
				</div>						
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="type_oil_klari" readonly class="form-control" value="<?php echo $oilDb['type_oil_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Integrated Safety Device</label>
				<div class="col-lg-3">
				<strong><input type="text" name="safety_device" readonly class="form-control" value="<?php echo $oilDb['safety_device']; ?> " /></strong>											
				</div>	
			
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="safety_device_klari" readonly class="form-control" value="<?php echo $oilDb['safety_device_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Temperature Indicator</label>									
				<div class="col-lg-3">
				<strong><input type="text" name="temp_indicator" readonly class="form-control" value="<?php echo $oilDb['temp_indicator']; ?> " /></strong>										
				</div>	
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="temp_indicator_klari" readonly class="form-control" value="<?php echo $oilDb['temp_indicator_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Oil Level Indicator</label>
				<div class="col-lg-3">
				<strong><input type="text" name="oil_indicator" readonly class="form-control" value="<?php echo $oilDb['oil_indicator']; ?> " /></strong>			
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="oil_indicator_klari" readonly class="form-control" value="<?php echo $oilDb['oil_indicator_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Presure Device</label>
				<div class="col-lg-3">
				<strong><input type="text" name="presure_device" readonly class="form-control" value="<?php echo $oilDb['presure_device']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="presure_device_klari" readonly class="form-control" value="<?php echo $oilDb['presure_device_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			<div class="form-group">
				<label class="control-label col-lg-3">Winding Temperature Indicator</label>									
				<div class="col-lg-3">
				<strong><input type="text" name="winding_indicator" readonly class="form-control" value="<?php echo $oilDb['winding_indicator']; ?> " /></strong>			
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="winding_indicator_klari" readonly class="form-control" value="<?php echo $oilDb['winding_indicator_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			
		
			<div class="form-group">
				<label class="control-label col-lg-3">Sudden Presure Relay</label>
				<div class="col-lg-3">
				<strong><input type="text" name="presure_relay" readonly class="form-control" value="<?php echo $oilDb['presure_relay']; ?> " /></strong>			
				</div>
				
					<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
					<div class="col-lg-3">															
					<strong><input type="text" name="presure_relay_klari" readonly class="form-control" value="<?php echo $oilDb['presure_relay_klari']; ?> " /></strong>			
					</div>
			</div> </br>
			
			<div class="form-group">
						<label class="control-label col-lg-3">Buccholz Relay</label>
						<div class="col-lg-3">
						<strong><input type="text" name="buccholz_relay" readonly class="form-control" value="<?php echo $oilDb['buccholz_relay']; ?> " /></strong>										
						</div>
					
						<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
						<div class="col-lg-3">															
						<strong><input type="text" name="buccholz_relay_klari" readonly class="form-control" value="<?php echo $oilDb['buccholz_relay_klari']; ?> " /></strong>			
						</div>
				</div> </br>
		
				<div class="form-group">
					<label class="control-label col-lg-3">Pressure Vacuum Gauge</label>								
					<div class="col-lg-3">
					<strong><input type="text" name="vacuum_gauge" readonly class="form-control" value="<?php echo $oilDb['vacuum_gauge']; ?> " /></strong>			
					</div>
					
					<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
					<div class="col-lg-3">															
					<strong><input type="text" name="vacuum_gauge_klari" readonly class="form-control" value="<?php echo $oilDb['vacuum_gauge_klari']; ?> " /></strong>			
					</div>
				</div> </br>
				
			
				
			<div class="form-group">
				<label class="control-label col-lg-3">HV/LV Cable Box</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="enclosure" readonly class="form-control" value="<?php echo $oilDb['enclosure']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="enclosure_klari" readonly class="form-control" value="<?php echo $oilDb['enclosure_klari']; ?> " /></strong>			
				</div>
			</div> </br>
			
			
			<h3 class="alert alert-danger text-center" role="alert"><strong>TRANSFORMER TESTING</strong></h3>
			</header>
			<div class="form-group">
				<label class="control-label col-lg-3"><font color="blue">SPECIAL TEST</font></label>
			</div>	
			<div class="form-group">
				<label class="control-label col-lg-3">DISSOLVE GASS ANALYSIS (DGA)</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="sp_dga" readonly class="form-control" value="<?php echo $oilDb['sp_dga']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="sp_dga_klari" readonly class="form-control" value="<?php echo $oilDb['sp_dga_klari']; ?> " /></strong>			
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-lg-3">SWEEP FREQUENCY RESPONSE (SFRA)</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="sp_sfra" readonly class="form-control" value="<?php echo $oilDb['sp_sfra']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="sp_sfra_klari" readonly class="form-control" value="<?php echo $oilDb['sp_sfra_klari']; ?> " /></strong>			
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-lg-3">DISSIPATION FACTOR (TAN DELTA)</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="sp_delta" readonly class="form-control" value="<?php echo $oilDb['sp_delta']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="sp_delta_klari" readonly class="form-control" value="<?php echo $oilDb['sp_delta_klari']; ?> " /></strong>			
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-lg-3">PARTIAL DISCHARGER</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="sp_pd" readonly class="form-control" value="<?php echo $oilDb['sp_pd']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="sp_pd_klari" readonly class="form-control" value="<?php echo $oilDb['sp_pd_klari']; ?> " /></strong>			
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-lg-3">ZERO SEQUENCE IMPEDANCE</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="sp_zero" readonly class="form-control" value="<?php echo $oilDb['sp_zero']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="sp_zero_klari" readonly class="form-control" value="<?php echo $oilDb['sp_zero_klari']; ?> " /></strong>			
				</div>
				</div>
				<div class="form-group">
				<label class="control-label col-lg-3"><font color="blue">TYPE TEST</font></label>
		    	</div>
				
				<div class="form-group">
				<label class="control-label col-lg-3">TEMPERATURE RISE</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="test_temp_rise" readonly class="form-control" value="<?php echo $oilDb['test_temp_rise']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="test_temp_rise_klari" readonly class="form-control" value="<?php echo $oilDb['test_temp_rise_klari']; ?> " /></strong>			
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-lg-3">LIGHTNING IMPULSE</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="test_impulse" readonly class="form-control" value="<?php echo $oilDb['test_impulse']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="test_impulse_klari" readonly class="form-control" value="<?php echo $oilDb['test_impulse_klari']; ?> " /></strong>			
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-lg-3">SOUND LEVEL(NOISE)</label>								
				<div class="col-lg-3">
				<strong><input type="text" name="test_noise" readonly class="form-control" value="<?php echo $oilDb['test_noise']; ?> " /></strong>										
				</div>
				
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-3">															
				<strong><input type="text" name="test_noise_klari" readonly class="form-control" value="<?php echo $oilDb['test_noise_klari']; ?> " /></strong>			
				</div>
				</div>

			</br>
			
			<h3 class="alert alert-success text-center" role="alert"><strong>NOTES</strong></h3>
			</header>
		
			<div class="form-group">
				<label class="control-label col-lg-3">Catatan 1</label>
				<div class="col-lg-9">
				<strong><input type="text" name="notes1" readonly class="form-control" value="<?php echo $oilDb['notes1']; ?> " /></strong>
				</div>
			</div>		
			<div class="form-group">
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-9">															
				<strong><input type="text" name="notes1_klari" readonly class="form-control" value="<?php echo $oilDb['notes1_klari']; ?> " /></strong>			
				</div>			
			</div>
			</br>
			
			
			
			<div class="form-group">
				<label class="control-label col-lg-3">Catatan 2</label>
				<div class="col-lg-9">								
				<strong><input type="text" name="notes2" readonly class="form-control" value="<?php echo $oilDb['notes2']; ?> " /></strong>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
				<div class="col-lg-9">															
				<strong><input type="text" name="notes2_klari" readonly class="form-control" value="<?php echo $oilDb['notes2_klari']; ?> " /></strong>			
				</div>
			</div>		
			</br>
			
			<div class="form-group">
			<label class="control-label col-lg-3">Catatan 3</label>
			<div class="col-lg-9">								
			<strong><input type="text" name="notes3" readonly class="form-control" value="<?php echo $oilDb['notes3']; ?> " /></strong>
			</div>	
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3"><font color="blue">Engineer's notes</font></label>
			<div class="col-lg-9">															
			<strong><input type="text" name="notes3_klari" readonly class="form-control" value="<?php echo $oilDb['notes3_klari']; ?> " /></strong>			
			</div>
		</div>

		</br>
			
		
		<hr size="12px">
		<div class="form-actions margin-bottom" style="text-align:center;">
			      <a href="tunggu_detail.php?noprospect=<?php echo $noprospect; ?>" class="btn btn-warning" >BACK</a>
		</div>
		
	</form>
</body>
</html>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4"></script>
<script type="text/javascript" src="../bootstrap/js/poper-min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="../bootstrap/js/slim-min.js"integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>   
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/savy.min.js"></script>

<script type="text/javascript">
    $(function () {
        $("input[name=btnPassport]").click(function () {
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
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
            if ($(this).val() == "Edit") {
                $("#dvPassport29").show();
				 $("#dvPassport29").focus();
            } else {
                $("#dvPassport29").hide();
            }
        });
    });
</script>
<script type="text/javascript">
function changeFunc() {
var selectBox = document.getElementById("selectBox");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="other"){
$('#textboxes').show();
$('#textboxes').focus();
}
else {
<!--alert("Error"); -->
$('#textboxes').hide();
}
}
</script>

<script type="text/javascript">
function changeFunction() {
var selectBoxes = document.getElementById("selectBoxes");
var selectedValues= selectBoxes.options[selectBoxes.selectedIndex].value;
if (selectedValues=="other"){
$('#textboxess').show();
$('#textboxess').focus();
}
else {
<!--alert("Error"); -->
$('#textboxess').hide();
}
}
</script>


<script type="text/javascript">
function changeFunctional() {
var selectBoxes = document.getElementById("selectBoxal");
var selectedValues= selectBoxes.options[selectBoxes.selectedIndex].value;

var tes = document.getElementById("selectBoxal").value;
		if (tes=="SPLN D3")
		{ var tos = "50/55";
		}
		else if (tes=="ANSI / IEEE C57")
		{ var tos = "50/55";
		}
		else if (tes=="IEC 60076")
		{ var tos = "60/65";
		}
		else if (tes=="other")
		{ var tos = "other";
		}
        document.getElementById("temp_rise1").value=tos;

if (selectedValues=="other"){
$('#textboxal').show();
$('#textboxal').focus();
$('#textboxar').show();  


}
else {
<!--alert("Error"); -->
$('#textboxal').hide();
$('#textboxar').hide();
}
}
</script>

<script type="text/javascript">
function Fuckpop() {
var selectBoxs = document.getElementById("selectBoxon");
var selectedValues= selectBoxs.options[selectBoxs.selectedIndex].value;
if (selectedValues=="Other"){
$('#textboxon').show();
$('#textboxon').focus();

}
else {
<!--alert("Error"); -->
$('#textboxon').hide();
}
}
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther").removeAttr("disabled");
				$("#txtOther").show();
                $("#txtOther").focus();
            } else {
                $("#txtOther").attr("disabled", "disabled"); 
				$("#txtOther").hide(); 
				
				
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#ddlModels1").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther1").removeAttr("disabled");
				$("#txtOther1").show();
                $("#txtOther1").focus();
            } else {
                $("#txtOther1").attr("disabled", "disabled"); 
				$("#txtOther1").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels2").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther2").removeAttr("disabled");
				$("#txtOther2").show();
                $("#txtOther2").focus();
            } else {
                $("#txtOther2").attr("disabled", "disabled"); 
				$("#txtOther2").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels3").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther3").removeAttr("disabled");
				$("#txtOther3").show();
                $("#txtOther3").focus();
            } else {
                $("#txtOther3").attr("disabled", "disabled"); 
				$("#txtOther3").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels4").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther4").removeAttr("disabled");
				$("#txtOther4").show();
                $("#txtOther4").focus();
            } else {
                $("#txtOther4").attr("disabled", "disabled"); 
				$("#txtOther4").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels5").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther5").removeAttr("disabled");
				$("#txtOther5").show();
                $("#txtOther5").focus();
            } else {
                $("#txtOther5").attr("disabled", "disabled"); 
				$("#txtOther5").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels6").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther6").removeAttr("disabled");
				$("#txtOther6").show();
                $("#txtOther6").focus();
            } else {
                $("#txtOther6").attr("disabled", "disabled"); 
				$("#txtOther6").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels7").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther7").removeAttr("disabled");
				$("#txtOther7").show();
                $("#txtOther7").focus();
            } else {
                $("#txtOther7").attr("disabled", "disabled"); 
				$("#txtOther7").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#ddlModels8").change(function () {
            if ($(this).val() == "YES") {
                $("#txtOther8").removeAttr("disabled");
				$("#txtOther8").show();
                $("#txtOther8").focus();
            } else {
                $("#txtOther8").attr("disabled", "disabled"); 
				$("#txtOther8").hide(); 				
            }
        });
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
      	$.ajax({
            type: 'POST',
          	url: "../get_vektor_group.php",
          	cache: false, 
          	success: function(msg){
              $("#vektor_group1").html(msg);
            }
	})});
</script>

</body>
</html>	
</div>
<?php } ?>