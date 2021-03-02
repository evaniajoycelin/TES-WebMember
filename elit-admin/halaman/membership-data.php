 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Paket Membership</h1>
 
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Paket</h6>
                 </div>

                 <div class="card-body">
                    <a class='btn btn-primary' href='?hal=membership-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM paket_member");
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
                                <table class='table table-bordered table-hover' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Membership</th>
                                            <th>Harga</th>
                                            <th>Jumlah Kelas</th>
                                            <th>Member Terdaftar</th>
                                            <th>Kondisi</th>
                                            <th>Masa Berlaku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                            ";

                            $tampilin = $isi->tampilData("paket_member");

                            $no=1;
                            foreach($tampilin as $a)
                            {
                                $idp    = $a['id_paket'];
                                $nama   = $a['nama_paket'];
                                $harga  = $a['harga_member'];
                                $kondisi= $a['kondisi'];
                                $berlaku= $a['masa_berlaku'];
                                $jumkel = $a['jumlah_kelas'];

                                $foto   = $a['foto_paket'];

                                $memberan = $isi->eksekusiSQL("SELECT *FROM user_status WHERE id_paket='$idp'");

                                $hitmem   = $isi->hitungData($memberan);


                                if ($hitmem==0) 
                                {
                                    $isimem = "Belum ada";
                                } 
                                else 
                                {
                                    $isimem = "
                                    
                                        <a href='?hal=member-paket&idp=$idp'>$hitmem orang</a>
                                    
                                    ";
                                }
                                
                               
                                if ($kondisi=='POSTING') 
                                {
                                    $tampilnya ="<span class='badge badge-primary'>$kondisi</span>";
                                } 
                                else 
                                {
                                    $tampilnya ="<span class='badge badge-secondary'>$kondisi</span>";
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
                                    "   <a data-fancybox='' href='$tujuan' data-caption='$nama'>
                                            <img src='$tujuan' width='50' height='50'>
                                        </a>
                                        <br> <br>
                                    ";
                                    $box = 
                                    "
                                        <center>
                                        <img src='$tujuan' width='70%' height='200'>
                                        </center>
                                        <br>
                                    ";

                                    $hargaRp = "Rp ".formatRupiah($harga).",-";

                                    
                                }
                                
                                
                                
                                
                                echo
                                "
                                    <tbody>
                                        <tr>
                                            <td align='center'>$no</td>
                                        
                                            <td>
                                                <center>
                                                    $gambar
                                                    $nama
                                                </center>
                                            </td>
                                            <td align='center'>$hargaRp</td>
                                            <td align='center'>$jumkel</td>
                                            <td align='center'>
                                                $isimem
                                            </td>
                                            <td align='center'>$tampilnya</td>
                                            <td align='center'>$berlaku</td>
                                            
                                            
                                            <td>
                                                <center>
                                                    <a class='btn btn-warning' href='?hal=membership-edit&id=$idp'>Edit</a>
                                                    <a class='btn btn-danger' href='?hal=membership-respon&mau=hapus&id=$idp'>Hapus</a>
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