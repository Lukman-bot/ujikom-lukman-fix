<!-- Search Tangal -->
<div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mt-4 box-shadow">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <label>Tanggal Check In</label>
                    <input type="date" class="form form-control" />
                  </div>
                  <div class="col-md-2">
                    <label><br></label>
                    <button class="btn btn-outline-primary btn-block"/>
                    <li class="fa fa-search"></li>
                      Cek
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  End Search Tanggal -->
        <!-- Kamar  -->
        <h3 class="text-muted">Kamar </h3>
        <div class="row">
            <?php
                foreach($datakamar as $tampilkankamar):
            ?>
                <div class="col-md-3">
                    <div class="card mb-4 mt-2 box-shadow">
                    <div class="card-header">
                        <img src="<?= base_url() ?>upload/kamar/<?= $tampilkankamar->url ?>" alt="" class="img img-thumbnail">
                    </div>
                    <div class="card-body">
                        <?= $tampilkankamar->description ?>
                        <hr>
                        <strong><?= $tampilkankamar->tipekamar ?></strong> <br>
                        
                        <strong>Rp. <?php number_format($tampilkankamar->harga, 0, ',',',') ?></strong>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="<?= base_url() ?>index.php/Kamar/Detail/<?= $tampilkankamar->idkamar ?>"> <button type="button" class="btn btn-sm btn-outline-secondary">Detail</button></a>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Book Now</button>
                        </div>
                        <small class="text-muted">9</small><li class="fa fa-comments"></li>
                        </div>
                    </div>
                    </div>
                </div>
            <?php
                endforeach;
            ?>
        </div>
        <!-- End Kamar  -->
        <h3 class="text-muted">Fasilitas Hotel</h3>
        <div class="row">
            <?php
                foreach($datafasilitas as $tampilkanfasilitas):
            ?>
                <div class="col-md-6">
                    <div class="card mb-4 mt-2 box-shadow">
                    <div class="card-body">
                        <img src="<?= base_url() ?>upload/hotel/<?= $tampilkanfasilitas->picture ?>" alt="" class="img img-thumbnail">
                    </div>
                    <div class="card-footer">
                        <strong style="text-align: center;"><?= $tampilkanfasilitas->namafasilitas ?></strong>
                    </div>
                    </div>
                </div>
            <?php
                endforeach;
            ?>
        </div>