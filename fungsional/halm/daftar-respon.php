<?php

    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tglahir= $_POST['tglahir'];
    $jekel  = $_POST['jekel'];
    $nohp   = $_POST['nohp'];
    $email  = $_POST['email'];
    $pass   = $_POST['password'];
    $foto   = "Kosong";
    $hak    = "Member";
    $setuju = $_POST['setujuan'];

    

    $isi  = "NULL,'$nama', '$alamat', '$tglahir', '$jekel', '$nohp', '$email', '$pass', '$foto', '$hak', 'Aktif', '$setuju'";

    $perintah = $crud->tambahData("user", $isi);
    $eksekusi = $crud->cekQuery($perintah);
    



    if ($eksekusi==1) 
    {
        
        pesanAlert("Berhasil");

        $statuser = $crud->eksekusiSQL("SELECT *FROM user WHERE email='$email'");
        //$iduser   = $crud->perulanganData($statuser);

        $paketan  = $crud->eksekusiSQL("SELECT *FROM paket_member WHERE nama_paket='Free User'");
        //$idpaket   = $crud->perulanganData($paketan);

        foreach ($statuser as $x) 
        {
            $idUser = $x['id_user'];
        }

        foreach ($paketan as $y) 
        {
            $idPaket = $y['id_paket'];
        }

        $isi  = "NULL,'$idUser', '$idPaket'";

        setcookie("userEmail", "$idUser");
        $perintah = $crud->tambahData("user_status", $isi);
        //$eksekusi = $crud->cekQuery($perintah);


       
       echo
        "
            <script>
                window.location='?hal=akun-profile';
            </script> 
        ";
        
       
    }
    else
    {
        pesanAlert("Gagal");
        echo
        "
            <script>
                window.location='index.php';
            </script>
        ";
    }

?>