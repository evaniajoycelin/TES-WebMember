<?php
    include './fungsional/konfig/header.php';


    $id = $_GET['k'];
    
    $y = $crud->tampilId("event", "id_event", $id);

    foreach ($y as $a) 
    {
        $nama = $a['nama_event'];
        $foto = $a['foto_event'];
        $tgl  = $a['tanggal_post'];
        //$autor= $a['nama_user'];
        $desk = $a['deskripsi'];
        //$idev = $a['id_event'];

        $lokasinya = $a['lokasi'];
        $vanue = $a['venue'];
        $waktu = $a['waktu'];
        $kuota = $a['kuota'];
        $harga = $a['harga_event'];


        $biaya= "Rp ".formatRupiah($harga).",-";

        if ($foto=="Kosong") 
        {
            $gambar = "<img src='../img/nofoto.png' width='200' height='150'>";
        } 
        else 
        {
           $tujuan = "foto/event/$foto";
            $gambar = 
            "   <a class='img-fluid' href='$tujuan' data-fancybox='' data-caption='$nama'>
                    <img src='$tujuan' width='200' height='150'>
                </a>
            ";
        }

        $fotoEnkripsi = base64_decode($foto);
    }

?>

 

  <section>
    <div class="container" style="margin-top: 100px;">

    

    <h2 class="display-4" style="padding: 40px; padding-bottom:0px; text-align:center;">
      <?php echo $nama; ?>
    </h2>
      <div class="row">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid" src="<?php echo $tujuan; ?>" alt="">
          </div>
        </div>
          <div class="col-lg-6" style='padding:50px;'>
        
            <!--<h4 class="display-4">Nama Event</h4>-->

            <?php echo $desk; ?>

          </div>
        </div>
      </div>
    </div>

    <div class="container" style="margin: 80px auto; padding: 20px; background-color: gainsboro; width:50%;">
      <table width="80%" align="center" border="0">
        <tr>
          <td width="40%">Lokasi</td>
          <td>:</td>
          <td width="47%"><?php echo $lokasinya; ?></td>
        </tr>
        <tr>
          <td width="40%">Vanue</td>
          <td>:</td>
          <td width="47%"><?php echo $vanue; ?></td>
        </tr>
        <tr>
          <td width="40%">Waktu Pelaksanaan</td>
          <td>:</td>
          <td width="47%"><?php echo $waktu; ?></td>
        </tr>
        <tr>
          <td width="40%">Kuota Peserta</td>
          <td>:</td>
          <td width="47%"><?php echo $kuota; ?> Orang</td>
        </tr>
        <tr>
          <td width="40%">Biaya</td>
          <td>:</td>
          <td width="47%">
            <h3><?php echo $biaya; ?></h3>
          </td>
        </tr>
      </table>

      <center>

        <?php
          $isiTrans = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$id' AND keterangan='Ok'");
          $cekHitung= $crud->hitungData($isiTrans);

          $now = date('Y-m-d');
         
          
          
   
            
            
            
          

          if ($cekHitung==$kuota) 
          {
            $arahin=
            "
              <h2>Maaf, Kuota sudah Penuh</h2>
            ";

            $cekTransa = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$id' AND id_user='$iduser' AND keterangan='Ok'");
            $cariTra   = $crud->hitungData($cekTransa);

              if ($cariTra>0) 
              {
                $arahin=
                "
                  <h2>Anda sudah terdaftar di Event ini</h2>
                ";
              } 
          } 
         
          else 
          {
            if (empty($iduser)) 
            {
              
              $arahin=
              "
              
              <p>Untuk mengikuti Event ini, anda harus terdaftar sebagai Member.</p>
              
              <a href='#' data-toggle='modal' data-target='#DaftarEvent' class='btn btn-primary btn-lg'>
                DAFTAR SEBAGAI MEMBER
              </a>
              ";
            }
            else
            {
              $cekTrans = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$id' AND id_user='$iduser' AND keterangan='Ok'");
              $cariTr   = $crud->hitungData($cekTrans);

              if ($cariTr>0) 
              {
                $arahin=
                "
                  <h2>Anda sudah terdaftar di Event ini</h2>
                ";
              } 
              else 
              {
                $arahin=
                "
                <a href='?hal=konfirmasi-pembayaran&k=$id&mau=event' class='btn btn-primary btn-lg'>
                  DAFTAR EVENT
                </a>
                ";
              }
            }
            
              
            
          }

          //$ko = 
          if ($now>$waktu) 
          {
              $arahin=
              "
                <h2>Event ini sudah lewat</h2>
              ";
          }
          

          echo "<p>$arahin</p>";
        ?>
      
      </center>
    </div>
  </section>

  
  <div class="modal fade" id="DaftarEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DAFTAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=daftar-respon&mau=event">
                  <input type="hidden" name="ide" value="<?php echo $id; ?>">
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

<?php
    include './fungsional/konfig/footer.php';
?>