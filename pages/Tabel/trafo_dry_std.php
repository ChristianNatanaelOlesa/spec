<?php
    include('connect.php');

    $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ms_trafo_std_oil ");
    $tester=mysqli_fetch_array($query);
?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">



<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line" >Trafo Dry Standard</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
         	Tambah Trafo
      	</button>
    </div>
</div>    

<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">FORM TAMBAH TRAFO</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" name="form_add_trafo_oil_std" action="?p=create_trafo_oil_std" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3">
				  <label>Kode FG</label>
				  <input type="text" name="kode_fg" class="form-control" required>  
				</div>

				<div class="col-md-2">
				  <label>kVA</label>
				  <input type="number" min="1" name="kva" class="form-control">  
				</div>

				<div class="col-md-2">
				  <label>Winding</label>
				  <select id="winding" name="winding" class="form-control" style="width: 100%;">
                      <option name="winding" value="Al-Al">Al-Al</option>
                      <option name="winding" value="Cu-Cu">Cu-Cu</option>
                      <option name="winding" value="Al-Cu">Al-Cu</option>
                      <option name="winding" value="Cu-Al">Cu-Cu</option>
                  </select>  
				</div>

				<div class="col-md-3">
				  <label>Vektor Group</label>
				  <select id="vector_group" name="vector_group" class="form-control" data-placeholder="Service Condition" style="width: 100%;">
                      <?php
                      	include('connect.php');

                        $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ms_vektor_group ORDER BY id asc ");

						while($data=mysqli_fetch_array($query)){
                            echo '<option name="vector_group" value="'.$data['nm_vektor_group'].'">'.$data['nm_vektor_group'].'</option>';
                      }?>
                      </select>  
				</div>
			</div>

			<br>

			<div class="row">
				<div class="col-md-3">
				  <label>Spec</label>
				  <select id="spec" name="spec" class="form-control" style="width: 100%;">
                      <option name="spec" value="1">YES</option>
                      <option name="spec" value="0">NO</option>
                  </select>  
				</div>

				<div class="col-md-2">
				  <label>OD</label>
				  <select id="od" name="od" class="form-control" style="width: 100%;">
                      <option name="od" value="1">YES</option>
                      <option name="od" value="0">NO</option>
                  </select>  
				</div>

				<div class="col-md-2">
				  <label>NP</label>
				  <select id="np" name="np" class="form-control" style="width: 100%;">
                      <option name="np" value="1">YES</option>
                      <option name="np" value="0">NO</option>
                  </select>  
				</div>

				<div class="col-md-2">
				  <label>Wiring</label>
				  <select id="wiring" name="wiring" class="form-control" style="width: 100%;">
                      <option name="wiring" value="1">YES</option>
                      <option name="wiring" value="0">NO</option>
                  </select>  
				</div>
				
            </div>


            <div class="modal-footer">
				<div class="col-sm-12">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
	            </div>
	        </div>

 
	    </form>
      </div>
    </div>
  </div>
</div>               

