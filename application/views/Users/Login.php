        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 mt-4 box-shadow">
                    <div class="card-body">
                        <h3 class="text-center">LOGIN</h3>
                        <?= $this->session->flashdata('pesan') ?>
                        <form action="<?= base_url('index.php/Auth/Cek') ?>" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form form-control" value="<?= set_value('username') ?>">
                                <?= form_error('username') ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form form-control" value="<?= set_value('password') ?>">
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary btn-md">LOGIN</button>
                            </div>
                            Jika belum mempunyai Account, silahkan untuk <a href="<?= base_url('index.php/Auth/Register') ?>">daftar di sini.!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>