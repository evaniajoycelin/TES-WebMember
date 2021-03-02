<?php

    $id = $_GET['ide'];
    
    $y = $isi->tampilId("event", "id_event", $id);

    foreach ($y as $a) 
    {
        $nama = $a['nama_event'];
        $foto = $a['foto_event'];
        $tgl  = $a['tanggal_post'];
        //$autor= $a['nama_user'];
        $desk = $a['deskripsi'];
        //$idev = $a['id_event'];
        $lokasi = $a['lokasi'];
        $venue = $a['venue'];
        $waktu = $a['waktu'];
        $lokasi = $a['lokasi'];
        $harga = $a['harga_event'];
        $lokasi = $a['lokasi'];
        $kuota = $a['kuota'];


        if ($foto=="Kosong") 
        {
            $gambar = "<img src='../img/nofoto.png' width='200' height='150' id='gambarTampil'>";
        } 
        else 
        {
            $tujuan = "../foto/event/$foto";
            $gambar = 
            "   <a data-fancybox='$nama' href='$tujuan' data-caption='$nama'>
                    <img src='$tujuan' width='200' height='150' id='gambarTampil'>
                </a>
            ";
        }

        $fotoEnkripsi = base64_decode($foto);
    }

?>


<form action="?hal=event-respon&mau=edit&k=<?php echo $fotoEnkripsi; ?>" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Event</h1>

        </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Event</h6>
                    </div>


                    <div class="card-body">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <p>
                            <input value="<?php echo $nama; ?>" class="form-control" type="text" name="nama" placeholder="Judul Event" required>
                        </p>

                        <p>
                            <textarea name="deskripsi" class="ckeditor"><?php echo $desk; ?></textarea>
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
                            <input type="submit" value="DRAFT" class="btn btn-secondary">
                        </center>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Info Tambahan</h6>
                    </div>  
                        
                   
                   <div class="card-body">
                        <p>
                            <textarea name="lokasi" placeholder="Lokasi" rows="5" class="form-control" required><?php echo $lokasi; ?></textarea>
                        </p>


                        <p>
                            <input value="<?php echo $venue; ?>" class="form-control" type="text" name="vanue" placeholder="Vanue">
                        </p>

                        <p>
                            <label for="">Waktu Pelaksanaan</label>
                            <input value="<?php echo $waktu; ?>" type="datetime" name="waktu" class="form-control" required>
                        </p>

                        <p>
                            <input value="<?php echo $kuota; ?>" class="form-control" type="number" name="kuota" placeholder="Jumlah Peserta" required>
                        </p>

                        <p>
                            <input value="<?php echo $harga; ?>" class="form-control" type="number" name="harga" placeholder="Harga" required>
                        </p>

                    
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

                            <input id="gambarAmbil" type="file" name="foto" class="btn btn-primary">
                        </center>

                    </div>

                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->
</form>