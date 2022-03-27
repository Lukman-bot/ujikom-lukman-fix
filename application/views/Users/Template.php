
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="favicon.ico" />

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>_assets/users/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>_assets/users/font-awesome/css/font-awesome.min.css" />
    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>_assets/users/dist/css/carousel.css" rel="stylesheet" />
    <script src="<?= base_url() ?>_assets/bower_components/jquery/dist/jquery.min.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?= base_url('index.php/Welcome') ?>">Hotelku-Logo</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Kamar<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Fasilitas</a>
            </li>
          </ul>
            <div id="nama_users">

            </div>
            <div id="reservasiku">

            </div>
            <div id="btn_login">

            </div>
          
        </div>
      </nav>
    </header>

    <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              class="first-slide"
              src="<?= base_url() ?>_assets/users/img/Hotel.png"
              alt="First slide"
            />
            <div class="container">
              <div class="carousel-caption text-left">
                
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="second-slide"
              src="<?= base_url() ?>_assets/users/img/gym room hotel.jpg"
              alt="Second slide"
            />
            <div class="container">
              <div class="carousel-caption">
                
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="third-slide"
              src="<?= base_url() ?>_assets/users/img/parkir hotel luas.jpeg"
              alt="Third slide"
            />
            <div class="container">
              <div class="carousel-caption text-right">
                
              </div>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#myCarousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#myCarousel"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="container bg-light">
        <?= $content; ?>
      </div>

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>
          &copy; 2017-2018 Company, Inc. &middot;
          <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
        </p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script
      src="<?= base_url() ?>_assets/users/https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script>
      window.jQuery ||
        document.write(
          '<script src="<?= base_url() ?>_assets/users/assets/js/vendor/jquery-slim.min.js"><\/script>'
        );
    </script>
    <script src="<?= base_url() ?>_assets/users/assets/js/vendor/popper.min.js"></script>
    <script src="<?= base_url() ?>_assets/users/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?= base_url() ?>_assets/users/assets/js/vendor/holder.min.js"></script>
    <script type="text/javascript">
        var sess = "<?= $this->session->userdata('nama_user'); ?>"
        if (sess == '') {
            $('#nama_users').html('')
            $('#btn_login').html(
                `
                <a href="<?= base_url() ?>index.php/Auth">
                    <button class="btn btn-outline-success my-2 my-sm-0">
                        <li class="fa fa-lock"></li>
                        Login
                    </button>
                </a>
                `
            )
            $('#reservasiku').html('')
        } else {
            $('#nama_users').html(
                `
                    <div class="text-muted mr-2">
                      <a href="<?= base_url() ?>index.php/Profile/" class="text-muted mr-2">
                        <?= $this->session->userdata('nama_user') ?>
                      </a>
                    </div>
                `
            )
            $('#btn_login').html(
                `
                <a href="<?= base_url() ?>index.php/Auth/Logout">
                    <button class="btn btn-outline-success my-2 my-sm-0">
                        <li class="fa fa-lock"></li>
                        Logout
                    </button>
                </a>
                `
            )
            $('#reservasiku').html(
                `
                    <a href="<?= base_url() ?>index.php/Reservasiku" class="text-muted mr-2">Reservasiku</a>
                `
            )
        }
    </script>
  </body>
</html>
