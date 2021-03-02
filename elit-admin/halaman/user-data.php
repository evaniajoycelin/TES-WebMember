 <!-- Begin Page Content -->
 <div class="container-fluid teks12">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Administrator</h1>

     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Administrator</h6>
                 </div>

                 <div class="card-body">
                     <a class='btn btn-primary' href='?hal=user-tambah&untuk=admin'>Tambah</a>
                     <br><br>

                     <?php

                        //$idm = @$_GET['idm'];

                        
                            $perintah = $isi->eksekusiSQl("SELECT *FROM user 

                                
                            
                                WHERE hak_akses='Administrator'  ORDER BY id_user DESC");
                        


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
                                            
                                            
                                            <td>
    

                                                <center>
                                                    <div class='btn-group' role='group'>
                                                        <button id='aksi' type='button' class='btn btn-secondary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        Aksi
                                                        </button>
                                                        <div class='dropdown-menu bg-success' aria-labelledby='aksi'>
                         
                                                            <a class='dropdown-item' href='?hal=member-edit&id=$ius&mau=edit&untuk=admin'>Edit</a>
                                                            <a class='dropdown-item' href='?hal=member-respon&id=$ius&mau=hapus&untuk=admin&f=$foto'>Hapus</a>
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
 
