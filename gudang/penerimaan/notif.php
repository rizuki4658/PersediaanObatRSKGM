
      <!--Notif
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bookmark"></i>
            <span class="d-lg-none">Baru
              <span class="badge badge-pill badge-primary">1 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle" style="color: green;"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Update Terbaru</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Masukan Pejabat!</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($p_i['tanggal'])); ?></span>
              <div class="dropdown-message small"> 
                <b>Kode Obat <?php echo $p_i['kode_obat']?></b><br>
                <b>Nama Distributor <?php echo $p_i['nama_distributor'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Keluaran Pejabat</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($p_o['tanggal'])); ?></span>
              <div class="dropdown-message small">
                <b>Kode Obat <?php echo $p_o['kode_obat']?></b><br>
                <b>Nama Penerima <?php echo $p_o['nama_penerima'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-comments"></i>
            <span class="d-lg-none">Baru
              <span class="badge badge-pill badge-primary">1 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Update Terbaru</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Masukan Gudang!</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($g_i['tanggal'])); ?></span>
              <div class="dropdown-message small"> 
                <b>Kode Obat <?php echo $g_i['kode_obat']?></b><br>
                <b>jumlah <?php echo $g_i['jumlah']." ".$g_i['satuan'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Keluaran Gudang</strong>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($g_o['tanggal'])); ?></span>
              <div class="dropdown-message small">
                <b>Kode Obat <?php echo $g_o['kode_obat']?></b><br>
                <b>jumlah <?php echo $g_o['jumlah']." ".$g_i['satuan'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bar-chart"></i>
            <span class="d-lg-none">Status Stok
              <span class="badge badge-pill badge-warning">2 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Status Stok</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Masuk</strong>
              </span>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($s_i['tanggal']));?></span>
              <div class="dropdown-message small">
                <b>Kode Obat : <?php echo $s_i['kode_obat'];?></b><br>
                <b>Jumlah Baru Masuk : <?php echo $s_i['jumlah_in']." ".$s_i['satuan'];?></b>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Keluar</strong>
              </span>
              <span class="small float-right text-muted"><?php echo date('d M y',strtotime($s_o['tanggal']));?></span>
              <div class="dropdown-message small">
                <b>Kode Obat : <?php echo $s_o['kode_obat'];?></b><br>
                <b>Jumlah Baru Masuk : <?php echo $s_o['jumlah_out']." ".$s_o['satuan'];?></b></div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Copyright © celeno 2018</a>
          </div>
        </li>-->
      </ul>