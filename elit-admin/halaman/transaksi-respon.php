<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='ok') 
    {
        $ingin = @$_GET['ingin'];
        $idT   = @$_GET['idt'];

        $id = $_GET['id'];

        $tglSekarang = date('Y-m-d');

        $idus = $_GET['idus'];
        $idev = $_GET['idev'];
        


        if ($ingin=='paket') 
        {
            //$masukin = "id_paket='$idT'";
            
            $cariPaket = $isi->eksekusiSQL("SELECT *FROM paket_member WHERE id_paket='$idT'");

            foreach ($cariPaket as $p) 
            {
                //$iPaket     = $p['id_paket'];
                $masaBerlaku = $p['masa_berlaku'];
                if ($masaBerlaku=='1 Tahun') 
                {
                    $tgl = date("Y-m-d");
                    $berlaku=date('Y-m-d', strtotime('+ 1 years', strtotime($tgl)));
                }
            }

            //$masukin = "id_paket='$id'"

            $ketentuan = "keterangan='Ok', baca_member='Belum dibaca', baca_admin='Sudah dibaca', tgl_transaksi='$tglSekarang', tgl_berakhir='$berlaku'";
           
        }
        else
        {
            //$masukin = "id_event='$idT'";
            $angkutan = "NULL, '$idev', '$idus'";
            $evenIkut = $isi->tambahData("event_daftar", $angkutan);
            $ketentuan = "keterangan='Ok', baca_member='Belum dibaca', baca_admin='Sudah dibaca'";
        }
        

        

        $perintah = $isi->ubahData("transaksi", $ketentuan, "id_transaksi", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {

            //ubahStatus($idT, $isi);

            if ($ingin=='paket') 
            {
                $ambilPaket = $isi->eksekusiSQL("SELECT *FROM transaksi WHERE id_transaksi='$id'");

                foreach ($ambilPaket as $key) 
                {
                    $idUser = $key['id_user'];
                    $idPaket= $key['id_paket'];
                    //$nmP    = $key['nama_paket'];

                    $ketentuan = "id_user='$idUser', id_paket='$idPaket'";
                    $sikat = $isi->ubahData("user_status", $ketentuan, "id_user", $idUser);

                }
                //$ketentuan = "id_user='$idus', id_paket='$idT'";
                //$sikat = $isi->ubahData("user_status", $ketentuan, "id_user", $idUser);
            }

            
           

           pesanALert("Keterangan diubah");
           pindahHal('?hal=transaksi-data');
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
        $foto= @$_GET['f'];
        $ingin = @$_GET['ingin'];
        $idYuser= @$_GET['idu'];

        $balikPaket= @$_GET['balik-user'];

        $tujuan = "../foto/struk/$foto";

        $perintah = $isi->hapusData("transaksi", "id_transaksi", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
            if ($ingin=='paket') 
            {
                $ambilPaket = $isi->eksekusiSQL("SELECT *FROM paket_member WHERE nama_paket='Free User'");

                foreach ($ambilPaket as $key) 
                {
                    //$idUser = $key['id_user'];
                    $idPaket= $key['id_paket'];
                    //$nmP    = $key['nama_paket'];

                    $ketentuan = "id_user='$idYuser', id_paket='$idPaket'";
                    $sikat = $isi->ubahData("user_status", $ketentuan, "id_user", $idYuser);

                }
            }
           unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=transaksi-data');
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

        $idUser = $userIdnya;

        $tgl    = date('Y-m-d');

        $fotonm = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($fotonm)) 
        {
            $k= $_GET['k'];
            $l= base64_encode($k);

            $tujuan = "../foto/$l";
            $newe = uploadFoto($fotonm, $lokasi);

            //$isian     = "NULL, '$nama', '$tgl', '$desk', '$newe', '$idUser'";
            $isian     = "nama_event='$nama', deskripsi='$desk', foto_event='$newe'";
        } 
        else 
        {
            //$isian     = "NULL, '$nama', '$tgl', '$desk', 'Kosong', '$idUser'";
            $isian = "nama_event='$nama', deskripsi='$desk'";
        }
        

        $perintah = $isi->ubahData("event", $isian, "id_event", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           pesanALert("Data tersimpan");
           //pindahHal('?hal=event-data');
        } 
        else 
        {
            pesanALert("Gagal tersimpan");
            //pindahHal('?hal=event-tambah');
        }
    }



?>