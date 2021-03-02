<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='tambah') 
    {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $desk = $_POST['deskripsi'];
        $kelas= $_POST['jumkel'];
        $berlaku = $_POST['berlaku'];
        
        $simpan = $_POST['simpan'];

        if ($simpan=='POSTING') 
        {
            $kondisi = 'POSTING';
        }
        else
        {
            $kondisi = 'DRAFT';
        }

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        $newe = uploadPaket($lokasi);

        $isian     = "NULL, '$nama', '$harga', '$desk', '$kondisi', '$kelas', '$newe', '$berlaku'";
 
        

        $perintah = $isi->tambahData("paket_member", $isian);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           pindahHal('?hal=membership-data');
        } 
        else 
        {
            //pesanALert("Gagal tersimpan");
            //pindahHal('?hal=membership-tambah');
            echo
            "
                $nama <br>
                $harga <br>
                $desk <br>
                $kondisi
            ";
        }
        
    }
    elseif ($mau=="hapus") 
    {
        $ide = @$_GET['idp'];
        $foto= $_GET['f'];

        $tujuan = "../foto/paket/$foto";

        $perintah = $isi->hapusData("paket_member", "id_paket", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=membership-data');
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
        $harga = $_POST['harga'];
        $desk = $_POST['deskripsi'];
        $kelas= $_POST['jumkel'];
        $berlaku = $_POST['berlaku'];
        
        $simpan = $_POST['simpan'];

        if ($simpan=='POSTING') 
        {
            $kondisi = 'POSTING';
        }
        else
        {
            $kondisi = 'DRAFT';
        }

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        $newe = uploadPaket($lokasi);

        if (!empty($fotonm)) 
        {
            $isian     = "`nama_paket`='$nama',`harga_member`='$harga',`deskripsi_paket`='$desk',`kondisi`='$simpan',`jumlah_kelas`='$kelas',`foto_paket`='$newe',`masa_berlaku`='$berlaku'";
 
            $foto= $_GET['f'];

            $tujuan = "../foto/paket/$foto";
        } 
        else {
            $isian     = "`nama_paket`='$nama',`harga_member`='$harga',`deskripsi_paket`='$desk',`kondisi`='$simpan',`jumlah_kelas`='$kelas',`masa_berlaku`='$berlaku'";
 
        }
        

        

        $perintah = $isi->ubahData("paket_member", $isian, "id_paket", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           unlink($tujuan);
           pesanALert("Data tersimpan");
           pindahHal('?hal=membership-data');
        } 
        else 
        {
            //pesanALert("Gagal tersimpan");
            //pindahHal('?hal=membership-tambah');
            echo
            "
                $nama <br>
                $harga <br>
                $desk <br>
                $kondisi
            ";
        }
    }



?>