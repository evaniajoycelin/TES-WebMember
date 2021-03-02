<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-danny fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="./img/LogoPutih.png" alt="" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                    <a class="nav-link" href="?hal=event">Event</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?hal=course">Course</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?hal=cooming-soon">Forum</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?hal=cooming-soon">Community</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?hal=akun-profile">
                    <img title="<?php echo $namauser; ?>" src="<?php echo $gambar; ?>" style="margin-left: 5px;" width="30" height="30" class="rounded-circle">
                    </a>
                </li>
                
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <?php
                            $notifTransaksi = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE 
                            id_user='$userId' AND baca_member='Belum dibaca' AND keterangan='Sedang diproses' ORDER BY id_transaksi DESC");

                           
                            
                            $transUdah = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE 
                            id_user='$userId' AND baca_member='Belum dibaca' AND keterangan='Ok' ORDER BY id_transaksi DESC");

                            $transAbis = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE 
                            id_user='$userId' AND baca_member='Belum dibaca' AND keterangan='Expired' ORDER BY id_transaksi DESC");

                            $hitungTransaksi = $crud->hitungData($notifTransaksi);
                            $hitungUdah = $crud->hitungData($transUdah);
                            $hitungAbis = $crud->hitungData($transAbis);


                            $TotalTrans = $hitungTransaksi + $hitungUdah + $hitungAbis;
                            $angkaNotif = notifikasi($TotalTrans);
                        ?>
                       <?php echo $angkaNotif; ?>

                    </a>
                    <div style="background-color: black;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <font color="white">
                        <?php

                            
                                



                                if ($hitungTransaksi>0) 
                                {
                                    foreach($notifTransaksi as $k)
                                    {
                                        $keter = $k['keterangan'];
                                        $idev  = $k['id_event'];
                                        $ipak  = $k['id_paket'];
                                        $idt   = $k['id_transaksi'];

                                        if ($keter='Sedang diproses') 
                                        {
                                            if ($idev==NULL) 
                                            {
                                                $p = "Transaksi Paket";
                                            } 
                                            else 
                                            {
                                                $p = "Transaksi Event";
                                            }
                                            
                                            $katanya = "$p Sedang diproses";
                                            
                                        } 
                                        else 
                                        {
                                            if ($idev==NULL) 
                                            {
                                                $p = "Transaksi Paket";
                                            } 
                                            else 
                                            {
                                                $p = "Transaksi Event";
                                            }
                                            
                                            $katanya = "$p Sudah diproses";
                                        }

                                        $pesanTransaksi = $katanya;
                                        $angkaTransaksi = $hitungTransaksi;
                                        $linkTrans = "?hal=akun-respon&mode=dibaca&t=$idt";
                                        echo
                                        "
                                        <a class='dropdown-item text-light' href='$linkTrans'>$pesanTransaksi</a>
                                        ";
                                        
                                    }

                                    
                                }
                                else
                                {
                                    $pesanTransaksi = "Belum ada Transaksi";
                                    $angkaTransaksi ="";
                                    $linkTrans = "#";


                                }


                               


                                if ($hitungUdah>0) 
                                {
                                    foreach($transUdah as $z)
                                    {
                                        $keter = $z['keterangan'];
                                        $idev  = $z['id_event'];
                                        $ipak  = $z['id_paket'];
                                        $idt   = $z['id_transaksi'];

                                        if ($keter='Sedang diproses') 
                                        {
                                            if ($idev==NULL) 
                                            {
                                                $p = "Transaksi Paket";
                                            } 
                                            else 
                                            {
                                                $p = "Transaksi Event";
                                            }
                                            
                                            $katanya = "$p Sedang diproses";
                                            
                                        } 
                                        else 
                                        {
                                            if ($idev==NULL) 
                                            {
                                                $p = "Transaksi Paket";
                                            } 
                                            else 
                                            {
                                                $p = "Transaksi Event";
                                            }
                                            
                                            $katanya = "$p Sudah diproses";
                                        }

                                        $pesanUdah = $katanya;
                                        $angkaUdah = $hitungUdah;
                                        $linkUdah = "?hal=akun-respon&mode=dibaca&t=$idt";
                                        echo
                                        "
                                        <a class='dropdown-item text-light' href='$linkUdah'>$pesanUdah</a>
                                        ";
                                        
                                    }

                                    
                                }
                                else
                                {
                                    $pesanTransaksi = "Belum ada Transaksi";
                                    $angkaTransaksi ="";
                                    $linkTrans = "#";

                                    
                                }

                                if ($hitungAbis>0) 
                                {
                                    foreach($transAbis as $z)
                                    {
                                        $keter = $z['keterangan'];
                                        $idev  = $z['id_event'];
                                        $ipak  = $z['id_paket'];
                                        $idt   = $z['id_transaksi'];

                                       
                                            if ($idev==NULL) 
                                            {
                                                $pak = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket ='$ipak'");
                                                foreach ($pak as $ket) 
                                                {
                                                    $namaPak = $ket['nama_paket'];
                                                }

                                                $p = "$namaPak sudah habis";
                                            } 
                                           
                                          //  $katanya = "$p Sedang diproses";
                                            
                                        
                                       

                                        $pesanAbis = $p;
                                        $angkaUdah = $hitungUdah;
                                        $linkUdah = "?hal=akun-respon&mode=dibaca&t=$idt";
                                        echo
                                        "
                                        <a class='dropdown-item text-light' href='$linkUdah'>$pesanAbis</a>
                                        ";
                                        
                                    }

                                    
                                }
                                else
                                {
                                    $pesanTransaksi = "Belum ada Transaksi";
                                    $angkaTransaksi ="";
                                    $linkTrans = "#";

                                    
                                }


                                if ($TotalTrans==0) 
                                {
                                    echo
                                    "
                                        <a class='dropdown-item text-light' href='#'>Belum ada Transaksi</a>
                                    ";
                                } 
                               
                            
                            

                        ?>
                       
                        </font>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="?hal=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="pesan">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis quasi laboriosam quam sit quis excepturi, aliquam doloremque repudiandae sunt ipsam consectetur ipsa! Veritatis, deserunt culpa repellendus qui veniam nihil numquam!</p>
</div>

