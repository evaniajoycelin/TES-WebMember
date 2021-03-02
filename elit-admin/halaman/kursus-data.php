 
 
 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Kursus</h1>

     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Kursus</h6>
                 </div>

                 <div class="card-body">
                     
                    <a class='btn btn-primary' href='?hal=kursus-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM kursus 
                                                            INNER JOIN pilar ON pilar.id_pilar = kursus.id_pilar 
                                                            INNER JOIN kelas ON kelas.id_kelas = pilar.id_kelas 
                                                            INNER JOIN paket_member ON paket_member.id_paket = kursus.id_paket 
                                                        

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
                                <table class='table table-bordered table-striped table-hover' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Video</th>
                                            <th>Nama Kursus</th>
                                            <th>Nama Paket</th>
                                            <th>Kelas</th>
                                            <th>Pilar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            ";

                           // $tampilin = $isi->tampilData("user");

                            $no=1;
                            foreach($perintah as $a)
                            {
                                $nama = $a['nama_kursus'];
                               //$link = $a['link_video'];
                                
                                $idk  = $a['id_kursus'];
                                $napak= $a['nama_paket'];
                                $namak= $a['nama_kelas'];
                                $namap= $a['nama_pilar'];

                                $foto = $a['foto_kursus'];


                                
                                    $tamnel ="../foto/kursus/$foto";
                                    $lokfile= $tamnel;
                               


                                

            
                                
                 
                                
                                echo
                                "
                                   
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                <center>
                                                    <a data-caption='$nama' data-fancybox href='$lokfile'>
                                                        <img src='$tamnel' width='100' height='70'>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>$nama</td>
                                            <td>$napak</td>
                                           
                                            <td align='center'>$namak</td>
                                            <td>$namap</td>
                                            
                                            <td>
                                                <center>
                                                    <a class='btn btn-success btn-sm' target='_blank' href='../index.php?hal=preview&view=$idk&target=course'>View</a>
                                                    <a class='btn btn-warning btn-sm' href='?hal=kursus-edit&ide=$idk&mau=edit&f=$foto'>Edit</a>
                                                    <a class='btn btn-danger btn-sm' onclick='return hapus()' href='?hal=kursus-respon&ide=$idk&mau=hapus&ft=$foto'>Hapus</a>
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