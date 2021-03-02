<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EliTES</title>

  <link rel="shortcut icon" href="img/LogoHitam.png">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">

  <!--fancybox-->
  <link rel="stylesheet" href="vendor/fancybox/jquery.fancybox.min.css">

  <link href="ev-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/danny-design.css">
  <link rel="stylesheet" href="css/tampilan.css">
  

</head>

<body>

  <?php

  //wao banget

    include './fungsional/data/fungsional.php';
    include './fungsional/data/konfigurasi.php';
    include './fungsional/data/isiData.php';

    $crud = new isiData();
    $iduser = @$_COOKIE['userEmail'];

    //include './fungsional/data/login-cookie.php';
    
    include './fungsional/data/data-user.php';
    include './fungsional/data/notifikasi.php';
    include './fungsional/konfig/pindahHal.php'; 
    include './fungsional/data/modal.php';

  ?>

  

  <!-- Bootstrap core JavaScript -->
  <script src='vendor/jquery/jquery.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

  <!--fancybox-->
  <script src="./vendor/fancybox/jquery.fancybox.min.js"></script>

  <!--oploo-->
  <script type="text/javascript" src="./vendor/oploo/jquery.uploadPreview.min.js"></script>

  <script src="./vendor/tambahan/tools.js"></script>
 

</body>

</html>
