<?php


    class isiData extends konfigurasi
    {
        //public $sambung = $this->$sambungin;
        public function perulanganData($q)
        {
            while ($a = mysqli_fetch_array($q)) 
            {
                $isi[]=$a;
            }
            return $isi;
        }

        public function hitungData($q)
        {
            $hitung = mysqli_num_rows($q);
            return $hitung;
        }

        public function eksekusiSQL($sqlnya)
        {
            $sambungannya=parent::sambungkan();
            $que = mysqli_query($sambungannya, $sqlnya);
            return $que;
        }

        public function cekQuery($query)
        {
            if ($query) 
            {
                $nilai = 1;
            }
            else
            {
                $nilai = 0;
            }

            return $nilai;
        }  

        public function loginData($nama_tabel, $patok1, $patok2, $data1, $data2)
        {
            $s = "SELECT *FROM $nama_tabel WHERE $patok1 ='$data1' AND $patok2='$data2'";
            $q = $this->eksekusiSQL($s);
            //$c = $this->cekQuery($q);
            $h = $this->hitungData($q);

            if ($h>0) 
            {
                $c = 1;
            }
            else
            {
                $c = 0;
            }
            return $c;
        }

        public function tambahData($nama_tabel, $isinya)
        {
            $s = "INSERT INTO $nama_tabel VALUES ($isinya)";
            $q = $this->eksekusiSQL($s);
            $c = $this->cekQuery($q);
            return $c;
        }

        public function ubahData($nama_tabel, $ketentuan, $id, $val)
        {
            $s = "UPDATE $nama_tabel SET $ketentuan WHERE $id ='$val'";
            $q = $this->eksekusiSQL($s);
            $c = $this->cekQuery($q);
            return $c;
        }

        public function hapusData($nama_tabel, $id, $val)
        {
            $s = "DELETE FROM $nama_tabel WHERE $id = '$val' ";
            $q = $this->eksekusiSQL($s);
            $c = $this->cekQuery($q);
            return $c;
        }

        public function tampilData($nama_tabel)
        {
            
            $sql = "SELECT *FROM $nama_tabel";
            $que = $this->eksekusiSQL($sql);
            $hitungan = $this->hitungData($que);

            if ($hitungan>0) 
            {
                $kondisi = $this->perulanganData($que);
            } 
            else 
            {
                $kondisi = $hitungan;
            }
            return $kondisi;
        }

        public function tampilId($nama_tabel, $id, $val)
        {
            
            $sql = "SELECT *FROM $nama_tabel WHERE $id = '$val'";
            $que = $this->eksekusiSQL($sql);
           
            $kondisi = $this->perulanganData($que);
            
            return $kondisi;
        }

        public function kodeOtomatis($kunci, $tabel, $kode)
        {
            $q = "SELECT MAX($kunci) as $kunci FROM $tabel";
            $e = $this->eksekusiSQL($q);

            $cari = mysqli_fetch_array($e);

            $kark_pertama = substr($cari[$kunci], 3,6);
            $tambahkan = $kark_pertama + 1;

            //$kode_otomatis = $kode."00000".$tambahkan;

            if ($tambahkan<10) 
            {
                $enol = "00000";
            } 
            else 
            {
                $enol = "0000";
            }

            $kode_otomatis = $kode.$enol.$tambahkan;
            

            return $kode_otomatis;
        }
    }

?>