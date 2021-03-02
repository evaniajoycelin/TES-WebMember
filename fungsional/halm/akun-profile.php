<?php
include './fungsional/konfig/headerUdahLogin.php';
?>
<!--
  <header class="masthead gambar-bgUser" style="margin-top:0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Selamat Datang</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere repellendus excepturi, placeat molestias molestiae rem iusto odio magni at sapiente voluptatum dolorum illum, optio qui minus aliquam repudiandae earum autem!
          </p>
        </div>

        <div class="col-md-6">
          <img src="./img/laptop.png" alt="Yeah" width="100%">
        </div>
      </div>
    </div>
  </header>
-->

<?php

/*$tgl = date('Y-m-d');

    $tglPost = "2020-02-10";

    $berlaku = date('Y-m-d',strtotime('+30 days', strtotime($tglPost)));

    $tglExp = date("Y-m-d", $berlaku);

    $tgl1    = "2018-12-16"; // menentukan tanggal awal
    $tgl2    = date('Y-m-d', strtotime('+ 1 years', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
   // echo $tgl2; // cetak tanggal

   if ($tgl==$tgl2) 
   {
     $pesan = "Habis";
   }
   

    echo
    "
      <div style='margin-top:100px;'>
        $tgl <br>
        $tglPost <br>
        $berlaku <br>
        $tglExp <br>
        $tgl2 $pesan
      </div>
    ";
   */
$statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                                    INNER JOIN paket_member
                                                      ON user_status.id_paket = paket_member.id_paket
                                                    WHERE id_user='$userId'");

foreach ($statuser as $e) {
  $jumlahKelas = $e['jumlah_kelas'];
  $namaPaket   = $e['nama_paket'];
}

?>

