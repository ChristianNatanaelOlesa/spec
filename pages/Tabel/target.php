<?php
    include('connect.php');
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line" >Jenis Parkir</h1>

    </div>
</div>

<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 line" >
                            <div class="panel panel-default">
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <input type="hidden" name="id_target" class="form-control"  readonly>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jenis Parkir <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="target" required="required" placeholder="Jenis Parkir" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" name="save" class="btn btn-success" title="Tambah Target Baru">Submit</button>
                                            </div>
                                        </div>

                                    </form>
<?php 

include"connect.php";
if(isset($_POST['save'])){

  $save=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO target VALUES('','$_POST[target]')");

  if($save) {
  echo"<script language=javascript>
        window.location='?p=target';
        </script>";
        exit;
      }else{
        echo"gagal";
      }
}
?>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="row">
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kode Jenis Parkir</th>
                                            <th>Jenis Parkir</th>
                                        </tr>
                                    </thead>
                                    <?php
                            $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM target");
                            while($data=mysqli_fetch_array($query)){

                            ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $data['id_target']; ?></td>
                                            <td><?php echo $data['target']; ?></td>
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