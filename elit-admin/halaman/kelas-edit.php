<?php

    $id = $_GET['ide'];
    
    $y = $isi->tampilId("kelas", "id_kelas", $id);

    foreach($y as $a)
    {
        //$idkel = $a['id_kelas'];
        $nama  = $a['nama_kelas'];
        $foto  = $a['foto_kelas'];
        $desk  = $a['deskripsi'];

        $pesan = $a['pesan'];

        $kondisi = $a['kondisi'];
        
        
        //$pel = $isi->eksekusiSQl("SELECT *FROM kursus WHERE id_kelas='$id'");
        //$hit = $isi->hitungData($pel);

        if ($foto=="Kosong") 
        {
            $gambar = "<img src='../img/nofoto.png' width='35' height='35'>";
        } 
        else 
        {
            $tujuan = "../foto/$foto";
            $gambar = 
            "   
                <img src='$tujuan' width='80%' height='170'>
                
            ";
        }

    


        
    }

?>


<form action="?hal=kelas-respon&mau=edit&f=<?php echo $foto; ?>" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelas</h1>
            
        </div>


        <!-- Content Row -->

        <div class="row">



            <!-- Area Chart -->

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Kelas</h6>
                    </div>


                    <div class="card-body">

                     <input type="hidden" name="id" value="<?php echo $id;?>">
                        <p>
                            <input value="<?php echo $nama;?>" class="form-control" type="text" name="nama" placeholder="Nama Kelas" required>
                        </p>

                        <p>
                            <textarea name="deskripsi" class="ckeditor"><?php echo $desk;?></textarea>
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
                            <input type="submit" value="DRAFT" class="btn btn-secondary" name="simpan">
                        </center>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Gambar Thumbnail</h6>
                       
                    </div>


                    <div class="card-body">

                        
                       
                        <center>



                             <p>
                                <?php echo $gambar; ?>
                             </p>

                           
                            <div class="custom-file">
                                <input id="gambarAmbil" type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Upload Foto</label>
                            </div>
                        </center>

                          

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Deskripsi Singkat</h6>
                       
                    </div>


                    <div class="card-body">

                        <div class="form-group">
                            <label for="my-textarea">Pesan Singkat:</label>
                            <textarea id="sunote" class="form-control" name="pesan" rows="3"><?php echo $pesan; ?></textarea>
                        </div>

                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->
</form>