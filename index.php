<?php
session_start();
  if (isset($_SESSION['username'])) {
    require_once("pages/connect.php");
   }
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Engineering | Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #F9F9F9;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h2><B>APLIKASI ENGINEERING</B></h2>
            </div>
        </div>
        
        <div class="row "> 
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">  
                <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" action="pages/login.php" method="POST">
                        <h4 align="center">Silahkan Login</h4><br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Your Username " />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                        </div>
                        <input type="submit" name="submit" value="Login" class= "btn form-control btn-info">
                    </form>
                </div>
            </div>
            </div>
        </div>
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h4></h4>
            </div>
        </div>
    </div>
    </body>
    </html>
        