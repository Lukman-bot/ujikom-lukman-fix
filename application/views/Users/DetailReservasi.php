<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 mt-4 box-shadow">
            <div class="card-body">
                <h3 class="pull right">Bukti Pemesanan Kamar</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>NIK</label>
                                                    <div class="form-control">
                                                        <div id="nik">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal Reservasi</label>
                                                    <div class="form-control">
                                                        <div id="startdate">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal Checkin</label>
                                                    <div class="form-control">
                                                        <div id="startdate1">

                                                        </div>
                                                    </div>
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
                                                    <label>Nama</label>
                                                    <div class="form-control">
                                                        <div id="nama">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <div class="form-control">
                                                        <div id="alamat">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Telp.</label>
                                                    <div class="form-control">
                                                        <div id="telepon">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card mb-4 mt-4 box-shadow">
                                <div class="card-body">
                                    <h3 class="text-center">Data Reservasiku</h3>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>NO</td>
                                            <td>Nama Kamar</td>
                                            <td>Nomor Kamar</td>
                                            <td>Lama Inap</td>
                                            <td>Pesanan Tambahan</td>
                                        </tr>
                                        <?php
                                        $no = 1; ?>
                                            <tr>
                                                <td><?= $no ?></a>
                                                </td>
                                                <td><div id="namakamar"></div></td>
                                                <td><div id="idkamar"></div></td>
                                                <td><div id="lama"></div></td>
                                                <td><div id="namapesanan"></div></td>
                                            </tr>
                                        <?php $no++;
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-lg" id="btncetak" onclick="cetak()"><li class="fa fa-print"></li></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var url = '<?= base_url() ?>'
    $.getJSON(url + 'index.php/Reservasiku/getJsonDetail/' + '<?= $idreservasi ?>', function(res) {
        console.log(res)
        res.datareservasi.map((x) => {
            $('#nik').html(x.nik)
            $('#nama').html(x.nama)
            $('#alamat').html(x.alamat)
            $('#telepon').html(x.telepon)
            $('#idkamar').html(x.idkamar)
            $('#namakamar').html(x.namakamar)
            $('#startdate').html(x.startdate)
            $('#startdate1').html(x.startdate)
            $('#lama').html(x.lama)
            $('#namapesanan').html(x.namapesanan)
        })
    })
    function cetak() {
        $('#btnkembali').addClass('hidden')
        $('#btncetak').addClass('hidden')
        window.print()
        $('#btnkembali').removeClass('hidden')
        $('#btncetak').removeClass('hidden')
    }
</script>