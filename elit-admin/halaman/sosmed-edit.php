<?php

    $id = $_GET['id'];
    $mau= $_GET['mau'];
    
    $y = $isi->tampilId("sosmed", "id_sosmed", $id);

    foreach ($y as $a) 
    {
        //$nama = $a['nama_event'];
        $nama  = $a['nama_sosmed'];
        $link  = $a['link_sosmed'];
        $foto  = $a['logo_sosmed'];

        if ($foto=="Kosong") 
        {
            $gambar = "<img id='gambarTampil' src='../img/nofoto.png' width='200' height='150'>";
        } 
        else 
        {
            $tujuan = "../foto/sosmed/$foto";
            $gambar = 
            "   
                    <img id='gambarTampil' src='$tujuan' width='200' height='150'>
                
            ";
        }

        $fotoEnkripsi = base64_decode($foto);
    }

?>
<form action="?hal=sosmed-respon&mau=<?php echo $mau;?>&f=<?php echo $foto;?>" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Social Media <?php echo $nama; ?></h1>

        </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-md-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Logo Social Media:</h6>

                    </div>


                    <div class="card-body">

                        <center>
                            <p>
                                <?php echo $gambar;?>
                            </p>

                            <input id="gambarAmbil" type="file" name="foto">
                        </center>

                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Link Social Media</h6>
                    </div>


                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="nama" value="<?php echo $nama;?>">

                        <p>
                            <input value="<?php echo $link; ?>" class="form-control" type="text" name="link" placeholder="Masukkan Link Social Media disini" required>
                        </p>

                        <input type="submit" value="POSTING" class="btn btn-primary" name="simpan">


                    </div>
                </div>
            </div>

           


        </div>
        <!-- /.container-fluid -->
</form>