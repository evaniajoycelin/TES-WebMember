<?php
$event = $crud->eksekusiSQl("SELECT *FROM info 
                                    
                                    WHERE jenis_info='Kontak Kami'
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
<section style="background-color: gainsboro;">
  <div class="container">

    <div class="row align-items-center">
      <div class="col-lg-6 order-lg-1">
        <div class="p-5">
          <h2 class="display-4""><?php echo $jenis; ?></h2>
          <br><br>
          <?php echo $desk; ?>
          <div class="row">
            <?php
              $perintah = $crud->eksekusiSQl("SELECT *FROM sosmed");
              $hitung   = $crud->hitungData($perintah);
              
              if ($hitung == 0) {
                pesanKosong();
              } else {
              
                $no = 1;
                foreach ($perintah as $a) {
                  $idsos = $a['id_sosmed'];
                  $nama  = $a['nama_sosmed'];
                  $link  = $a['link_sosmed'];
                  $foto  = $a['logo_sosmed'];
              
              
              
              
                  //$nus    = $a['nama_user'];
              
                  if ($foto == '') {
                    $gambar = "<img class='rounded-circle' src='./img/nofoto.png'>";
                    $box = "$gambar";
                  } else {
                    $tujuan = "./foto/sosmed/$foto";
                    $gambar =
                      "   <a data-fancybox='' href='$tujuan' data-caption='$nama'>
                                                          <img src='$tujuan' width='50' height='50'>
                                                      </a>
                                                      <br> <br>
                                                  ";
                    $box =
                      "
                                                     
                                                      <img title='$nama' style='margin-right:5px;' src='$tujuan' width='30' height='30'>
                                                   
                                                      
                                      ";
                  }
                  echo
                  "
                    
                      <a href='$link' target='_blank'>$box</a>
                    
                  ";
                }
              }
            ?>
          </div>
        </div>
      </div>
      <div class=" col-lg-6 order-lg-2">
            <div class="p-5">

              <form action="?hal=kontak-respon" method="post" style="margin-top: 100px;">

                <p>
                  <input class="form-control" type="text" name="nama" placeholder="Nama Anda" required>
                </p>
                <p>
                  <input class="form-control" type="email" name="email" placeholder="E-mail Anda" required>
                </p>
                <p>
                  <textarea name="pesan" class="form-control" placeholder="Isi Pesan Anda..." rows="5" required></textarea>
                </p>

                <p>
                  <button type="submit" class="btn btn-primary btn-lg">KIRIM</button>
                </p>

              </form>

            </div>
        </div>
      </div>
    </div>
</section>