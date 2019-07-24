<!--Modal Filter-->


<!--Laporan Penerimaan Pertanggal -->
<div class="modal fade" id="ModalTGLPEN" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LAPORAN PER TANGGAL PENERIMAAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 250px;">
        <form action="../../laporan/penerimaan/Laporan_Tgl.php" method="post">
          <label class="text-md-center">Kode Obat</label>
          <?php echo "<select name='tglkode1' class='form-control'>";
          $link = mysqli_connect('localhost','root','','db_rskgm_obat');
          $hasil = mysqli_query($link,"select distinct (kode_obat) from in_stok where ket = 'Masuk'");
          echo "<option value='0' dselected/>Pilih</option>";
          while ($row = mysqli_fetch_array($hasil)) {
            echo "<option value='".$row['kode_obat']."' name='kode_obat' id='kode_obat'>".$row['kode_obat']."</option>";
          }
          mysqli_close($link);
        echo "</select>";?>
        <label class="text-left">Dari</label>
        <input type="date" name="dari" class="form-control">
        <label class="text-left">Sampai</label>
        <input type="date" name="sampai" class="form-control"><br>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i></button>
        <button type="reset" class="btn btn-secondary" value=""><i class="fa fa-fw fa-refresh"></i></button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--Laporan Penerimaan Per Kode Obat-->
<div class="modal fade" id="ModalKDO" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LAPORAN PENERIMAAN PER KODE OBAT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../laporan/penerimaan/Laporan_KD_Obat.php" method="Get">
          <label class="text-md-center">Kode Obat</label><br>
      <?php echo "<select name='Kondisi' class='form-control'>";
                
              $link = mysqli_connect('localhost','root','','db_rskgm_obat');
              $hasil = mysqli_query($link,"select distinct (kode_obat) from in_stok where ket = 'Masuk'");
              echo "<option value='0' dselected/>Pilih</option>";
                while ($row = mysqli_fetch_array($hasil)) { 

                echo "<option value='".$row['kode_obat']."' name='kode_obat' id='kode_obat'>".$row['kode_obat']."</option>";

              }
              mysqli_close($link);
                
      echo "</select>";
      ?>
      </div>
      <br>
      <br>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i></button>
      <button type="reset" class="btn btn-secondary" value=""><i class="fa fa-fw fa-refresh"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Laporan Penerimaan Berdasarkan Ruangan-->
<div class="modal fade" id="ModalRUA" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LAPORAN PENERIMAAN PER RUANGAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../laporan/penerimaan/Laporan_Ruangan.php" method="Get">
          <label class="text-md-center">Kode Obat</label><br>
      <?php echo "<select name='tglkode2' class='form-control'>";
                
              $link = mysqli_connect('localhost','root','','db_rskgm_obat');
              $hasil = mysqli_query($link,"select distinct (kode_obat) from in_stok where ket = 'Masuk'");
              echo "<option value='0' dselected/>Pilih</option>";
                while ($row = mysqli_fetch_array($hasil)) { 

                echo "<option value='".$row['kode_obat']."' name='kode_obat' id='kode_obat'>".$row['kode_obat']."</option>";

              }
              mysqli_close($link);
                
      echo "</select>";?>
          <label class="text-md-center">Ruangan</label><br>
      <?php echo "<select name='Kondisi1' class='form-control'>";
                
                $link = mysqli_connect('localhost','root','','db_rskgm_obat');
              $hasil = mysqli_query($link,"select distinct (ruangan) from in_stok where ket = 'Masuk'");
              echo "<option value='0' dselected/>Pilih</option>";
                while ($row = mysqli_fetch_array($hasil)) { 

                echo "<option value='".$row['ruangan']."' name='ruangan' id='ruangan'>".$row['ruangan']."</option>";
               
              }
              mysqli_close($link);
                
      echo "</select>";
      ?><br>
      </div>
      <br>
      <br>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i></button>
      <button type="reset" class="btn btn-secondary" value=""><i class="fa fa-fw fa-refresh"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Laporan Pengeluaran Pertanggal -->
