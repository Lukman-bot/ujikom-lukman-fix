<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-4">
        <div class="box"> 
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Data Reservasi Per Periode</h3>
            </div>
            <div class="box-body table-responsive">
                <form action="<?= base_url('index.php/Admin/Lapreservasi/Periode') ?>" method="POST">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form form-control" required name="tanggalawal">
                    </div>                
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form form-control" required name="tanggalakhir">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg"> <li class="fa fa-print"></li>Lihat Data</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="box"> 
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Reservasi Berdasarkan Status</h3>
            </div>
            <div class="box-body table-responsive">
                <form action="<?= base_url('index.php/Admin/Lapreservasi/Perstatus') ?>" method="POST">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form form-control" required name="tanggal">
                    </div>                
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form form-control">
                            <option value="">-- PILIHAN STATUS --</option>
                            <option value="checkin">CHECKIN</option>
                            <option value="checkout">CHECKOUT</option>
                            <option value="cancel">CANCEL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg" type="submit"> 
                            <li class="fa fa-print"></li>Lihat Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="box">
            <div class="box-header">
                Data Reservasi
                <a href="<?= base_url('index.php/Admin/ExportExcel/ExportReservasi') ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-file-excel-o"></i> Export Transaksi</a>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Tamu</th>
                            <th>Nama Kamar</th>
                            <th>Tanggal Checkin</th>
                            <th>Tanggal Checkout</th>
                            <th>Jumlah Kamar</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        foreach ($datareservasi as $tampilkan) {
                            echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$tampilkan->nama</td>";
                                echo "<td>$tampilkan->namakamar</td>";
                                echo "<td>$tampilkan->startdate</td>";
                                echo "<td>$tampilkan->enddate</td>";
                                echo "<td>$tampilkan->qtykamar</td>";
                                echo "<td>$tampilkan->status</td>";
                                echo "<td><a href=". base_url('index.php/Admin/Reservasi/Detail/') . $tampilkan->idreservasi."><button class='btn btn-primary btn-xs'><li class='fa fa-eye'></li></button></a></td>";
                            echo "</tr>";
                            $no++;
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>
    
</div>
