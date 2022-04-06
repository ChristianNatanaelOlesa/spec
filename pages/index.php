<?php
session_start();
error_reporting(0);
include "pages/connect.php";


if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    echo "<script>window.location=('../index.php')</script>";
}else{
                  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Aplikasi Prospect Engineering  </title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href='../http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                </button>				
                 <a class="navbar-brand" href="?p=home">APLIKASI ENGINEERING</a>
        </div>

            <div class="header-right">

            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php?p=home"><i class="fa fa-dashboard "></i> Home </a>
                    </li> 
                    <?php if ($_SESSION['level'] == 'Admin' ) { ?>
					  <li>                       
						<a href="?p=new_prospect"><i class="fa fa-table"></i>Prospect Tender<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Prospect Baru</a>
                            </li>
							 <li>
                                <a href="?p=new_klarifikasi"><i class="fa fa-circle-o"></i>Prospect diklarifikasi</a>
                            </li>
							 <li>
                                <a href="?p=tunggu"><i class="fa fa-circle-o"></i>Prospect belum Klari</a>
                            </li>
                            <li>
                                <a href="?p=form_spec_open"><i class="fa fa-circle-o"></i>Form Spec Sdg Dikerjakan</a>
                            </li>
							 <li>
                                <a href="?p=form_spec_reject_spv"><i class="fa fa-circle-o"></i>Form Spec di Reject Spv </a>
                            </li>
							 <li>
                                <a href="?p=form_spec_progress"><i class="fa fa-circle-o"></i>Form Spec di Review Spv </a>
                            </li>
							<li>
                                <a href="?p=form_spec_wait_approve"><i class="fa fa-circle-o"></i>Approve Form Spec </a>
                            </li>
							 <li>
                                <a href="?p=form_spec_terima_sales"><i class="fa fa-circle-o"></i>Form Spec diterima Sales</a>
                            </li>
							 <li>
                                <a href="?p=form_spec_close"><i class="fa fa-circle-o"></i>Form Spec Selesai</a>
                            </li>
                            <li>
                                <a href="?p=minta_material"><i class="fa fa-circle-o "></i>Minta Mateial Baru </a>
                            </li>
                     
                            </li>   
							 <li>
                                <a href="?p=formspec_reject"><i class="fa fa-circle-o "></i>Form Spec direject</a>
                            </li> 
							 <li>
                                <a href="?p=minta_koreksi"><i class="fa fa-circle-o "></i>Permintaan Koreksi</a>
                            </li> 
						</ul>
                    </li> 
					<li>                       
						<a href="?p=new_pracost"><i class="fa fa-table"></i>Estimator Prospect <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Form Spec</a>
                            </li>
							 <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Input List Material </a>
                            </li>
							 <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Pracost dikerjakan</a>
                            </li>
							 <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Pracost di Review Spv</a>
                            </li>
							<li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Pracost direject </a>
                            </li>                       
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o "></i>Pracost diterima Manager</a>
                            </li>
                             
                        </ul>
                    </li> 
					<li>
                        <a href="#"><i class="fa fa-table"></i>Approval Manager <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>List Pracost Baru</a>
                            </li>
							<li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Pracost direject Direktur</a>
                            </li>
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Edit Pracost</a>
                            </li>
                        </ul>
                    </li> 
					<li>
                        <a href="#"><i class="fa fa-table"></i>Approval Deputy Director <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>List Pracost Baru</a>
                            </li>
							<li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Nego Pracost dari Sales</a>
                            </li>
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Edit Pracost</a>
                            </li>                                                   
                           
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="fa fa-table"></i>Master <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                                                   
                           
                        </ul>
                    </li> 
					 <li action="logout.php" method="post">
                        <a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
					
					
                    <?php } if ( $_SESSION['level']=='tender') { ?>
                   <li>                       
						<a href="?p=new_prospect"><i class="fa fa-table"></i>Tender Prospect <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Prospect Baru</a>
                            </li>
							 <li>
                                <a href="?p=new_klarifikasi"><i class="fa fa-circle-o"></i>Prospect diklarifikasi</a>
                            </li>
							 <li>
                                <a href="?p=tunggu"><i class="fa fa-circle-o"></i>Prospect belum Klari</a>
                            </li>
                            <li>
                                <a href="?p=form_spec_open"><i class="fa fa-circle-o"></i>Form Spec Sdg Dikerjakan</a>
                            </li>
							 <li>
                                <a href="?p=form_spec_reject_spv"><i class="fa fa-circle-o"></i>Form Spec di Reject Spv </a>
                            </li>
							 <li>
                                <a href="?p=form_spec_progress"><i class="fa fa-circle-o"></i>Form Spec di Review Spv </a>
                            </li>
							 <li>
                                <a href="?p=form_spec_terima_sales"><i class="fa fa-circle-o"></i>Form Spec diterima Sales</a>
                            </li>
							 <li>
                                <a href="?p=form_spec_close"><i class="fa fa-circle-o"></i>Form Spec Selesai</a>
                            </li>
                            <li>
                                <a href="?p=minta_material"><i class="fa fa-circle-o "></i>Minta Material Baru </a>
                            </li>
                     
                            </li>   
							 <li>
                                <a href="?p=formspec_reject"><i class="fa fa-circle-o "></i>Form Spec direject</a>
                            </li> 
							 <li>
                                <a href="?p=minta_koreksi"><i class="fa fa-circle-o "></i>Permintaan Koreksi</a>
                            </li> 
                           
                        </ul>
                    </li> 
					 <li action="logout.php" method="post">
                        <a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
					  <?php } if ( $_SESSION['level']=='tender_spv') { ?>
                   <li>                       
						<a href="?p=new_prospect"><i class="fa fa-table"></i>Tender Prospect <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Prospect Baru</a>
                            </li>
							 <li>
                                <a href="?p=new_klarifikasi"><i class="fa fa-circle-o"></i>Prospect diklarifikasi</a>
                            </li>
							 <li>
                                <a href="?p=tunggu"><i class="fa fa-circle-o"></i>Prospect belum Klari</a>
                            </li>
                            <li>
                                <a href="?p=form_spec_open"><i class="fa fa-circle-o"></i>Form Spec Sdg Dikerjakan</a>
                            </li>
							 <li>
                                <a href="?p=form_spec_reject_spv"><i class="fa fa-circle-o"></i>Form Spec di Reject Spv </a>
                            </li>
							 <li>
                                <a href="?p=form_spec_wait_approve"><i class="fa fa-circle-o"></i>Approve Form Spec </a>
                            </li>
							 <li>
                                <a href="?p=form_spec_terima_sales"><i class="fa fa-circle-o"></i>Form Spec diterima Sales</a>
                            </li>
							 <li>
                                <a href="?p=form_spec_close"><i class="fa fa-circle-o"></i>Form Spec Selesai</a>
                            </li>
                            <li>
                                <a href="?p=minta_material"><i class="fa fa-circle-o "></i>Minta Material Baru </a>
                            </li>
                     
                            </li>   
							 <li>
                                <a href="?p=formspec_reject"><i class="fa fa-circle-o "></i>Form Spec direject</a>
                            </li> 
							 <li>
                                <a href="?p=minta_koreksi"><i class="fa fa-circle-o "></i>Permintaan Koreksi</a>
                            </li> 
                           
                        </ul>
                    </li> 
					 <li action="logout.php" method="post">
                        <a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
					
                    <?php } if ($_SESSION['level']=='estimator' ) { ?>
					<li>                       
						<a href="?p=parkir"><i class="fa fa-table"></i>Estimator Prospect <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>New Form Pracost</a>
                            </li>
							    <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Rejected Pracost </a>
                            </li>
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o"></i>Input List Material </a>
                            </li>
                            <li>
                                <a href="?p=new_prospect"><i class="fa fa-circle-o "></i>Release & Sent Pracost</a>
                            </li>
                             
                        </ul>
                    </li>
                    <li action="logout.php" method="post">
                        <a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>

                    <?php } ?>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                             include 'main.php';
                        ?>
                    </div>
                </div>          

            </div>
        </div>
    </div>
    <div id="footer-sec">
          &copy; 2021| Copyright : <a href="" target="_blank">Trafoindo</a>

    </div>
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.metisMenu.js"></script>

    <script src="../assets/js/custom.js"></script>
    

    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                
            });
    </script>
    
</body>
</html>



<?php
}
?>
