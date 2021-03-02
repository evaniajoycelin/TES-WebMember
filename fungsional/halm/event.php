<?php
    include './fungsional/konfig/header.php';
    
  $event = $crud->eksekusiSQl("SELECT *FROM info 
                                        
                                        WHERE jenis_info='Event'
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
        <h1 class="masthead-heading mb-0"><?php echo $jenis;?></h1>
        <!--<h5 class="masthead-subheading mb-0">Isinya Event</h5>-->
        <h5><?php echo $desk;?></h5>
       
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section>
    <div class="container" style="padding: 20px;">
        <h2 class="display-4">Semua Event</h2>



        <?php
                
          $perintah = $crud->eksekusiSQl("SELECT *FROM event 
                          INNER JOIN 
                          user ON user.id_user = event.id_user
                          ORDER BY event.id_event DESC");
          $hitung   = $crud->hitungData($perintah);

          if ($hitung==0) 
          {
              pesanKosong();
          }
          else
          {
              

              // $tampilin = $isi->tampilData("user");

              $no=1;
              foreach($perintah as $a)
              {
                  $nama = $a['nama_event'];
                  $foto = $a['foto_event'];
                  $tgl  = $a['tanggal_post'];
                  $autor= $a['nama_user'];
                  $idev = $a['id_event'];
                  $desk = $a['deskripsi'];
                  
                  $tanggal = date('d F Y', strtotime($tgl));
                  

                  if ($foto=="Kosong") 
                  {
                      $gambar = "<img class='card-img-top' src='img/nofoto.png' width='50' height='50'>";
                  } 
                  else 
                  {
                      $tujuan = "foto/event/$foto";
                      $gambar = 
                      "  
                              <img class='card-img-top' src='$tujuan' width='100%' height='270'>
                         
                      ";
                  }

                  if($no%2==0) 
                  {
                    $floating1="order-lg-1";
                    $floating2="order-lg-2";
                  } 
                  else 
                  {
                    $floating1="";
                    $floating2="";
                  }

                  
                  

                  echo
                  "
                    
                    
                    <section style='margin-top:90px;'>
                      <div class='container'>
                          <div class='row align-items-center'>
                            <div class='col-md $floating2'>
                              $gambar
                            </div>
                            <div class='col-md $floating1'>
                              <h1 class='display-4'>$nama</h1>
                              <p>$desk</p>
                              <a href='?hal=event-info&k=$idev' class='btn btn-primary'>
                                SELENGKAPNYA
                              </a>
                            </div>
                        </div>
                      </div>
                    </section>
                  ";
                  
               $no++;
              }
              
              

          
          }

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