<?php

    /*
        halaman ini, untuk perpindahan halaman web
    */


    $hal = @$_GET['hal'];

    if (empty($hal)) 
    {
        //include './fungsional/halm/home.php';
        include './fungsional/data/login-cookie.php';
    }
    else
    {
        $namaFile = $hal.".php";
        $lokasiFile = "./fungsional/halm/$namaFile";
        if (!file_exists($lokasiFile)) 
        {
            echo
            "
                <h1>Kosong</h1>
            ";
        } 
        else 
        {
            include './fungsional/halm/'.$hal.'.php';   
            
        }

        
        
    }

?>