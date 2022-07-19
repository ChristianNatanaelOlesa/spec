<?php
    include('connect.php');
?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>Form Spec Technically Close</h1>
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
									<th>Tanggal</th>
									<th>Project</th>
									<th><strong>Sales</strong></th>
									<th><strong>Priority</strong></th>
									<th><strong>Status</strong></th>
									<th>Cust Approve</th>
									<th><strong>Aksi</strong></th>
                                </tr>
                            </thead>

			                <tbody>
		                 	<?php
								$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM h_rpospect where status=7 ");
								while($data=mysqli_fetch_array($query)){
									$tanggal=$data['tgl_prospect'];
									$tglbaru = date('d-m-Y', strtotime($tanggal ));
							?>
	                           	<tr>
									<td><?php echo $data['noprospect'];?></td>
									<td><?php echo $tglbaru; ?></td>
									<td><?php echo $data['project'];?></td>
									<td><?php echo $data['sales'];?></td>
									<td><?php echo $data['priority'];?></td>
									<td><?php echo $data['status'];?></td>
									<td><?php echo $tglbaru; ?></td>									
									<td>
						    			<a href="tabel/new_prospect_detail_close.php?noprospect=<?php echo $data['noprospect']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> Detail </a>
						    			<!--<a href="?menu=edit_data_memo&aksi=edit&nmr=<?php echo $pasien['nomemo']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title='Edit Data ini'> Close</a>c-->
										<!--<a href="tabel/close_form_spec.php?sender=close&noprospect=<?php echo $data['noprospect']; ?> " onclick="return confirm('Yakin mau diclose? ')" class="btn btn-xs btn-danger tipsy-kiri-atas" title='Hapus'> Close </a>-->	
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