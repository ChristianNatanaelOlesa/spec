<?php
session_start();
error_reporting(0);
include "pages/connect.php";


if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    echo "<script>window.location=('../index.php')</script>";
}else{                  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Prospect Engineering</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets2/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets2/dist/css/adminlte.min.css">
  <!-- Other Link References -->
  <script src="../assets2/link/kit.fontawesome.js"></script>
  <script src="../assets2/link/ajax.googleapis.js"></script>
  <script src="../assets2/link/bootstrap3-typeahead-4.0.2.min.js"></script>
  <script src="../assets2/link/bootstrap.min-3.3.5.js"></script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../assets2/index3.html" class="brand-link">
      <span class="brand-text font-weight-light"><center><b>APLIKASI<br>ENGINEERING</b></center></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php?p=home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <?php if ($_SESSION['level'] == 'Admin' ) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Prospect Tender
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_klarifikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect diklarifikasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=tunggu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect belum Klari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_open" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec Sdg Dikerjakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_reject_spv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec di Reject Spv</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_progress" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec di Review Spv</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_wait_approve" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Form Spec</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_terima_sales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec diterima Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_close" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec Selesai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=minta_material" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minta Mateial Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=formspec_reject" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec direject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=minta_koreksi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permintaan Koreksi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Estimator Prospect
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input List Material</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pracost dikerjakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pracost di Review Spv</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pracost direject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pracost diterima Manager</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Approval Manager
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Pracost Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pracost direject Direktur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Pracost</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Approval Deputy Director
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Pracost Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nego Pracost dari Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Pracost</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="index.php?p=home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Master</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>
          <br><br>

          <?php } else if ( $_SESSION['level']=='tender') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tender Prospect
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_klarifikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect diklarifikasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=tunggu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect belum Klari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_open" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec Sdg Dikerjakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_reject_spv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec di Reject Spv</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_progress" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec di Review Spv</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_wait_approve" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Form Spec</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_terima_sales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec diterima Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_close" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec Selesai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=minta_material" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minta Mateial Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=formspec_reject" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec direject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=minta_koreksi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permintaan Koreksi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>
          <br><br>

          <?php } else if ( $_SESSION['level']=='tender_spv') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tender Prospect
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_klarifikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect diklarifikasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=tunggu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospect belum Klari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_open" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec Sdg Dikerjakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_reject_spv" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec di Reject Spv</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_wait_approve" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Form Spec</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_terima_sales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec diterima Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_close" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec Selesai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=minta_material" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Minta Mateial Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=formspec_reject" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Spec direject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=minta_koreksi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permintaan Koreksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=trafo_oil_std" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trafo Oil Standard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=trafo_dry_std" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trafo Dry Standard</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>
          <br><br>

          <?php } else if ( $_SESSION['level']=='estimator') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Estimator Prospect
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=new_prospect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Form Pracost</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=new_klarifikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected Pracost</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=tunggu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input List Material</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=form_spec_open" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Release & Sent Pracost</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>
          <br><br>
        <?php } ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <div class="content-wrapper">

    <?php include 'main.php'; ?>

  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 Trafoindo.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets2/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets2/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets2/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets2/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets2/plugins/jszip/jszip.min.js"></script>
<script src="../assets2/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets2/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets2/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="../assets2/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets2/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets2/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#tbl_new_prospect').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


</body>
</html>

<?php
}
?>
