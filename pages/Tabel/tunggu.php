<?php
    include('connect.php');
?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>PROSPECT BELUM DI KLARIFIKASI OLEH SALES</h1>
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
									<th><strong>Tgl minta Klari</strong></th>	
									<th><strong>Aging</strong></th>	
									<th><strong>Aksi</strong></th>
                                </tr>
                            </thead>

			                <tbody>
			                <?php
								//$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM h_rpospect where status=1");//
								$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM h_rpospect join oil_prospect on h_rpospect.noprospect=oil_prospect.noprospect where  oil_prospect.status=1");
								while($data = mysqli_fetch_array($query)){
									$tanggal =$data['tgl_prospect'];
									$tglbaru = date('d-m-Y', strtotime($tanggal));	
									$tang=$data['tgl_req_klari'];
									$kepo = date('d-m-Y', strtotime($tang));	
									$tanggal_awal     = new DateTime($data['tgl_req_klari']);
									$tanggal_sekarang = new DateTime(); 
									$interval         = $tanggal_sekarang->diff($tanggal_awal)->format("%a");
							?>
                                   	<tr>
										<td><?php echo $data['noprospect'];?></td>
										<td><?php echo $tglbaru; ?></td>
										<td><?php echo $data['project'];?></td>
										<td><?php echo $data['sales'];?></td>
										<td><?php echo $data['priority'];?></td>								
										<td><?php echo $kepo;?></td>	
										<td><font color='red'><?php echo $interval;?></font></td>
										<td>
											<center><a href="tabel/tunggu_detail.php?noprospect=<?php echo $data['noprospect']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> Detail </a></center>
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