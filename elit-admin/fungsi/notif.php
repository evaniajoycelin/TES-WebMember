<?php

    $notifTransaksi = $isi->eksekusiSQL("SELECT *FROM transaksi WHERE 
    keterangan='Sedang diproses' AND baca_member='Belum dibaca'");

    $hitungTransaksi = $isi->hitungData($notifTransaksi);


    if ($hitungTransaksi>0) 
    {
        $pesanTransaksi = "Transaksi sudah diproses";
        $angkaTransaksi = $hitungTransaksi;
        $linkTrans = "?hal=akun-transaksi";
    }
    else
    {
        $pesanTransaksi = "Belum ada Transaksi";
        $angkaTransaksi ="";
        $linkTrans = "#";
    }

    $lonTrans = loncengNotif($hitungTransaksi);

?>