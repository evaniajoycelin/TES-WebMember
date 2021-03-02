<?php

$paketan = @$_GET['idp'];
$naketan = @$_GET['paket'];

if (!empty($paketan)) 
{
    $perintah = $isi->eksekusiSQl("SELECT *FROM paket_kelas
                                INNER JOIN kelas ON kelas.id_kelas=paket_kelas.id_kelas
                                INNER JOIN paket_member ON paket_member.id_paket=paket_kelas.id_paket
                                WHERE paket_kelas.id_paket='$paketan'");

    $judul = "Paket $naketan";
    $semua = "<a class='btn btn-success btn-sm' href='?hal=paket-data'>Tampilkan Semua</a>";
}
else
{
    $perintah = $isi->eksekusiSQl("SELECT *FROM paket_kelas
                                INNER JOIN kelas ON kelas.id_kelas=paket_kelas.id_kelas
                                INNER JOIN paket_member ON paket_member.id_paket=paket_kelas.id_paket");
    $judul = "Paket Per Kelas";
    $semua = "";
}

?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $judul; ?></h1>

     </div>


     <!-- Content Row -->

     <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-9 col-lg-8">

             <div class="card shadow mb-4">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Data Kelas per Paket</h6>
                 </div>

                 <div class="card-body">
                     <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='#tambahPaket'>Tambah</a>
                     <?php echo $semua; ?>
                     <br><br>
                     <?php

                        

                        
                        $hitung   = $isi->hitungData($perintah);

                        if ($hitung == 0) {
                            pesanKosong();
                        } else {
                            echo
                            "
                           <div class='table-responsive' style='font-size:12px;'>
                                <table class='table table-bordered table-hover' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Paket</th>
                                            <th>Nama Kelas</th>
                                            
                                            
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                            ";

                            //$tampilin = $isi->tampilData("paket_member");

                            $no = 1;
                            foreach ($perintah as $a) {
                                $idp       = $a['id_paketkelas'];

                                $namapak   = $a['nama_paket'];
                                $kelas     = $a['nama_kelas'];
                                $idpak     = $a['id_paket'];
                                $nmpak     = $a['nama_paket'];


                                $foto   = $a['foto_paket'];
                                



                                $dikel  = $a['id_kelas'];
                                $nmkel  = $a['nama_kelas'];

                                

                               /* $pil = $isi->eksekusiSQL("SELECT *FROM pilar WHERE id_kelas='$idkel'");
                                $jumpil = $isi->hitungData($pil);

                                if ($jumpil==0) 
                                {
                                    $hiJumpil = "Belum ada";
                                }
                                else
                                {
                                    $hiJumpil = "$jumpil Pilar";
                                }



                                if ($foto == 'Kosong') {
                                    $gambar = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'><br> <br>";
                                    $box = "";
                                } else {
                                    $tujuan = "../foto/paket/$foto";
                                    $gambar =
                                        "   <a data-fancybox='' href='$tujuan' data-caption='$namapak'>
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

                                    //$hargaRp = "Rp ".formatRupiah($harga).",-";

                                    
                                }
                                */




                                echo
                                "
                                    <tbody>
                                        <tr>
                                            <td align='center'>$no</td>
                                        
                                            <td>
                                                <center>
                                                
                                                    $namapak
                                                </center>
                                            </td>
                                            
                                            <td>$kelas</td>
                                            
                                            
                                            
                                            
                                            <td>
                                                <center>
                                                    <a class='btn btn-warning btn-sm' href='#' data-toggle='modal' data-target='#edit$idp'>Edit</a>
                                                    <a class='btn btn-danger btn-sm' href='?hal=paket-respon&mau=hapus&id=$idp'>Hapus</a>
                                                </center>
                                            </td>
                                        </tr>
                                ";

                                echo
                                "
                                <!-- Modal -->
                                <div class='modal fade' id='edit$idp' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title'>Tambah Kelas</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <div class='container-fluid'>
                                                    <form action='?hal=paket-respon&mau=tambah' method='post'>
                               
                                                        <div class='form-group' style='margin-right: 30px;'>
                                                            <input type='hidden' name='id' value='$idp'>
                                                            <select name='idpaket' class='form-control' style='width: 100%;' required>
                                                                <option value='$idpak'>$nmpak</option>
                                ";
                               
                                                                   
                                                                  $perintah = $isi->eksekusiSQl("SELECT *FROM paket_member");
                               
                               
                               
                                                                   // $tampilin = $isi->tampilData("user");
                               
                               
                                                                   foreach ($perintah as $a) {
                                                                       $idpak  = $a['id_paket'];
                                                                       $namapak = $a['nama_paket'];
                               
                               
                                                                       echo
                                                                       "
                                                                       <option value='$idpak'>$namapak</option>
                                                                   ";
                                                                   }
                               
                               
                               
                               
                               
                               
                                                                   
                            echo"
    
                                                            </select>
                                                        </div>
                               
                               
                               
                                                        <div class='form-group' style='margin-right: 30px;'>
                                                            <select name='idkelas' class='form-control' required>
                                                                <option value='$dikel'>$nmkel</option>
                            ";
                               
                                                                   $perintah = $isi->eksekusiSQl("SELECT *FROM kelas");
                               
                               
                               
                                                                   // $tampilin = $isi->tampilData("user");
                               
                               
                                                                   foreach ($perintah as $a) {
                                                                       $idkel  = $a['id_kelas'];
                                                                       $namakel = $a['nama_kelas'];
                               
                               
                                                                       echo
                                                                       "
                                                                           <option value='$idkel'>$namakel</option>
                                                                       ";
                                                                   }
                               
                               
                               
                               
                               
                               
                            echo"
                                                            </select>
                                                        </div>
                               
                               
                               
                                                </div>
                                            </div>
                               
                                            <div class='modal-footer'>
                                                <input type='submit' value='SIMPAN' class='btn btn-primary'>
                                                </form>
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

         <div class="col-xl-3 col-lg-4">
            
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Kelas Per Paket</h6>

                 </div>
                 <!-- Card Body -->
                 <div class="card-body">


                     <?php

                        $paketan = $isi->eksekusiSQl("SELECT *FROM paket_member");
                        $tampilin = $isi->tampilData("paket_member");

                        $no = 1;
                        foreach ($tampilin as $a) {
                            $idp    = $a['id_paket'];
                            $namaPaket   = $a['nama_paket'];

                            

                            $foto   = $a['foto_paket'];

                            $paketKelas = $isi->eksekusiSQL("SELECT *FROM paket_kelas WHERE id_paket='$idp'");
                            $hitungPaket = $isi->hitungData($paketKelas);

                            if ($hitungPaket == 0) {
                                $pesanPaket =
                                    "
                                        <p class='card-text'>
                                            Belum ada Kelas untuk paket ini.
                                        </p>
                                    ";
                            } else {
                                

                                
                                $tungP = 0;
                                foreach ($paketKelas as $pk) 
                                {
                                    //$tungPak=1;
                                    $idke = $pk['id_kelas'];

                                    $paKelas = $isi->eksekusiSQL("SELECT *FROM pilar WHERE id_kelas='$idke'");

                                    $tungPak = $isi->hitungData($paKelas) + $tungP;
                                    //$tungPak++;

                                    $tungP = $tungPak;
                                }

                                $pesanPaket =
                                    "
                                        <p class='card-text'>
                                            Terdapat <b>$hitungPaket</b> Kelas.
                                        </p>
                                        <p class='card-text'>
                                            Terdapat <b>$tungP</b> Pilar.
                                        </p>
                                    ";
                            }







                            if ($foto == 'Kosong') {
                                $gambar = "<img class='rounded-circle' src='../img/nofoto.png' width='50' height='50'><br> <br>";
                                $box = "";
                            } else {
                                $tujuan = "../foto/paket/$foto";
                                $gambar =
                                    "   <a data-fancybox='' href='$tujuan' data-caption='$namaPaket'>
                                            <img src='$tujuan' width='50' height='50'>
                                        </a>
                                        <br> <br>
                                    ";
                                $box =
                                    "
                                        
                                        <center>
                                        
                                        <img src='$tujuan' width='100%' height='70' style='margin-top:15px;'>
                                        </center>
                                        
                                        
                                    ";
                            }




                            echo
                            "
                                <a href='?hal=paket-data&idp=$idp&paket=$namaPaket' class='card mb-3 kartu' style='width: 100%; font-size:12px; padding:0;'>
                                    
                                    
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-md-5 card-body' style='padding:0px;'>
                                                $box 
                                            </div>
                                            <div class='col-md-7' style='padding:10px;'>
                                                <p class='card-title'><b>$namaPaket</b></p>
                                                $pesanPaket

                                            </div>
                                        </div>

                                      
                                    </div>
                                </a>
                                ";
                            // $no++;
                        }

                        ?>

                 </div>
             </div>
         </div>
     </div>


 </div>
 <!-- /.container-fluid -->




 <!-- Modal -->
 <div class="modal fade" id="tambahPaket" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Tambah Kelas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <form action="?hal=paket-respon&mau=tambah" method="post">

                         <div class="form-group" style="margin-right: 30px;">
                             <select name="idpaket" class="form-control" style="width: 100%;" required>
                                 <option value="">Pilih Paket</option>
                                 <?php

                                    $perintah = $isi->eksekusiSQl("SELECT *FROM paket_member");



                                    // $tampilin = $isi->tampilData("user");


                                    foreach ($perintah as $a) {
                                        $idpak  = $a['id_paket'];
                                        $namapak = $a['nama_paket'];


                                        echo
                                        "
                                        <option value='$idpak'>$namapak</option>
                                    ";
                                    }






                                    ?>
                             </select>
                         </div>



                         <div class="form-group" style="margin-right: 30px;">
                             <select name="idkelas" class="form-control" required>
                                 <option value="">Pilih Kelas</option>
                                 <?php

                                    $perintah = $isi->eksekusiSQl("SELECT *FROM kelas");



                                    // $tampilin = $isi->tampilData("user");


                                    foreach ($perintah as $a) {
                                        $idkel  = $a['id_kelas'];
                                        $namakel = $a['nama_kelas'];


                                        echo
                                        "
                                            <option value='$idkel'>$namakel</option>
                                        ";
                                    }






                                    ?>
                             </select>
                         </div>



                 </div>
             </div>

             <div class="modal-footer">
                 <input type="submit" value="SIMPAN" class="btn btn-primary">
                 </form>
             </div>
         </div>
     </div>
 </div>

 <script>
     $('#exampleModal').on('show.bs.modal', event => {
         var button = $(event.relatedTarget);
         var modal = $(this);
         // Use above variables to manipulate the DOM

     });
 </script>