<section style="margin-top: 0;">

  <div class="container" style="padding: 20px; margin-top:100px;">

    <div class="row">
      <div class="col-md-2">

        <?php
        include './fungsional/data/membership.php';
        ?>
      </div>

      <div class="col-md-10">
        <h1 style="margin: 30px; margin-bottom:0px;"><?php echo "$namauser"; ?></h1>

        <hr>

        <div style="margin: 30px;">
          <?php

          echo
            "
                     
                      <table>
                        <tr style='padding:15px;'>
                          <td width='24%'>Nama Lengkap</td>
                          <td>:</td>
                          <td style='padding-left:15px;' width='75%'>$namauser</td>
                        </tr>
                        <tr style='padding:15px;'>
                          <td width='24%'>Tanggal Lahir</td>
                          <td>:</td>
                          <td style='padding-left:15px;' width='75%'>$lahir</td>
                        </tr>
                        <tr style='padding:15px;'>
                          <td width='24%'>Jenis Kelamin</td>
                          <td>:</td>
                          <td style='padding-left:15px;' width='75%'>$jekel</td>
                        </tr>
                        <tr style='padding:15px;'>
                          <td width='24%'>Alamat</td>
                          <td>:</td>
                          <td style='padding-left:15px;' width='75%'>
                            $alamat 
                          </td>
                        </tr>
                        
                        <tr style='padding:15px;'>
                          <td width='24%'>No. Handphone</td>
                          <td>:</td>
                          <td style='padding-left:15px;' width='75%'>
                            $nohp 
                          </td>
                        </tr>
                        <tr style='padding:15px;'>
                          <td width='24%'>E-Mail</td>
                          <td>:</td>
                          <td style='padding-left:15px;' width='75%'>
                            $email 
                          </td>
                        </tr>

                       

                      </table>
                      <br>
                      <a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editUp'>Edit Profil</a>
                    ";


          echo
            "
                    <hr>
                      
                      <table>
                        <tr style='padding:15px; padding-top:15px;'>
                          <td width='24%'><h4>Membership :</h4></td>
            
                          <td style='padding-left:15px;' width='75%'>
                            <h4><font color='darkorange'>$namaPaket</font></h4> 
                            <a class='badge badge-success' href='?hal=akun-membership'>Upgrade</a>
                          </td>
                        </tr>
                      </table>

                      <br>
                    
                     
                    ";

          
          
          $perintah = $crud->eksekusiSQl("SELECT *FROM user_preneur 
                    INNER JOIN user ON user.id_user=user_preneur.id_user
                    INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
                    WHERE user.id_user='$iduser'
                    ORDER BY user_preneur.id_userpreneur DESC");
          $hitung   = $crud->hitungData($perintah);

          $mau = @$_GET['mau'];
          if ($mau=='tambah') 
          {
            include 'akun-preneur.php';
          } 
          else 
          {
            if ($hitung == 0) {
              //pesanKosong();
              include 'akun-preneur.php';
            } else {
              echo
                "
                <br><br>
                <a class='btn btn-primary btn-sm' href='?hal=akun-profile&mau=tambah'>Tambah Data Usaha</a>
                <br><br>
                                <div class='table-responsive'>
                                  <table class='table' id='dataTable' width='100%' cellspacing='0' style='font-size:12px;'>
                                      <thead class='bg-warning'>
                                          <tr>
                                              <th>No.</th>
                                              <th>Nama Bisnis</th>
                                              <th>Tahun Mulai</th>
                                              <th>Bidang</th>
                                              <th>Industri</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                              ";
  
  
  
              $no = 1;
              foreach ($perintah as $a) {
                $idUneur = $a['id_userpreneur'];
                $namaBis   = $a['nama_bisnis'];
                $tahun  = $a['tahun_dirikan'];
                $bidang = $a['bidang_usaha'];
                //$email  = $a['email'];
                $user   = $a['nama_user'];
                //$foto   = $a['foto'];
                $hak    = $a['hak_akses'];
  
                $ius    = $a['id_user'];
  
                $ig     = $a['akun_instagram'];
                $fb     = $a['page_facebook'];
  
                $web    = $a['website_bisnis'];
                $omset  = $a['omset_bulanan'];
                $jumkar = $a['jumlah_karyawan'];
                $deskrip = $a['deskripsi_usaha'];
  
                $foto   = $a['foto_usaha'];
  
  
                $prov = $a['nama_provinsi'];
  
  
                $alamatBis = $a['alamat_bisnis'];
                $emailBis  = $a['email_bisnis'];
  
                $telpBis = $a['telp_bisnis'];
  
                $industri= $a['industri'];
  
  
  
                //$jumset = formatRupiah($omset);
  
                if ($foto=="Kosong") 
                {
                    $gambar = "<img src='img/nofoto.png' width='50' height='50'>";
                    $imeg= "<img src='img/nofoto.png' width='100%' height='200'>";
                } 
                else 
                {
                    $tujuan = "foto/bisnismember/$foto";
                    $gambar = 
                    "  <a href='$tujuan' data-caption='$namaBis' data-fancybox>
                        <img src='$tujuan' width='70' height='70'>
                        </a>
                    ";
  
                    $imeg = "<img src='$tujuan' width='100%' height='200'>";
                }
  
  
                echo
                  "
                                      <tbody>
                                          <tr>
                                              <td align='center'>$no</td>
                                              <td>
                                                  
                                                  $gambar 
                                                  
                                                  <span style='margin-top:7px; display:block;'>
                                                  $namaBis
                                                  </span>
                                                  
                                              </td>
                                              <td>$tahun</td>
                                              <td>$bidang</td>
                                              <td>$industri</td>
                                              
                                              
                                              <td>
      
  
                                                  <center>
                                                      <div class='btn-group' role='group'>
                                                          <button id='aksi' type='button' class='btn btn-secondary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                          Aksi
                                                          </button>
                                                          <div class='dropdown-menu' aria-labelledby='aksi'>
                                                              <a class='dropdown-item bg-success text-white' data-fancybox data-src='#bisnis$idUneur' href='javascript:;'>View</a>
                                                              <a class='dropdown-item bg-danger text-white' href='?hal=akun-bisnis-edit&idpe=$idUneur'>Edit</a>
                                                          </div>
                                                      </div>
                                                  </center>
                                              </td>
                                          </tr>
                                  ";



                echo
                "
                <div id='bisnis$idUneur' style='font-size: 16px; width:700px; display:none;'>

                <div class='row'>
                  <div class='col-md'>
                        <center>
                            $imeg
                        </center>
                  </div>
            
                  <div class='col-md' style='padding: 20px;'>
                    <h2><?php echo $namaBis; ?></h2>
                    
                    <br>
                    
                   
                     
                        <h5>Deskripsi Usaha:</h5>
            
                        <p>
                          $deskrip
                        </p>
                      
            
                  </div>
                </div>
                ";
                
            
                  $badge = 
                  "
                    <span class='badge badge-warning'>Belum diisi</span>
                  ";
            
                  if ($ig == NULL) {
                    $ig = $badge;
                  }
                  if ($fb == NULL) {
                    $fb = $badge;
                  }
                  if ($web == NULL) {
                    $web = $badge;
                  }
            
            
            
            
             
                   
                  echo"
                    <hr>
                    <h5>Profil Bisnis:</h5>
            
                    <p>Bergerak di Bidang $bidang</p>
                    <p>Industri : $industri</p>
                    <p>Berdiri sejak $tahun</p>
                    
                    <hr>
            
                    <h5>Kontak Bisnis:</h5>
                    
                    <p>
                      Alamat Bisnis: $alamatBis
                    </p>
            
                    <p>
                      Provinsi : $prov
                    </p>
            
                    <p>
                      No. Telp: $telpBis
                    </p>
            
                    <p>
                        Akun Instagram: $ig
                    </p>
                    <p>
                        Page Facebook : $fb
                    </p>
                    <p>
                        Website : $web
                    </p>
            
              
            
            
                   
                    
            
            
              </div>
                ";
                $no++;
              }
  
  
  
              echo
                "
                                      </tbody>
                                  </table>
                              </div>
                             ";
            }
          }
          

         







          ?>


        </div>



      </div>
    </div>

  </div>

  



</section>



<!-- Modal alamat-->
<div class="modal fade" id="editAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="?hal=akun-respon&mode=ubah&id=<?php echo $iduser; ?>&ini=alamat" enctype="multipart/form-data">

          <div class="form-group">
            <label for="my-textarea">Alamat</label>
            <textarea id="my-textarea" class="form-control" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
          </div>

          <p>
            <input type="submit" value="SIMPAN" class="btn btn-primary">
          </p>
        </form>

      </div>

    </div>
  </div>
</div>

<!-- Modal no. hp-->
<div class="modal fade" id="editNohp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit No. Handphone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="?hal=akun-respon&mode=ubah&id=<?php echo $iduser; ?>&ini=nohp" enctype="multipart/form-data">

          <p>
            <input value="<?php echo $nohp; ?>" class="form-control" type="number" name="nohp" placeholder="Masukkan No. Handphone" required>
          </p>

          <p>
            <input type="submit" value="SIMPAN" class="btn btn-primary">
          </p>
        </form>

      </div>

    </div>
  </div>
</div>

<!-- Modal E-mail-->
<div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit E-Mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="?hal=akun-respon&mode=ubah&id=<?php echo $iduser; ?>&ini=email" enctype="multipart/form-data">

          <p>
            <input value="<?php echo $email; ?>" class="form-control" type="email" name="email" placeholder="E-Mail" required>
          </p>

          <p>
            <input type="submit" value="SIMPAN" class="btn btn-primary">
          </p>
        </form>

      </div>

    </div>
  </div>
</div>



<?php
include './fungsional/konfig/footer.php';
?>