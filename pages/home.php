<?php 
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
include "connect.php";

if (isset($_POST['tanggal_to'])) {

  $bulan = substr($_POST['tanggal_to'],5,2);
  $tahun = substr($_POST['tanggal_to'],0,4);

  $query_0 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_00 from h_rpospect where status = 0 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun' ");
  $data_0  = mysqli_fetch_array($query_0);

  $query_00 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_00 from h_rpospect where status = 2 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_00  = mysqli_fetch_array($query_00);

  $data_000 = $data_0['jmlh_00'] + $data_00['jmlh_00'];

  $query_01 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_01 from h_rpospect WHERE status = 1 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_01  = mysqli_fetch_array($query_01);

  $query_0100 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_0100 from h_rpospect WHERE status = 100 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_0100  = mysqli_fetch_array($query_0100);

  $query_0101 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_0101 from h_rpospect WHERE status = 101 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_0101  = mysqli_fetch_array($query_0101);

  $query_02 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_02 from h_rpospect WHERE status = 2 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_02  = mysqli_fetch_array($query_02);

  $query_0200 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_0200 from h_rpospect WHERE status = 200 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_0200  = mysqli_fetch_array($query_0200);

  $query_03 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_03 from h_rpospect WHERE status = 3 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_03  = mysqli_fetch_array($query_03);

  $query_04 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_04 from h_rpospect WHERE status = 4 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_04  = mysqli_fetch_array($query_04);
} else {

  $bulan = date('n');
  $tahun = date('Y');
  
  $query_0 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_00 from h_rpospect where status = 0 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_0  = mysqli_fetch_array($query_0);

  $query_00 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_00 from h_rpospect where status = 0 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_00  = mysqli_fetch_array($query_00);

  $data_000 = $data_0['jmlh_00'] + $data_00['jmlh_00'];

  $query_01 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_01 from h_rpospect WHERE status = 1 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_01  = mysqli_fetch_array($query_01);

  $query_0100 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_0100 from h_rpospect WHERE status = 100 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_0100  = mysqli_fetch_array($query_0100);

  $query_0101 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_0101 from h_rpospect WHERE status = 101 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_0101  = mysqli_fetch_array($query_0101);

  $query_02 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_02 from h_rpospect WHERE status = 2 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_02  = mysqli_fetch_array($query_02);

  $query_0200 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_0200 from h_rpospect WHERE status = 200 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_0200  = mysqli_fetch_array($query_0200);

  $query_03 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_03 from h_rpospect WHERE status = 3 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_03  = mysqli_fetch_array($query_03);

  $query_04 = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*) as jmlh_04 from h_rpospect WHERE status = 4 and MONTH(tgl_prospect) = '$bulan' and tahun = '$tahun'");
  $data_04  = mysqli_fetch_array($query_04);
}

?>


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-5">
        <h3>DASHBOARD PROSPECT (PARTIAL)</h3>		  
      </div>

      <div class="col-sm-5">
        &nbsp;  
      </div>

      <div class="col-sm-2">

        <div class="input-group input-group-lg mb-3">
          <div class="input-group-prepend">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
              Action
            </button>
            <ul class="dropdown-menu">
              <li class="dropdown-item"><a href="index.php?p=home2">Akumulatif</a></li>
              <li class="dropdown-item"><a href="index.php?p=home">Partial</a></li>
            </ul>
          </div>
        </div>   
      </div>

    </div>
    <div class="row mb-2">
      <div class="col-sm-4">
        &nbsp;     
      </div>
      
      <div class="col-sm-8">
        <form action="index.php?p=home" method="post" class="form-horizontal">
          <div class="form-group row">
            
            <div class="col-sm-4">
              &nbsp;
            </div>

            <label class="col-sm-2 col-form-label">INPUT DATE</label>
            <div class="col-sm-4">
              <input class="form-control" type="month" name="tanggal_to" id="tanggal_to" required>
            </div>

            <div class="col-sm-2">
              <input type="submit" class="btn btn-primary" style="width:100%;" value="Submit">
            </div>
            
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $data_000; ?></h3>
            <p>PROSPECT MASUK</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="?p=new_prospect" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $data_0100['jmlh_0100']; ?></h3>
            <p>PROSPECT MINTA PENDING</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="?p=new_klarifikasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $data_01['jmlh_01']; ?></h3>
            <p>PROSPECT TUNGGU KLARIFIKASI</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $data_02['jmlh_02']; ?></h3>
            <p>PROSPECT SUDAH KLARIFIKASI</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $data_03['jmlh_03']; ?></h3>
            <p>PROSPECT SEDANG DIKERJAKAN</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $data_0200['jmlh_0200']; ?></h3>
            <p>PROSPECT REVISI</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $data_0101['jmlh_0101']; ?></h3>
            <p>PROSPECT PENDING OLEH USER</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $data_04['jmlh_04']; ?></h3>
            <p>PROSPECT SELESAI</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Donut Chart</h3>
          </div>
          <div class="card-body">
            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Pie Chart</h3>
          </div>
          <div class="card-body">
            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>

    </div><!-- /.row -->

    <div class="row">
      
      <div class="col-md-6">
        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Bar Chart</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>

      <div class="col-md-6">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Stacked Bar Chart</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.row -->

  </div><!-- /.container-fluid -->
