<?php
    include('connect.php');

    $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ms_trafo_std_dry ");
    $tester=mysqli_fetch_array($query);
?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>Trafo Dry Standard</h1>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
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
										<form class="form-horizontal"  action="?p=create_trafo_dry_std" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-3">
												  <label>Kode FG</label>
												  <input type="text" name="kode_fg" class="form-control" required>  
												</div>

												<div class="col-md-3">
												  <label>kVA</label>
												  <input type="number" min="1" name="kva" class="form-control" required>  
												</div>

												<div class="col-md-3">
												  <label>Winding</label>
												  <select id="winding" name="winding" class="form-control" style="width: 100%;" required>
								                      <option name="winding" value="Al-Al">Al-Al</option>
								                      <option name="winding" value="Cu-Cu">Cu-Cu</option>
								                      <option name="winding" value="Al-Cu">Al-Cu</option>
								                      <option name="winding" value="Cu-Al">Cu-Cu</option>
								                  </select>  
												</div>

												<div class="col-md-3">
												  <label>Vektor Group</label>
												  <select id="vector_group" name="vector_group" class="form-control" data-placeholder="Service Condition" style="width: 100%;" required>
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
												  <select id="spec" name="spec" class="form-control" style="width: 100%;" required>
								                      <option name="spec" value="1">YES</option>
								                      <option name="spec" value="0">NO</option>
								                  </select>  
												</div>

												<div class="col-md-3">
												  <label>OD</label>
												  <select id="od" name="od" class="form-control" style="width: 100%;" required>
								                      <option name="od" value="1">YES</option>
								                      <option name="od" value="0">NO</option>
								                  </select>  
												</div>

												<div class="col-md-3">
												  <label>NP</label>
												  <select id="np" name="np" class="form-control" style="width: 100%;" required>
								                      <option name="np" value="1">YES</option>
								                      <option name="np" value="0">NO</option>
								                  </select>  
												</div>

												<div class="col-md-3">
												  <label>Wiring</label>
												  <select id="wiring" name="wiring" class="form-control" style="width: 100%;" required>
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
						</div><!-- END OF MODAL -->

						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-default">
						            <div class="panel-body">
						                <div class="table-responsive">
											<table id="tbl_new_prospect" class="table table-bordered table-hover">
						                        <thead>
						                            <tr>
														<th"><strong>KODE FG</strong></th>
														<th">kVA</th>
														<th"><strong>VG</strong></th>
														<th"><strong>Winding</strong></th>
														<th"><strong>Spec</strong></th>
														<th"><strong>OD</strong></th>
														<th"><strong>NP</strong></th>
														<th"><strong>Wiring</strong></th>
														<th"><strong>Aksi</strong></th>
						                            </tr>
						                        </thead>

						                        <tbody>
						                        <?php
												$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ms_trafo_std_dry ");

												while($data=mysqli_fetch_array($query)){
												?>
						                           	<tr>
														<td><?php echo $data['kode_fg'];?></td>
														<td><?php echo $data['kva'];?></td>
														<td><?php echo $data['vector_group'];?></td>
														<td><?php echo $data['winding'];?></td>
														<td><?php if ($data['spec'] == 1) { echo "YES";} else {echo "NO";}?></td>
							                            <td><?php if ($data['od'] == 1) { echo "YES";} else {echo "NO";}?></td>
							                            <td><?php if ($data['np'] == 1) { echo "YES";} else {echo "NO";}?></td>
							                            <td><?php if ($data['wiring'] == 1) { echo "YES";} else {echo "NO";}?></td>
														<td>
															<a href="tabel/delete_trafo_dry_std.php?kode_fg=<?php echo $data['kode_fg']; ?> " onclick="return confirm('Yakin mau dihapus? ')" class="btn btn-xs btn-danger tipsy-kiri-atas" title='Hapus'> Hapus </a>
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
																	<form class="form-horizontal" action="?p=update_trafo_dry_std" method="post" enctype="multipart/form-data">
																	<div class="row">
																		<div class="col-md-3">
																		  <label>Kode FG</label>
																		  <input type="text" name="kode_fg" class="form-control" value="<?php echo $data['kode_fg'] ?>" readonly>  
																		</div>

																		<div class="col-md-3">
																		  <label>kVA</label>
																		  <input type="number" min="1" name="kva" class="form-control" value="<?php echo $data['kva'] ?>">  
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

																		<div class="col-md-3">
																			  <label>Winding</label>
																			  <select id="winding" name="winding" class="form-control" style="width: 100%;">
																			  	  <option selected="selected" value="<?php echo $data['winding'] ?>"><?php echo $data['winding'] ?></option>
															                      <option name="winding" value="Al-Al">Al-Al</option>
															                      <option name="winding" value="Cu-Cu">Cu-Cu</option>
															                      <option name="winding" value="Al-Cu">Al-Cu</option>
															                      <option name="winding" value="Cu-Al">Cu-Cu</option>
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

																		<div class="col-md-3">
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

																		<div class="col-md-3">
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

																		<div class="col-md-3">
																		  <label>Wiring</label>
																		  <select id="wiring" name="wiring" class="form-control" style="width: 100%;">
																		  	<option selected="selected" value="<?php echo $data['wiring'] ?>">
																		  		<?php if ($data['wiring'] == 0) {
																			  		echo "NO";
																			  	}else{
																			  		echo "YES";
																			  	}  ?>
																		  	</option>
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
														<?php } ?> 
						                        </tbody>
						                    </table>
						                </div>
						            </div>
						        </div>
						        <!-- End  Hover Rows  -->
						    </div>
						</div>


			        </div>
			    </div>
			</div>
		</div>
	</div>
</section>

<!-- jQuery -->
<script src="../assets2/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets2/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets2/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets2/adminlte/dist/js/demo.js"></script>