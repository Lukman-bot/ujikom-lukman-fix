<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="<?= base_url('index.php/Admin/FasilitasHotel/') ?>">
                    <button class="btn btn-warning btn-md pull-right">
                        <li class="fa fa-undo"></li> Kembali
                    </button>
                </a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/FasilitasHotel/Add" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" class="form form-control" name="namafasilitas">
                        <div class="text-danger"><?= form_error('namafasilitas') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Picture / Gambar</label>
                        <input type="file" class="form form-control" name="galery">
                        <div class="text-danger"><?= form_error('galery') ?></div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-md" type="submit">SIMPAN</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>