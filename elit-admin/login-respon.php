<script src='../vendor/swal/swal.js'></script>
<?php

    //include '../fungsional/data/koneksi.php';
    include  './fungsi/konfigAdmin.php';
    include '../fungsional/data/isiData.php';

    include './fungsi/fungsian.php';

    $isi = new isiData();

    $email    = $_POST['email'];
    $passw    = $_POST['password'];

    $eksekusi = $isi->loginData("user", "email", "password", $email, $passw);
    
    //$cekLogin = $crud->cekQuery($eksekusi);

    if ($eksekusi==1) 
    {
        
        //session_start();

        //$cari = $isi->eksekusiSQL("SELECT *FROM user WHERE email='$email' AND password='$passw'");
        $cari = $isi->eksekusiSQL("SELECT *FROM user WHERE email='$email' AND password='$passw'");

        foreach ($cari as $k) 
        {
            $w = $k['id_user'];
            
        }
        setcookie("userAkun", "$w");
        pesanAlert("Selamat Datang");
        pindahHal("index.php");
        /*echo
        //"
        <script>
            //var lokasi = window.location='index.php';
            swal('Sukses!', 'Selamat datang di Halaman Administrator!', 'success')
                .then((value)=> {
                    window.location='index.php';
                })
        </script>
        ";*/
    }
    else
    {
        pesanAlert("Gagal");
        pindahHal("index.php");
    }

?>