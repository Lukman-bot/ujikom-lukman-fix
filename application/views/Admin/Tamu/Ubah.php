<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/Tamu/" class="btn btn-warning btn-sm pull-right">
                    Kembali
                </a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/Tamu/Ubah/<?= $id ?>" method="POST" enctype="multipart/form-data">
                    <?php
                        foreach($dataubahtamu as $tampilkan):
                    ?>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form form-control" name="nik" value="<?= $tampilkan->nik ?>">
                            <div class="text-danger"><?= form_error('nik') ?></div>
                        </div>

                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form form-control" name="nama" value="<?= $tampilkan->nama ?>">
                            <div class="text-danger"><?= form_error('nama') ?></div>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jeniskelamin" id="jeniskelamin" class="form form-control" value="<?= $tampilkan->jeniskelamin ?>">
                                <option value="">-- JENIS KELAMIN --</option>
                                <option value="laki-laki">LAKI-LAKI</option>
                                <option value="perempuan">PEREMPUAN</option>
                            </select>
                            <div class="text-danger"><?= form_error('jeniskelamin') ?></div>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form form-control" name="alamat" value="<?= $tampilkan->alamat ?>">
                            <div class="text-danger"><?= form_error('alamat') ?></div>
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form form-control" name="telepon" value="<?= $tampilkan->telepon ?>">
                            <div class="text-danger"><?= form_error('telepon') ?></div>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form form-control" name="username" value="<?= $tampilkan->username ?>">
                            <div class="text-danger"><?= form_error('username') ?></div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form form-control" name="password" value="<?= $tampilkan->password ?>">
                            <div class="text-danger"><?= form_error('password') ?></div>
                        </div>

                        <div class="form-group">
                            <label>Status Member</label>
                            <select name="ismember" id="ismember" class="form form-control" value="<?= $tampilkan->ismember ?>">
                                <option value="">-- STATUS Member --</option>
                                <option value="YA">YES</option>
                                <option value="NO">NO</option>
                            </select>
                            <div class="text-danger"><?= form_error('ismember') ?></div>
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