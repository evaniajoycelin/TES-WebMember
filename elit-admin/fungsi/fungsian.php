<?php

    function pindahHal($a)
    {
        echo
        "
            <script>
                window.location='$a';
            </script>
        ";
    }

    function formatRupiah($angka)
    {
        $isi = number_format($angka, 0, ".", ".");
        return $isi;
    }


    function pesanALert($a)
    {
        echo
        "
            <script>
                alert('$a');
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
        $nm = "$nama-";
        $ac = date("Ymdhis");

        $nmBaru = $nm.$ac.".jpg";

        $tujuan = '../foto/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function uploadEvent($nama, $lokasi)
    {
        $nm = "$nama-";
        $ac = date("Ymdhis");

        $nmBaru = $nm.$ac.".jpg";

        $tujuan = '../foto/event/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function uploadKursus($nama, $lokasi)
    {
        $nm = "$nama-";
        $ac = date("Ymdhis");

        $nmBaru = $nm.$ac.".jpg";

        $tujuan = '../foto/kursus/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function uploadFotoKelas($nama, $lokasi)
    {
        $nm = "Kelas-";
        $ac = date("Ymdhis");

        $nmBaru = $nm.$ac.".jpg";

        $tujuan = '../foto/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function tglBalik($tgl)
    {
        $hasil = date("d F Y", strtotime($tgl));
        return $hasil;
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

    function loncengNotif($a)
    {
        if ($a==0) 
        {
            $isi = "";
        } 
        else 
        {
            $isi =
            
            
            "
                <sup>
                    <span class='badge badge-danger'><i class='fas fa-bell active' aria-hidden='true'>$a</i></span>
                </sup>
            
            ";
        }

        return $isi;
        
    }

    function uploadUser($nama, $lokasi)
    {
        $nm = "$nama";
        $ac = date("Ymdhis");

        $nmBaru = $nm."-".$ac.".jpg";

        $tujuan = '../foto/user/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function uploadSosmed($lokasi)
    {
        $nm = "sosmed";
        $ac = date("Ymdhis");

        $nmBaru = $nm."-".$ac.".jpg";

        $tujuan = '../foto/sosmed/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }

    function uploadPaket($lokasi)
    {
        $nm = "paket";
        $ac = date("Ymdhis");

        $nmBaru = $nm."-".$ac.".jpg";

        $tujuan = '../foto/paket/'.$nmBaru;
        move_uploaded_file($lokasi, $tujuan);


        return $nmBaru;

    }
?>

