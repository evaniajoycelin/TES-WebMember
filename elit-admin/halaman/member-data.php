 <!-- Begin Page Content -->
 <div class="container-fluid teks12">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Member</h1>

     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-9 col-lg-8">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Member</h6>
                 </div>

                 <div class="card-body">
                     <a class='btn btn-primary' href='?hal=member-tambah'>Tambah</a>
                     <br><br>

                     <?php

                        $idm = @$_GET['idm'];

                        if (empty($idm)) {
                            $perintah = $isi->eksekusiSQl("SELECT *FROM user 

                                
                            
                                WHERE hak_akses='Member'  ORDER BY id_user DESC");
                        } else {

                            $perintah = $isi->eksekusiSQl("SELECT *FROM user WHERE 
                                                
                                                hak_akses='Member' AND id_user='$idm'  ORDER BY id_user DESC");
                        }


                        $hitung   = $isi->hitungData($perintah);

                        if ($hitung == 0) {
                            pesanKosong();
                        } else {
                            echo
                            "
                           <div class='table-responsive'>
                                <table style='font-size:12px;' class='table table-bordered table-hover' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama User</th>
                                            <th>Alamat</th>
                                            <th>E-Mail</th>
                                            <th>No. Handphone</th>
                                            <th>Jenis Membership</th>
                                            <th>Bisnis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                            ";



                            $no = 1;
                            foreach ($perintah as $a) {
                                $nama   = $a['nama_user'];
                                $alamat = $a['alamat'];
                                $email  = $a['email'];
                                $nohp   = $a['no_hp'];
                                $foto   = $a['foto'];
                                $hak    = $a['hak_akses'];

                                //$bisnis = $a['nama_bisnis'];

                                $ius    = $a['id_user'];

                                $statusEr = $isi->eksekusiSQl("SELECT *FROM user_status 
                                                            INNER JOIN user ON user_status.id_user = user.id_user
                                                            INNER JOIN paket_member ON user_status.id_paket = paket_member.id_paket 
                                                            WHERE user.id_user='$ius'");
                                foreach ($statusEr as $o) {
                                    $namaPaket = $o['nama_paket'];
                                }

                                $userPreneur = $isi->eksekusiSQL("SELECT *FROM user_preneur 
                                                                    INNER JOIN user ON user.id_user=user_preneur.id_user
                                                                    INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
                                                                    WHERE user.id_user='$ius'");

                                $jumPreneur = $isi->hitungData($userPreneur);

                                if ($jumPreneur == 0) {
                                    $namaBis = "Belum ada";
                                    $usaha = "Belum ada";
                                    $isiUsaha = "<h3>Info Usaha belum diinput</h3>";
                                } else {
                                    
                                    $usaha = "
                                        <a href='?hal=member-bisnis&idbis=$ius'>$jumPreneur usaha</a>
                                    ";
                                    foreach ($userPreneur as $a) {
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

                                        $fotoU   = $a['foto_usaha'];




                                        $prov = $a['nama_provinsi'];


                                        $alamatBis = $a['alamat_bisnis'];
                                        $emailBis  = $a['email_bisnis'];

                                        $telpBis = $a['telp_bisnis'];



                                        //$jumset = formatRupiah($omset);

                                        if ($fotoU == "Kosong") {
                                            $gambarU = "<img src='../img/nofoto.png' width='50' height='50'>";
                                            $imegU = "<img src='../img/nofoto.png' width='100%' height='200'>";
                                        } else {
                                            $tujuanU = "../foto/bisnismember/$fotoU";
                                            $gambarU =
                                                "  <a href='$tujuanU' data-caption='$namaBis' data-fancybox>
                                        <img src='$tujuanU' width='70' height='70'>
                                        </a>
                                    ";

                                            $imegU = "<img src='$tujuanU' width='100%' height='200'>";
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



                                        $isiUsaha =
                                            "
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <center>
                                                        $imegU
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
                                            ";
                                    }
                                }


                                if ($foto == 'Kosong') {
                                    $gambar = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'>";
                                    $tujuan = "../img/nofoto.png";
                                } else {
                                    $tujuan = "../foto/user/$foto";
                                    $gambar =
                                        "   <a data-fancybox href='$tujuan' data-caption='$nama'>
                                            <img class='rounded-circle' src='$tujuan' width='50' height='50'>
                                        </a>
                                    ";
                                }




                                echo
                                "
                                    <tbody>
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                <center>
                                                    $gambar 
                                                    <br> <br>
                                                    <p>$nama</p>
                                                </center>
                                            </td>
                                            <td>$alamat</td>
                                            <td>$email</td>
                                            <td>$nohp</td>
                                            
                                            <td>$namaPaket</td>
                                            <td>$usaha</td>
                                            <td>
    

                                                <center>
                                                    <div class='btn-group' role='group'>
                                                        <button id='aksi' type='button' class='btn btn-secondary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        Aksi
                                                        </button>
                                                        <div class='dropdown-menu bg-success' aria-labelledby='aksi'>
                                                            <a data-fancybox class='dropdown-item' data-src='#member$ius' href='javascript:;'>View</a>
                                                            <a class='dropdown-item' href='?hal=member-edit&id=$ius&mau=edit'>Edit</a>
                                                            <a class='dropdown-item' href='?hal=member-respon&id=$ius&mau=hapus&f=$foto'>Hapus</a>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>

                                    
                                        <div class='container' style='display: none; font-size:14px; width:800px;' id='member$ius'>
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <center>
                                                        <img src='$tujuan' width='100%' height='270'>
                                                    </center>
                                                </div>
                                                <div class='col-md'>
                                                    <h1 class='h3 mb-0 text-gray-800'>Data Member</h1>
                                                    <br>
                                                    <dl>
                                                        <dd><b>Nama Member</b> : $nama</dd>
                                                        <dd><b>Alamat Tinggal</b> : $alamat</dd>
                                                        <dd><b>E-mail</b> : $email</dd>
                                                        <dd><b>No. Handphone</b> : $nohp</dd>
                                                        <dd><b>Status Membership</b> : $namaPaket</dd>
                                                        <dd>
                                                            <a class='btn btn-warning' href='?hal=member-edit&id=$ius&mau=edit'>Edit Profil Member</a>
                                                            <a class='btn btn-danger' href='?hal=member-respon&id=$ius&mau=hapus'>Hapus Member</a>
                                                        </dd>
                                                    </dl>
                        
                                                    
                                                </div>
                                            </div>

                                            <hr>

                                            $isiUsaha

         
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

                        ?>
                 </div>
             </div>



         </div>

         <div class="col-xl-3 col-lg-4">
         <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Member Keseluruhan</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     

                     <?php

                        $membernya = $isi->eksekusiSQl("SELECT *FROM user WHERE hak_akses='Member'");
                        $banmember = $isi->hitungData($membernya);

                    echo
                    "
                        <center>
                            <font size='5'>
                                <b>  <i class='fa fa-users ' aria-hidden='true'></i> $banmember Member</b>
                                
                            </font>
                        </center>
                    ";        

                    ?>

                 </div>
             </div>
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Member Per Paket</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     

                     <?php

                        $paketan = $isi->eksekusiSQl("SELECT *FROM paket_member");
                        $tampilin = $isi->tampilData("paket_member");

                            $no=1;
                            foreach($tampilin as $a)
                            {
                                $idp    = $a['id_paket'];
                                $namaPaket   = $a['nama_paket'];

                                $foto   = $a['foto_paket'];

                                $memberPaket = $isi->eksekusiSQL("SELECT *FROM user_status WHERE id_paket='$idp'");
                                $hitungPaket = $isi->hitungData($memberPaket);

                                if ($hitungPaket==0) 
                                {
                                    $pesanPaket=
                                    "
                                        <p class='card-text'>
                                            Belum ada Member untuk paket ini.
                                        </p>
                                    ";
                                } 
                                else 
                                {
                                    $pesanPaket=
                                    "
                                        <p class='card-text'>
                                            Terdapat <b>$hitungPaket</b> Member.
                                        </p>
                                    ";
                                }
                                



                            
                                

                                if ($foto=='Kosong') 
                                {
                                    $gambar = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'><br> <br>";
                                    $box = "";
                                } 
                                else 
                                {
                                    $tujuan = "../foto/paket/$foto";
                                    $gambar = 
                                    "   <a data-fancybox='' href='$tujuan' data-caption='$namaPaket'>
                                            <img src='$tujuan' width='50' height='50'>
                                        </a>
                                        <br> <br>
                                    ";
                                    $box = 
                                    "
                                        
                                        <center>
                                        
                                        <img src='$tujuan' width='100%' height='70' style='margin-top:15px;'>
                                        </center>
                                        
                                        
                                    ";

                                

                                    
                                }
                                
                                
                                
                                
                                echo
                                "
                                <a href='?hal=member-paket&idp=$idp' class='card mb-3 kartu' style='width: 100%; font-size:12px;'>
                                    
                                    
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-md-5 card-body' style='padding:10px;'>
                                                $box
                                            </div>
                                            <div class='col-md-7' style='padding:10px;'>
                                                <p class='card-title'><b>$namaPaket</b></p>
                                                $pesanPaket

                                            </div>
                                        </div>

                                      
                                    </div>
                                </a>
                                ";
                            // $no++;
                            }

                        ?>

                 </div>
             </div>
         </div>


     </div>


 </div>
 <!-- /.container-fluid -->