<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="./img/LogoPutih.png" alt="" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#Daftar">Daftar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#Login">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="Daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DAFTAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=daftar-respon">
                    <p>
                        <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                    </p>
                    <p>
                        <textarea id="my-textarea" class="form-control" name="alamat" placeholder="Alamat" rows="3"></textarea>
                    </p>
                    <p>
                        <span>Tanggal Lahir : </span> <br>
                        <input class="form-control" type="date" name="tglahir" placeholder="Tgl Lahir" required>
                    </p>
                    <div class="form-check form-check-inline">
                        <input name="jekel" class="form-check-input" type="radio" id="inlineCheckbox1" value="Laki-laki">
                        <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="jekel" class="form-check-input" type="radio" id="inlineCheckbox2" value="Perempuan">
                        <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                    </div>
                
                    <p>
                        <input class="form-control" type="number" name="nohp" placeholder="No. Handphone" required>
                    </p>
                    <p>
                        <input class="form-control" type="email" name="email" placeholder="E-Mail" required>
                    </p>
                    <p>
                        <input class="form-control tampilinPass" type="password" name="password" placeholder="Password" required>
                        &nbsp;<input type="checkbox" class="tampilPassword"> <small>Tampilkan Password</small> <br>
                        <small class="text-danger passTaksama">Password yang diketikkan tidak sama</small>
                    </p>
                    <p>
                    <input id="pass2" class="form-control" type="password" name="password" placeholder="Password" required>
                    <small class="text-danger passTaksama">Password yang diketikkan tidak sama</small>
                    </p>
                    <p>
                        <input type="checkbox" value="Ya" name="setujuan" required> Saya Menyetujui <a href="#" data-toggle="modal" data-target="#Setujuan">Terms and Condition</a>
                    </p>
                    <p>
                        <input type="submit" value="DAFTAR" class="btn btn-primary regist">
                    </p>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=login-respon">
                    <p>
                        <input class="form-control" type="email" name="email" placeholder="E-Mail" required>
                    </p>
                    <p>
                        <input class="form-control tampilinPass" type="password" name="password" placeholder="Password" required>
                        &nbsp;<input type="checkbox" class="tampilPassword"> <small>Tampilkan Password</small> <br>
                    </p>
                    <p>
                        <input type="submit" value="MASUK" class="btn btn-primary">
                    </p>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal -->

<?php

    $perintah = $crud->eksekusiSQl("SELECT *FROM info 
                                    INNER JOIN user
                                        ON user.id_user= info.id_user
                                    WHERE info.jenis_info='Term and Condition'
                                    ");
    $hitung   = $crud->hitungData($perintah);


    foreach($perintah as $a)
    {
        $idinfo= $a['id_info'];
        $jenis = $a['jenis_info'];
        $foto  = $a['foto_info'];
        $tgl   = $a['tgl_info'];
        $desk  = $a['deskripsi'];
        

        $nus    = $a['nama_user'];

        if ($foto=='Kosong') 
        {
            //$gambar = "<img class='rounded-circle' src='./img/nofoto.png' width='50' height='50'>";
            $box = "";
        } 
        else 
        {
            $tujuan = "./foto/info/$foto";
           /* $gambar = 
            "   <a data-fancybox='gallery' href='$tujuan' data-caption='$jenis'>
                    <img src='$tujuan' width='50' height='50'>
                </a>
            ";*/
            $box = 
            "
                <center>
                <img src='$tujuan' width='70%' height='200'>
                </center>
            ";
        }
    }
                                
                 
                                

?>

<div class="modal fade" id="Setujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $jenis; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               <?php
                    echo
                    "
                        $box
                        $desk
                    ";
               ?>

            </div>

        </div>
    </div>
</div>