<div class="modal fade" id="ModalTGLPENG" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LAPORAN PER TANGGAL PENGELUARAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 250px;">
        <form action="../../laporan/pengeluaran/Laporan_Tgl.php" method="post">
          <label class="text-md-center">Kode Obat</label>
      <?php echo "<select name='tglkode3' class='form-control'>";
                
              $link = mysqli_connect('localhost','root','','db_rskgm_obat');
              $hasil = mysqli_query($link,"select distinct (kode_obat) from in_stok where ket = 'Keluar'");
              echo "<option value='0' dselected/>Pilih</option>";
                while ($row = mysqli_fetch_array($hasil)) { 

                echo "<option value='".$row['kode_obat']."' name='kode_obat' id='kode_obat'>".$row['kode_obat']."</option>";

              }
              mysqli_close($link);
                
      echo "</select>";?>
          <label class="text-left">Dari</label>
            <input type="date" name="dari2" class="form-control">
            <label class="text-left">Sampai</label>
            <input type="date" name="sampai2" class="form-control">
        </div>
      <br>
      <br>
      <br>
      <br>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i></button>
        <button type="reset" class="btn btn-secondary" value=""><i class="fa fa-fw fa-refresh"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Laporan Pengeluaran Per Kode Obat-->
<div class="modal fade" id="ModalKDOPENG" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LAPORAN PENGELUARAN PER KODE OBAT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../laporan/pengeluaran/Laporan_KD_Obat.php" method="Get">
          <label class="text-md-center">Kode Obat</label><br>
      <?php echo "<select name='Kondisi2' class='form-control'>";
                
              $link = mysqli_connect('localhost','root','','db_rskgm_obat');
              $hasil = mysqli_query($link,"select distinct (kode_obat) from in_stok where ket = 'Keluar'");
              echo "<option value='0' dselected/>Pilih</option>";
                while ($row = mysqli_fetch_array($hasil)) { 

                echo "<option value='".$row['kode_obat']."' name='kode_obat' id='kode_obat'>".$row['kode_obat']."</option>";

              }
              mysqli_close($link);
                
      echo "</select>";
      ?>
      </div>
      <br>
      <br>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i></button>
      <button type="reset" class="btn btn-secondary" value=""><i class="fa fa-fw fa-refresh"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Laporan Pengeluaran Berdasarkan Ruangan-->
<div class="modal fade" id="ModalRUAPENG" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LAPORAN PENGELUARAN PER RUANGAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../laporan/pengeluaran/Laporan_Ruangan.php" method="Get">
          <label class="text-md-center">Kode Obat</label><br>
      <?php echo "<select name='tglkode4' class='form-control'>";
                
              $link = mysqli_connect('localhost','root','','db_rskgm_obat');
              $hasil = mysqli_query($link,"select distinct (kode_obat) from in_stok where ket = 'Keluar'");
              echo "<option value='0' dselected/>Pilih</option>";
                while ($row = mysqli_fetch_array($hasil)) { 

                echo "<option value='".$row['kode_obat']."' name='kode_obat' id='kode_obat'>".$row['kode_obat']."</option>";

              }
              mysqli_close($link);
                
      echo "</select>";?>
          <label class="text-md-center">Ruangan</label><br>
      <?php echo "<select name='Kondisi3' class='form-control'>";
                
                $link = mysqli_connect('localhost','root','','db_rskgm_obat');
              $hasil = mysqli_query($link,"select distinct (ruangan) from in_stok where ket = 'Keluar'");
              echo "<option value='0' dselected/>Pilih</option>";
                while ($row = mysqli_fetch_array($hasil)) { 

                echo "<option value='".$row['ruangan']."' name='ruangan' id='ruangan'>".$row['ruangan']."</option>";
               
              }
              mysqli_close($link);
                
      echo "</select>";
      ?><br>
      </div>
      <br>
      <br>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i></button>
      <button type="reset" class="btn btn-secondary" value=""><i class="fa fa-fw fa-refresh"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Laporan Stok Pertanggal -->
<div class="modal fade" id="ModalSTOK" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LAPORAN PER TANGGAL STOK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 250px;">
        <form action="../../laporan/stok/Laporan.php" method="post">
          <?php //echo "<select name='tglkode5' class='form-control'>";
          //$link = mysqli_connect('localhost','root','','db_rskgm_obat');
          //$hasil = mysqli_query($link,"select distinct (kode_obat) from in_stok where ket = 'Masuk'");
          //echo "<option value='0' dselected/>Pilih</option>";
          //while ($row = mysqli_fetch_array($hasil)) {
            //echo "<option value='".$row['kode_obat']."' name='kode_obat' id='kode_obat'>".$row['kode_obat']."</option>";
          //}
            //  mysqli_close($link);
            //echo "</select>";?>
            <label class="text-left">Dari</label>
            <input type="date" name="dari3" class="form-control">
            <label class="text-left">Sampai</label>
            <input type="date" name="sampai3" class="form-control">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-fw fa-print"></i></button>
        <button type="reset" class="btn btn-secondary" value=""><i class="fa fa-fw fa-refresh"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>