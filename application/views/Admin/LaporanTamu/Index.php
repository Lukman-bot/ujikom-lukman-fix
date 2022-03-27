    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                Data Reservasi
                <a href="<?= base_url('index.php/Admin/ExportExcel/ExportTamu') ?>" class="btn btn-success btn-sm pull-right" id="ExportExcel"><i class="fa fa-file-excel-o"></i> Export Transaksi</a>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama Tamu</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Username</th>
                            <th>Status Member</th>
                            <!-- <th id="option">Option</th> -->
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        foreach ($dataTamu as $tampilkan) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $tampilkan->nik ?></td>
                                <td><?= $tampilkan->nama ?></td>
                                <td><?= $tampilkan->jeniskelamin ?></td>
                                <td><?= $tampilkan->alamat ?></td>
                                <td><?= $tampilkan->telepon ?></td>
                                <td><?= $tampilkan->username ?></td>
                                <td><?= $tampilkan->ismember ?></td>
                                <!-- <td>
                                    <a href="<?= base_url() ?>index.php/Admin/Tamu/LapPertamu/<?= $tampilkan->idtamu ?>">
                                        <button class="btn btn-warning btn-xs">
                                            <li class="fa fa-list"></li>
                                        </button>
                                    </a>
                                </td> -->
                            </tr>
                            <?php
                            $no++;
                        endforeach
                    ?>

                </table>
                <br>
                <!-- <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-lg" id="btncetak" onclick="cetak()"><li class="fa fa-print"></li></button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

<script type="text/javascript">
    function cetak() {
        $('#btnDetail').addClass('hidden')
        $('#ExportExcel').addClass('hidden')
        $('#btncetak').addClass('hidden')
        $('#option').addClass('hidden')
        window.print()
        $('#btnDetail').removeClass('hidden')
        $('#ExportExcel').removeClass('hidden')
        $('#btncetak').removeClass('hidden')
        $('#option').removeClass('hidden')
    }
</script>