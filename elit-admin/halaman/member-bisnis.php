 <?php
    $idser    = @$_GET['idbis'];

    if (empty($idser)) 
    {
        $que="SELECT *FROM user_preneur 
                                    INNER JOIN user ON user.id_user=user_preneur.id_user
                                    INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
                                    ORDER BY user_preneur.id_userpreneur DESC";

       
        $namaSer = "Data Semua Member";
    } 
    else 
    {
        $que = "SELECT *FROM user_preneur 
        INNER JOIN user ON user.id_user=user_preneur.id_user
        INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
        WHERE user_preneur.id_user='$idser'
        ORDER BY user_preneur.id_userpreneur DESC";  
        
        
    
        $sercar = $isi->eksekusiSQL("SELECT *FROM user WHERE id_user='$idser'");

        foreach ($sercar as $u) 
        {
            $namaSer = "Bisnis Member - ".$u['nama_user'];
        }
    }
 ?>
 
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Bisnis Member</h1>

     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary"><?php echo $namaSer; ?></h6>
                 </div>

                 <div class="card-body">


                     <?php

                        
                        

                        $perintah = $isi->eksekusiSQl($que);
                        $hitung   = $isi->hitungData($perintah);

                        if ($hitung == 0) {
                            pesanKosong();
                        } else {
                            echo
                            "
                           <div class='table-responsive'>
                                <table style='font-size:12px;' class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Bisnis</th>
                                            
                                            <th>Bidang</th>
                                            <th>Industri</th>
                                            <th>Pemilik</th>
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

                                $fotom   = $a['foto'];


                                $prov = $a['nama_provinsi'];

                                $indus= $a['industri'];


                                $alamatBis = $a['alamat_bisnis'];
                                $emailBis  = $a['email_bisnis'];

                                $telpBis = $a['telp_bisnis'];



                                //$jumset = formatRupiah($omset);

                                if ($foto == "Kosong") {
                                    $imeg = "<img src='../img/nofoto.png' width='100%' height='200'>";
                                } else {
                                    $tujuan = "../foto/bisnismember/$foto";
                                    $gambar =
                                        "  <a href='$tujuan' data-caption='$namaBis' data-fancybox>
                      <img src='$tujuan' width='70' height='70'>
                      </a>
                  ";

                                    $imeg = "<img src='$tujuan' width='100%' height='200'>";
                                }


                                if ($fotom == 'Kosong') {
                                    $gambarm = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'>";
                                    $tujuanm = "../img/nofoto.png";
                                } else {
                                    $tujuanm = "../foto/user/$fotom";
                                    $gambarm =
                                        "   <a data-fancybox href='$tujuan' data-caption='$namaBis'>
                                            <img class='rounded-circle' src='$tujuan' width='50' height='50'>
                                        </a>
                                    ";
                                }

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
                                        <h2>$namaBis</h2>
                           
                                        <br>
                           
                           
                                        
                                       <h5>Deskripsi Usaha:</h5>
                           
                                       <p>
                                       $deskrip
                                       </p>
                                   
                                       
                           
                                    </div>
                                </div>
                           
                                
                           
                                  
                           
                           
                                  
                           
                              
                           
                               <hr>
                               <h5>Profil Bisnis:</h5>
                           
                               <p>Bergerak di Bidang $bidang</p>
                               <p>Berdiri sejak $tahun</p>
                               <p>
                               Omset Bulanan : $omset
                               </p>
                           
                             <p>
                               Jumlah Karyawan : $jumkar
                             </p>
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



                                echo
                                "
                                    <tbody>
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                $namaBis
                                            </td>
                                            
                                            <td>$bidang</td>
                                            <td>$indus</td>
                                            <td>$gambarm $user</td>
                                            
                                            
                                            <td>
    

                                                <center>
                                                    <div class='btn-group' role='group'>
                                                        <button id='aksi' type='button' class='btn btn-secondary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        Aksi
                                                        </button>
                                                        <div class='dropdown-menu' aria-labelledby='aksi'>
                                                            <a class='dropdown-item bg-success text-white' data-fancybox data-src='#bisnis$idUneur'>View</a>
                                                            <a class='dropdown-item bg-danger text-white' href='?hal=member-respon&id=$ius&mau=banned'>Hapus</a>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
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

                        ?>
                 </div>
             </div>



         </div>


     </div>


 </div>
 <!-- /.container-fluid -->

 