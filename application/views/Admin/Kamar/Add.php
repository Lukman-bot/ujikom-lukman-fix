<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="<?= base_url('index.php/Admin/Kamar/') ?>">
                    <button class="btn btn-warning btn-md pull-right">
                        <li class="fa fa-undo"></li> Kembali
                    </button>
                </a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/Kamar/Add" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kamar</label>
                        <input type="text" class="form form-control" name="namakamar">
                        <div class="text-danger"><?= form_error('namakamar') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Harga Kamar</label>
                        <input type="number" class="form form-control" name="harga">
                        <div class="text-danger"><?= form_error('harga') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kamar</label>
                        <input type="number" class="form form-control" name="jumlahqty">
                        <div class="text-danger"><?= form_error('jumlahqty') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <div class="box-body pad">
                            <textarea name="description" id="description" cols="80" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tipe Kamar</label>
                        <select name="tipekamar" id="tipekamar" class="minimal">
                            <option value="">-- Pilih Tipe Kamar --</option>
                            <?php
                                foreach($datatipekamar as $tampilkantipe)
                                {
                                    echo "<option value='$tampilkantipe->idtipekamar'>$tampilkantipe->tipekamar</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fasilitas</label>
                        <div id="fasilitas">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Kamar</label>
                        <input type="file" name="galery" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-md" type="submit">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript">
    var url = '<?= base_url() ?>'
    var arrFasilitas = []
    $.getJSON(url + 'index.php/Admin/Kamar/getFasilitasKamar', function(res) {
        console.log(res)
        res.jsonFasilitas.map((x) => {
            let datafasilitas = {
                idfasilitas: x.idfasilitas,
                fasilitas: x.namafasilitas
            }
            arrFasilitas.push(datafasilitas)
        })
        getFasilitas()
    })
    const getFasilitas = () => {
        $('#fasilitas').html('')
        arrFasilitas.map((x, i) => {
            $('#fasilitas').append(
                `
                <input type="checkbox" name="fasilitas[]" value="${x.idfasilitas}">${x.fasilitas}
                `
            )
        })
    }
</script>
