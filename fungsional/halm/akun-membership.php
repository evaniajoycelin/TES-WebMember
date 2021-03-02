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

  <section  style="margin-top: 0;">
    
    <div class="container" style="padding: 20px; margin-top:100px;">
        
        <div class="row">
            <div class="col-md-2">

               <?php
                include './fungsional/data/membership.php';
               ?>
            </div>

            <div class="col-md-10">
                <h1 style="margin: 30px; margin-bottom:0px;"><?php echo"$namauser";?></h1>
                
                <hr>

                <div style="margin: 30px;">
                  <?php

                    $perintah = $crud->eksekusiSQl("SELECT *FROM paket_member WHERE kondisi='POSTING'");
                    $hitung   = $crud->hitungData($perintah);

                    if ($hitung==0) 
                    {
                        pesanKosong();
                    }
                    else
                    {
                    

                        $tampilin = $crud->tampilData("paket_member");

                        $no=1;
                        foreach($tampilin as $a)
                        {
                            //$idpk   = $a['id_paket'];
                            $nama   = $a['nama_paket'];
                            $harga  = $a['harga_member'];
                            //$kondisi= $a['kondisi'];
                            $deskrip= $a['deskripsi_paket'];
                            $jumkel = $a['jumlah_kelas'];


                            $rpHarga = "Rp".formatRupiah($harga).",-";


                            /*if ($nama=="Enterpreneur")
                            {
                                $arah = "?hal=akun-question";
                            } 
                            else 
                            {
                                $arah = "?hal=konfirmasi-pembayaran";
                            }
                            */

                            $foto = $a['foto_paket'];

                            $idpaket= $a['id_paket'];

                            if ($foto=="Kosong") 
                            {
                                $gambar = "<img class='card-img-top' src='img/nofoto.png' width='50' height='50'>";
                            } 
                            else 
                            {
                                $tujuan = "foto/paket/$foto";
                                $gambar = 
                                "  
                                        <img class='card-img-top' src='$tujuan' width='100%' height='100'>
                                    
                                ";
                            }

                           // $jumket = $jumkel;

                            $statuser = $crud->eksekusiSQL("SELECT *FROM user_status WHERE id_user='$userId' AND id_paket='$idpaket'");
                            $hitungUs = $crud->hitungData($statuser);

       
                              

                            if ($hitungUs>0) 
                            {
                                $class='btn btn-success disabled';
                                $kataTombol ='Anda sedang di Paket Ini';

                                
                                foreach ($statuser as $k) 
                                {
                                    $idp = $k['id_paket'];
                                    $statuket = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket='$idp'");

                                    foreach ($statuket as $key) 
                                    {
                                        $jumket = $key['jumlah_kelas'];
                                        
                                    }
                                }
                                
                                
                            }
                            else
                            {
                                $class='btn btn-primary';
                                //$kataTombol ='PILIH';

                                $jumket = 1;

                                if ($jumkel>$jumket) 
                                {
                                    $kataTombol = "Upgrade";
                                }
                                else
                                {
                                
                                    $class='btn btn-primary disabled';
                                    $kataTombol ='Default';
                                }

                                    
                                $idp = "Gak ada"; 


                                $paketan = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket>$idpaket");
                                $hitungP = $crud->hitungData($paketan);

                                if ($hitungP==0) 
                                {
                                    $class='btn btn-primary disabled';
                                    $kataTombol ='Default';
                                } 
                                
                                

                                
                                
                            }

                            
                                    
                         

                            echo
                            "
                            <div class='card' style='width: 15rem; display:inline-block; margin:5px; color:white; background-color:black;'>
                                
                                <div class='card-body'>
                                <h4 class='card-title'>
                                    $gambar <br>
                                    $nama 
                                </h4>
    
                                <p class='card-text'>$deskrip</p>
                                <h4 class='card-text' align='center'>
                                    <b>$rpHarga</b>
                                </h4>
                                <center>
                                <a href='?hal=konfirmasi-pembayaran&k=$idpaket&mau=paket' class='$class'>$kataTombol</a>
                                </center>
                                </div>
                            </div>
                            ";

                            $no++;
                        
                        }
                        
                    }

                  ?>
                </div>

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
<?php
    
    

?>