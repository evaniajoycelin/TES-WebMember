<?php

    $mau = @$_GET['mau'];
    $ik  = @$_GET['ik'];
    
    if ($mau=='tambah') 
    {
        $nama = $_POST['jenis'];
        $desk = $_POST['deskripsi'];
        
        $simpan = $_POST['simpan'];

        $idUser = $userIdnya;

        $tgl    = date('Y-m-d');

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];


        if ($simpan=='POSTING') 
        {
            $postingan ='POSTING';
        } 
        else 
        {
            $postingan = 'DRAFT';
        }
        

        

        if (!empty($fotonm)) 
        {
            $newe = uploadFoto($fotonm, $lokasi);

            $isian     = "NULL, '$nama', '$desk', '$tgl', '$newe', '$idUser'";
        } 
        else 
        {
            $isian     = "NULL, '$nama', '$desk', '$tgl', 'Kosong', '$idUser'";
            $newe = 'Kosong';
        }
        
        // (`id_info`, `jenis_info`, `deskripsi`, `tgl_info`, `foto_info`, `id_user`) 
        //VALUES 
        //(NULL, 'ssdsds', 'ssdsd', '2020-12-02', 'Kosong', '11'

        //$perintah = $isi->tambahData("info", "$isian");

        //$perintah = eksekusiSQL("INSERT INTO info VALUES
          //                      (NULL, '$nama', '$desk', '$tgl', '$newe', '$idUser')");
        //$eksekusi = $isi->cekQuery($perintah);

        $perintah = "INSERT INTO info VALUES
                            (NULL, '$nama', '$desk', '$tgl', '$newe', '$idUser')";
        
        $eksekusi = $isi->eksekusiSQL($perintah);
        if ($eksekusi) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=info-data&mau=$ik');
        } 
        else 
        {
            pesanALert("Gagal tersimpan $idUser");
            //pindahHal('?hal=event-tambah');
            echo
            "
                $nama <br>
                $desk <br>
                $tgl <br>
                $newe $idUser
            ";
        }
        
    }
    elseif ($mau=="hapus") 
    {
        $ide = @$_GET['ide'];
        $foto= $_GET['f'];

        $tujuan = "../foto/$foto";

        $perintah = $isi->hapusData("event", "id_event", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           
           unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=event-data');
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
        //$nama = $_POST['nama'];
        $desk = $_POST['deskripsi'];

        $ingin= $_POST['ingin'];
        
        $simpan = $_POST['simpan'];

        $idUser = $userIdnya;

        $tgl    = date('Y-m-d');

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($fotonm)) 
        {
            //$k= $_GET['k'];
            //$l= base64_encode($k);


            //$tujuan = "../foto/$l";
            $newe = uploadFoto("Info", $lokasi);
            

            $ft = @$_GET['ik'];
            if ($ft!=="Kosong") 
            {
                $tujuanhapus = "../foto/$foto";
                unlink($tujuanhapus);
            }

            

            //$isian     = "NULL, '$nama', '$tgl', '$desk', '$newe', '$idUser'";
            $isian     = "deskripsi='$desk', tgl_info='$tgl', foto_info='$newe', id_user='$idUser'";
        } 
        else 
        {
            //$isian     = "NULL, '$nama', '$tgl', '$desk', 'Kosong', '$idUser'";
            $isian     = "deskripsi='$desk', tgl_info='$tgl', id_user='$idUser'";
        }
        

        $perintah = $isi->ubahData("info", $isian, "id_info", $id);
        $eksekusi = $isi->cekQuery($perintah);


        

        if ($eksekusi==1) 
        {
           echo
           "
            <script>
                alert('Data Tersimpan');
                window.location='?hal=info-data&mau=$ingin';
            </script>
           ";
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=e-tambah');
        }
    }



?>