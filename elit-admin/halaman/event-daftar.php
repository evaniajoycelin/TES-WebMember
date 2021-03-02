 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Event</h1>
         
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Event</h6>
                 </div>

                 <div class="card-body">
                     
                    <a class='btn btn-primary' href='?hal=event-data'>Kembali</a>
                    <br><br>
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
                           <div class='table-responsive table-hover'>
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Event</th>
                                            <th>Member yang Ikut</th>
                                            <th>Aksi</th>
                                
                                            
                                        </tr>
                                    </thead>
                                    <tbody class='table-striped'>
                            ";

                           // $tampilin = $isi->tampilData("user");

                            $no=1;
                            foreach($perintah as $a)
                            {
                                $idaf = $a['id_daftar'];
                                $nama = $a['nama_event'];
                                $foto = $a['foto_event'];
                                $tgl  = $a['tanggal_post'];
                                $autor= $a['nama_user'];
                                $idev = $a['id_event'];


                                $fotoUs = $a['foto'];
                                
                                $tanggal = date('d F Y', strtotime($tgl));
                                

                                if ($foto=="Kosong") 
                                {
                                    $gambar = "<img src='../img/nofoto.png' width='50' height='50'>";
                                    $UserFoto = "<img src='../img/nofoto.png' width='50' height='50'>";
                                } 
                                else 
                                {
                                    $tujuan = "../foto/event/$foto";
                                    $goalUser = "../foto/user/$fotoUs";
                                    $gambar = 
                                    "   <a data-fancybox='' href='$tujuan' data-caption='$nama'>
                                            <img src='$tujuan' width='50' height='50'>
                                        </a>
                                    ";
                                    $UserFoto = 
                                    "   <a data-fancybox='' href='$goalUser' data-caption='$autor - $nama'>
                                            <img src='$goalUser' width='50' height='50'>
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

                                            <td>
                                                <center>
                                                    <a class='btn btn-danger' href='?hal=event-respon&mau=hapusmember&id=$idaf'>Hapus</a>
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
