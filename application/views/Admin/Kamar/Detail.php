<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/Kamar/"><button class="btn btn-warning btn-xs pull-right">Kembali</button></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">

            </div>
            <div class="box-body">
                <label>Gambar Kamar</label>
                <div id="gambarkamar">

                </div>
                <label>Nama Kamar</label>
                <div id="namakamar">

                </div>
                <label>Tipe Kamar</label>
                <div id="tipekamar">

                </div>
                <label>Harga Kamar</label>
                <div id="hargakamar">

                </div>
                <label>Jumlah Kamar</label>
                <div id="jumlahkamar">

                </div>
                <label>Fasilitas Kamar</label>
                <div id="fasilitas">

                </div>
                <label>Rating</label>
                <div id="rating">

                </div>
                <label>Deskripsi</label>
                <div id="deskripsi">
                     
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box direct-chat direct-chat-warning">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
                <div class="direct-chat-messages" id="form-pesan">
                    <div id="ruangkomentar">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    var url = '<?= base_url() ?>'
    var arrDataRating = []
    var arrDetailKomentar = []
    $.getJSON(url + 'index.php/Admin/Kamar/getJsonDetail/' + '<?= $id ?>', function(res) {
        console.log(res)
        res.datakamar.map((x) => {
            $('#gambarkamar').append(
                '<img src="<?= base_url() ?>upload/kamar/' + x.url + '" class="img img-thumbnail" >'
            )
            $('#namakamar').html(x.namakamar)
            $('#tipekamar').html(x.tipekamar)
            $('#hargakamar').html(x.harga)
            $('#jumlahkamar').html(x.jumlahqty)
            $('#deskripsi').html(x.description)
        })
        res.datafasilitas.map((x) => {
            $('#fasilitas').append(
                `
                <li class="${x.icon} fa-2x" style="color:green;">${x.namafasilitas}</li>
                `
            )
        })
        res.datarating.map((x) => {
            $('#rating').append('<li class="fa fa-star" id="ratingno1"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno2"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno3"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno4"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno5"></li>')
            let nilairating={
                jumlahrating: parseInt(x.rata2)
            }
            arrDataRating.push(nilairating)
        })
        tampilkanRating()
        res.datakomentar.map((x) => {
            let datakomentarnya = {
                idkamar: x.idkamar,
                idreview: x.idreview,
                nama: x.nama,
                komentar: x.review,
                waktu: x.created_at
            }
            arrDetailKomentar.push(datakomentarnya)
        })
        tampilkanKomentar()
    })
    const tampilkanKomentar = () => {
        $('#ruangkomentar').html('')
        arrDetailKomentar.map((x, i) => {
            $('#ruangkomentar').append(
                `
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">${x.nama}</span>
                        <span class="direct-chat-timestamp pull-right">${x.waktu}</span>
                    </div>
                    <div class="direct-chat-text">
                        ${x.komentar}
                    </div>
                </div> 
                `
            )
        })
    }
    const tampilkanRating = () => {
        arrDataRating.map((x, i) => {
            nilainya = x.jumlahrating + 1
            for (let indexrating = 0; indexrating < nilainya; indexrating++) {
                $('#ratingno' + indexrating).prop('style', 'color:orange')
            }
        })
    }
</script>