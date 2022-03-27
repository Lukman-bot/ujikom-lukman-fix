<aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('upload/User/' . $this->session->userdata['photo']) ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('namauser') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <?php
        $akses = $this->session->userdata('role');
        if ($akses == 'ADMIN') { ?>
          <li class="header">DASHBOARD</li>
          <li class="header">MASTER DATA</li>
          <li class="active"><a href="<?= base_url('index.php/Admin/TipeKamar/') ?>"><i class="fa fa-th-list"></i> <span>Tipe Kamar</span></a></li>
          <li class="active"><a href="<?= base_url('index.php/Admin/FasilitasKamar/') ?>"><i class="fa fa-building-o"></i> <span>Fasilitas Kamar</span></a></li>
          <li class="active"><a href="<?= base_url('index.php/Admin/FasilitasHotel/') ?>"><i class="fa fa-building"></i> <span>Fasilitas Hotel</span></a></li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Kamar/') ?>"><i class="fa fa-hotel"></i> <span>Kamar</span></a></li>
          <li class="active"><a href="<?= base_url('index.php/Admin/User/') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
          <li class="header">MASTER TAMU</li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Tamu/') ?>"><i class="fa fa-users"></i> <span>Data Tamu</span></a></li>
          <li class="header">TRANSAKSI</li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Reservasi/') ?>"><i class="fa fa-book"></i> <span>Data Reservasi</span></a></li>
          <li class="header">LAPORAN</li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Lapreservasi/') ?>"><i class="fa fa-file-pdf-o"></i> <span>Lap. Reservasi</span></a></li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Tamu/Laptamu') ?>"><i class="fa fa-file-pdf-o"></i> <span>Lap. Tamu</span></a></li>
          <li class="header">PROFILE</li>
          <li class="header">SIGN OUT</li>
        <?php } 
        ?>
        <?php 
          if ($akses == 'RECEPTIONIST') { ?>
          <li class="header">TRANSAKSI</li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Reservasi/') ?>"><i class="fa fa-book"></i> <span>Data Reservasi</span></a></li>
          <li class="header">LAPORAN</li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Lapreservasi/') ?>"><i class="fa fa-file-pdf-o"></i> <span>Lap. Reservasi</span></a></li>
          <li class="active"><a href="<?= base_url('index.php/Admin/Tamu/Laptamu/') ?>"><i class="fa fa-file-pdf-o"></i> <span>Lap. Tamu</span></a></li>
          <li class="header">PROFILE</li>
          <li class="header">SIGN OUT</li>
        <?php } 
        ?>
      </ul>
    </section>
  </aside>