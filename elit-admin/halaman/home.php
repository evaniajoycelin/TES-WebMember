 <?php

    //Jajandulu

    function angkaDashboard($v, $kata)
    {
        echo
            "
         <div class='h5 mb-0 font-weight-bold text-gray-800'>$v $kata</div>
        ";
    }

    ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

     </div>


     <!-- Content Row -->
     <div class="row">

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Member Baru</div>
                             <?php
                                $member = $isi->eksekusiSQL("SELECT *FROM user WHERE hak_akses='Member' ORDER BY id_user DESC LIMIT 5");

                                $hitungMember = $isi->hitungData($member);

                                if ($hitungMember == 0) {
                                    angkaDashboard("Belum ada", "beberapa saat ini");
                                } else {
                                    angkaDashboard($hitungMember, "Member baru");
                                }
                             ?>

                         </div>
                         <div class="col-auto">
                             <!--<i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                             <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi</div>
                             <?php
                                $transaksi = $isi->eksekusiSQL("SELECT *FROM transaksi");

                                $hitungtransaksi = $isi->hitungData($transaksi);

                                if ($hitungtransaksi == 0) {
                                    angkaDashboard("Belum ada", "beberapa saat ini");
                                } else {
                                    angkaDashboard($hitungtransaksi, "transaksi baru");
                                }
                                ?>
                         </div>
                         <div class="col-auto">
                             <!--<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>-->
                             <i class="fas fa-money-bill   fa-2x text-gray-300 "></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesan Kontak</div>
                             <?php
                                $kontak = $isi->eksekusiSQL("SELECT *FROM kontak_kami");

                                $hitungKontak = $isi->hitungData($kontak);

                                if ($hitungKontak == 0) {
                                    angkaDashboard("Belum ada", "beberapa saat ini");
                                } else {
                                    angkaDashboard($hitungKontak, "pesan baru");
                                }
                                ?>
                         </div>
                         <div class="col-auto">
                             <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
             <div class="card border-left-warning shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Member</div>
                             <?php
                                $memberAll = $isi->eksekusiSQL("SELECT *FROM user WHERE hak_akses='Member'");

                                $hitungMemberAll = $isi->hitungData($memberAll);

                                if ($hitungMemberAll == 0) {
                                    angkaDashboard("Belum ada", "beberapa saat ini");
                                } else {
                                    angkaDashboard($hitungMemberAll, "Member");
                                }
                            ?>
                         </div>
                         <div class="col-auto">
                             <i class="fa fa-user-circle fa-2x text-gray-300" aria-hidden="true"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--batas-------------------------------------------------------------->


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-8 col-lg-7">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     
                 <?php
                
                    $perintah = $isi->eksekusiSQl("SELECT *FROM 
                                                transaksi
                                                INNER JOIN user ON
                                                            transaksi.id_user = user.id_user
                                                WHERE baca_admin='Belum dibaca'
                                                ORDER BY id_transaksi DESC
                                                ");
                    $hitung   = $isi->hitungData($perintah);

                    if ($hitung==0) 
                    {
                        pesanKosong();
                    }
                    else
                    {
                    echo
                    "
                    <a href='?hal=transaksi-data' class='btn btn-primary btn-sm'>Lihat Semua Transaksi</a>
                    <br><br>
                    <div class='table-responsive'>
                            <table class='table table-hover' width='100%' cellspacing='0' style='font-size:12px;'>
                                <thead class='bg-dark text-white'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Transaksi</th>
                                        <th>Biaya Transaksi</th>   
                                        <th>Tanggal Transaksi</th>
                                        <th>Member</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class='table-striped'>
                        ";

                    // $tampilin = $isi->tampilData("user");

                    $no=1;
                    foreach ($perintah as $key) 
                    {
                        $namatrans = $key['nama_transaksi'];
                        $harga     = $key['biaya_transaksi'];
                       
                        $tgl       = $key['tgl_transaksi'];
                        $iduser    = $key['id_user'];
                        $nmuser    = $key['nama_user'];
                        $foto      = $key['foto_struk'];

                       
                        $idtrans   = $key['id_transaksi'];
                        $masa_aktif= $key['tgl_berakhir'];


                        $tgT = tglBalik($tgl);


                       

            
                        $tanggal   = date("d F Y, h:i", strtotime($tgl));

                        $biaya = "Rp ".formatRupiah($harga).",-";
                        
                        echo
                        "
                            <tr>
                                <td align='center'>$no</td>
                                <td>
                                    
                                    $namatrans
                                </td>
                                <td>$biaya</td>
                              
                                <td>$tgT</td>
                                <td>$nmuser</td>
                                
                                
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

             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Pendaftar Event</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                 
                 
                 <?php
                
                    $perintah = $isi->eksekusiSQl("SELECT *FROM event_daftar 
                                    INNER JOIN 
                                    user ON user.id_user = event_daftar.id_user
                                    INNER JOIN 
                                    event ON event.id_event = event_daftar.id_event
                                    ORDER BY event_daftar.id_daftar DESC");
                    $hitung   = $isi->hitungData($perintah);

                    if ($hitung==0) 
                    {
                        pesanKosong();
                    }
                    else
                    {
                    echo
                    "
                    <a href='?hal=event-data' class='btn btn-primary btn-sm'>Lihat Semua Event</a>
                    <br><br>
                    <div class='table-responsive table-hover'>
                            <table class='table table-bordered' width='100%' cellspacing='0'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Event</th>
                                        <th>Member yang Ikut</th>
                                    
                            
                                        
                                    </tr>
                                </thead>
                                <tbody class='table-striped'>
                        ";

                    // $tampilin = $isi->tampilData("user");

                        $no=1;
                        foreach($perintah as $a)
                        {
                            $nama = $a['nama_event'];
                            $foto = $a['foto_event'];
                            $tgl  = $a['tanggal_post'];
                            $autor= $a['nama_user'];
                            $idev = $a['id_event'];


                            $fotoUs = $a['foto'];
                            
                            $tanggal = date('d F Y', strtotime($tgl));

                            if ($fotoUs=='Kosong') 
                            {
                                $UserFoto = "<img src='../img/nofoto.png' width='50' height='50'>";
                            }
                            else
                            {
                                $goalUser = "../foto/user/$fotoUs";
                                $UserFoto = 
                                "   <a data-fancybox href='$goalUser' data-caption='$autor - $nama'>
                                        <img src='$goalUser' width='50' height='50'>
                                    </a>
                                ";
                            }
                            

                            if ($foto=="Kosong") 
                            {
                                $gambar = "<img src='../img/nofoto.png' width='50' height='50'>";
                                
                            } 
                            else 
                            {
                                $tujuan = "../foto/event/$foto";
                                
                                $gambar = 
                                "   <a data-fancybox href='$tujuan' data-caption='$nama'>
                                        <img src='$tujuan' width='50' height='50'>
                                    </a>
                                ";
                               
                            }


                            

                            
            
                            
                            echo
                            "
                            
                                    <tr>
                                        <td align='center'>$no</td>
                                        <td>
                                            <center>
                                                $gambar <br>
                                                $nama
                                            </center>
                                        </td>
                                        
                                    
                                        <td>
                                            <center>
                                                $UserFoto <br>
                                                $autor
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

         <!-- Pie Chart -->
         <div class="col-xl-4 col-lg-5">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Member Keseluruhan</h6>

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
                                    <div class='row g-0'>
                                    <div class='col-md-5'>
                                        $box
                                    </div>
                                    <div class='col-md-7'>
                                        <div class='card-body'>
                                        <h5 class='card-title'>$namaPaket</h5>
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