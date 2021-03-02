<?php

    include './fungsional/konfig/headerPreview.php';

?>

<?php

    $ingin = @$_GET['target'];
    $idian = @$_GET['view'];
    if ($ingin=="kelas") 
    {
        echo "<div class='container' style='padding: 70px;'>";
        $perintah = $crud->eksekusiSQl("SELECT *FROM kelas WHERE id_kelas='$idian'");
        foreach($perintah as $a)
        {
            $idkel = $a['id_kelas'];
            $nama  = $a['nama_kelas'];
            $foto  = $a['foto_kelas'];

            $desk  = $a['deskripsi'];

            $kondisi = $a['kondisi'];
            
            
            $pel = $crud->eksekusiSQl("SELECT *FROM kursus WHERE id_kelas='$idian'");
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

        $perintah = $crud->eksekusiSQl("SELECT *FROM 
                                        kursus
                                        INNER JOIN kelas
                                        ON kelas.id_kelas = kursus.id_kelas
                                        WHERE kursus.id_kelas='$idian'
                                        ORDER BY id_kursus DESC
                                        ");

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
                  <div class='card kartu'>
                      <a href='#'>
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
      
        echo "</div>";
    } 
    elseif ($ingin=="course") 
    {
        echo "<div class='container' style='padding: 70px;'>";
        $perintah = $crud->eksekusiSQl("SELECT 
                                            kursus.nama_kursus, kursus.deskripsi, 
                                            kursus.foto_kursus, kursus.id_kelas,
                                            kelas.id_kelas, kelas.nama_kelas
                                            FROM 
                                            kursus
                                            INNER JOIN kelas
                                            ON kelas.id_kelas = kursus.id_kelas
                                           
                                        WHERE kursus.id_kursus='$idian'
                                        ORDER BY id_kursus DESC
                                        ");
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
    }
    elseif ($ingin=="event") 
    {
        
    
        $y = $crud->tampilId("event", "id_event", $idian);

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

            echo
            "
            <section>
                <div class='container' style='margin-top: 100px;'>
            
                
            
                <h2 class='display-4' style='padding: 40px; padding-bottom:0px; text-align:center;'>
                $nama
                </h2>
                <div class='row'>
                    <div class='col-lg-6'>
                        <div class='p-5'>
                            <img class='img-fluid' src='$tujuan' alt=''>
                        </div>
                    </div>
                    <div class='col-lg-6' style='padding:50px;'>
                    
                        <!--<h4 class='display-4'>Nama Event</h4>-->

                        $desk

                    </div>
                </div>
                </div>
            
                <div class='container' style='margin: 80px auto; padding: 20px; background-color: gainsboro; width:50%;'>
                <table width='80%' align='center' border='0'>
                    <tr>
                    <td width='40%'>Lokasi</td>
                    <td>:</td>
                    <td width='47%'>$lokasinya</td>
                    </tr>
                    <tr>
                    <td width='40%'>Vanue</td>
                    <td>:</td>
                    <td width='47%'>$vanue</td>
                    </tr>
                    <tr>
                    <td width='40%'>Waktu Pelaksanaan</td>
                    <td>:</td>
                    <td width='47%'>$waktu</td>
                    </tr>
                    <tr>
                    <td width='40%'>Kuota Peserta</td>
                    <td>:</td>
                    <td width='47%'>$kuota Orang</td>
                    </tr>
                    <tr>
                    <td width='40%'>Biaya</td>
                    <td>:</td>
                    <td width='47%'>
                        <h3>$biaya</h3>
                    </td>
                    </tr>
                </table>
            
                <center>
                ";
        ?>
            
                    <?php
                    $isiTrans = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$idian' AND keterangan='Ok'");
                    $cekHitung= $crud->hitungData($isiTrans);
            
                    if ($cekHitung==$kuota) 
                    {
                        $arahin=
                        "
                        <h2>Maaf, Kuota sudah Penuh</h2>
                        ";
                    } 
                    else 
                    {
                        
            
                        if (empty($iduser)) 
                        {
                        
                        $arahin=
                        "
                        
                        <p>Untuk mengikuti Event ini, anda harus terdaftar sebagai Member.</p>
                        
                        <a href='#' class='btn btn-primary btn-lg'>
                            DAFTAR SEBAGAI MEMBER
                        </a>
                        ";
                        }
                        else
                        {
                        $cekTrans = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE id_event='$idian' AND id_user='$iduser' AND keterangan='Ok'");
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
                            <a href='#' class='btn btn-primary btn-lg'>
                            DAFTAR EVENT
                            </a>
                            ";
                        }
                        
                        
                        }
                    }
                    
            
                    echo "<p>$arahin</p>";
                    
            echo"
                </center>
                </div>
            </section>
            ";
        }
    }
    else 
    {
       echo
       "
        <section style='padding:100px;'>
            <div class='container' style='padding:50px;'>
                <center>
                    <h1>Maaf, preview tidak tersedia</h1>
                    
                </center>
            </div>
        </section>
       ";
    }
    

?>

<?php

    include './fungsional/konfig/footer.php';

?>