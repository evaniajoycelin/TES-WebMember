<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='tambah') 
    {
        $nama = $_POST['nama'];
        $desk = $_POST['deskripsi'];
        
        $simpan = $_POST['simpan'];
        $pesan = $_POST['pesan'];

        

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];


        
        




        

        if (!empty($fotonm)) 
        {
            $newe = uploadFotoKelas($fotonm, $lokasi);

            $isian     = "NULL, '$nama', '$desk', '$newe', '$simpan', '$pesan'";
        } 
        else 
        {
            $isian     = "NULL, '$nama', '$desk', 'Kosong', '$simpan', '$pesan'";
        }
        

        $perintah = $isi->tambahData("kelas", $isian);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=kelas-data');
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
        $foto= $_GET['f'];

        $tujuan = "../foto/$foto";

        $perintah = $isi->hapusData("kelas", "id_kelas", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=kelas-data');
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
        $desk = $_POST['deskripsi'];
        
        $simpan = $_POST['simpan'];
        $pesan = $_POST['pesan'];

        

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($fotonm)) 
        {
            $k= $_GET['f'];
            //$l= base64_encode($k);

            $tujuan = "../foto/$k";
            $newe = uploadFotoKelas($fotonm, $lokasi);

            //$isian     = "NULL, '$nama', '$tgl', '$desk', '$newe', '$idUser'";
            $isian     = "nama_kelas='$nama', deskripsi='$desk', foto_kelas='$newe', kondisi='$simpan', pesan='$pesan'";
        } 
        else 
        {
            //$isian     = "NULL, '$nama', '$tgl', '$desk', 'Kosong', '$idUser'";
            $isian = "nama_kelas='$nama', deskripsi='$desk', kondisi='$simpan', pesan='$pesan'";
        }
        

        $perintah = $isi->ubahData("kelas", $isian, "id_kelas", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=kelas-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
    }



?>