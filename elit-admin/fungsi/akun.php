<?php

    


    if (!empty($admin)) 
    {
        $tampil = $isi->tampilId("user", "id_user", "$admin");

        foreach ($tampil as $key) 
        {
            $namauser = $key['nama_user'];
            $alamat   = $key['alamat'];
            $nohp     = $key['no_hp'];
            $email    = $key['email'];
            $passw    = $key['password'];
            $foto     = $key['foto'];
            $userIdnya= $key['id_user'];

            if ($foto=='Kosong') 
            {
                $gambarLogin = "../img/nofoto.png";
              //  $acakGambar = md5($gambar);

            }
            else
            {
                $gambarLogin="../foto/$foto";
            }
        }
    }

?>