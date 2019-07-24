<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['ses_user']) || !isset($_SESSION['ses_pass']) ){ //cek apakah user sudah login
        header("location:login_register/login.php");
    } else {

    $link=mysqli_connect("localhost","root","","db_rskgm_obat");
    $user=$_SESSION['ses_user'];
    $login=mysqli_query($link,"SELECT * FROM admin WHERE username = '$user'");
    $t=mysqli_fetch_array($login);

    }?>
<?php require('top_menu.php'); ?>

    <div class="container-fluid">
      <center>
        <font style="font-size: 36px;">SISTEM INFORMASI PERSEDIAAN OBAT</font><br>
        <font style="font-size: 24px;">Rumah Sakit Khusus Gigi & Mulut</font><br>
        <img src="gambar/Lambang_Kota_Bandung.svg.png" width="500px">
      </center>
    </div>
<?php require('bottom_menu.php'); ?>
