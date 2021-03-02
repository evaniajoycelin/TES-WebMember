<?php

    
    
        $id   = $_POST['id'];
        $nama = $_POST['nama'];
        $link = $_POST['link'];

        $ingin = @$_GET['mau'];
      

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($fotonm)) 
        {
            //$k= $_GET['k'];
            //$l= base64_encode($k);


            //$tujuan = "../foto/$l";
            $newe = uploadSosmed($lokasi);
            

            $ft = @$_GET['f'];
            if ($ft!=="Kosong") 
            {
                $tujuanhapus = "../foto/sosmed/$ft";
                unlink($tujuanhapus);
            }

            

            //$isian     = "NULL, '$nama', '$tgl', '$desk', '$newe', '$idUser'";
            $isian     = "nama_sosmed='$nama', link_sosmed='$link', logo_sosmed='$newe'";
        } 
        else 
        {
            //$isian     = "NULL, '$nama', '$tgl', '$desk', 'Kosong', '$idUser'";
            $isian     = "nama_sosmed='$nama', link_sosmed='$link'";
        }
        

        $perintah = $isi->ubahData("sosmed", $isian, "id_sosmed", $id);
        $eksekusi = $isi->cekQuery($perintah);


        

        if ($eksekusi==1) 
        {
           echo
           "
            <script>
                alert('Data Tersimpan');
                window.location='?hal=sosmed-data&mau=$ingin';
            </script>
           ";
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=e-tambah');
        }
    



?>