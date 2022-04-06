<?php
include 'konek.php';

$g=$_GET['sender'];

if($g=='close')
    {
        mysqli_query($config,"UPDATE  h_rpospect set status=7  where noprospect='$_GET[noprospect]'");
		mysqli_query($config,"UPDATE  oil_prospect set status=7 where noprospect='$_GET[noprospect]'");         
         echo '<script LANGUAGE="JavaScript">
			            window.location.href="../?p=new_prospect";
            </script>';
    }
			
?>