<?php
    include('connect.php');
?>

<div class="row">
    <div class="col-md-12">
	
        <h1 class="page-head-line" >Form Spec Menunggu Approval Supervisor Engineering Tender</h1>

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
											<th width="10px"><strong>No Spec</strong></th>
												<th width="8px">Tgl Spec</th>
											<th width="8px">Tgl Propost</th>
											<th width="250px" >Project</th>																					
											<th width="90px"><strong>Sales</strong></th>
											<th width="28px"><strong>Created</strong></th>
											<th width="28px"><strong>Update</strong></th>
											<th width="15px"><strong>Aging</strong></th>
									
											<th width="15px"><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
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
											$link="Tabel/lock_Form_Hermetically_sealed.php";
											break;	
										case ($botol=='DRY'):
											$link="Tabel/lock_Form_spec_dry.php";
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
									<td><font color='red'><?php echo $interval;?></color></td>								
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
                    <!-- End  Hover Rows  -->
                </div>
</div>