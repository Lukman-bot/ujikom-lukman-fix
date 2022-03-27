<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box"> 
            <div class="box-header with-border">
                <h3 class="box-title">Tipe Kamar</h3>
                <a href="<?= base_url('index.php/Admin/TipeKamar/Add') ?>">
                    <button class="btn btn-primary btn-md pull-right">
                        <li class="fa fa-plus"> </li> Add Tipe Kamar
                    </button>
                </a>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipe Kamar</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                    $no =1;
                        foreach ($datatipekamar as $tampilkan) {
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$tampilkan->tipekamar</td>";
                            echo "<td>
                                    <a href=".base_url().'index.php/Admin/TipeKamar/Ubah/'.$tampilkan->idtipekamar.">
                                        <button class='btn btn-primary btn-xs'>
                                            <li class='fa fa-pencil'></li>
                                        </button>
                                    </a>
                                    <button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->idtipekamar)'>
                                        <li class='fa fa-trash'></li>
                                    </button>
                                </td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>

                </table>
            </div>
        </div>
    </div>

</div>

<script>
    function hapus(idtipekamar){
        $('#form_hapus')[0].reset();
        $.ajax({
            url: "<?php echo base_url('index.php/Admin/TipeKamar/GetkodeTipeKamar') ?>/"+idtipekamar,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_hapus"]').val(data.idtipekamar);
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
                <form action="<?php echo base_url() ?>index.php/Admin/TipeKamar/Delete" id="form_hapus" method="POST">
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