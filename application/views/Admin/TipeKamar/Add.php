<div class="row">
    <div class="col-md-12"> 
        <div class="box">
            <div class="box-header with-border">
                <strong>Tambah Data Tipe Kamar</strong>
                <span class="pull-right">
                    <a href="<?= base_url('index.php/Admin/TipeKamar') ?>">
                        <button class="btn btn-warning btn-md">
                            <li class="fa fa-undo"></li> Kembali
                        </button>
                    </a>
                </span>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/TipeKamar/Add" method="POST">

                    <div class="form-group">
                        <label>Tipe Kamar</label>
                        <input type="text" class="form form-control" name="tipekamar">
                        <div class="text-danger"><?= form_error('tipekamar') ?></div>
                    </div>

                    <div class="col-md-12 col-xs-12">
                        <button type="submit" class="btn btn-primary btn-md btn-block">
                            <li class="fa fa-save">SIMPAN</li>
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>