<?php

    $id = $_GET['id'];
    
    $y = $isi->tampilId("paket_member", "id_paket", $id);

    foreach ($y as $a) 
    {
        //$idp    = $a['id_paket'];
        $nama   = $a['nama_paket'];
        $harga  = $a['harga_member'];
        $kondisi= $a['kondisi'];
        $berlaku= $a['masa_berlaku'];
        $jumkel = $a['jumlah_kelas'];
        $foto   = $a['foto_paket'];
        $deskrip= $a['deskripsi_paket'];



        if ($foto=="Kosong") 
        {
            $gambar = "<img id='gambarTampil' src='../img/nofoto.png' width='200' height='150' id='gambarTampil'>";
        } 
        else 
        {
            $tujuan = "../foto/paket/$foto";
            $gambar = 
            "   
            <img id='gambarTampil' src='$tujuan' width='200' height='170' id='gambarTampil'>
                
            ";
        }

        $fotoEnkripsi = base64_decode($foto);
    }
?>
<form action="?hal=membership-respon&mau=edit&f=<?php echo $foto;?>" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Membership</h1>

        </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Membership</h6>
                    </div>


                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <p>
                            <input value="<?php echo $nama; ?>" class="form-control" type="text" name="nama" placeholder="Nama Membership" required>
                        </p>

                        <p>
                            <input value="<?php echo $harga; ?>" class="form-control" type="number" name="harga" placeholder="Biaya Membership" required>
                        </p>

                        <p>
                            <input value="<?php echo $jumkel; ?>" class="form-control" type="number" name="jumkel" placeholder="Jumlah Kelas" required>
                        </p>

                       

                        <p>
                            <textarea name="deskripsi" class="ckeditor"><?php echo $deskrip; ?></textarea>
                        </p>



                    </div>
                </div>
            </div>

            <div class="col-md-3">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Opsi Simpan</h6>
                       
                    </div>


                    <div class="card-body">

                        <center>
                            <input type="submit" value="POSTING" class="btn btn-primary" name="simpan">
                            <input type="submit" value="DRAFT" name="simpan" class="btn btn-secondary">
                        </center>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tetapkan Masa Berlaku</h6>
                       
                    </div>


                    <div class="card-body">

                        <center>
                            <select name="berlaku" class="form-control" required>
                                
                                <?php
                                    echo 
                                    "
                                        <option value='$berlaku'>$berlaku</option>
                                    ";
                                ?>
                                <option value="3 Bulan">3 Bulan</option>
                                <option value="6 Bulan">6 Bulan</option>
                                <option value="1 Tahun">1 Tahun</option>
                            </select>
                        </center>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Gambar Event</h6>
                       
                    </div>


                    <div class="card-body">

                        <center>
                            <p>
                            <?php echo $gambar; ?>
                            </p>

                            <input id="gambarAmbil" type="file" name="foto" >
                        </center>

                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->
</form>