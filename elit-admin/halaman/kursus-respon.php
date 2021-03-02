<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='tambah') 
    {
        $nama = addslashes($_POST['nama']);
//$link =  addslashes($_POST['link']);
        
        //$idkel= $_POST['idkelas'];
        $idpil= $_POST['idpilar'];

        $idpak= $_POST['idpaket'];

        $desk =  addslashes($_POST['deskripsi']);


        $fotonm = @$_FILES['foto']['name'];
        $lokasi = @$_FILES['foto']['tmp_name'];

    
            
        $newe = uploadKursus("kursus", $lokasi);

        $isian     = "NULL, '$nama', '$desk', '$newe', '$idpil', '$idpak'";
        
        

        
 
        

        $perintah = $isi->tambahData("kursus", $isian);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=kursus-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
        
    }
    elseif ($mau=="hapus") 
    {
        $ide = @$_GET['ide'];
        $foto= @$_GET['ft'];

        $tujuan = "../foto/kursus/$foto";

        $perintah = $isi->hapusData("kursus", "id_kursus", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=kursus-data');
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
        $nama = addslashes($_POST['nama']);
        //$link =  addslashes($_POST['link']);
        $desk =  $_POST['deskripsi'];
        //$idkel= $_POST['idkelas'];

        $idpil= $_POST['idpilar'];

        $idpak= $_POST['idpaket'];

        $fotonm = @$_FILES['foto']['name'];
        $lokasi = @$_FILES['foto']['tmp_name'];

    
            
        

       // $idUser = $userIdnya;

        //$tgl    = date('Y-m-d');

        //$fotonm = $_FILES['foto']['name'];
        //$lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($fotonm)) 
        {
            $k= @$_GET['f'];
            

            $tujuan = "../foto/kursus/$k";
            unlink($tujuan);
            $newe = uploadKursus("kursus", $lokasi);
            $isian = "nama_kursus='$nama', deskripsi='$desk', foto_kursus='$newe', id_pilar='$idpil', id_paket='$idpak' ";

        } 
        else 
        {
            $isian = "nama_kursus='$nama', deskripsi='$desk', id_pilar='$idpil', id_paket='$idpak' ";
        }
        
        

        $perintah = $isi->ubahData("kursus", $isian, "id_kursus", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data sudah diubah");
           pindahHal('?hal=kursus-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan $idkel");
            //pindahHal('?hal=event-tambah');
        }
    }



?>