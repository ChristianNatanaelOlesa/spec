<?php
    include('connect.php');
?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>REQUEST MATERIAL</h1>
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
									<th><strong>Prospect</strong></th>
									<th><strong>Sub Prospect</strong></th>
									<th>Tanggal Request</th>					
									<th><strong>Sales</strong></th>
									<th><strong>Engineer</strong></th>
									<th><strong>Status</strong></th>
									<th><strong>Aksi</strong></th>
                                </tr>
                            </thead>

			                <tbody>
		                 	<?php
								$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT DISTINCT a.noprospect, a.noformspec, a.sales, b.nopracost, b.created_dt, b.created_by, b.status FROM formspec a INNER JOIN request_material b ON a.noformspec = b.nopracost where a.status = 2 and b.status = 103 ORDER BY b.created_dt desc ");
								while($data=mysqli_fetch_array($query)){
									$tanggal=$data['created_dt'];
									$tglbaru = date('d-m-Y', strtotime($tanggal ));
									$nama_sales = $data['sales'];
									$nama_engineer = $data['created_by'];

									$botol=$data['tipeprospect'];	
									switch ($botol) {
									case ($botol=='OIL'):
										$link="Tabel/edit_Form_hermetically_sealed.php";
										break;	
									case ($botol=='DRY'):
										$link="Tabel/edit_Form_spec_dry.php";
										break;										
									}
							?>
	                           	<tr>
									<td style="text-align: center;"><?php echo $data['noprospect'];?></td>
									<td style="text-align: center;"><?php echo $data['noformspec'];?></td>
									<td style="text-align: center;"><?php echo $tglbaru; ?></td>
									<td style="text-align: center;"><?php echo $nama_sales ?></td>
									<td style="text-align: center;"><?php echo $nama_engineer ?></td>			
									<td style="text-align: center;"><?php if ($data['status'] == 103) {
															 	echo '<span class="badge bg-primary">ON PROGRESS</span>';
															}else if ($data['status'] == 105){
																echo '<span class="badge bg-success">COMPLETED</span>';
															}?>
									</td>
									<td style="text-align: center;">
										<?php if ($data['status'] == 105) { ?>
											<a href="<?php echo $link; ?>?nopracost=<?php echo $data['noformspec']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> Detail Formspec</a>	
										<?php } elseif ($data['status'] == 103) { ?>
											<a href="tabel/detail_request_material.php?noprospect=<?php echo $data['noprospect']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Konfirmasi'>Detail Request</a>
										<?php } ?>
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