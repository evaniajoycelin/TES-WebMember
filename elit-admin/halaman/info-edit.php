<?php

$mau = @$_GET['mau'];

if ($mau=='tnc') 
{
    $judul = "Term and Condition";
}

?>

<?php

    $id = $_GET['id'];
    
    $y = $isi->tampilId("info", "id_info", $id);

    foreach ($y as $a) 
    {
        //$nama = $a['nama_event'];
        $judul = $a['jenis_info'];
        $tgl  = $a['tgl_info'];
        //$autor= $a['nama_user'];
        $desk = $a['deskripsi'];
        //$idev = $a['id_event'];

        if ($foto=="Kosong") 
        {
            $gambar = "<img src='../img/nofoto.png' width='200' height='150'>";
        } 
        else 
        {
            $tujuan = "../foto/$foto";
            $gambar = 
            "   <a data-fancybox='$nama' href='$tujuan' data-caption='$nama'>
                    <img src='$tujuan' width='200' height='150'>
                </a>
            ";
        }

        $fotoEnkripsi = base64_decode($foto);
    }

?>

<form action="?hal=info-respon&mau=edit&ik=<?php echo $foto;?>" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Info</h1>
        </div>



        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul; ?></h6>
                    </div>


                    <div class="card-body">

                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <input type="hidden" name="ingin" value="<?php echo $mau; ?>">
                        <!--<p>
                            <input class="form-control" type="text" name="jenis" value="<?php //echo $judul; ?>" placeholder="Judul Event" required>
                        </p>-->

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
                           
                        </center>

                    </div>
                </div>

                <?php
                    if ($judul=="Kontak Kami") 
                    {
                        $tampilan = "display:none;";
                    }
                    else
                    {
                        $tampilan ="";
                    }
                ?>

                <div class="card shadow mb-4" style="<?php echo $tampilan; ?>">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Gambar Event</h6>
                       
                    </div>


                    <div class="card-body">

                        <center>
                            <p>
                            <img src="../img/nofoto.png" alt="Test" width="150" height="100" id="gambarTampil">
                            </p>

                            <input id="gambarAmbil" type="file" name="foto" class="btn btn-primary">
                        </center>

                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->
</form>