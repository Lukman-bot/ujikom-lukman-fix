<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/Lapreservasi" class="btn btn-primary btn-xs pull-right" id="btnkembali">Kembali</a>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12"> 
                        <h3 class="text-center">LAPORAN DATA RESERVASI PER STATUS</h3>
                        <p>
                            Tanggal : <?= $tanggal ?>
                        </p>
                        <p>
                            Status : <?= $status ?>
                        </p>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Tamu</th>
                            <th>Nama Kamar</th>
                            <th>Tanggal Checkin</th>
                            <th>Jumlah Kamar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        foreach ($datalaporan as $tampilkan) {
                            echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$tampilkan->nama</td>";
                                echo "<td>$tampilkan->namakamar</td>";
                                echo "<td>$tampilkan->startdate</td>";
                                echo "<td>$tampilkan->qtykamar</td>";
                                echo "<td>$tampilkan->status</td>";
                            echo "</tr>";
                            $no++;
                        }
                    ?>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-lg" id="btncetak" onclick="cetak()"><li class="fa fa-print"></li></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function cetak() {
        $('#btnkembali').addClass('hidden')
        $('#btncetak').addClass('hidden')
        window.print()
        $('#btnkembali').removeClass('hidden')
        $('#btncetak').removeClass('hidden')
    }
</script>