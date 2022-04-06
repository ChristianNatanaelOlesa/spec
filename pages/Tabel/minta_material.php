<?php
    include('connect.php');
?>

<div class="row">
    <div class="col-md-12">
	
        <h1 class="page-head-line" >REQUEST MATERIAL</h1>

    </div>
</div>
                      

<div class="row">
    <div class="col-md-12">
         <!--    Hover Rows  -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <!--<table class="table table-hover">-->
					<!--<table width="100%"  id="example1" class="table table-striped dataTable no-footer"> -->
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
								<th width="50px" style="text-align: center;"><strong>Prospect</strong></th>
								<th width="50px" style="text-align: center;"><strong>Sub Prospect</strong></th>
								<th width="50px" style="text-align: center;">Tanggal Request</th>					
								<th width="50px" style="text-align: center;"><strong>Sales</strong></th>
								<th width="50px" style="text-align: center;"><strong>Engineer</strong></th>
								<th width="40px" style="text-align: center;"><strong>Status</strong></th>
								<th width="85px" style="text-align: center;"><strong>Aksi</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT DISTINCT a.noprospect, a.noformspec, a.status, a.sales, b.nopracost, b.created_dt, b.created_by FROM formspec a INNER JOIN request_material b ON a.noformspec = b.nopracost  where a.status = 2 or a.status = 100 ORDER BY b.created_dt desc ");
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
							<td style="text-align: center;"><?php if ($data['status'] == 100) {
															 	echo '<span class="badge bg-primary">ON PROGRESS</span>';
															}else if ($data['status'] == 2){
																echo '<span class="badge bg-success">COMPLETED</span>';
															}?>
							</td>
							<td style="text-align: center;">
								<?php if ($data['status'] == 2) { ?>
									<a href="<?php echo $link; ?>?nopracost=<?php echo $data['noformspec']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> Detail Formspec</a>	
								<?php } elseif ($data['status'] == 100) { ?>
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
        <!-- End  Hover Rows  -->
    </div>
</div>