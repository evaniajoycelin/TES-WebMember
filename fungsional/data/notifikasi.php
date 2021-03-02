<?php

    if (!empty($userId)) 
    {
        $notifTransaksi = $crud->eksekusiSQL("SELECT *FROM transaksi WHERE 
        id_user='$userId' AND baca_member='Belum dibaca' AND keterangan='Sedang diproses' ORDER BY id_transaksi DESC");

        $hitungTransaksi = $crud->hitungData($notifTransaksi);


        if ($hitungTransaksi>0) 
        {
            foreach($notifTransaksi as $k)
            {
                $keter = $k['keterangan'];
                $idev  = $k['id_event'];
                $ipak  = $k['id_paket'];

                if ($keter='Sedang diproses') 
                {
                    if ($idev==NULL) 
                    {
                        $p = "Transaksi Paket";
                    } 
                    else 
                    {
                        $p = "Transaksi Event";
                    }
                    
                    $katanya = "$p Sedang diproses";
                    
                } 
                else 
                {
                    if ($idev==NULL) 
                    {
                        $p = "Transaksi Paket";
                    } 
                    else 
                    {
                        $p = "Transaksi Event";
                    }
                    
                    $katanya = "$p Sudah diproses";
                }

                $pesanTransaksi = $katanya;
                $angkaTransaksi = $hitungTransaksi;
                $linkTrans = "?hal=akun-respon&mode=dibaca";
                
            }

            
        }
        else
        {
            $pesanTransaksi = "Belum ada Transaksi";
            $angkaTransaksi ="";
            $linkTrans = "#";
        }

       
    }

?>