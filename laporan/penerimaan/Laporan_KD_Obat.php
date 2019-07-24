
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
        $this->SetFont('Arial','B',15);
        $this->SetX(130);
        $this->Cell(35,0,"RUMAH SAKIT KHUSUS GIGI & MULUT",0,0,'C');

        $this->Ln(5);
        $this->SetFont('Arial','B',10);
        $this->SetX(130);
        $this->Cell(35,0,"Jl. RE. Martadinata No. 45 Bandung",0,0,'C');
        $this->Ln(5);
        $this->SetX(130);
        $this->Cell(35,0,"Telp. 022-4234058",0,0,'C');
        
        $this->Line(5,25,292,25);
        
        $this->SetFont('Arial','B',15);
        
        $this->Cell(80);
        $this->Ln(20);
        $this->Cell(280,8,"LAPORAN PENERIMAAN OBAT",0,0,'C');
        $this->Ln(5);
        $this->SetFont('Arial','B',10);
       
        //pindah baris
        $this->Ln(10);

    }
 
    //Page Content
    function Content()
    {


          $this->SetFont('Times','B',8);
        $this->SetX(30);
        $this->Cell(8,5,"No",1,0,'C');
        $this->Cell(20,5,"Kode",1,0,'C');
        $this->Cell(20,5,"Tanggal",1,0,'C');
        $this->Cell(30,5,"Kode Obat",1,0,'C');
        $this->Cell(50,5,"Nama Obat",1,0,'C');
        $this->Cell(30,5,"Ruangan",1,0,'C');
        $this->Cell(24,5,"Jumlah Obat",1,0,'C');
        $this->Cell(24,5,"Satuan Obat",1,0,'C');
        $this->Cell(24,5,"Penerimaan",1,0,'C');
        $this->Ln();
        $this->SetX(30);
        $this->SetFont('Times','',9);
        
        $no=1;
        $sub=0;
        $sat="";
        $pen=0;
        $sats="";
        $p=0;
        $p2=0;
        $p3=0;
        $link = mysqli_connect('localhost','root','','db_rskgm_obat');
        $kode=$_GET['Kondisi'];

        $query="SELECT * from in_stok WHERE kode_obat = '$kode' AND ket = 'Masuk'";
        $hasil=mysqli_query($link,$query);
       if (mysqli_num_rows($hasil) > 0) {
            while($lihat=mysqli_fetch_array($hasil)){
                $pen = $lihat ['jumlah'] * $lihat ['jumlah_in'];
                $sats=$lihat['satuan_in'];
                $p+=$lihat['jumlah'];
                $p2+=$lihat['jumlah_in'];
                $p3+=$lihat['jumlah_in'];

                $sub += $pen;
            $this->Cell(8,5, $no , 1, 0, 'C');
            $this->Cell(20,5, $lihat['kode'],1, 0, 'C');
            $this->Cell(20,5, $lihat['tanggal'], 1, 0,'C');
            $this->Cell(30,5, $lihat['kode_obat'],1, 0, 'C');
            $this->Cell(50,5, $lihat['nama_obat'], 1, 0,'L');
            $this->Cell(30,5, $lihat['ruangan'],1, 0, 'C');
            $this->Cell(24,5, number_format($lihat['jumlah'])." ". $lihat['satuan'],1, 0, 'C');
            $this->Cell(24,5, number_format($lihat['jumlah_in'])." ". $lihat['satuan_in'],1, 0, 'C');
            $this->Cell(24,5, number_format($pen)." ". $sats,1, 0, 'C');
            $this->ln();
            $this->SetX(30);
            $no++;
            $sat=$lihat['satuan'];
                }
            $this->Cell(158,5,"Jumlah Penerimaan",1,0,'C');
            $this->Cell(24,5, number_format($p)." ". $sat ,1,0,'C');
            $this->Cell(24,5, number_format($p2)." ". $sats ,1,0,'C');
            $this->Cell(24,5, number_format($sub)." ". $sats ,1,0,'C');
        }else{
            $_SESSION['kosong']="display: inline;";
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
        $this->Line(10,$this->GetY(),290,$this->GetY());
        //Arial italic 9
        $this->SetFont('Times','',9);
        //nomor halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
    }
}
 
//contoh pemanggilan class
$pdf = new PDF('L','mm','A4');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
?>
