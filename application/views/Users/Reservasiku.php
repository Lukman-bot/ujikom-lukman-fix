<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 mt-4 box-shadow">
            <div class="card-body">
                <h3 class="text-center">Data Reservasiku</h3>
                <table class="table table-bordered">
                    <tr>
                        <td>NO</td>
                        <td>Nama Kamar</td>
                        <td>Jumlah Kamar</td>
                        <td>Status</td>
                        <td>Option</td>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($datareservasiku as $tampilkan) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampilkan->namakamar ?></td>
                            <td><?= $tampilkan->qtykamar ?></td>
                            <td><?= $tampilkan->status ?></td>
                            <td>
                                <a href="<?= base_url("index.php/Reservasiku/Detail/$tampilkan->idreservasi") ?>">
                                    <button class="btn btn-outline-primary btn-sm">
                                        <li class="fa fa-list"></li>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php $no++; }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>