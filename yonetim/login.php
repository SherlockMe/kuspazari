<?php 

include("../baglanti.php");
ob_start();
session_start();

$kadi = $con->real_escape_string($_POST['kadi']);
$sifre = $con->real_escape_string($_POST['sifre']);
/*
$kadi=preg_replace("#[^0-9]#",'', $kadi);
$sifre=preg_replace("#[^0-9]#",'', $sifre);
*/

$sql = "select * from admin where username='".$kadi."' and password='".$sifre."' ";

$sql_check = mysqli_query($con,$sql) or die(mysqli_error());

if(mysqli_num_rows($sql_check))  {
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    header("Location:admin.php");
}

else {
	if($kadi=="" or $sifre=="") {
		echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
	}
	else {
		echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
	}
}

ob_end_flush();
?>