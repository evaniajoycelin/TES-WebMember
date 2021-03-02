<?php
include './fungsional/konfig/header.php';

$event = $crud->eksekusiSQl("SELECT *FROM info 
                                        
                                        WHERE jenis_info='EliTES Membership'
                                        ");
foreach ($event as $ev) {

  $foto  = $ev['foto_info'];
  $tujuanHeader = "./foto/$foto";
  $jenis = $ev['jenis_info'];
  $desk = $ev['deskripsi'];
}
echo
  "
    <style>
      .gambar-bg
        {
            background-image: url('$tujuanHeader');
        }
    </style>
    ";

?>

<header class="masthead gambar-bg text-center text-white ">
  <div class="masthead-content">
    <div class="container">
      <h1 class="masthead-heading mb-0"><?php echo $jenis; ?></h1>
      <!--<h5 class="masthead-subheading mb-0">Isinya Event</h5>-->
      <h5><?php echo $desk; ?></h5>
      <a href="?hal=kontak-kami" class="btn btn-primary btn-xl rounded-pill mt-5">Learn More</a>
      <!--<h2 class="masthead-subheading mb-0">Jadikan kamu cerdas dengan Event</h2>-->

    </div>
  </div>
  <div class="bg-circle-1 bg-circle"></div>
  <div class="bg-circle-2 bg-circle"></div>
  <div class="bg-circle-3 bg-circle"></div>
  <div class="bg-circle-4 bg-circle"></div>
</header>

<section>

  <?php
  $event = $crud->eksekusiSQl("SELECT *FROM info 
                                        
                                        WHERE jenis_info='Event'
                                        ");

  foreach ($event as $ev) {
    $jenis = $ev['jenis_info'];
    $desk  = $ev['deskripsi'];
    $foto  = $ev['foto_info'];





    if ($foto == 'Kosong') {
      //$gambar = "<img class='rounded-circle' src='./img/nofoto.png' width='50' height='50'>";
      $box = "";
    } else {
      $tujuan = "./foto/$foto";
      /* $gambar = 
            "   <a data-fancybox='gallery' href='$tujuan' data-caption='$jenis'>
                    <img src='$tujuan' width='50' height='50'>
                </a>
            ";*/
      $box =
        "<img class='img-fluid rounded-circle' src='$tujuan' alt='$jenis'>";
    }
  }
  ?>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-lg-2">
        <div class="p-5">
          <?php echo $box; ?>
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <div class="p-5">
          <h2 class="display-4"><?php echo $jenis; ?></h2>
          <?php echo $desk; ?>
          <a href="?hal=event" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section>

  <?php
  $event = $crud->eksekusiSQl("SELECT *FROM info 
                                        
                                        WHERE jenis_info='Course'
                                        ");

  foreach ($event as $ev) {
    $jenis = $ev['jenis_info'];
    $desk  = $ev['deskripsi'];
    $foto  = $ev['foto_info'];





    if ($foto == 'Kosong') {
      //$gambar = "<img class='rounded-circle' src='./img/nofoto.png' width='50' height='50'>";
      $box = "";
    } else {
      $tujuan = "./foto/$foto";
      /* $gambar = 
            "   <a data-fancybox='gallery' href='$tujuan' data-caption='$jenis'>
                    <img src='$tujuan' width='50' height='50'>
                </a>
            ";*/
      $box =
        "<img class='img-fluid rounded-circle' src='$tujuan' alt='$jenis'>";
    }
  }
  ?>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="p-5">
          <?php echo $box; ?>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="p-5">
          <h2 class="display-4"><?php echo $jenis; ?></h2>
          <?php
          echo $desk;
          echo $course;
          ?>

        </div>
      </div>
    </div>
  </div>
</section>





<?php
include './fungsional/konfig/kontak-kami.php';
include './fungsional/konfig/footer.php';
?>


<div class="modal fade" id="DaftarCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DAFTAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="?hal=daftar-respon&mau=course">
          <p>
            <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
          </p>
          <p>
            <textarea id="my-textarea" class="form-control" name="alamat" placeholder="Alamat" rows="3"></textarea>
          </p>
          <p>
            <span>Tanggal Lahir : </span> <br>
            <input class="form-control" type="date" name="tglahir" placeholder="Tgl Lahir" required>
          </p>
          <div class="form-check form-check-inline">
            <input name="jekel" class="form-check-input" type="radio" id="inlineCheckbox1" value="Laki-laki">
            <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input name="jekel" class="form-check-input" type="radio" id="inlineCheckbox2" value="Perempuan">
            <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
          </div>

          <p>
            <input class="form-control" type="number" name="nohp" placeholder="No. Handphone" required>
          </p>
          <p>
            <input class="form-control" type="email" name="email" placeholder="E-Mail" required>
          </p>
          <p>
            <input class="form-control tampilinPass" type="password" name="password" placeholder="Password" required>
            &nbsp;<input type="checkbox" class="tampilPassword"> <small>Tampilkan Password</small> <br>
            <small class="text-danger passTaksama">Password yang diketikkan tidak sama</small>
          </p>
          <p>
            <input id="pass2" class="form-control" type="password" name="password" placeholder="Password" required>
            <small class="text-danger passTaksama">Password yang diketikkan tidak sama</small>
          </p>
          <p>
            <input type="checkbox" value="Ya" name="setujuan" required> Saya Menyetujui <a href="#" data-toggle="modal" data-target="#Setujuan">Terms and Condition</a>
          </p>
          <p>
            <input type="submit" value="DAFTAR" class="btn btn-primary">
          </p>
        </form>

      </div>

    </div>
  </div>
</div>



<!--pesan course-->


<!-- Modal -->
<div class="modal fade" id="pesanCourse" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">



      <div class="modal-body">
        <div class="container-fluid">
          <p align="center">
            “ Maaf hanya member yang bisa mengakses course TES. Silahkan anda mendaftar terlebih dahulu”
          </p>
          <center>
            <button data-toggle='modal' data-target='#DaftarCourse' type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">DAFTAR SEBAGAI MEMBER</button>
          </center>
        </div>
      </div>

    </div>
  </div>
</div>