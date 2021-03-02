<?php

    function pindahHalaman($hal)
    {
        echo
        "
            <script>
                window.location='?hal=$hal';
            </script>
        ";
    }

    function formatRupiah($angka)
    {
        $isi = number_format($angka, 0, ".", ".");
        return $isi;
    }


    function kurangin($n, $y)
    {
        $z = $n - $y;
        return $z;
    }

    function pesanAlert($pesan)
    {
        echo
        "
            <script>
                alert('$pesan');
            </script>
        ";
    }

    function pesanKosong()
    {
        echo
        "
        <div class='alert alert-primary marjin-atas-50' role='alert'>
            <center>
            <h4 class='alert-heading'>Data Masih Kosong</h4>
            </center>
        </div>
        ";
    }

    function uploadFoto($nama, $lokasi)
    {
        $nm = "$nama";
        $ac = date("Ymdhis");

        $nmBaru = "user"."-".$ac.".jpg";

        $tujuan = './foto/user/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

   

    function uploadStruk($nama, $lokasi)
    {
        $nm = "Struk_$nama";
        $ac = date("Ymdhis");

        $nmBaru = $nm."-".$ac.".jpg";

        $tujuan = './foto/struk/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function uploadBisnis($nama, $lokasi)
    {
        $nm = "Bisnis_$nama";
        $ac = date("Ymdhis");

        $nmBaru = $nm."-".$ac.".jpg";

        $tujuan = './foto/bisnismember/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function youtubeGambar($link)
    {
        if(!filter_var($link, FILTER_VALIDATE_URL)){
            // URL is Not valid
            return false;
        }
        $domain=parse_url($link,PHP_URL_HOST);
        if($domain=='www.youtube.com' OR $domain=='youtube.com') // http://www.youtube.com/watch?v=t7rtVX0bcj8&feature=topvideos_film
        {
            if($querystring=parse_url($link,PHP_URL_QUERY))
            {  
                parse_str($querystring);
                if(!empty($v)) return "http://img.youtube.com/vi/$v/0.jpg";
                else return false;
            }
            else return false;
        
        }
        elseif($domain == 'youtu.be') // something like http://youtu.be/t7rtVX0bcj8
        {
            $v= str_replace('/','', parse_url($link, PHP_URL_PATH));
            return (empty($v)) ? false : "http://img.youtube.com/vi/$v/0.jpg" ;
        }
        
        else
        
        return false;
    }

    function notifikasi($hitung)
    {
        if ($hitung==0) 
        {
            echo
            "
           
            ";
        } 
        else 
        {
            echo
            "
            <span class='badge badge-danger'>
                $hitung
            </span>   
            ";
        }
    }

    function tglBalik($tgl)
    {
        $hasil = date("d F Y", strtotime($tgl));
        return $hasil;
    }

?>


