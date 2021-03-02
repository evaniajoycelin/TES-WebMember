<script src='./vendor/swal/swal.js'></script>
<?php

    $email    = $_POST['email'];
    $passw    = $_POST['password'];

    $eksekusi = $crud->eksekusiSQL("SELECT *FROM user WHERE email='$email' AND password='$passw'");
    
    //$cekLogin = $crud->cekQuery($eksekusi);

    $cek = $crud->hitungData($eksekusi);

    if ($cek==1) 
    {
        foreach ($eksekusi as $key) 
        {
            $idSer = $key['id_user'];
        }
        
        setcookie("userEmail", "$idSer");
        //pesanAlert("Berhasil");
        echo
        "
        
        <script>
            //var lokasi = window.location='index.php';
            swal('Login Sukses!', 'Selamat Datang!', 'success')
                .then((value)=> {
                    window.location='index.php';
                })
          
        </script>
        ";
    }
    else
    {
        //pesanAlert("Gagal");
        
        echo
        "
            <script>
                swal('Maaf!', 'Username dan Password tidak ditemukan!', 'error')
                .then((value)=> {
                    window.location='index.php';
                })
                //window.location='index.php';
            </script>
        ";
    }

?>