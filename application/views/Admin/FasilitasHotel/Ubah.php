<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/FasilitasHotel/" class="btn btn-warning btn-sm pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/FasilitasHotel/Ubah/<?= $id ?>" method="POST" enctype="multipart/form-data">
                <?php
                    foreach($dataubahfasilitas as $tampilkan):
                ?>

                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" class="form form-control" name="namafasilitas" value="<?= $tampilkan->namafasilitas ?>">
                        <div class="text-danger"><?= form_error('namafasilitas') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <img src="<?= base_url('upload/hotel/') ?><?= $tampilkan->picture ?>" alt="" width="200" class="img img-thumbnail">
                    </div>

                    <div class="form-group">
                        <label>Ubah Gambar</label> <BR></BR>
                        <input type="file" class="form form-control" name="galery">
                        <div class="text-danger"><?= form_error('galery') ?></div>
                        <div class="text-danger">Jika akan dirubah silahkan pilih gambarnya.!</div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-md" type="submit">PERBAHARUI</button>
                    </div>

                <?php
                    endforeach;
                ?>
                </form>
            </div>
        </div>
    </div>
</div>