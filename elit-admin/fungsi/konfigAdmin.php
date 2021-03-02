<?php

    class konfigurasi
    {
        public $sambungin;
        public function __construct()
        {
            $this->sambungkan();
        }

        function sambungkan()
        {
            include '../fungsional/data/koneksi.php';
            $sambungan = mysqli_connect($server, $username, $password, $database);

            if ($sambungan) 
            {
                return $sambungan;
            }
            else
            {
                echo
                "
                    <h1>Gagal Konek database</h1>
                ";
            }
        }
    }

?>