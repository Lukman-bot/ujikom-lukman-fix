<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="<?= base_url() ?>index.php/Admin/Kamar/Add">
                    <button class="btn btn-primary btn-md pull-right">
                        <li class="fa fa-plus"></li> Tambah Kamar
                    </button>
                </a>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kamar</th>
                            <th>Harga Kamar</th>
                            <th>Jumlah Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($datakamar as $tampilkan) :
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampilkan->namakamar ?></td>
                            <td><?= $tampilkan->harga ?></td>
                            <td><?= $tampilkan->jumlahqty ?></td>
                            <td><?= $tampilkan->tipekamar ?></td>
                            <td>
                                <a href="<?= base_url() ?>index.php/Admin/Kamar/Ubah/<?= $tampilkan->idkamar ?>"><button class="btn btn-primary btn-sm">
                                    <li class="fa fa-edit"></li>
                                </button></a>
                                <a href="<?= base_url() ?>index.php/Admin/Kamar/Detail/<?= $tampilkan->idkamar ?>">
                                    <button class="btn btn-warning btn-xs">
                                        <li class="fa fa-list"></li>
                                    </button>
                                </a>
                                <!-- <button class="btn btn-danger btn-xs" onClick="hapus($tampilkan->idkakmar)">Hapus</button> -->
                            </td>
                        </tr> 
                    <?php
                    $no++;
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    function hapus(idkamar){
        $('#form_hapus')[0].reset();
        $.ajax({
            url: "<?php echo base_url('index.php/Admin/Kamar/GetkodeKamar') ?>/"+idkamar,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_hapus"]').val(data.idkamar);
                $('#modal-default').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Gagal ambil ajax');
            }
        })
    }
</script>

<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pesan Peringatan Hapus Tipe Kamar</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>index.php/Admin/Kamar/Delete" id="form_hapus" method="POST">
                <input type="hidden" name="id_hapus" value="" id="">
                Apakah Anda Yakin Akan Menghapus Data Tersebut.?!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
                </form>
        </div>
    </div>
</div>