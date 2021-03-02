<?php

    $mau = @$_GET['mau'];
    
    if ($mau=='tambah') 
    {
        $paket = $_POST['idpaket'];
        $kelas = $_POST['idkelas'];

        $isian     = "NULL, '$paket', '$kelas'";

        $hPaket= $isi->eksekusiSQl("SELECT *FROM paket_member WHERE id_paket='$paket'");
        $hKelas= $isi->eksekusiSQl("SELECT *FROM paket_kelas WHERE id_paket='$paket'");
        $tungLas= $isi->hitungData($hKelas);
        //$tunKet= $isi->hitungData($hPaket);
        foreach ($hPaket as $k) 
        {
           $jumkel = $k['jumlah_kelas'];
           if ($tungLas==$jumkel) 
           {
               pesanALert("Data Kelas sudah terisi");
               pindahHal("?hal=paket-data");
           } 
           else 
           {
               $perintah = $isi->tambahData("paket_kelas", $isian);
               $eksekusi = $isi->cekQuery($perintah);
       
               if ($eksekusi==1) 
               {
                  pesanALert("Data tersimpan");
                  pindahHal('?hal=paket-data');
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
        }

        

    

       
        
       

       
       
        
 
        

       
        
    }
    elseif ($mau=="hapus") 
    {
        $ide = @$_GET['id'];
        //$foto= $_GET['f'];

        //$tujuan = "../foto/paket/$foto";

        $perintah = $isi->hapusData("paket_kelas", "id_paketkelas", "$ide");

        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           //unlink($tujuan);
           pesanALert("Data terhapus");
           pindahHal('?hal=paket-data');
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
        $paket = $_POST['idpaket'];
        $kelas = $_POST['idkelas'];
        
        

     
        $isian     = "`id_paket`='$paket',`id_kelas`='$kelas'";
 
        
        

        

        $perintah = $isi->ubahData("paket_kelas", $isian, "id_paketkelas", $id);
        $eksekusi = $isi->cekQuery($perintah);

        if ($eksekusi==1) 
        {
           //unlink($tujuan);
           pesanALert("Data telah diubah");
           pindahHal('?hal=paket-data');
        } 
        else 
        {
            //pesanALert("Gagal tersimpan");
            //pindahHal('?hal=membership-tambah');
            echo
            "
                ho
            ";
        }
    }



?>