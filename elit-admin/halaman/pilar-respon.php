<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='tambah') 
    {
        $nama = addslashes($_POST['nama']);
//$link =  addslashes($_POST['link']);
        
      

        $desk =  addslashes($_POST['deskripsi']);

        $idk  = $_POST['idkelas'];


       

        $isian     = "NULL, '$nama', '$desk', '$idk'";
        
        

        
 
        

        $perintah = $isi->tambahData("pilar", $isian);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=pilar-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
        
    }
    elseif ($mau=="hapus") 
    {
        $ide = @$_GET['idp'];
       // $foto= @$_GET['ft'];

        //$tujuan = "../foto/kursus/$foto";

        $perintah = $isi->hapusData("pilar", "id_pilar", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
          // unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=pilar-data');
        } 
        else 
        {
            pesanALert("Gagal terhapus");
            //pindahHal('?hal=event-tambah');
        }
    }
    else
    {
        $id   = $_POST['idp'];
        $nama = addslashes($_POST['nama']);
        //$link =  addslashes($_POST['link']);
        $desk =  $_POST['deskripsi'];
        $idk  = $_POST['idkelas'];
    

    
            
        

       // $idUser = $userIdnya;

        //$tgl    = date('Y-m-d');

        //$fotonm = $_FILES['foto']['name'];
        //$lokasi = $_FILES['foto']['tmp_name'];

       
        $isian = "nama_pilar='$nama', desk_pilar='$desk', id_kelas='$idk'";
        
        
        

        $perintah = $isi->ubahData("pilar", $isian, "id_pilar", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data sudah diubah");
           pindahHal('?hal=pilar-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan $idkel");
            //pindahHal('?hal=event-tambah');
        }
    }



?>