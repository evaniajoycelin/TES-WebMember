<?php

    $mau = @$_GET['mau'];


    if ($mau=="semua") 
    {
        $pesan = "Semua Data Kontak";
        $perintah = $isi->eksekusiSQl("SELECT *FROM kontak_kami ORDER BY id_kontak DESC");

    }

?>
 
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Kontak</h1>
 
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Kontak</h6>
                 </div>

                 <div class="card-body">
                    <a class='btn btn-primary' href='?hal=membership-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        
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
                                <table class='table table-bordered table-striped table-hover' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kontak</th>
                                            <th>E-mail</th>
                                            <th>Isi Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                            ";

                            //$tampilin = $isi->tampilData("paket_member");

                            $no=1;
                            foreach($perintah as $a)
                            {
                                $idk       = $a['id_kontak'];
                                $nama      = $a['nama_kontak'];
                                $email     = $a['email'];
                                $deskripsi = $a['deskripsi'];
                               
                                
                                
                                
                 
                                
                                echo
                                "
                                    <tbody>
                                        <tr>
                                            <td align='center'>$no</td>
                                        
                                            <td>$nama</td>
                                            <td>$email</td>
                                            <td>$deskripsi</td>
                                            
                                            
                                            <td>
                                                <center>
                                                    
                                                    <a class='btn btn-danger' href='?hal=kontak-respon&mau=hapus&id=$idk'>Hapus</a>
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