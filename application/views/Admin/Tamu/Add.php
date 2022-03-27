<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="<?= base_url('index.php/Admin/Tamu/') ?>">
                    <button class="btn btn-warning btn-md pull-right">
                        <li class="fa fa-undo"></li> Kembali
                    </button>
                </a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/Tamu/Add" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form form-control" name="nik">
                        <div class="text-danger"><?= form_error('nik') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form form-control" name="nama">
                        <div class="text-danger"><?= form_error('nama') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jeniskelamin" id="jeniskelamin" class="form form-control">
                            <option value="">-- JENIS KELAMIN --</option>
                            <option value="laki-laki">LAKI-LAKI</option>
                            <option value="perempuan">PEREMPUAN</option>
                        </select>
                        <div class="text-danger"><?= form_error('jeniskelamin') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form form-control" name="alamat">
                        <div class="text-danger"><?= form_error('alamat') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" class="form form-control" name="telepon">
                        <div class="text-danger"><?= form_error('telepon') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form form-control" name="username">
                        <div class="text-danger"><?= form_error('username') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form form-control" name="password">
                        <div class="text-danger"><?= form_error('password') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Status Member</label>
                        <select name="ismember" id="ismember" class="form form-control">
                            <option value="">-- STATUS Member --</option>
                            <option value="YA">YES</option>
                            <option value="NO">NO</option>
                        </select>
                        <div class="text-danger"><?= form_error('ismember') ?></div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-md" type="submit">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>