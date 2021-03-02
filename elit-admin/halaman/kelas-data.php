 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Kelas</h1>
         
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Kelas</h6>
                 </div>

                 <div class="card-body">
                     
                    <a class='btn btn-primary' href='?hal=kelas-tambah'>Tambah</a>
                    <br><br>
                     <?php
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM kelas");
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
                                            <th>Nama Kelas</th>
                                            
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
                                $idkel = $a['id_kelas'];
                                $nama  = $a['nama_kelas'];
                                $foto  = $a['foto_kelas'];
                                

                                
                                

                                $kondisi = $a['kondisi'];
                                
                                
                                $pel = $isi->eksekusiSQl("SELECT *FROM kursus 
                                                INNER JOIN pilar ON
                                                pilar.id_pilar = kursus.id_pilar
                                                INNER JOIN kelas ON
                                                kelas.id_kelas = pilar.id_kelas
                                                WHERE kelas.id_kelas='$idkel'");
                                $hit = $isi->hitungData($pel);

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


                                if($hit>0)
                                {
                                    $kursus = "<a href='?hal=kursus-kelas&idk=$idkel'>$hit Pelajaran</a>";
                                }
                                else
                                {
                                    $kursus = "Belum ada";
                                }
                                
                                echo
                                "
                                    
                                        <tr style='background-color:$warna;'>
                                            <td align='center'>$no</td>
                                            <td>
                                                <center>
                                                    $gambar <br>
                                                    $nama 
                                                </center>
                                            </td>
                                           
                                            <td>
                                                <center>
                                                    $kursus 
                                                </center>
                                            </td>
                                            
                                            <td>
                                                <center>
                                                <a class='btn btn-success btn-sm' target='_blank' href='../index.php?hal=preview&view=$idkel&target=kelas'>View</a>
                                                    <a class='btn btn-warning btn-sm' href='?hal=kelas-edit&ide=$idkel&mau=edit&f=$foto'>Edit</a>
                                                    <a class='btn btn-danger btn-sm' onclick='return hapus()' href='?hal=kelas-respon&ide=$idkel&mau=hapus&f=$foto'>Hapus</a>
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