<?php
include './fungsional/konfig/headerUdahLogin.php';
?>
<!--
  <header class="masthead gambar-bgUser" style="margin-top:0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Selamat Datang</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere repellendus excepturi, placeat molestias molestiae rem iusto odio magni at sapiente voluptatum dolorum illum, optio qui minus aliquam repudiandae earum autem!
          </p>
        </div>

        <div class="col-md-6">
          <img src="./img/laptop.png" alt="Yeah" width="100%">
        </div>
      </div>
    </div>
  </header>
-->

<section  style="margin-top: 0;">

    <div class="container" style="padding: 20px; margin-top:100px; height: 100%;">

        <div class="row">
            <div class="col-md-2">

                <?php
                include './fungsional/data/membership.php';
                ?>
            </div>

            <div class="col-md-10">
                <h1 style="margin: 30px; margin-bottom:0px;"><?php echo "$namauser"; ?></h1>

                <hr>

                <div style="margin: 30px; font-size:12px;">
                    <h3>Data Transaksi</h3>
                    <table class="table table hover">
                        <thead>
                            <tr class="bg-warning text-white">
                                <th>No.</th>
                                <th>Nama Transaksi</th>
                                <th>Biaya Transaksi</th>
                                <!--
                            <th>No. Rekening</th>
                            <th>Pemilik Rekening</th>-->
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Berakhir</th>
                                <th>Keterangan</th>
                                <th>Baca</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php





                            $sql   = "SELECT *FROM 
                                        transaksi
                                        WHERE id_user='$userId'
                                        ORDER BY id_transaksi DESC
                                     ";
                            $trans = $crud->eksekusiSQL($sql);
                            $hitung = $crud->hitungData($trans);

                            if ($hitung == 0) {
                                echo
                                    "
                                    <tr>
                                        <td colspan='7' align='center'>
                                            Belum ada Transaksi
                                        </td>  
                                    </tr>
                                ";
                            } else {
                                $no = 1;
                                foreach ($trans as $key) {
                                    $idTran    = $key['id_transaksi'];
                                    $namatrans = $key['nama_transaksi'];
                                    $harga     = $key['biaya_transaksi'];
                                    $norek     = $key['no_rek'];
                                    $narek     = $key['nama_rekening'];
                                    $tgl       = $key['tgl_transaksi'];
                                    $akhir     = $key['tgl_berakhir'];

                                    $baca      = $key['baca_member'];

                                    $ket       = $key['keterangan'];

                                    $fotoS     = $key['foto_struk'];

                                    if ($fotoS == 'Kosong') {
                                        $gambarS = "./img/nofoto.png";
                                        //$acakGambar = md5($gambar);
                                        //$kataTombolFoto = "Upload Foto";
                                    } elseif ($fotoS == '') {
                                        $gambarS = "./img/nofoto.png";
                                    } else {
                                        $gambarS = "./foto/struk/$fotoS";
                                        // $kataTombolFoto = "Ganti Foto";
                                    }

                                    if ($ket == "Ok") {
                                        $isiKet = "<span class='badge badge-success'>$ket</span>";
                                    } elseif ($ket == 'Sedang diproses') {
                                        $isiKet = "<span class='badge badge-warning'>$ket</span>";
                                    } else {
                                        $isiKet = "<span class='badge badge-danger'>$ket</span>";
                                    }

                                    if ($baca=='Sudah dibaca') 
                                    {
                                        $ketBaca = "<span class='badge badge-success'>$baca</span>";
                                    } else {
                                        $ketBaca = "<span class='badge badge-warning'>$baca</span>";
                                    }
                                    


                                    $tanggal   = date("d F Y", strtotime($tgl));
                                    $berakhir  = date("d F Y", strtotime($akhir));

                                    $biaya = "Rp " . formatRupiah($harga) . ",-";

                                    echo
                                        "
                                        <tr>
                                            <td align='center'>$no</td>
                                            <td>$namatrans</td>
                                            <td>$biaya</td>
                                            <!--
                                            <td>
                                                <center>
                                                    
                                                    $norek
                                                    
                                                </center>
                                            </td>
                                            <td>$narek</td>-->
                                            <td>$tanggal</td>
                                            <td>$berakhir</td>
                                            <td>
                                                <center>
                                                    $isiKet
                                                </center>
                                            </td>
                                            <td>$ketBaca</td>
                                            <td>
                                                <center>
                                                    <div class='btn-group' role='group'>
                                                        <button id='aksi' type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        Aksi
                                                        </button>
                                                        <div class='dropdown-menu bg-info' aria-labelledby='aksi'>
                                                            <a class='dropdown-item' data-fancybox data-src='#transaksi$idTran' href='javascript:;'>View</a>
                                                            
                                                            <a class='dropdown-item' href='?hal=akun-respon&idT=$idTran&mode=udahbaca'>Tandai Sudah dibaca</a>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    ";

                                    echo
                                    "
                                    <!-- Modal InfoTrab -->

                                    <div id='transaksi$idTran' style='font-size: 16px; width:1000px; display:none;'>
                                    
                                        <div class='row'>
                                            <div class='col-md'>
                                                <center>
                                                    <img src='$gambarS' width='100%' height='500' alt='$namatrans'>
                                                </center>
                                            </div>
                                    
                                            <div class='col-md'>
                                                <h3>$namatrans</h3>
                                                <h4>Rincian:</h4>
                                    
                                                <p>Biaya <span class='text-primary'><b>$biaya</b></span></p>
                                                <p>
                                                    No. Rekening yang digunakan <span class='text-primary'>$norek</span>
                                                </p>
                                                <p>
                                                    Atas nama <span class='text-primary'>$narek</span>
                                                </p>
                                                <p>
                                                    Dibayar pada <span class='text-primary'>$tanggal</span>
                                                </p>
                                    
                                                <hr>
                                    
                                                <h4>Keterangan</h4>
                                                <h5><span class='text-primary'>$isiKet</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                    $no++;
                                }
                            }


                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="editUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=akun-respon&mode=edit" enctype="multipart/form-data">
                    <p>
                        <input value="<?php echo $namauser; ?>" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                    </p>
                    <p>
                        <textarea id="my-textarea" class="form-control" name="alamat" placeholder="Alamat" rows="3"><?php echo $alamat; ?></textarea>
                    </p>
                    <p>
                        <input value="<?php echo $nohp; ?>" class="form-control" type="number" name="nohp" placeholder="No. Handphone" required>
                    </p>
                    <p>
                        <input value="<?php echo $email; ?>" class="form-control" type="email" name="email" placeholder="E-Mail" required>
                    </p>
                    <p>
                        <input value="<?php echo $passw; ?>" class="form-control" type="password" name="password" placeholder="Password" required>
                    </p>
                    <p>
                        <input class="form-control" type="file" name="foto" placeholder="Password">
                    </p>
                    <p>
                        <input type="submit" value="SIMPAN" class="btn btn-primary">
                    </p>
                </form>

            </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>




</div>
</div>
</div>



<?php
include './fungsional/konfig/footer.php';
?>