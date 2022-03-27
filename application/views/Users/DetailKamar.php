<div class="container bg-light">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-2 mt-2 box-shadow">
                <div class="card-body">
                    <img src="" alt="" id="gambarkamar" class="img img-thumbnail"> 
                    <div id="namakamar"></div>
                    <hr>
                    <div id="deskripsi"></div>
                    <hr>
                    <div id="tipekamar"></div>
                    <hr>
                    <div id="jumlahkamarsisa"></div>
                    <hr>
                    <div id="fasilitas"></div>
                    <hr>
                    <div id="rating"></div>
                    <div id="tombolrating"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>Komentar</strong></h4>
                        <div class="media border p-3">
                            <div id="ruangkomentar"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="tulispesan"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2 mt-2 box-shadow">
                <div class="card-body">
                    <h2>Harga</h2><hr>
                    <div id="hargakamar">

                    </div>
                    <a href="" id="linkpesankamar">
                        <button class="btn btn-outline-primary btn-md">
                            Pilih Kamar
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var url = '<?= base_url() ?>'
    var arrDataRating = []
    var arrDetailKomentar = []
    var id = '<?= $id ?>'
    $.getJSON(url + 'index.php/Kamar/getJsonDetailKamar/' + id, function(res) {
        console.log(res)
        res.datakamar.map((x) => {
            $('#gambarkamar').prop('src', '<?= base_url() ?>/upload/kamar/' + x.url)
            $('#namakamar').html(x.namakamar)
            $('#deskripsi').html(x.description)
            $('#tipekamar').html('Tipe Kamar : ' + x.tipekamar)
            $('#jumlahkamarsisa').html('Kamar Tersisa : ' + x.jumlahqty)
            $('#hargakamar').html('<h3> Rp. '+x.harga+'</h3>')
            $('#linkpesankamar').prop('href', '<?= base_url() ?>index.php/Kamar/Reservasi/' + x.idkamar)
        })
        res.datafasilitas.map((x) => {
            $('#fasilitas').append(
                `
                <li class="${x.icon}" style="color:green;">${x.namafasilitas}</li>
                `
            )
        })
        res.datarating.map((x) => {
            $('#rating').append('<li class="fa fa-star" id="ratingno1"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno2"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno3"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno4"></li>')
            $('#rating').append('<li class="fa fa-star" id="ratingno5"></li>')
            let nilairating = {
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
                <div class="media-body">
                    <h5>${x.nama}</h5>
                    <small><i>Posted on ${x.waktu}</i></small>
                    <p>
                        ${x.komentar}
                    </p>
                    <hr>
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
    var sess = "<?= $this->session->userdata('nik'); ?>"
    if(sess == '') {
        $('#tombolrating').html('')
        $('#tulispesan').html('')
    } else {
        $('#tombolrating').append(
            `
            <button class="btn btn-outline-warning btn-sm" id="berikanrating">Beri Rating</button>
            `
        )
        $('#tulispesan').append(
                `
                <form action="" method="POST" id="form-komentar">
                    <input type="text" name="tuliskomentar" class="form form-control" placeholder="Tulis Komentar">
                    <button class="btn btn-outline-primary btn-md" onclick="kirimkomentar()" type="button">POST KOMENTAR</button>
                </form>
                `
            )
    }
    $('#berikanrating').on('click', function() {
        $('#exampleModal').modal('show');
    })

    function kirimkomentar() {
        $.ajax({
            url: url + 'index.php/Kamar/KirimKomentar',
            type: 'POST',
            data: {
                id_tamu: '<?= $this->session->userdata('id_user'); ?>',
                id_kamar: '<?= $this->uri->segment(3); ?>',
                komentar: $('input[name="tuliskomentar"]').val()
            },
            success: function(res) {
                location.reload()
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal mengirim komentar')
            }
        })
    }

    function bintang1() {
        $.ajax({
            url: '<?= base_url() ?>index.php/Kamar/Berirating1',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id_user: '<?= $this->session->userdata('id_user'); ?>',
                id_kamar: '<?= $this->uri->segment(3); ?>'
            },
            success: function(res) {
                alert('Terima kasih telah memberikan bintang 1.!')
                location.reload()
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Gagal memberikan rating')
            }
        })
    }

    function bintang2() {
        $.ajax({
            url: '<?= base_url() ?>index.php/Kamar/Berirating2',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id_user: '<?= $this->session->userdata('id_user'); ?>',
                id_kamar: '<?= $this->uri->segment(3); ?>'
            },
            success: function(res) {
                alert('Terima kasih telah memberikan bintang 2.!')
                location.reload()
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Gagal memberikan rating')
            }
        })
    }

    function bintang3() {
        $.ajax({
            url: '<?= base_url() ?>index.php/Kamar/Berirating3',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id_user: '<?= $this->session->userdata('id_user'); ?>',
                id_kamar: '<?= $this->uri->segment(3); ?>'
            },
            success: function(res) {
                alert('Terima kasih telah memberikan bintang 3.!')
                location.reload()
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Gagal memberikan rating')
            }
        })
    }

    function bintang4() {
        $.ajax({
            url: '<?= base_url() ?>index.php/Kamar/Berirating4',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id_user: '<?= $this->session->userdata('id_user'); ?>',
                id_kamar: '<?= $this->uri->segment(3); ?>'
            },
            success: function(res) {
                alert('Terima kasih telah memberikan bintang 4.!')
                location.reload()
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Gagal memberikan rating')
            }
        })
    }

    function bintang5() {
        $.ajax({
            url: '<?= base_url() ?>index.php/Kamar/Berirating5',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id_user: '<?= $this->session->userdata('id_user'); ?>',
                id_kamar: '<?= $this->uri->segment(3); ?>'
            },
            success: function(res) {
                alert('Terima kasih telah memberikan bintang 5.!')
                location.reload()
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Gagal memberikan rating')
            }
        })
    }
</script>

<!-- Modal Rating -->
<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Beri Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Silahkan pilih bintang yang akan anda berikan.!</p>
                <li class="fa fa-star" onclick="bintang1()"></li>
                <li class="fa fa-star" onclick="bintang2()"></li>
                <li class="fa fa-star" onclick="bintang3()"></li>
                <li class="fa fa-star" onclick="bintang4()"></li>
                <li class="fa fa-star" onclick="bintang5()"></li>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>