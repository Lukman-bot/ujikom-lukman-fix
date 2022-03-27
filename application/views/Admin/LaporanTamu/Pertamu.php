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
                        <h3 class="text-center">LAPORAN DATA TAMU PER TAMU</h3>
                        <p>
                            NIK :
                            <div id="nik">
                                
                            <div>
                        </p>
                        <p>
                            NAMA TAMU :
                            <div id="nama">
                                
                            </div>
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
    var url = '<?= base_url() ?>'
    $.getJSON(url + 'index.php/Admin/Tamu/getJsonDetail/' + '<?= $id ?>', function(res) {
        console.log(res)
        res.datatamu.map((x) => {
            $('#nik').html(x.nik)
            $('#nama').html(x.nama)
        })
    })
</script>