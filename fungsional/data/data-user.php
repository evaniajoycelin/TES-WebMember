<?php


    if (!empty($iduser)) 
    {
        $tampil = $crud->tampilId("user", "id_user", "$iduser");

        foreach ($tampil as $key) 
        {
            $namauser = $key['nama_user'];
            $alamat   = $key['alamat'];
            $nohp     = $key['no_hp'];
            $email    = $key['email'];
            $passw    = $key['password'];
            $foto     = $key['foto'];
            $userId   = $key['id_user'];
            $tglahir  = $key['tgl_lahir'];
            $jekel    = $key['jenis_kelamin'];


            $lahir = tglBalik($tglahir);

            if ($foto=='Kosong') 
            {
                $gambar = "./img/nofoto.png";
                $acakGambar = md5($gambar);
                $kataTombolFoto = "Upload Foto";
            }
            else
            {
                $gambar ="./foto/user/$foto";
                $kataTombolFoto = "Ganti Foto";
            }
        }
    }
   
   
    
    
?>