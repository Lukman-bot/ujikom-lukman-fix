<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="<?= base_url('index.php/Admin/FasilitasKamar/Add') ?>">
                    <button class="btn btn-primary btn-md pull-right">
                        <li class="fa fa-plus"></li> Tambah Fasilitas Kamar
                    </button>
                </a>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Fasilitas</th>
                            <th>ICON</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                    $no =1;
                        foreach ($datafasilitaskamar as $tampilkan) {
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$tampilkan->namafasilitas</td>";
                            echo "<td>$tampilkan->icon</td>";
                            echo "<td>
                                    <a href=".base_url().'index.php/Admin/FasilitasKamar/Ubah/'.$tampilkan->idfasilitas.">
                                        <button class='btn btn-primary btn-xs'>
                                            <li class='fa fa-pencil'></li> Edit
                                        </button>
                                    </a>
                                    <button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->idfasilitas)'>
                                        <li class='fa fa-trash'></li> Hapus
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
    function hapus(idfasilitas){
        $('#form_hapus')[0].reset();
        $.ajax({
            url: "<?php echo base_url('index.php/Admin/FasilitasKamar/GetkodeFasilitasKamar') ?>/"+idfasilitas,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_hapus"]').val(data.idfasilitas);
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
                <form action="<?php echo base_url() ?>index.php/Admin/FasilitasKamar/Delete" id="form_hapus" method="POST">
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