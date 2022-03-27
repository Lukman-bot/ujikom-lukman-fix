<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/Reservasi" class="btn btn-warning btn-xs pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIK</label>
                            <div id="nik"></div>
                        </div>
                        <div class="form-group">
                            <label>Nama Tamu</label>
                            <div id="namatamu"></div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div id="jeniskelamin"></div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <div id="alamat"></div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <div id="nomortelepon"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Checkin</label>
                            <div id="tanggalcheckin"></div>
                        </div>
                        <div class="form-group">
                            <label>Nama Kamar</label>
                            <div id="namakamar"></div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Kamar</label>
                            <div id="jumlahkamar"></div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div id="status"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-md" id="checkin" onclick="checkin('<?= $id ?>')">CHECKIN</button>
                        <button class="btn btn-warning btn-ms" id="checkout" onclick="checkout('<?= $id ?>')">CHECKOUT</button>
                        <button class="btn btn-danger btn-sm" id="cancel" onclick="cancel('<?= $id ?>')">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var url = '<?= base_url() ?>'
    $.getJSON(url + 'index.php/Admin/Reservasi/getDetailReservasi/' + '<?= $id ?>', function(res) {
        console.log(res)
        res.datadetail.map((x) => {
            $('#nik').html(x.nik)
            $('#namatamu').html(x.nama)
            $('#jeniskelamin').html(x.jeniskelamin)
            $('#alamat').html(x.alamat)
            $('#nomortelepon').html(x.telepon)
            $('#tanggalcheckin').html(x.startdate)
            $('#namakamar').html(x.namakamar)
            $('#jumlahkamar').html(x.qtykamar)
            $('#status').html(x.status)
            if(x.status=='reservasi'){
                $('#checkin').prop('disabled', false)
                $('#checkout').prop('disabled', true)
                $('#cancel').prop('disabled', false)
            }
            if(x.status=='checkin'){
                $('#checkin').prop('disabled', true)
                $('#checkout').prop('disabled', false)
                $('#cancel').prop('disabled', true)
            }
            if(x.status=='checkout' || x.status=='cancel') {
                $('#checkin').prop('disabled', true)
                $('#checkout').prop('disabled', true)
                $('#cancel').prop('disabled', true)
            }
        })
    })

    function checkin(id) {
        $.ajax({
            url: url + 'index.php/Admin/Reservasi/Checkin',
            type: 'POST',
            data: {
                idnya: id
            },
            success: function(res) {
                location.reload()
            }
        })
    }
    function checkout(id) {
        $.ajax({
            url: url + 'index.php/Admin/Reservasi/Checkout',
            type: 'POST',
            data: {
                idnya: id
            },
            success: function(res) {
                location.reload()
            }
        })
    }
    function cancel(id) {
        $.ajax({
            url: url + 'index.php/Admin/Reservasi/Cancel',
            type: 'POST',
            data: {
                idnya: id
            },
            success: function(res) {
                location.reload()
            }
        })
    }
</script>