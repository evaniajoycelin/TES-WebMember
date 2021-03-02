<?php

    $mau = @$_GET['mau'];

    if ($mau=='website') 
    {
        $sosmed = "Website";
    }
    else if ($mau=='facebook') 
    {
        $sosmed = "Facebook";
    }
    else if ($mau=='youtube') 
    {
        $sosmed = "Youtube";
    }
    else
    {
        $sosmed = "Instagram";
    }

?>

<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Social Media</h1>
         
     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-12">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary"><?php echo $sosmed; ?></h6>
                 </div>

                 <div class="card-body">
                     

                     <?php

                        //$mau = @$_GET['mau'];

                      

                        
                
                        $perintah = $isi->eksekusiSQl("SELECT *FROM sosmed WHERE nama_sosmed='$sosmed'");
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
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Logo Sosmed</th>
                                            <th>Link Sosmed</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                            ";

                            

                            $no=1;
                            foreach($perintah as $a)
                            {
                               $idsos = $a['id_sosmed'];
                               $nama  = $a['nama_sosmed'];
                               $link  = $a['link_sosmed'];
                               $foto  = $a['logo_sosmed'];

                                
                                

                                //$nus    = $a['nama_user'];

                                if ($foto=='Kosong') 
                                {
                                    $gambar = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'><br> <br>";
                                    $box = "";
                                } 
                                else 
                                {
                                    $tujuan = "../foto/sosmed/$foto";
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

                                    
                                }

                                
                                
                                echo
                                "
                                    <tbody>
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>
                                                <center>
                                                    $gambar 
                                                    
                                                    <p>$nama</p>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href='$link' target='_blank'>$link</a>
                                                </center>
                                            </td>
                                           
                                            
                                            <td>
    

                                                <center>
                                                    <a class='btn btn-primary' href='?hal=sosmed-edit&id=$idsos&mau=$mau'>Edit</a>
                                                </center>
                                            </td>
                                        </tr>


                                        <!-- Button trigger modal -->
                               
                                
                          
 
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