</section>

<script>
  $(function () {

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Tahun 2022',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
          <?php 
            $query_january = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as january from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 1");
            $data_january  = mysqli_fetch_array($query_january);
            echo $data_january['january'];
          ?>,

          <?php 
            $query_february = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as february from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 2");
            $data_february  = mysqli_fetch_array($query_february);
            echo $data_february['february'];
          ?>,

          <?php 
            $query_march = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as march from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 3");
            $data_march  = mysqli_fetch_array($query_march);
            echo $data_march['march'];
          ?>,

          <?php 
            $query_april = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as april from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 4");
            $data_april  = mysqli_fetch_array($query_april);
            echo $data_april['april'];
          ?>,

          <?php 
            $query_may = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as may from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 5");
            $data_may  = mysqli_fetch_array($query_may);
            echo $data_may['may'];
          ?>,

          <?php 
            $query_june = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as june from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 6");
            $data_june  = mysqli_fetch_array($query_june);
            echo $data_june['june'];
          ?>,

          <?php 
            $query_july = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as july from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 7");
            $data_july  = mysqli_fetch_array($query_july);
            echo $data_july['july'];
          ?>,

          <?php 
            $query_august = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as august from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 8");
            $data_august  = mysqli_fetch_array($query_august);
            echo $data_august['august'];
          ?>,

          <?php 
            $query_september = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as september from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 9");
            $data_september  = mysqli_fetch_array($query_september);
            echo $data_september['september'];
          ?>,

          <?php 
            $query_october = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as october from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 10");
            $data_october  = mysqli_fetch_array($query_october);
            echo $data_october['october'];
          ?>,

          <?php 
            $query_november = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as november from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 11");
            $data_november  = mysqli_fetch_array($query_november);
            echo $data_november['november'];
          ?>,

          <?php 
            $query_december = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as december from h_rpospect where tahun = 2022 and MONTH(tgl_prospect) = 12");
            $data_december  = mysqli_fetch_array($query_december);
            echo $data_december['december'];
          ?>
          ]
        },
        {
          label               : 'Tahun 2021',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
          <?php 
            $query01_january = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as january from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 1");
            $data01_january  = mysqli_fetch_array($query01_january);
            echo $data01_january['january'];
          ?>,

          <?php 
            $query01_february = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as february from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 2");
            $data01_february  = mysqli_fetch_array($query01_february);
            echo $data01_february['february'];
          ?>,

          <?php 
            $query01_march = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as march from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 3");
            $data01_march  = mysqli_fetch_array($query01_march);
            echo $data01_march['march'];
          ?>,

          <?php 
            $query01_april = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as april from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 4");
            $data01_april  = mysqli_fetch_array($query01_april);
            echo $data01_april['april'];
          ?>,

          <?php 
            $query01_may = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as may from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 5");
            $data01_may  = mysqli_fetch_array($query01_may);
            echo $data01_may['may'];
          ?>,

          <?php 
            $query01_june = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as june from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 6");
            $data01_june  = mysqli_fetch_array($query01_june);
            echo $data01_june['june'];
          ?>,

          <?php 
            $query01_july = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as july from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 7");
            $data01_july  = mysqli_fetch_array($query01_july);
            echo $data01_july['july'];
          ?>,

          <?php 
            $query01_august = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as august from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 8");
            $data01_august  = mysqli_fetch_array($query01_august);
            echo $data01_august['august'];
          ?>,

          <?php 
            $query01_september = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as september from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 9");
            $data01_september  = mysqli_fetch_array($query01_september);
            echo $data01_september['september'];
          ?>,

          <?php 
            $query01_october = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as october from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 10");
            $data01_october  = mysqli_fetch_array($query01_october);
            echo $data01_october['october'];
          ?>,

          <?php 
            $query01_november = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as november from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 11");
            $data01_november  = mysqli_fetch_array($query01_november);
            echo $data01_november['november'];
          ?>,

          <?php 
            $query01_december = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as december from h_rpospect where tahun = 2021 and MONTH(tgl_prospect) = 12");
            $data01_december  = mysqli_fetch_array($query01_december);
            echo $data01_december['december'];
          ?>
          ]
        },
      ]
    }

    var donutData        = {
      labels: [
          'Prospect Masuk',
          'Prospect Minta Pending',
          'Prospect Tunggu Klarifikasi',
          'Prospect Sudah Klarifikasi',
          'Prospect Sedang Dikerjakan',
		  'Prospect Revisi',
		  'Prospect Pending Oleh User',
		  'Prospect Selesai'
      ],
      datasets: [
        {
          data: [
          <?php 
            $q_00 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_00 from h_rpospect WHERE status = 0 or status=2");
            $data_00  = mysqli_fetch_array($q_00);
            echo $data_00['test_00'];
          ?>,

          <?php 
            $q_0100 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_0100 from h_rpospect WHERE status = 100");
            $data0100  = mysqli_fetch_array($q_0100);
            echo $data0100['test_0100'];
          ?>,

          <?php 
            $q_01 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_01 from h_rpospect WHERE status = 1");
            $data01  = mysqli_fetch_array($q_01);
            echo $data01['test_01'];
          ?>,

          <?php 
            $q_02 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_02 from h_rpospect WHERE status = 2");
            $data02  = mysqli_fetch_array($q_02);
            echo $data02['test_02'];
          ?>,

          <?php 
            $q_03 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_03 from h_rpospect WHERE status = 3");
            $data03  = mysqli_fetch_array($q_03);
            echo $data03['test_03'];
          ?>,
		   <?php 
            $q_0200 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_0200 from h_rpospect WHERE status = 200");
            $data0200  = mysqli_fetch_array($q_0200);
            echo $data0200['test_0200'];
          ?>,
		    <?php 
            $q_0101 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_0101 from h_rpospect WHERE status = 101");
            $data0101  = mysqli_fetch_array($q_0101);
            echo $data0101['test_0101'];
          ?>,
		  <?php 
            $q_04 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as test_04 from h_rpospect WHERE status = 4");
            $data04  = mysqli_fetch_array($q_04);
            echo $data04['test_04'];
          ?>

          ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc','#4d8d1c','#fc1dc','#aa88bc'],
        }
      ]
    }

    var pieData        = {
      labels: [
          'Tahun 2021',
          'Tahun 2022',
      ],
      datasets: [
        {
          data: [
          <?php 
            $query_2021 = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as data2021 from h_rpospect where tahun = '2021' ");
            $data_2021  = mysqli_fetch_array($query_2021);
            echo $data_2021['data2021'];
          ?>,

          <?php 
            $query_2022 = mysqli_query($GLOBALS["___mysqli_ston"], "select distinct count(noprospect) as data2022 from h_rpospect where tahun = '2022' ");
            $data_2022  = mysqli_fetch_array($query_2022);
            echo $data_2022['data2022'];
          ?>
          ],
          backgroundColor : ['#f56954', '#00a65a'],
        }
      ]
    }
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

     //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })

  })
</script>