<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='tambah') 
    {
        $nama = $_POST['nama'];
        $isian = "NULL, '$nama'";

        $perintah = $isi->tambahData("provinsi", $isian);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=provinsi-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
        
    }
    elseif ($mau=="hapus") 
    {
        $ide = @$_GET['id'];
       

        $perintah = $isi->hapusData("provinsi", "id_provinsi", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
          
           pesanALert("Data terhapus");
           pindahHal('?hal=provinsi-data');
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
        $nama = $_POST['nama'];
       
            //$isian     = "NULL, '$nama', '$tgl', '$desk', 'Kosong', '$idUser'";
            $isian = "nama_provinsi='$nama'";
      
        

        $perintah = $isi->ubahData("provinsi", $isian, "id_provinsi", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=provinsi-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
    }



?>