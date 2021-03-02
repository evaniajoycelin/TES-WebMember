<?php

    $id = $_GET['id'];
    $for= @$_GET['untuk'];
    
    $y = $isi->tampilId("user", "id_user", $id);

    foreach ($y as $a) 
    {
        $nama   = $a['nama_user'];
        $alamat = $a['alamat'];
        $email  = $a['email'];
        $nohp   = $a['no_hp'];
        $foto   = $a['foto'];
        $hak    = $a['hak_akses'];
        $tgl    = $a['tgl_lahir'];
        $jekel  = $a['jenis_kelamin'];
        $pass   = $a['password'];

        if ($foto=="Kosong") 
        {
            $gambar = "<img id='gambarTampil' src='../img/nofoto.png' width='200' height='150' id='gambarTampil'>";
        } 
        else 
        {
            $tujuan = "../foto/user/$foto";
            $gambar = 
            "   
            <img id='gambarTampil' src='$tujuan' width='200' height='170' id='gambarTampil'>
                
            ";
        }

        $fotoEnkripsi = base64_decode($foto);
    }

    if ($for=='') 
    {
        $label="Member";
        $untuk="";
    } else {
        $label="Administrator";
        $untuk="admin";
    }
    

?>
<form action="?hal=member-respon&mau=edit&f=<?php echo $foto; ?>&untuk=<?php echo $untuk; ?>" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data <?php echo $label; ?></h1>

        </div>


        <!-- Content Row -->

        <div class="row">
            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data <?php echo $label; ?></h6>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <p>
                            <input value="<?php echo $nama;?>" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                        </p>
                        <p>
                            <textarea id="my-textarea" class="form-control" name="alamat" placeholder="Alamat" rows="3"><?php echo $alamat;?></textarea>
                        </p>
                        <p>
                            <span>Tanggal Lahir : </span> <br>
                            <input class="form-control" type="date" name="tglahir" placeholder="Tgl Lahir" value="<?php echo $tgl;?>" required>
                        </p>

                        <?php
                            

                            if ($jekel=='Laki-laki') 
                            {
                                echo
                                "
                                <div class='form-check form-check-inline'>
                                    <input name='jekel' class='form-check-input' type='radio' id='inlineCheckbox1' value='Laki-laki' checked>
                                    <label class='form-check-label' for='inlineCheckbox1'>Laki-laki</label>
                                </div>
                                <div class='form-check form-check-inline'>
                                    <input name='jekel' class='form-check-input' type='radio' id='inlineCheckbox2' value='Perempuan'>
                                    <label class='form-check-label' for='inlineCheckbox2'>Perempuan</label>
                                </div>
                                ";
                            } 
                            else 
                            {
                                echo
                                "
                                <div class='form-check form-check-inline'>
                                    <input name='jekel' class='form-check-input' type='radio' id='inlineCheckbox1' value='Laki-laki'>
                                    <label class='form-check-label' for='inlineCheckbox1'>Laki-laki</label>
                                </div>
                                <div class='form-check form-check-inline'>
                                    <input name='jekel' class='form-check-input' type='radio' id='inlineCheckbox2' value='Perempuan' checked>
                                    <label class='form-check-label' for='inlineCheckbox2'>Perempuan</label>
                                </div>
                                
                                ";
                            }
                            
                        ?>
                       

                        <p>
                            <input value="<?php echo $nohp;?>" class="form-control" type="number" name="nohp" placeholder="No. Handphone" required>
                        </p>
                        <p>
                            <input value="<?php echo $email;?>" class="form-control" type="email" name="email" placeholder="E-Mail" required>
                        </p>
                        <p>
                            <input value="<?php echo $pass;?>"  class="form-control" type="password" name="password" placeholder="Password" required>
                        </p>

                    </div>
                </div>




            </div>

            <div class="col-md-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Foto Profil Member</h6>

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

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Simpan Data</h6>

                    </div>


                    <div class="card-body">

                        <center>
                            <p>
                                <input type="submit" value="DAFTAR" class="btn btn-primary btn-lg">
                            </p>
                        </center>

                    </div>
                </div>
            </div>
        </div>







        <!-- /.container-fluid -->
</form>