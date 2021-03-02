 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Pilar</h1>
         
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Pilar</h6>
                 </div>

                 <div class="card-body">
                     
                    <a class='btn btn-primary' href='?hal=pilar-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM pilar 
                                                        INNER JOIN kelas ON kelas.id_kelas = pilar.id_kelas
                                                        ORDER BY id_pilar DESC");
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
                                <table class='table table-bordered table-hover table-striped' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pilar</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Pelajaran</th>
                                            

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            ";

                           // $tampilin = $isi->tampilData("user");

                            $no=1;
                            foreach($perintah as $a)
                            {
                                $idpil = $a['id_pilar'];
                                $nama  = $a['nama_pilar'];
                                //$foto  = $a['foto_pilar'];
                                $kelas = $a['nama_kelas'];
                                

                                
                                

                                //$kondisi = $a['kondisi'];
                                
                                
                                $pel = $isi->eksekusiSQl("SELECT *FROM kursus WHERE id_pilar='$idpil'");
                                $hit = $isi->hitungData($pel);
                                /*
                                if ($foto=="Kosong") 
                                {
                                    $gambar = "<img src='../img/nofoto.png' width='35' height='35'>";
                                } 
                                else 
                                {
                                    $tujuan = "../foto/$foto";
                                    $gambar = 
                                    "   <a data-fancybox='$nama' href='$tujuan' data-caption='$nama'>
                                            <img src='$tujuan' width='35' height='35'>
                                        </a>
                                    ";
                                }
                                

                                if ($kondisi=='DRAFT') 
                                {
                                    $warna ="gainsboro";
                                }
                                else
                                {
                                    $warna = "white";
                                }
                                */


                                if($hit==0)
                                {
                                    $kursus = "Belum ada";
                                }
                                else
                                {
                                    
                                    $kursus = "<a href='?hal=kursus-kelas&idk=$idpil'>$hit Pelajaran</a>";
                                }

                                
                                echo
                                "
                                    
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                
                                                $nama
                                                
                                            </td>

                                            <td>
                                                <center>
                                                    $kelas
                                                </center>
                                            </td>
                                           
                                            <td>
                                                <center>
                                                    $kursus
                                                </center>
                                            </td>
                                            
                                            <td>
                                                <center>
                                                    <a class='btn btn-success btn-sm' target='_blank' href='../index.php?hal=preview&view=$idpil&target=pilar'>View</a>
                                                    <a class='btn btn-warning btn-sm' href='?hal=pilar-edit&idp=$idpil&mau=edit'>Edit</a>
                                                    <a class='btn btn-danger btn-sm' onclick='return hapus()' href='?hal=pilar-respon&idp=$idpil'>Hapus</a>
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