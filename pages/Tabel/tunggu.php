<?php
    include('connect.php');
?>

<div class="row">
    <div class="col-md-12">
	
        <h1 class="page-head-line" >PROSPECT BELUM DI KLARIFIKASI OLEH SALES</h1>

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
											<th width="70px"><strong>Prospect</strong></th>
											<th width="80px">Tanggal</th>
											<th >Project</th>																					
											<th ><strong>Sales</strong></th>
											<th width="10px"><strong>Priority</strong></th>											
											<th width="105px"><strong>Tgl minta Klari</strong></th>	
											<th width="40px"><strong>Aging</strong></th>	
											<th width="10px"><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>
                                    <?php
									//$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM h_rpospect where status=1");//
									$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM h_rpospect join oil_prospect on h_rpospect.noprospect=oil_prospect.noprospect where  oil_prospect.status=1");
									while($data=mysqli_fetch_array($query)){
										$tanggal=$data['tgl_prospect'];
										$tglbaru = date('d-m-Y', strtotime($tanggal ));	

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
									<td><font color='red'><?php echo $interval;?></color></td>
																
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
                    <!-- End  Hover Rows  -->
                </div>
</div>