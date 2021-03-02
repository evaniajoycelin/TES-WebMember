<?php

    $nama   = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    

    

    $isi  = "NULL,'$nama', '$email', '$pesan'";

    $perintah = $crud->tambahData("kontak_kami", $isi);
    $eksekusi = $crud->cekQuery($perintah);
    



    if ($eksekusi==1) 
    {
        
        pesanAlert("Berhasil");

        
        //$perintah = $crud->tambahData("user_status", $isi);
        //$eksekusi = $crud->cekQuery($perintah);

       echo
        "
            <script>
                window.alert('Terima Kasih');
                window.location='index.php';
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