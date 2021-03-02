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

  <section class="lapak-putih" style="margin-top: 0;">
    
    <div class="container lapak-putih" style="padding: 20px; margin-top:100px;">
        
        <div class="row">
            <div class="col-md-2">

               <?php
                include './fungsional/data/membership.php';
               ?>
            </div>

            <div class="col-md-10">
                <h1 style="margin: 30px; margin-bottom:0px;"><?php echo"$namauser";?></h1>
                
                <hr>

                <h5 style="margin-left: 25px;">Dashboard</h5>

                <a href='?hal=course' class="card bg-success text-white" style="width: 45%; margin:10px; display:inline-block; text-decoration: none;">
                    <div class="card-body">
                        <h2 class="card-title">
                            <i class="fas fa-chalkboard-teacher"></i> Course
                        </h2>
                        <hr>
                        <?php
                            $userStat = 
                                "SELECT *FROM user_status
                                    INNER JOIN paket_member ON
                                    user_status.id_paket = paket_member.id_paket
                                 WHERE id_user ='$userId';
                                ";
                            $dataStatus = $crud->eksekusiSQL($userStat);
                            foreach($dataStatus as $us)
                            {
                                $namaPaket = $us['nama_paket'];
                                $jumlahKelas = $us['jumlah_kelas'];
                                echo
                                "
                                <h5 class='card-title'>$namaPaket</h5>
                                <p class='card-text'>Anda mempunyai $jumlahKelas Kelas</p>
                                ";
                            }
                        ?>
                        
                    </div>
                </a>

                <a href='#' class="card bg-danger text-white" style="width: 45%; margin:10px; display:inline-block; text-decoration: none;">
                    <div class="card-body">
                        <h2 class="card-title">
                            <i class="fas fa-money-bill    "></i> Transaksi
                        </h2>
                        <hr>
                        <?php
                            $tampilNot = notifikasi($hitungTransaksi);

                            if (empty($tampilNot)) 
                            {
                                $tampilLuar="Belum ada Transaksi";
                            }
                            else
                            {
                                $tampilLuar="$tampilNot Belum dibaca";
                            }
                            echo
                            "
                                <h5 class='card-title'>$tampilLuar</h5> 
                            ";
                        ?>
                        <p class="card-text">Klik Untuk Melihat</p>
                    </div>
                </a>

               
            </div>
        </div>
   
    </div>

  </section>

  <!-- Modal -->
  <div class="modal fade" id="editUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form method="post" action="?hal=akun-respon&mode=edit" enctype="multipart/form-data">
                      <p>
                          <input value="<?php echo $namauser; ?>" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                      </p>
                      <p>
                          <textarea id="my-textarea" class="form-control" name="alamat" placeholder="Alamat" rows="3"><?php echo $alamat; ?></textarea>
                      </p>
                      <p>
                          <input value="<?php echo $nohp; ?>" class="form-control" type="number" name="nohp" placeholder="No. Handphone" required>
                      </p>
                      <p>
                          <input value="<?php echo $email; ?>" class="form-control" type="email" name="email" placeholder="E-Mail" required>
                      </p>
                      <p>
                          <input value="<?php echo $passw; ?>" class="form-control" type="password" name="password" placeholder="Password" required>
                      </p>
                      <p>
                          <input class="form-control" type="file" name="foto" placeholder="Password">
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