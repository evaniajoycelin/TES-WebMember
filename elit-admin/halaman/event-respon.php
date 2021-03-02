<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='tambah') 
    {
       
        
        $simpan = $_POST['simpan'];

        $idUser = $userIdnya;

      

        $nama = addslashes($_POST['nama']);
        $desk = addslashes($_POST['deskripsi']);
        

        $tempat = addslashes($_POST['lokasi']);
        $venue  = addslashes($_POST['vanue']);
        $waktu  = addslashes($_POST['waktu']);
        $harga  = addslashes($_POST['harga']);
        $kuota  = addslashes($_POST['kuota']);


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
            $newe = uploadEvent("Event", $lokasi);

            $isian     = "NULL, '$nama', '$tgl', '$desk', '$newe', '$idUser', '$tempat', '$venue','$waktu', '$harga', '$kuota', '$postingan'";
        } 
        else 
        {
            $isian     = "NULL, '$nama', '$tgl', '$desk', 'Kosong', '$idUser', '$tempat', '$venue','$waktu', '$harga', '$kuota', '$postingan'";
        }
        

        $perintah = $isi->tambahData("event", $isian);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=event-data');
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
        $foto= @$_GET['f'];

        $tujuan = "../foto/event/$foto";

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
    elseif ($mau=="hapusmember") 
    {
        $ide = @$_GET['id'];
      

        $perintah = $isi->hapusData("event_daftar", "id_daftar", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           //unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=event-daftar');
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
        $desk = addslashes($_POST['deskripsi']);
        

        $tempat = addslashes($_POST['lokasi']);
        $venue  = addslashes($_POST['vanue']);
        $waktu  = addslashes($_POST['waktu']);
        $harga  = addslashes($_POST['harga']);
        $kuota  = addslashes($_POST['kuota']);


       // $tgl    = date('Y-m-d');

        
        $simpan = $_POST['simpan'];

        if ($simpan=='POSTING') 
        {
            $postingan ='POSTING';
        } 
        else 
        {
            $postingan = 'DRAFT';
        }

        $idUser = $userIdnya;

        $tgl    = date('Y-m-d');

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($fotonm)) 
        {
            $k= $_GET['k'];
            $l= base64_encode($k);

            $tujuan = "../foto/event/$l";
            $newe = uploadEvent("Event", $lokasi);

            //$isian     = "NULL, '$nama', '$tgl', '$desk', '$newe', '$idUser'";
            $isian     = "nama_event='$nama', deskripsi='$desk', foto_event='$newe', 
                        `tanggal_post`='$tgl',
                        `deskripsi`='$desk',
                        `foto_event`='$newe',
                        `id_user`='$idUser',
                        `lokasi`='$tempat',
                        `venue`='$venue',
                        `waktu`='$waktu',
                        `harga_event`='$harga',
                        `kuota`='$kuota',
                        `keterangan`='$postingan'";
        } 
        else 
        {
            //$isian     = "NULL, '$nama', '$tgl', '$desk', 'Kosong', '$idUser'";
            $isian = "nama_event='$nama', deskripsi='$desk',
                        `tanggal_post`='$tgl',
                        `deskripsi`='$desk',
                        
                        `id_user`='$idUser',
                        `lokasi`='$tempat',
                        `venue`='$venue',
                        `waktu`='$waktu',
                        `harga_event`='$harga',
                        `kuota`='$kuota',
                        `keterangan`='$postingan'";
        }
        

        $perintah = $isi->ubahData("event", $isian, "id_event", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=event-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            pindahHal('?hal=event-tambah');
        }
    }



?>