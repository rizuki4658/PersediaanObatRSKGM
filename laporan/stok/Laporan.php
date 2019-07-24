<?php
session_start();
require('../../phpfpdf/fpdf.php');

class PDF extends FPDF
{
    //Page header
    function Header()
    {
        //Logo
        $this->Image('../../gambar/logo.png',10,5,30,15);
        $this->SetFont('Arial','B',18);
        $this->Cell(275,8,"RUMAH SAKIT KHUSUS GIGI & MULUT",0,0,'C');
        $this->Ln(5);
        $this->SetFont('Arial','B',10);
        $this->Cell(275,8,"Jl. RE. Martadinata No. 45 Bandung Telp. 022-4234058",0,0,'C');
        $this->Ln(7);
        
        $this->Line(10,25,285,25);
        
        $this->SetFont('Arial','B',15);
        
        $this->Cell(80);
        $this->Ln(10);
        $this->SetX(50);
        $this->Cell(190,8,"LAPORAN PERSEIDAAN OBAT",0,0,'C');
        $this->Ln(5);
        $this->SetFont('Arial','B',10);
       
        //pindah baris
        $this->Ln(10);

    }
 
    //Page Content
    function Content()
    {
        $no=1;
        $jum_in=0;
        $jum_out=0;
        $sisa=0;
        $sat1=0;
        $sat2=0;
        $tp=0;
        $to=0;
        $link = mysqli_connect('localhost','root','','db_rskgm_obat');
        $tgl=$_POST['dari3'];
        $tgl2=$_POST['sampai3'];
        //$kode=$_POST['tglkode5'];
        $query="SELECT * from master_stok WHERE tanggal_in >= '$tgl' AND tanggal_out <= '$tgl2' ORDER BY tanggal_in ASC";
        $hasil=mysqli_query($link,$query);
        
        $this->SetX(20);
        $this->SetFont('Times','',12);
        $this->Cell(195,5,"Data Persediaan Obat",0,0,'L');
        $this->Cell(20,5,date("d M Y",strtotime($tgl)),0,0,'C');
        $this->Cell(6,5,"sd",0,0,'L');
        $this->Cell(20,5,date("d M Y",strtotime($tgl2)),0,0,'C');
        $this->ln(8);
        $this->SetFont('Times','B',9);
        $this->SetX(20);
        $this->Cell(8,10,"No",1,0,'C');
        $this->Cell(20,10,"Kode Obat",1,0,'C');
        $this->Cell(40,10,"Nama Obat",1,0,'C');
        $this->Cell(40,5,"Data Obat Masuk",1,0,'C');
        $this->Cell(40,5,"Data Obat Keluar",1,0,'C');
        $this->Cell(20,10,"Sisa",1,0,'C');
        $this->Cell(25,10,"Harga Satuan",1,0,'C');
        $this->Cell(30,10,"Total",1,0,'C');
        $this->Cell(25,10,"Ruangan",1,0,'C');
        $this->Ln(5);
        $this->SetX(88);
        $this->SetFont('Times','B',9);
        $this->Cell(20,5,"Masuk",1,0,'C');
        $this->Cell(20,5,"Jumlah",1,0,'C');
        $this->Cell(20,5,"Keluar",1,0,'C');
        $this->Cell(20,5,"Jumlah",1,0,'C');
        if (mysqli_num_rows($hasil) > 0) {
            while($lihat=mysqli_fetch_array($hasil)){
            $this->ln(5);
            $this->SetX(20);
            $this->SetFont('Times','',9);
            $sisa=$lihat['jumlah_o_in']-$lihat['jumlah_o_out'];
            $tp = $sisa*$lihat['harga'];
            $to += $sisa*$lihat['harga'];

            $this->Cell(8,5, $no,1,0,'C');
            $this->Cell(20,5, $lihat['kode_obat'],1,0,'C');
            $this->Cell(40,5, $lihat['nama_obat'],1,0,'L');
            $this->Cell(20,5, $lihat['tanggal_in'],1,0,'C');
            $this->Cell(20,5, $lihat['jumlah_o_in']." ".$lihat['satuan_o_in'],1,0,'C');
            $this->Cell(20,5, $lihat['tanggal_out'],1,0,'C');
            $this->Cell(20,5, $lihat['jumlah_o_out']." ".$lihat['satuan_o_out'],1,0,'C');
            $this->Cell(20,5, $sisa." ".$lihat['satuan_o_in'],1,0,'C');
            $this->Cell(25,5, "Rp"." ".number_format($lihat['harga']),1,0,'R');
            $this->Cell(30,5,"Rp"." ".number_format($tp),1,0,'R');
            $this->Cell(25,5,$lihat['ruangan'],1,0,'C');
            
            $no++;
            $jum_in += $lihat['jumlah_o_in'];
            $jum_out += $lihat['jumlah_o_out'];
            }
            $this->ln(5);
            $this->setX(20);
            $this->SetFont('Times','B',9);
            $this->Cell(193,5, "Total" , 1, 0, 'C');
            $this->Cell(30,5, "Rp"." ".number_format($to),1,0,'R');
            $this->Cell(25,5, "",1,0,'R');
        }else{
            $_SESSION['kosong']="display: inline";
        }
        $this->ln(10);
        $this->setX(20);
        $this->Cell(30,5,"Keterangan Sisa :",1,0,'L');
        $this->ln(5);
        $this->SetFont('Times','',9);
        $this->setX(20);
        $this->Cell(30,5,"Satuan Box/Dus",1,0,'L');
        $this->Cell(5,5,":",1,0,'C');
        $sis=0;
        $query2="SELECT * from master_stok WHERE satuan_o_in='Box/Dus' AND tanggal_in >= '$tgl' AND tanggal_out <= '$tgl2' ORDER BY tanggal_in ASC";
        $hasil2=mysqli_query($link,$query2);
        if (mysqli_num_rows($hasil2) > 0) {
            while($lihat2=mysqli_fetch_array($hasil2)){
                $sis += $lihat2['jumlah_o_in']-$lihat2['jumlah_o_out'];
            $this->Cell(30,5, $sis." Box/Dus" , 1, 0, 'R');
                    
            
            }
            
        }else{
            $this->Cell(30,5, "0"." Box/Dus" , 1, 0, 'R');
        }
        $this->ln(5);
        $this->SetFont('Times','',9);
        $this->setX(20);
        $this->Cell(30,5,"Satuan Botol",1,0,'L');
        $this->Cell(5,5,":",1,0,'C');
        $sis2=0;
        $query3="SELECT * from master_stok WHERE satuan_o_in='Botol' AND tanggal_in >= '$tgl' AND tanggal_out <= '$tgl2' ORDER BY tanggal_in ASC";
        $hasil3=mysqli_query($link,$query3);
        if (mysqli_num_rows($hasil3) > 0) {
            while($lihat3=mysqli_fetch_array($hasil3)){
                $sis2 += $lihat3['jumlah_o_in']-$lihat3['jumlah_o_out'];
            $this->Cell(30,5, $sis2." Botol" , 1, 0, 'R');
                    
            
            }
            
        }else{
            $this->Cell(30,5, "0"." Botol" , 1, 0, 'R');
        }
        $this->ln(5);
        $this->SetFont('Times','',9);
        $this->setX(20);
        $this->Cell(30,5,"Satuan Lembar",1,0,'L');
        $this->Cell(5,5,":",1,0,'C');
        $sis3=0;
        $query4="SELECT * from master_stok WHERE satuan_o_in='Lembar' AND tanggal_in >= '$tgl' AND tanggal_out <= '$tgl2' ORDER BY tanggal_in ASC";
        $hasil4=mysqli_query($link,$query4);
        if (mysqli_num_rows($hasil4) > 0) {
            while($lihat3=mysqli_fetch_array($hasil4)){
                $sis3 += $lihat4['jumlah_o_in']-$lihat3['jumlah_o_out'];
            $this->Cell(30,5, $sis3." Lembar" , 1, 0, 'R');
                    
            
            }
            
        }else{
            $this->Cell(30,5, "0"." Lembar" , 1, 0, 'R');
        }

        $this->Ln();
        $this->SetFont('Times','',10);
        $this->Ln(10);
        $this->SetX(20);
        $this->SetFont('Arial','',10);
        $this->Cell(1,10,"Bandung, ".date("d M Y"),0,0,'L');
        $this->Ln(5);
        $this->SetX(20);
        $this->Cell(1,10,"ATASAN LANGSUNG,",0,0,'L');
        $this->SetX(230);
        $this->Cell(1,10,"PENYIMPAN BARANG,",0,0,'L');
        $this->Ln(20);
        $this->SetX(10);
        $this->Ln(15);
        $this->SetX(20);
        $this->Cell(1,10,"____________________________________",0,0,'L');
        $this->SetX(200);
        $this->Cell(1,10,"____________________________________",0,0,'L');
        $this->Ln(5);
        $this->SetX(20);
        $this->Cell(1,10,"NIP.",0,0,'L');
        $this->SetX(200);
        $this->Cell(1,10,"NIP.",0,0,'L');

    }
 
    //Page footer
    function Footer()
    {
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-15);
        //buat garis horizontal
        $this->Line(10,$this->GetY(),285,$this->GetY());
        //Arial italic 9
        $this->SetFont('Times','',9);
        //nomor halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().'dari {nb}',0,0,'R');
    }
}
 
//contoh pemanggilan class
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>