<div class="row">
    <div class="col-md-12">
         <!--    Hover Rows  -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
								<th width="50px"><strong>KODE FG</strong></th>
								<th width="50px">kVA</th>
								<th width="100px" >Service Condition</th>
								<th width="150px"><strong>Vector Group</strong></th>
								<th width="28px"><strong>Winding</strong></th>
								<th width="85px"><strong>Aksi</strong></th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
						$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ms_trafo_std_oil ");

						while($data=mysqli_fetch_array($query)){
						?>
                           	<tr>
								<td><?php echo $data['kode_fg'];?></td>
								<td><?php echo $data['kva'];?></td>																					
								<td><?php echo $data['serv_condition'];?></td>
								<td><?php echo $data['vector_group'];?></td>
								<td><?php echo $data['winding'];?></td>
								<td>
									<a href="tabel/delete_trafo_oil_std.php?kode_fg=<?php echo $data['kode_fg']; ?> " onclick="return confirm('Yakin mau dihapus? ')" class="btn btn-xs btn-danger tipsy-kiri-atas" title='Hapus'> Hapus </a>
									<button type="button" class="btn btn-xs btn-warning tipsy-kiri-atas" data-toggle="modal" data-target="#modal-edit-<?php echo $data['kode_fg'] ?>">
							         	Edit
							      	</button>

								</td>

							</tr> 
						
						<div class="modal fade" id="modal-edit-<?php echo $data['kode_fg'] ?>">
								  <div class="modal-dialog modal-lg">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h4 class="modal-title">EDIT TRAFO</h4>
								      </div>
								      <div class="modal-body">
										<form class="form-horizontal" name="form_update_trafo_oil_std" action="?p=update_trafo_oil_std" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-3">
												  <label>Kode FG</label>
												  <input type="text" name="kode_fg" class="form-control" value="<?php echo $data['kode_fg'] ?>">  
												</div>

												<div class="col-md-2">
												  <label>kVA</label>
												  <input type="number" min="1" name="kva" class="form-control" value="<?php echo $data['kva'] ?>">  
												</div>

												<div class="col-md-2">
												  <label>Service Condition</label>
												  <select id="serv_condition" name="serv_condition" class="form-control" style="width: 100%;">
										  			  <option selected="selected" value="<?php echo $data['serv_condition'] ?>"><?php echo $data['serv_condition'] ?></option>
								                      <option name="serv_condition" value="Outdoor">Outdoor</option>
								                      <option name="serv_condition" value="Indoor">Indoor</option>
								                  </select>  
												</div>

												<div class="col-md-2">
												  <label>Winding</label>
												  <select id="winding" name="winding" class="form-control" style="width: 100%;">
												  	  <option selected="selected" value="<?php echo $data['winding'] ?>"><?php echo $data['winding'] ?></option>
								                      <option name="winding" value="Al-Al">Al-Al</option>
								                      <option name="winding" value="Cu-Cu">Cu-Cu</option>
								                      <option name="winding" value="Al-Cu">Al-Cu</option>
								                      <option name="winding" value="Cu-Al">Cu-Cu</option>
								                  </select>  
												</div>

												<div class="col-md-3">
												  <label>Vektor Group</label>
												  <select id="vector_group" name="vector_group" class="form-control" data-placeholder="Service Condition" style="width: 100%;">
												  	<option selected="selected" value="<?php echo $data['vector_group'] ?>"><?php echo $data['vector_group'] ?></option>
												  	<?php
								                      	include('connect.php');

								                        $asdw=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ms_vektor_group ORDER BY id asc ");

														while($test=mysqli_fetch_array($asdw)){
								                            echo '<option name="vector_group" value="'.$test['nm_vektor_group'].'">'.$test['nm_vektor_group'].'</option>';
								                      }?>
							                      </select>  
												</div>
											</div>

											<br>

											<div class="row">
												<div class="col-md-3">
												  <label>Spec</label>
												  <select id="spec" name="spec" class="form-control" style="width: 100%;">
												  	<option selected="selected" value="<?php echo $data['spec'] ?>">
												  		<?php if ($data['spec'] == 0) {
													  		echo "NO";
													  	}else{
													  		echo "YES";
													  	}  ?>
												  	</option>
								                      <option name="spec" value="1">YES</option>
								                      <option name="spec" value="0">NO</option>
								                  </select>  
												</div>

												<div class="col-md-2">
												  <label>OD</label>
												  <select id="od" name="od" class="form-control" style="width: 100%;">
												  	<option selected="selected" value="<?php echo $data['od'] ?>">
												  		<?php if ($data['od'] == 0) {
													  		echo "NO";
													  	}else{
													  		echo "YES";
													  	}  ?>
												  	</option>
								                      <option name="od" value="1">YES</option>
								                      <option name="od" value="0">NO</option>
								                  </select>  
												</div>

												<div class="col-md-2">
												  <label>NP</label>
												  <select id="np" name="np" class="form-control" style="width: 100%;">
												  	<option selected="selected" value="<?php echo $data['np'] ?>">
												  		<?php if ($data['np'] == 0) {
													  		echo "NO";
													  	}else{
													  		echo "YES";
													  	}  ?>
												  	</option>
								                      <option name="np" value="1">YES</option>
								                      <option name="np" value="0">NO</option>
								                  </select>  
												</div>

												<div class="col-md-2">
												  <label>HV Bushing</label>
												  <select id="hv_bushing" name="hv_bushing" class="form-control" style="width: 100%;">
												  	<option selected="selected" value="<?php echo $data['hv_bushing'] ?>">
												  		<?php if ($data['hv_bushing'] == 0) {
													  		echo "NO";
													  	}else{
													  		echo "YES";
													  	}  ?>
												  	</option>
								                      <option name="hv_bushing" value="1">YES</option>
								                      <option name="hv_bushing" value="0">NO</option>
								                  </select>  
												</div>

												<div class="col-md-3">
												  <label>LV Bushing</label>
												  <select id="lv_bushing" name="lv_bushing" class="form-control" style="width: 100%;">
												  	<option selected="selected" value="<?php echo $data['lv_bushing'] ?>">
												  		<?php if ($data['lv_bushing'] == 0) {
													  		echo "NO";
													  	}else{
													  		echo "YES";
													  	}  ?>
												  	</option>
								                      <option name="lv_bushing" value="1">YES</option>
								                      <option name="lv_bushing" value="0">NO</option>
								                  </select>  
												</div>

												
								            </div>


								        <div class="modal-footer">
											<div class="col-sm-12">
								              <button type="submit" class="btn btn-primary">Submit</button>
								              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Batal</button>
								            </div>
								        </div>

								 
									    </form>
								      </div>
								    </div>
								  </div>
								</div>   

								<?php } ?> 


							
                        


                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End  Hover Rows  -->
    </div>
</div>

<!-- jQuery -->
<script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/adminlte/dist/js/demo.js"></script>



