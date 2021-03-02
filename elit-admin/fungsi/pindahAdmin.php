<?php

    $hal = @$_GET['hal'];

    if (empty($hal)) 
    {
        include './halaman/home.php';
    } 
    else 
    {
        $namaFile = "./halaman/$hal.php";

        if (file_exists($namaFile)) 
        {
            include $namaFile;
        } 
        else 
        {
            pindahHal("404.php");
        }
    }
    

?>