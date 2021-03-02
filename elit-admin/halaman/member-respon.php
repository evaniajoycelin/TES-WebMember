<?php

    $mau = @$_GET['mau'];
    $ingin = @$_GET['ingin'];
    
    if ($mau=='tambah') 
    {
        $nama   = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tglahir= $_POST['tglahir'];
        $jekel  = $_POST['jekel'];
        $nohp   = $_POST['nohp'];
        $email  = $_POST['email'];
        $pass   = $_POST['password'];
        //$foto   = "Kosong";
        

        if ($ingin=='admin') 
        {
            $hak    = "Administrator";
            $arahnya= "?hal=user-data";
        }
        else
        {
            $hak    = "Member";
            $arahnya= "?hal=member-data";
        }

        $setuju = "Ya";

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($fotonm)) 
        {
            $newe = uploadUser("User", $lokasi);

            $isian = "NULL,'$nama', '$alamat', '$tglahir', '$jekel', '$nohp', '$email', '$pass', '$newe', '$hak', 'Aktif', '$setuju'";
        } 
        else 
        {
            $isian = "NULL,'$nama', '$alamat', '$tglahir', '$jekel', '$nohp', '$email', '$pass', '$foto', '$hak', 'Aktif', '$setuju'";
        }
    
        
    
        //$isi  = "NULL,'$nama', '$alamat', '$tglahir', '$jekel', '$nohp', '$email', '$pass', '$foto', '$hak', 'Aktif', '$setuju'";
    
        $perintah = $isi->tambahData("user", $isian);
        $eksekusi = $isi->cekQuery($perintah);
        
    
    
    
        if ($eksekusi==1) 
        {
            
            pesanAlert("Berhasil");
    
            if ($ingin!=='admin') 
            {
                $statuser = $isi->eksekusiSQL("SELECT *FROM user WHERE email='$email'");
                //$iduser   = $isi->perulanganData($statuser);
        
                $paketan  = $isi->eksekusiSQL("SELECT *FROM paket_member WHERE nama_paket='Free User'");
                //$idpaket   = $crud->perulanganData($paketan);
        
                foreach ($statuser as $x) 
                {
                    $idUser = $x['id_user'];
                }
        
                foreach ($paketan as $y) 
                {
                    $idPaket = $y['id_paket'];
                }
        
                $isikan  = "NULL,'$idUser', '$idPaket'";
        
                //setcookie("userEmail", "$idUser");
                $perintah = $isi->tambahData("user_status", $isikan);
            }
    
            echo
            "
                <script>
                    window.location='$arahnya';
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
        
    }
   
    elseif ($mau=="hapus") 
    {
        $ide = @$_GET['id'];
        //$foto= $_GET['f'];

        $untuk = @$_GET['untuk'];

        $f= @$_GET['f'];

        //move_uploaded_file($lokfoto, $tujuan);

        $target = "../foto/user/$f";

        

        //$tujuan = "../foto/$foto";

        $perintah = $isi->hapusData("user", "id_user", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           unlink($target);
           pesanALert("Data terhapus");

           if ($untuk=='admin') 
           {
              pindahHal('?hal=user-data');
           } 
           else 
           {
             pindahHal('?hal=member-data');
           }
           

           
        } 
        else 
        {
            pesanALert("Gagal terhapus");
            //pindahHal('?hal=event-tambah');
        }
    }
    else
    {
        $id   = $_POST['id'];
        $nama   = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp   = $_POST['nohp'];
        $email  = $_POST['email'];
        $pass   = $_POST['password'];

        $namafoto= $_FILES['foto']['name'];
        $lokfoto = $_FILES['foto']['tmp_name'];

        $untuk = @$_GET['untuk'];


        if (empty($namafoto)) 
        {
            $link = "nama_user = '$nama', alamat = '$alamat', 
                 no_hp='$nohp', email='$email', password='$pass'";
        }
        else
        {
            $nmaFoto = uploadUser("User", $lokfoto);

            //$tujuan  = "./foto/$foto";

            $f= @$_GET['f'];

            //move_uploaded_file($lokfoto, $tujuan);

            $target = "../foto/user/$f";

            unlink($target);

            
            //move_uploaded_file($lokfoto, '../foto/'.$foto);
            $link = "nama_user = '$nama', alamat = '$alamat', 
                 no_hp='$nohp', email='$email', password='$pass', foto='$nmaFoto'";
        }

        $tabel= "user";
        

        $ubah = $isi->ubahData($tabel, $link, "id_user", $id);
        $eksekusi  = $isi->cekQuery($ubah);

     
        

        if ($eksekusi==1) 
        {
           pesanALert("Data telah diubah");
          

           if ($untuk=='admin') 
           { 
               pindahHal('?hal=user-data');
           } 
           else 
           { 
               pindahHal('?hal=member-data');
           }
           
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
    }



?>