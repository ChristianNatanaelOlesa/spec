<?php
    include('connect.php');
?>

<div class="row">
    <div class="col-md-12">
	
        <h1 class="page-head-line" >New Prospect List</h1>

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
											<th width="50px"><strong>Prospect</strong></th>
											<th width="50px">Tanggal</th>
											<th width="100px" >Project</th>																					
											<th width="150px"><strong>Sales</strong></th>
											<th width="28px"><strong>Priority</strong></th>
											<th width="40px"><strong>Status</strong></th>
											<th width="85px"><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <?php
									$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM h_rpospect   where status=0 or status=2 ORDER BY noprospect desc ");
									//$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT distinct * FROM h_rpospect join oil_prospect on h_rpospect.noprospect=oil_prospect.noprospect where   oil_prospect.status=0");
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
									<td>
							<a href="tabel/new_prospect_detail.php?noprospect=<?php echo $data['noprospect']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title='Detail'> Detail </a>							
							<!--<a href="?menu=edit_data_memo&aksi=edit&nmr=<?php echo $pasien['nomemo']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title='Edit Data ini'> Close</a>-->
							<a href="tabel/close_form_spec.php?sender=close&noprospect=<?php echo $data['noprospect']; ?> " onclick="return confirm('Yakin mau diclose? ')" class="btn btn-xs btn-danger tipsy-kiri-atas" title='Hapus'> Close </a>
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