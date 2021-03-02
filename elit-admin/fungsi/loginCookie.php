<?php

    $admin = @$_COOKIE['userAkun'];

    include './fungsi/akun.php';

    if (empty($admin)) 
    {
        pindahHal('login.php');
      
    }
    else
    {
        include './fungsi/menu-atas.php';
        include './fungsi/pindahAdmin.php';
    }

?>