 <?php

    $mau = @$_GET['mau'];

    if ($mau=="belumproses") 
    {
        $kondisi = "WHERE keterangan='Sedang diproses'";
        $headJudul = "Transaksi belum diproses";
    }
    elseif($mau=="sudahproses")
    {
        $kondisi = "WHERE keterangan='Ok'";
        $headJudul = "Transaksi sudah diproses";
    }
    elseif($mau=="expired")
    {
        $kondisi = "WHERE keterangan='Expired'";
        $headJudul = "Transaksi sudah Expired";
    }
    else
    {
        $kondisi ="";
        $headJudul = "Semua Data Transaksi";
    }

 ?>
 
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>

     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary"><?php echo $headJudul; ?></h6>
                 </div>

                 <div class="card-body">
                     
                    
                    <br><br>
                     <?php

                        
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM 
                                                       transaksi
                                                       INNER JOIN user ON
                                                                transaksi.id_user = user.id_user
                                                                $kondisi
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
                          
                           <div class='table-responsive'>
                                <table class='table table-bordered table-hover' id='dataTable' width='100%' cellspacing='0' style='font-size:14px;'>
                                    <thead class='bg-dark text-white'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Transaksi</th>
                                            <th>Biaya Transaksi</th>
                                            <th>No. Rekening</th>
                                            <th>Pemilik Rekening</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
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
                               $norek     = $key['no_rek'];
                               $narek     = $key['nama_rekening'];
                               $tgl       = $key['tgl_transaksi'];
                               $iduser    = $key['id_user'];
                               $nmuser    = $key['nama_user'];
                               $foto      = $key['foto_struk'];

                               $idpaket   = $key['id_paket'];
                               $idevent   = $key['id_event'];

                               $ket       = $key['keterangan'];

                               $idtrans   = $key['id_transaksi'];
                               $masa_aktif= $key['tgl_berakhir'];


                               if ($masa_aktif==NULL) 
                               {
                                   $ketGl = "Tidak ada";
                                   
                               }
                               else
                               {
                                   $ketGl = tglBalik($masa_aktif);
                                  
                               }

                               if ($idevent==NULL) 
                               {
                                   $idev = "Kosong";
                               } 
                               else 
                               {
                                   $idev = $idevent;
                               }
                               

                               if ($foto=='Kosong') 
                                {
                                    $gambar = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'>";
                                } 
                                else 
                                {
                                    $tujuan = "../foto/struk/$foto";
                                    $gambar = 
                                    "   <a data-fancybox='gallery$nmuser' href='$tujuan' data-caption='$nmuser - $namatrans'>
                                            <img src='$tujuan' width='50' height='50'>
                                        </a>
                                    ";
                                }

                                if ($idpaket==NULL) 
                               {
                                  $idT = $idevent;
                                  $ingin='event';
                               }
                               else
                               {
                                   $idT = $idpaket;
                                   $ingin='paket';

                                   $cariPaketnya = $isi->eksekusiSQL("SELECT *FROM transaksi
                                                                        INNER JOIN paket_member ON transaksi.id_paket=paket_member.id_paket
                                                                        WHERE paket_member.nama_paket !='Free User'
                                                                        ");
                                   $hitungPaket  = $isi->hitungData($cariPaketnya);

                                   if ($hitungPaket==0) 
                                   {
                                       $direkFree = "&kembali-user=free";
                                       $tombolHapus = "<a class='dropdown-item bg-danger text-white' 
                                                        href=
                                                        '?hal=transaksi-respon$direkFree&id=$idtrans&mau=hapus&f=$foto&ingin=$ingin&idu=$iduser'>
                                                        Hapus</a>";
                                    } 
                                   else 
                                   {
                                       $direkFree = "";
                                       $tombolHapus = "";
                                    }
                                   


                               }

                               if ($ket=="Ok") 
                               {
                                   $isiKet="<span class='badge badge-success'>$ket</span>";
                                   $linkOK = "";
                               } 
                               elseif($ket=='Sedang diproses')
                               {
                                   $isiKet="<span class='badge badge-warning'>$ket</span>";
                                   $linkOK="<a class='dropdown-item bg-success text-white' href='?hal=transaksi-respon&id=$idtrans&mau=ok&ingin=$ingin&idt=$idT&idev=$idev&idus=$iduser'>Ok</a>";
                               }
                               else
                               {
                                    $linkOK = "";
                                   $isiKet="<span class='badge badge-danger'>$ket</span>";
                               }
                               
                              

                               $tanggal   = date("d F Y", strtotime($tgl));

                               $biaya = "Rp ".formatRupiah($harga).",-";

                               $tagl = date('Y-m-d');

                              // $t = $masa_aktif->date_diff($tagl);\

                              if ($ket!='Expired') 
                              {
                                if ($tagl>$masa_aktif) 
                                {
                                   $tegel = "Udah Lewat";
                                   $isian = "keterangan = 'Expired', baca_member='Belum dibaca'";
                                   $updateAktif = $isi->ubahData("transaksi", $isian, "id_transaksi", $idtrans);
 
                                   if (!empty($idpaket)) 
                                   {
                                     $carPak = $isi->eksekusiSQL("SELECT *FROM paket_member WHERE nama_paket='Free User'");
                                     foreach ($carPak as $k) 
                                     {
                                       $idPak = $k['id_paket'];
                                     }
                                     
                                     $isinya = "id_paket='$idPak'";
   
                                     $userStus = $isi->ubahData("user_status", $isinya, "id_user", $iduser);
                                   }
 
                                } 
                                else 
                                {
                                   $tegel = "Belom bro";
                                }
                              }
                             

                             
                               
                               echo
                               "
                                   <tr>
                                       <td align='center'>$no</td>
                                       <td>
                                        $gambar <b><a href='?hal=member-data&idm=$iduser'>$nmuser</a></b> <br>
                                        $namatrans
                                       </td>
                                       <td>$biaya</td>
                                       <td>
                                           <center>
                                               
                                               $norek
                                               
                                           </center>
                                       </td>
                                       <td>$narek</td>
                                       <td>$tanggal</td>
                                       <td>$ketGl</td>
                                       <td>
                                           <center>
                                               $isiKet
                                           </center>
                                       </td>
                                       <td>
                                            <center>
                                                <div class='btn-group' role='group'>
                                                    <button id='aksi' type='button' class='btn btn-secondary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Aksi
                                                    </button>
                                                    <div class='dropdown-menu' aria-labelledby='aksi'>
                                                       $linkOK
                                                        <a class='dropdown-item bg-danger text-white' href='?hal=transaksi-respon&id=$idtrans&mau=hapus&f=$foto&ingin=$ingin&idu=$iduser'>Hapus</a>
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

 