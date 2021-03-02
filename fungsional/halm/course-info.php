<?php
    include './fungsional/konfig/header.php';
?>

 <!-- <header class="masthead gambar-bg text-center text-white ">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">Course</h1>
        <h2 class="masthead-subheading mb-0">Isinya Course</h2>
       
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>-->

  <section>
    <div class="container" style="padding: 70px;">
       
  
        <!--
        <div class="card kartu" style="width: 18rem; display:inline-block;">
            <a href="#">
                <img class="card-img-top" src="img/kopi.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </a>
        </div>
        -->
        <?php



          $statser = $crud->eksekusiSQl("SELECT *FROM user_status
          INNER JOIN paket_member
            ON user_status.id_paket = paket_member.id_paket
          WHERE id_user='$userId'");

          foreach ($statser as $dus) 
          {
          $idpaketser    = $dus['id_paket'];
          $jumlahKelas = $dus['jumlah_kelas'];
          $namaPaket   = $dus['nama_paket'];
          //$carPak = $crud->eksekusiSQL("SELECT *FROM paket_membership WHERE nama_paket='$namaPaket'");
          }


          $kelas = @$_GET['k'];
          $ipilar = @$_GET['pr'];
                
          $perintah = $crud->eksekusiSQl("SELECT *FROM kelas WHERE id_kelas='$kelas'");
          $hitung   = $crud->hitungData($perintah);

          $pilar = $crud->eksekusiSQl("SELECT *FROM pilar WHERE id_kelas='$kelas'");
         // $hitung   = $crud->hitungData($perintah);

          if ($hitung==0) 
          {
              pesanKosong();
          }
          else
          {
              

            // $tampilin = $crud->tampilData("user");

            

          
            foreach($perintah as $a)
            {
                $idkel = $a['id_kelas'];
                $nama  = $a['nama_kelas'];
                $foto  = $a['foto_kelas'];

                $desk  = $a['deskripsi'];

                $kondisi = $a['kondisi'];
                
                
                $pel = $crud->eksekusiSQl("SELECT *FROM kursus 
                                            INNER JOIN pilar ON
                                            pilar.id_pilar = kursus.id_pilar
                                            INNER JOIN kelas ON
                                            kelas.id_kelas = pilar.id_kelas
                                            WHERE pilar.id_kelas='$idkel'");
                $hit = $crud->hitungData($pel);

                if ($foto=="Kosong") 
                {
                    $gambar = "<img src='img/nofoto.png' width='35' height='35'>";
                } 
                else 
                {
                    $tujuan = "foto/$foto";
                    $gambar = 
                    "   
                      <img src='$tujuan' width='60%' height='400'>
                       
                    ";
                }

                
                
                echo
                "
                  <center>
                    
                      $gambar
                   
                    
                      <h1 class='display-4'>$nama</h1>
                      <p>$desk</p>
                      
                    
                  </center>
                ";
                
               
            }

            echo
            "
              <center>
            ";
            foreach ($pilar as $pil) 
            {
              $idpil   = $pil['id_pilar'];
              $namaPil = $pil['nama_pilar'];
              $deskPil = $pil['desk_pilar'];

              if ($idpil==$ipilar)
              {
                $warna = 'bg-warning';
              }
              else
              {
                $warna = "";
              }

              echo
              "
                <div class='kartu' >
                  <a href='?hal=course-info&k=$kelas&p=$idpaketser&pr=$idpil' class='card $warna'>
              
                    <div class='card-body'>
                      <h4 class='card-title'>$namaPil</h4>
                      <span class='card-text'>Deskripsi</span>
                    </div>
                  </a>
                </div>
                
              ";
            }
            
            echo
            "
              </center>
            ";

            
            
        }

      ?>

      <?php

        if (!empty($ipilar)) 
        {
           $perintah = $crud->eksekusiSQl("SELECT * FROM `paket_kelas` 
                                            INNER JOIN kelas ON 
                                              kelas.id_kelas = paket_kelas.id_kelas 
                                            INNER JOIN pilar ON 
                                              pilar.id_kelas = kelas.id_kelas 
                                            INNER JOIN kursus ON 
                                              kursus.id_pilar = pilar.id_pilar 
                                        
                                        WHERE paket_kelas.id_kelas='$kelas'
                                        AND paket_kelas.id_paket='$idpaketser'
                                        AND pilar.id_pilar='$ipilar'
                                        ORDER BY kursus.nama_kursus ASC
                                        ");
        } 
        else 
        {
           $perintah = $crud->eksekusiSQl("SELECT * FROM `paket_kelas` 
                                            INNER JOIN kelas ON 
                                              kelas.id_kelas = paket_kelas.id_kelas 
                                            INNER JOIN pilar ON 
                                              pilar.id_kelas = kelas.id_kelas 
                                            INNER JOIN kursus ON 
                                              kursus.id_pilar = pilar.id_pilar 
                                           
                                              
                                            WHERE paket_kelas.id_kelas='$kelas'
                                            AND paket_kelas.id_paket='$idpaketser'
                                              ORDER BY kursus.nama_kursus ASC
                                        ");
        }
        

       

        $hitung   = $crud->hitungData($perintah);

       

        if ($hitung==0) 
        {
            pesanKosong();
        }
        else
        {
            foreach($perintah as $a)
            {
                $nama = $a['nama_kursus'];
               // $link = $a['link_video'];
                
                $idk  = $a['id_kursus'];
                $namak= $a['nama_kelas'];

                $foto = $a['foto_kursus'];

                $idket= $a['id_paket'];


                //$paketId= $a['id_paket'];


               // $tamnel = youtubeGambar($link);


               
                    $tamnel ="./foto/kursus/$foto";
                    
                
                
//$pel = $isi->eksekusiSQl("SELECT *FROM kursus WHERE id_kelas='$idkel'");
  //              $hit = $isi->hitungData($pel);

                
                    $gambar = 
                    "  
                            <img class='card-img-top' src='$tamnel' width='100' height='165'>
                       
                    ";


                   
                    
                
                  
  
                
                

              


                
                
                echo
                  "
                  <div class='card kartu' style='color:white;'> 
                      <a style='color:white;' href='?hal=course-detail&k=$idk'>
                          $gambar
                          <div class='card-body'>
                              <h6 class='card-title'>$nama</h6>
                              
                          </div>
                      </a>
                      
                  </div>
                  ";
                //$no++;
            }

            
        }
      
      ?>

      <?php

        $statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                        INNER JOIN paket_member
                                          ON user_status.id_paket = paket_member.id_paket
                                        WHERE id_user='$userId'");

        foreach ($statuser as $e) 
        {
          $jumlahKelas = $e['jumlah_kelas'];
          $namaPaket   = $e['nama_paket'];
          $paketId = $e['id_paket'];
          //$carPak = $crud->eksekusiSQL("SELECT *FROM paket_membership WHERE nama_paket='$namaPaket'");
        }

        echo
        "
          <div class='flowan'>
        ";

        $pak = @$_GET['p'];

        $nextKelas = 
        $crud->eksekusiSQL("SELECT *FROM paket_kelas 
                    INNER JOIN paket_member ON paket_member.id_paket = paket_kelas.id_paket
                    INNER JOIN kelas ON kelas.id_kelas = paket_kelas.id_kelas
                    WHERE paket_kelas.id_paket='$paketId' AND kelas.id_kelas>$kelas  LIMIT 1");
                    
        $hitungNext= $crud->hitungData($nextKelas);

        $prevKelas = $crud->eksekusiSQL("SELECT *FROM paket_kelas 
        INNER JOIN paket_member ON paket_member.id_paket = paket_kelas.id_paket
        INNER JOIN kelas ON kelas.id_kelas = paket_kelas.id_kelas
        WHERE paket_kelas.id_paket='$paketId' AND kelas.id_kelas<$kelas ORDER BY paket_kelas.id_kelas DESC LIMIT 1");
        $hitungPrev= $crud->hitungData($prevKelas);

        

        if ($hitungPrev>0) 
        {
          foreach ($prevKelas as $go) 
          {
            $idkelasPrev = $go['id_kelas'];
            $idpaketPrev = $go['id_paket'];
            
           //= $go['nama_kelas'];
            echo
            "
              
              <a class='btn btn-primary tempel-kiri' href='?hal=course-info&k=$idkelasPrev&p=$paketId'>Prev</a>
            
            ";
          }
        }

        if ($hitungNext>0) 
        {
          foreach ($nextKelas as $go) 
          {
            $idkelas = $go['id_kelas'];
            //$nmkelas = $go['nama_kelas'];
            $idpaket = $go['id_paket'];

            if ($idpaket>$paketId) 
            {
              $n = "no $kelas $idpaket $paketId";
            } 
            else 
            {
              $n = "yes $idpaket $paketId";
            }
            
            echo
            "
              
              <a class='btn btn-primary tempel-kanan' href='?hal=course-info&k=$idkelas&p=$paketId'>Selanjutnya</a>
            
            ";
          }
        }
        else
        {

          $kelasCek = $crud->eksekusiSQL("SELECT *FROM kelas WHERE id_kelas>$kelas LIMIT 1");

          $hitungCek= $crud->hitungData($kelasCek);

          if ($hitungCek>0) 
          {
           $triger = "<a class='btn btn-primary tempel-kanan' href='#' data-toggle='modal' data-target='#Upgrade'>Upgrade</a>";
          }
          else
          {
            $triger = "";
          }

          echo
            "
              
              
              <!-- Button trigger modal -->
              $triger
              
              <!-- Modal -->
              <div class='modal fade' id='Upgrade' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    
                    <div class='modal-body'>
                      <center>
                        <p>Upgrade Paket Membership anda.</p>
                        <p>Untuk mendapatkan Kelas dan Pelajaran lebih banyak lagi.</p>
                        <a class='btn btn-primary' href='?hal=akun-membership'>UPGRADE PAKET</a>
                      </center>
                    </div>
                    
                  </div>
                </div>
              </div>
            ";
        }
        

        echo
        "
          </div>
        ";
      ?>
    </div> 

  </section>


  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  