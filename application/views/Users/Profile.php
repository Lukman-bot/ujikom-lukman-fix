<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 mt-4 box-shadow">
            <div class="card-body">
                <?php
                    foreach($dataubahtamu as $tampilkan):
                ?>
                <h3 class="text-center">Data <?= $tampilkan->nama ?></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->nik ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->nama ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->jeniskelamin ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->alamat ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nomor Telepon</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->telepon ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->username ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status Member</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->ismember ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <div class="form-control">
                                                        <?= $tampilkan->nik ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</div>