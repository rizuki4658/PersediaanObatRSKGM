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

       <div class="container-fuild">
       	<center>
       		<img src="../gambar/logoh.png" width="80" height="60" style="margin-left: 900px; margin-top: 100px;">
       		<h6 style="margin-left: 900px; color: white;">SISTEM INFORMASI</h6>
       		<h5 style="margin-left: 900px; color: white;">PERSEDIAAN OBAT</h5>
       	</center>
       </div>
 <?php require('modal_filter.php');?>    
<?php require('bottom_menu.php'); ?>
