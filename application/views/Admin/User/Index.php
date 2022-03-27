<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="<?= base_url('index.php/Admin/User/Add') ?>">
                    <button class="btn btn-primary btn-md pull-right">
                        <li class="fa fa-plus"></li> Add User
                    </button>
                </a>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Username</th>
                            <th>Aktif</th>
                            <th>Role</th>
                            <th>Photo</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                        $no=1;
                        foreach($dataUser as $tampilkan) {
                            echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$tampilkan->namauser</td>";
                                echo "<td>$tampilkan->jk</td>";
                                echo "<td>$tampilkan->alamat</td>";
                                echo "<td>$tampilkan->notelepon</td>";
                                echo "<td>$tampilkan->username</td>";
                                echo "<td>$tampilkan->is_active</td>";
                                echo "<td>$tampilkan->role</td>";
                                echo "<td><img src=".base_url('upload/user/').$tampilkan->photo." width='100' ></td>";
                                echo "<td><a href=".base_url('index.php/Admin/User/Ubah/').$tampilkan->idusers."><button class='btn btn-primary btn-xs'><li class='fa fa-list'></li></button></a>
                                    <button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->idusers)'>Hapus</button>
                                </td>";
                            echo "</tr>";
                            $no ++;
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function hapus(idusers){
        $('#form_hapus')[0].reset();
        $.ajax({
            url: "<?php echo base_url('index.php/Admin/User/GetkodeUser') ?>/"+idusers,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_hapus"]').val(data.idusers);
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
                <h4 class="modal-title">Pesan Peringatan Hapus User</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>index.php/Admin/User/Delete" id="form_hapus" method="POST">
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