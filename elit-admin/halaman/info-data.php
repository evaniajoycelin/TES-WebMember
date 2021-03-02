 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Informasi</h1>
         
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Semua Info</h6>
                 </div>

                 <div class="card-body">
                     

                     <?php

                        $mau = @$_GET['mau'];

                        if ($mau=='tnc') 
                        {
                            $judul = "Term And Condition";
                        }
                        elseif ($mau=='event') 
                        {
                            $judul="Event";
                        }
                        elseif ($mau=='course') 
                        {
                            $judul="Course";
                        }
                        elseif ($mau=='member-info') 
                        {
                            $judul="Membership Info";
                        }
                        elseif ($mau=='home-banner') 
                        {
                            $judul="EliTES Membership";
                        }
                        else
                        {
                            $judul="Kontak Kami";
                        }

                        
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM info 
                                                        INNER JOIN user
                                                            ON user.id_user= info.id_user
                                                        WHERE info.jenis_info='$judul'
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
                           $judul
                           <div class='table-responsive'>
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Foto Thumbnail</th>
                                            <th>Tgl Posting</th>
                                            <th>Penulis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                            ";

                            

                            $no=1;
                            foreach($perintah as $a)
                            {
                                $idinfo= $a['id_info'];
                                $jenis = $a['jenis_info'];
                                $foto  = $a['foto_info'];
                                $tgl   = $a['tgl_info'];
                                $desk  = $a['deskripsi'];


                                $tanggal= tglBalik($tgl);
                                

                                $nus    = $a['nama_user'];

                                if ($foto=='Kosong') 
                                {
                                    $gambar = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'><br> <br>";
                                    $box = "";
                                } 
                                else 
                                {
                                    $tujuan = "../foto/$foto";
                                    $gambar = 
                                    "   <a data-fancybox='gallery' href='$tujuan' data-caption='$jenis'>
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

                                    
                                }

                                
                                if ($judul=="Kontak Kami") 
                                {
                                    $gambar = "";
                                }
                                
                                echo
                                "
                                    <tbody>
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                <center>
                                                    $gambar 
                                                    
                                                    <p>$jenis</p>
                                                </center>
                                            </td>
                                            <td>$tanggal</td>
                                            <td>$nus</td>
                                            
                                            
                                            <td>
    

                                                <center>
                                                    <div class='btn-group' role='group'>
                                                        <button id='aksi' type='button' class='btn btn-secondary btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        Aksi
                                                        </button>
                                                        <div class='dropdown-menu' aria-labelledby='aksi'>
                                                            <a class='dropdown-item bg-warning text-white' href='?hal=info-edit&id=$idinfo&mau=$mau'>Edit</a>
                                                            <a class='dropdown-item bg-warning text-white' 
                                                                data-toggle='modal' data-target='#model$idinfo'
                                                                href='#'>Info</a>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>


                                        <!-- Button trigger modal -->
                               
                                
                                <!-- Modal -->
                                <div class='modal fade' id='model$idinfo' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                                <div class='modal-header'>
                                                        <h5 class='modal-title'>$jenis</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                    </div>
                                            <div class='modal-body'>
                                                <div class='container-fluid'>
                                                    $box
                                                    $desk
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
 
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



 
 <script>
     $('#exampleModal').on('show.bs.modal', event => {
         var button = $(event.relatedTarget);
         var modal = $(this);
         // Use above variables to manipulate the DOM
         
     });
 </script>