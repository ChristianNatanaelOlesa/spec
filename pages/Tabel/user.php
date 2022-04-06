<?php
include "connect.php";
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line" >User</h1>

    </div>
</div>

<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 line" >
                            <div class="panel panel-default">
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <input type="hidden" name="id_user" class="form-control"  readonly>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="password" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Level <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="level">
                                                    <option>--Pilih Jenis--</option>
                                                    <option value="Petugas">Petugas</option>
                                                    <option value="Pimpinan">Pimpinan</option>
                                                </select>
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

  $save=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO user VALUES('','$_POST[nama]','$_POST[username]','$_POST[password]','$_POST[level]')");

  if($save) {
  echo"<script language=javascript>
        window.location='?p=user';
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Kode User</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                            $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user");
                            while($data=mysqli_fetch_array($query)){

                            ?>
                                        <tr>
                                            <td><?php echo $data['id_user']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['password']; ?></td>
                                            <td><?php echo $data['level']; ?></td>
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