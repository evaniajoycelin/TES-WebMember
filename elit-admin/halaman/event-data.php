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
                     
                    <a class='btn btn-primary' href='?hal=event-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM event 
                                        INNER JOIN 
                                        user ON user.id_user = event.id_user
                                        ORDER BY event.id_event DESC");
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
                                            <th>Foto</th>
                                            <th>Nama Event</th>
                                            <th>Jumlah Peserta</th>
                                            <th>Tanggal Posting</th>
                                            <th>Penulis</th>
                                
                                            <th>Aksi</th>
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
                                
                                $tanggal = date('d F Y', strtotime($tgl));
                                

                                if ($foto=="Kosong") 
                                {
                                    $gambar = "<img src='../img/nofoto.png' width='50' height='50'>";
                                } 
                                else 
                                {
                                    $tujuan = "../foto/event/$foto";
                                    $gambar = 
                                    "   <a data-fancybox='$nama' href='$tujuan' data-caption='$nama'>
                                            <img src='$tujuan' width='50' height='50'>
                                        </a>
                                    ";
                                }


                                $daftarE = $isi->eksekusiSQL("SELECT *FROM event_daftar WHERE id_event='$idev'");
                                $hitungE = $isi->hitungData($daftarE);

                                if ($hitungE==0) 
                                {
                                    $ikutEvent = "Belum ada peserta";
                                }
                                else
                                {
                                    $ikutEvent = 
                                    "
                                    <a href='?hal=event-daftar&idven=$idev'>$hitungE peserta</a>
                                    ";
                                }

                                
                 
                                
                                echo
                                "
                                   
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                <center>
                                                    $gambar 
                                                </center>
                                            </td>
                                            <td>$nama</td>
                                            <td>
                                                <center>
                                                    $ikutEvent
                                                </center>
                                            </td>
                                            <td align='center'>$tanggal</td>
                                            <td align='center'>$autor</td>
                                            
                                            
                                            <td>
                                                <center>
                                                    <a class='btn btn-success btn-sm' target='_blank' href='../index.php?hal=preview&view=$idev&target=event'>View</a>
                                                    <a class='btn btn-warning btn-sm' href='?hal=event-edit&ide=$idev&mau=edit&f=$foto'>Edit</a>
                                                    <a class='btn btn-danger btn-sm' onclick='return hapus()' href='?hal=event-respon&ide=$idev&mau=hapus'>Hapus</a>
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
