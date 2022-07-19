<?php
    include('connect.php');
?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>Silakan Approve List Form Spec berikut</h1>
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
						<table id="tbl_new_prospect" class="table table-bordered table-hover">
							<thead>
                                <tr>
									<th><strong>No Spec</strong></th>
									<th>Tgl Spec</th>
									<th>Tgl Propost</th>
									<th>Project</th>
									<th><strong>Sales</strong></th>
									<th><strong>Created</strong></th>
									<th><strong>Update</strong></th>
									<th><strong>Aging</strong></th>
									<th><strong>Aksi</strong></th>
                                </tr>
                            </thead>

			                <tbody>
			                <?php
								$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM formspec where status=3 ");
								while($data=mysqli_fetch_array($query)){
									$tanggal=$data['tgl_formspec'];
									$tglbaru = date('d-m-Y', strtotime($tanggal ));
									
									$tanggalx=$data['tgl_propost'];
									$tglbarux = date('d-m-Y', strtotime($tanggalx ));
									
									$hari=date('d-m-Y');
									$awal     = new DateTime($tglbarux);
									$sekarang = new DateTime($hari); 
									$interval = $sekarang->diff($awal)->format("%a");
									$botol=$data['tipeprospect'];	
									switch ($botol) {
										case ($botol=='OIL'):
											$link="Tabel/app_lock_Form_Hermetically_sealed.php";
											break;	
										case ($botol=='DRY'):
											$link="Tabel/app_lock_Form_spec_dry.php";
											break;										
									}
										
							?>
	                           	<tr>
									<td><?php echo $data['noformspec'];?></td>
									<td><?php echo $tglbaru; ?></td>
									<td><?php echo $tglbarux; ?></td>
									<td><?php echo $data['project'];?></td>																					
									<td><?php echo $data['sales'];?></td>
									<td><?php echo $data['created'];?></td>
									<td><?php echo $data['update_oleh'];?></td>
									<td><font color='red'><?php echo $interval;?></font></td>									
									<td>
						    			<a href="<?php echo $link; ?>?nopracost=<?php echo $data['noformspec']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> Detail </a>		
						    		</td>
								</tr> 
                            <?php } ?>
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</section>