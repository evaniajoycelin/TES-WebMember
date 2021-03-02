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

        /*
          $kelas = @$_GET['k'];
                
          $perintah = $crud->eksekusiSQl("SELECT *FROM kelas WHERE id_kelas='$kelas'");
          $hitung   = $crud->hitungData($perintah);

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
                
                
                $pel = $crud->eksekusiSQl("SELECT *FROM kursus WHERE id_kelas='$idkel'");
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

                if ($kondisi=='DRAFT') 
                {
                    $warna ="gainsboro";
                }
                else
                {
                    $warna = "white";
                }


                if($hit>0)
                {
                    $kursus = "<a href='?hal=kursus-kelas&idk=$idkel'>$hit Pelajaran</a>";
                }
                else
                {
                    $kursus = "Belum ada";
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
            
          
        }
        */
      ?>

      <?php

        $id = $_GET['k'];

        $perintah = $crud->eksekusiSQl("SELECT 
                                            kursus.id_kursus,
                                            kursus.nama_kursus, kursus.deskripsi, 
                                            kursus.foto_kursus, 
                                            kelas.id_kelas, kelas.nama_kelas,
                                            pilar.id_pilar, pilar.id_kelas
                                            FROM 
                                            kursus
                                            INNER JOIN pilar
                                            ON pilar.id_pilar = kursus.id_pilar
                                            INNER JOIN kelas
                                            ON kelas.id_kelas = pilar.id_kelas
                                           
                                        WHERE kursus.id_kursus='$id'
                                        ORDER BY id_kursus DESC
                                        ");

      echo "<div class='container' style='padding: 70px;'>";
     
      foreach($perintah as $a)
      {
          $nama = $a['nama_kursus'];
        // $link = $a['link_video'];
          
          //$idk  = $a['id_kursus'];
          $namak= $a['nama_kelas'];
          $idkel= $a['id_kelas'];

          $desk = $a['deskripsi'];


        // $tamnel = youtubeGambar($link);

          $foto = $a['foto_kursus'];


        
          $tamnel ="./foto/kursus/$foto";
          
        
          
          
      //$pel = $isi->eksekusiSQl("SELECT *FROM kursus WHERE id_kelas='$idkel'");
      //              $hit = $isi->hitungData($pel);

          
              //$tujuan = "foto/$foto";
              $gambar = 
              "  
                      <img class='card-img-top' src='$tamnel' width='100%' height='300'>
                
              ";
        

        


          
          echo
            "
              <div class='row' style='margin-top:100px;'>
                  <div class='col-md'>
                      $gambar
                  </div>
                  <div class='col-md'>
                      <h4>$namak</h4>
                      <h3>$nama</h3>
                      
                  </div>
              </div>

              <span class='box-cokelat'>
                $desk

                
                
              </span>

              
            ";
          //$no++;
      }
      echo "</div>";

            ?>
    

  </section>


  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>


