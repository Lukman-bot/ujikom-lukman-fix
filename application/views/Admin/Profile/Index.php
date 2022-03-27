<?php
    foreach($dataubahuser as $tampilkan):
?>
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <div class="form-control">
                                        <?= $tampilkan->namauser ?>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-control">
                                        <?= $tampilkan->jk ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <div class="form-control">
                                        <?= $tampilkan->alamat ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Gambar</label>
                                    <img src="<?= base_url('upload/user/') ?><?= $tampilkan->photo ?>" alt="" width="200" class="img img-thumbnail">
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <div class="form-control">
                                        <?= $tampilkan->username ?>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label>Status Aktif</label>
                                    <div class="form-control">
                                        <?= $tampilkan->is_active ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="form-control">
                                        <?= $tampilkan->role ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <div class="form-control">
                                        <?= $tampilkan->notelepon ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    endforeach;
?>