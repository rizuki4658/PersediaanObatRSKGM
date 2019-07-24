<?php
session_start();

$link=mysqli_connect("localhost","root","","db_rskgm_obat");

$v_user    = $_POST['User']; //membuat variabel, dimana email diambil dari nama text di kelas login
$v_pass     = $_POST['Pass']; //membuat variabel, dimana password diambil dari nama text di kelas login
$OP         = $_GET['OP']; //membuat variabel, dimana OP dibaca di action di kelas login


if($OP=="in"){ //kondisi apakah login
    $query="SELECT * FROM admin WHERE username='$v_user' AND password='$v_pass'";
    $cek    = mysqli_query($link,$query);
    if(mysqli_num_rows($cek)>0){
        $c      = mysqli_fetch_array($cek);

        $_SESSION['ses_user']  = $c['username'];
        $_SESSION['ses_pass']   = $c['password'];
        $_SESSION['ses_level'] = $c['jabatan'];
        if ($_SESSION['ses_level'] == "Gudang") {
            header("location:../gudang/index.php");   
        }elseif ($_SESSION['ses_level'] == "Pejabat") {
            header("location:../pejabat/index.php");
        }elseif ($_SESSION['ses_level'] == "Admin") {
            header("location:../admin/index.php");
        }else{
             header("location:login.php");
        }
    }else{ 
        header("location:login.php");
    }
}else if($OP=="out"){ //kondisi apakah logout
    unset($_SESSION['ses_user']);
    unset($_SESSION['ses_password']);
    header("location:login.php");
}
?>