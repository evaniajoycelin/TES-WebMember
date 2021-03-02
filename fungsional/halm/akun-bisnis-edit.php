<?php
include './fungsional/konfig/headerUdahLogin.php';
?>


<?php

$idpreneur = @$_GET['idpe'];

/*$tgl = date('Y-m-d');

    $tglPost = "2020-02-10";

    $berlaku = date('Y-m-d',strtotime('+30 days', strtotime($tglPost)));

    $tglExp = date("Y-m-d", $berlaku);

    $tgl1    = "2018-12-16"; // menentukan tanggal awal
    $tgl2    = date('Y-m-d', strtotime('+ 1 years', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
   // echo $tgl2; // cetak tanggal

   if ($tgl==$tgl2) 
   {
     $pesan = "Habis";
   }
   

    echo
    "
      <div style='margin-top:100px;'>
        $tgl <br>
        $tglPost <br>
        $berlaku <br>
        $tglExp <br>
        $tgl2 $pesan
      </div>
    ";
   */
$statuser = $crud->eksekusiSQl("SELECT *FROM user_status
                                                    INNER JOIN paket_member
                                                      ON user_status.id_paket = paket_member.id_paket
                                                    WHERE id_user='$userId'");

foreach ($statuser as $e) {
    $jumlahKelas = $e['jumlah_kelas'];
    $namaPaket   = $e['nama_paket'];
}

?>

<section class="lapak-putih" style="margin-top: 0;">

    <div class="container lapak-putih" style="padding: 20px; margin-top:100px;">

        <div class="row">
            <div class="col-md-2">

                <?php
                include './fungsional/data/membership.php';

                $perintah = $crud->eksekusiSQl("SELECT *FROM user_preneur 
                                                INNER JOIN user ON user.id_user=user_preneur.id_user
                                                INNER JOIN provinsi ON provinsi.id_provinsi=user_preneur.id_provinsi
                                                WHERE user_preneur.id_userpreneur='$idpreneur'
                                              ");
                foreach ($perintah as $a) {
                    //$idUneur = $a['id_userpreneur'];
                    $nama   = $a['nama_bisnis'];
                    $tahun  = $a['tahun_dirikan'];
                    $bidang = $a['bidang_usaha'];
                    //$email  = $a['email'];
                    $user   = $a['nama_user'];
                    //$foto   = $a['foto'];
                    $hak    = $a['hak_akses'];

                    $ius    = $a['id_user'];

                    $ig     = $a['akun_instagram'];
                    $fb     = $a['page_facebook'];

                    $web    = $a['website_bisnis'];

                    $omset  = $a['omset_bulanan'];
                    $jumkar = $a['jumlah_karyawan'];
                    $deskrip = $a['deskripsi_usaha'];

                    $foto   = $a['foto_usaha'];


                    $nmpr = $a['nama_provinsi'];
                    $idpr = $a['id_provinsi'];

                    $alamatBis = $a['alamat_bisnis'];
                    $emailBis  = $a['email_bisnis'];

                    $telpBis = $a['telp_bisnis'];
                    $industri= $a['industri'];



                    if ($foto == "Kosong") {
                        $gambar = "<img id='gambarUsaha' src='img/nofoto.png' width='100%' height='200'>";
                    } else {
                        $tujuan = "foto/bisnismember/$foto";


                        $gambar = "<img id='gambarUsaha' src='$tujuan' width='100%' height='200'>";
                    }


                    //perihal omset
                    //< Rp 10 Juta
                    if ($omset == '< Rp 10 Juta') {
                        $tampilOmset =
                            "
                            <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='< Rp 10 Juta' checked>
                                <label class='form-check-label' for='inlineRadio1'>
                                    < Rp 10 Juta</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='omset' id='inlineRadio2' value='Rp 10 Juta - Rp 20 Juta'>
                                        <label class='form-check-label' for='inlineRadio2'>Rp 10 Juta - Rp 20 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='500-1000 Orang'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 25 Juta - Rp 50 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 50 Juta - Rp 100 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 50 Juta - Rp 100 Juta</label>
                            </div>

                            <!--radio-->
                        </div>

                        <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 100 Juta - Rp 250 Juta'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 100 Juta - Rp 250 Juta</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 250 Juta - Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 250 Juta - Rp 1 Milyar</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='> Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> > Rp 1 Milyar</label>
                            </div>
                            <!--radio-->
                        </div>
                        ";
                    } elseif ($omset == 'Rp 10 Juta - Rp 20 Juta') {
                        $tampilOmset =
                            "
                            <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='< Rp 10 Juta'>
                                <label class='form-check-label' for='inlineRadio1'>
                                    < Rp 10 Juta</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='omset' id='inlineRadio2' value='Rp 10 Juta - Rp 20 Juta' checked>
                                        <label class='form-check-label' for='inlineRadio2'>Rp 10 Juta - Rp 20 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 25 Juta - Rp 50 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 25 Juta - Rp 50 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 50 Juta - Rp 100 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 50 Juta - Rp 100 Juta</label>
                            </div>

                            <!--radio-->
                        </div>

                        <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 100 Juta - Rp 250 Juta'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 100 Juta - Rp 250 Juta</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 250 Juta - Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 250 Juta - Rp 1 Milyar</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='> Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> > Rp 1 Milyar</label>
                            </div>
                            <!--radio-->
                        </div>
                        ";
                    } elseif ($omset == 'Rp 25 Juta - Rp 50 Juta') {
                        $tampilOmset =
                            "
                            <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='< Rp 10 Juta'>
                                <label class='form-check-label' for='inlineRadio1'>
                                    < Rp 10 Juta</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='omset' id='inlineRadio2' value='Rp 10 Juta - Rp 20 Juta'>
                                        <label class='form-check-label' for='inlineRadio2'>Rp 10 Juta - Rp 20 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 25 Juta - Rp 50 Juta' checked>
                                <label class='form-check-label' for='inlineRadio2'>Rp 25 Juta - Rp 50 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 50 Juta - Rp 100 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 50 Juta - Rp 100 Juta</label>
                            </div>

                            <!--radio-->
                        </div>

                        <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 100 Juta - Rp 250 Juta'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 100 Juta - Rp 250 Juta</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 250 Juta - Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 250 Juta - Rp 1 Milyar</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='> Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> > Rp 1 Milyar</label>
                            </div>
                            <!--radio-->
                        </div>
                        ";
                    } elseif ($omset == 'Rp 50 Juta - Rp 100 Juta') {
                        $tampilOmset =
                            "
                            <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='< Rp 10 Juta'>
                                <label class='form-check-label' for='inlineRadio1'>
                                    < Rp 10 Juta</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='omset' id='inlineRadio2' value='Rp 10 Juta - Rp 20 Juta'>
                                        <label class='form-check-label' for='inlineRadio2'>Rp 10 Juta - Rp 20 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 25 Juta - Rp 50 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 25 Juta - Rp 50 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 50 Juta - Rp 100 Juta' checked>
                                <label class='form-check-label' for='inlineRadio2'>Rp 50 Juta - Rp 100 Juta</label>
                            </div>

                            <!--radio-->
                        </div>

                        <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 100 Juta - Rp 250 Juta'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 100 Juta - Rp 250 Juta</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 250 Juta - Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 250 Juta - Rp 1 Milyar</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='> Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> > Rp 1 Milyar</label>
                            </div>
                            <!--radio-->
                        </div>
                        ";
                    } elseif ($omset == 'Rp 100 Juta - Rp 250 Juta') {
                        $tampilOmset =
                            "
                            <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='< Rp 10 Juta'>
                                <label class='form-check-label' for='inlineRadio1'>
                                    < Rp 10 Juta</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='omset' id='inlineRadio2' value='Rp 10 Juta - Rp 20 Juta'>
                                        <label class='form-check-label' for='inlineRadio2'>Rp 10 Juta - Rp 20 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 25 Juta - Rp 50 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 25 Juta - Rp 50 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 50 Juta - Rp 100 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 50 Juta - Rp 100 Juta</label>
                            </div>

                            <!--radio-->
                        </div>

                        <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 100 Juta - Rp 250 Juta' checked>
                                <label class='form-check-label' for='inlineRadio1'> Rp 100 Juta - Rp 250 Juta</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 250 Juta - Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 250 Juta - Rp 1 Milyar</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='> Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> > Rp 1 Milyar</label>
                            </div>
                            <!--radio-->
                        </div>
                        ";
                    } elseif ($omset == 'Rp 250 Juta - Rp 1 Milyar') {
                        $tampilOmset =
                            "
                            <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='< Rp 10 Juta'>
                                <label class='form-check-label' for='inlineRadio1'>
                                    < Rp 10 Juta</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='omset' id='inlineRadio2' value='Rp 10 Juta - Rp 20 Juta'>
                                        <label class='form-check-label' for='inlineRadio2'>Rp 10 Juta - Rp 20 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 25 Juta - Rp 50 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 25 Juta - Rp 50 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 50 Juta - Rp 100 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 50 Juta - Rp 100 Juta</label>
                            </div>

                            <!--radio-->
                        </div>

                        <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 100 Juta - Rp 250 Juta'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 100 Juta - Rp 250 Juta</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 250 Juta - Rp 1 Milyar' checked>
                                <label class='form-check-label' for='inlineRadio1'> Rp 250 Juta - Rp 1 Milyar</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='> Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> > Rp 1 Milyar</label>
                            </div>
                            <!--radio-->
                        </div>
                        ";
                    } else {
                        $tampilOmset =
                            "
                            <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='< Rp 10 Juta'>
                                <label class='form-check-label' for='inlineRadio1'>
                                    < Rp 10 Juta</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='omset' id='inlineRadio2' value='Rp 10 Juta - Rp 20 Juta'>
                                        <label class='form-check-label' for='inlineRadio2'>Rp 10 Juta - Rp 20 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 25 Juta - Rp 50 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 25 Juta - Rp 50 Juta</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio3' value='Rp 50 Juta - Rp 100 Juta'>
                                <label class='form-check-label' for='inlineRadio2'>Rp 50 Juta - Rp 100 Juta</label>
                            </div>

                            <!--radio-->
                        </div>

                        <div style='margin-left: 30px; margin-top:10px;'>
                            <!--radio-->
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 100 Juta - Rp 250 Juta'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 100 Juta - Rp 250 Juta</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='Rp 250 Juta - Rp 1 Milyar'>
                                <label class='form-check-label' for='inlineRadio1'> Rp 250 Juta - Rp 1 Milyar</label>
                            </div>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='omset' id='inlineRadio1' value='> Rp 1 Milyar' checked>
                                <label class='form-check-label' for='inlineRadio1'> > Rp 1 Milyar</label>
                            </div>
                            <!--radio-->
                        </div>
                        ";
                    }

                    if ($jumkar == '< 10 Orang') {
                        $banyakKar =
                            "
                        <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='< 10 Orang' checked>
                                <label class='form-check-label' for='karyawan'>
                                    < 10 Orang</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='10-50 Orang'>
                                        <label class='form-check-label' for='karyawan'>10-50 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='50-100 Orang'>
                                <label class='form-check-label' for='karyawan'>50-100 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='500-1000 Orang'>
                                <label class='form-check-label' for='karyawan'>500-1000 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='>1000 Orang'>
                                <label class='form-check-label' for='karyawan'>>1000 Orang</label>
                        </div>
                        ";
                    } elseif ($jumkar == '10-50 Orang') {
                        $banyakKar =
                            "
                        <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='< 10 Orang' >
                                <label class='form-check-label' for='karyawan'>
                                    < 10 Orang</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='10-50 Orang' checked>
                                        <label class='form-check-label' for='karyawan'>10-50 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='50-100 Orang'>
                                <label class='form-check-label' for='karyawan'>50-100 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='500-1000 Orang'>
                                <label class='form-check-label' for='karyawan'>500-1000 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='>1000 Orang'>
                                <label class='form-check-label' for='karyawan'>>1000 Orang</label>
                        </div>
                        ";
                    } elseif ($jumkar == '50-100 Orang') {
                        $banyakKar =
                            "
                        <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='< 10 Orang' >
                                <label class='form-check-label' for='karyawan'>
                                    < 10 Orang</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='10-50 Orang'>
                                        <label class='form-check-label' for='karyawan'>10-50 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='50-100 Orang' checked>
                                <label class='form-check-label' for='karyawan'>50-100 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='500-1000 Orang'>
                                <label class='form-check-label' for='karyawan'>500-1000 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='>1000 Orang'>
                                <label class='form-check-label' for='karyawan'>>1000 Orang</label>
                        </div>
                        ";
                    } elseif ($jumkar == '500-1000 Orang') {
                        $banyakKar =
                            "
                        <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='< 10 Orang' >
                                <label class='form-check-label' for='karyawan'>
                                    < 10 Orang</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='10-50 Orang'>
                                        <label class='form-check-label' for='karyawan'>10-50 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='50-100 Orang'>
                                <label class='form-check-label' for='karyawan'>50-100 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='500-1000 Orang' checked>
                                <label class='form-check-label' for='karyawan'>500-1000 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='>1000 Orang'>
                                <label class='form-check-label' for='karyawan'>>1000 Orang</label>
                        </div>
                        ";
                    } else {
                        $banyakKar =
                            "
                        <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='< 10 Orang' >
                                <label class='form-check-label' for='karyawan'>
                                    < 10 Orang</label> </div> <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='10-50 Orang'>
                                        <label class='form-check-label' for='karyawan'>10-50 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='50-100 Orang'>
                                <label class='form-check-label' for='karyawan'>50-100 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='500-1000 Orang'>
                                <label class='form-check-label' for='karyawan'>500-1000 Orang</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jumkar' id='karyawan' value='>1000 Orang' checked>
                                <label class='form-check-label' for='karyawan'>>1000 Orang</label>
                        </div>
                        ";
                    }
                }
                ?>
            </div>

            <div class="col-md-10">
                <h1 style="margin: 30px; margin-bottom:0px;"><?php echo "$namauser"; ?></h1>

                <hr>

                <form action="?hal=akun-respon&mode=preneur_edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idpe" value="<?php echo $idpreneur; ?>">

                    <table width="100%">
                        <tr>
                            <td width="35%">Nama Bisnis Anda <sup class="text-danger">
                                    <font size='3'>*</font>
                                </sup></td>
                            <td>:</td>
                            <td>
                                <input value="<?php echo $nama; ?>" class="form-control" type="text" name="nama" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Tahun Berapa bisnis anda didirikan? <sup class="text-danger">
                                    <font size='3'>*</font>
                                </sup></td>
                            <td>:</td>
                            <td>
                                <input value="<?php echo $tahun; ?>" class="form-control" type="number" name="tahun" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Bergerak di bidang apa bisnis anda? <sup class="text-danger">
                                    <font size='3'>*</font>
                                </sup></td>
                            <td>:</td>
                            <td>

                                <select class="form-control" name="bidang" required>
                                    <option value="<?php echo $bidang; ?>"><?php echo $bidang; ?></option>
                                    <option value="Produk">Produk</option>
                                    <option value="Jasa">Jasa</option>
                                    <option value="Produk & Jasa">Produk & Jasa</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td width="35%">Industri <sup class="text-danger">
                                    <font size='3'>*</font>
                                </sup></td>
                            <td>:</td>
                            <td>


                                <select class="form-control" name="industri" required>
                                    <option value="<?php echo $industri; ?>"><?php echo $industri; ?></option>
                                    <option value="Makanan dan minuman">Makanan dan minuman</option>
                                    <option value="Tembakau">Tembakau</option>
                                    <option value="Tekstil">Tekstil</option>
                                    <option value="Pakaian Jadi">Pakaian Jadi</option>
                                    <option value="Kulit dan barang dari kulit">Kulit dan barang dari kulit</option>
                                    <option value="Kertas dan barang dari kertas">Kertas dan barang dari kertas</option>
                                    <option value="Penerbitan, percetakan, dan reproduksi">Penerbitan, percetakan, dan reproduksi</option>
                                    <option value="Batu bara, minyak, dan gas bumi, dan bahan bakar dari nuklir">Batu bara, minyak, dan gas bumi, dan bahan bakar dari nuklir</option>
                                    <option value="Kimia dan barang-barang dari bahan kimia">Kimia dan barang-barang dari bahan kimia</option>
                                    <option value="Karet, dan barang-barang dari plastik">Karet, dan barang-barang dari plastik</option>
                                    <option value="Barang galian dari logam">Barang galian dari logam</option>
                                    <option value="Logam dasar">Logam dasar</option>
                                    <option value="Barang-barang dari logam, dan peralatannya">Barang-barang dari logam, dan peralatannya</option>
                                    <option value="Mesin dan perlengkapannya">Mesin dan perlengkapannya</option>
                                    <option value="Peralatan kantor, akutansi, dan pengolahan data">Peralatan kantor, akutansi, dan pengolahan data</option>
                                    <option value="Mesin listrik lainnya dan perlengkapannya">Mesin listrik lainnya dan perlengkapannya</option>
                                    <option value="Radio, televisi, dan peralatan komunikasi">Radio, televisi, dan peralatan komunikasi</option>
                                    <option value="Peralatan kedokteran, alat ukur, navigasi, optik, dan jam">Peralatan kedokteran, alat ukur, navigasi, optik, dan jam</option>
                                    <option value="Kendaraan bermotor">Kendaraan bermotor</option>
                                    <option value="Alat angkutan lainnya">Alat angkutan lainnya</option>
                                    <option value="Furniture, peralatan rumah tangga dan industri pengolahan lainnya ">Furniture, peralatan rumah tangga dan industri pengolahan lainnya </option>
                                    <option value="Souvenir">Souvenir</option>
                                    <option value="Event, dan wedding organiser">Event, dan wedding organiser</option>
                                    <option value="Service peralatan elektronik ">Service peralatan elektronik </option>
                                    <option value="Jasa konsultasi">Jasa konsultasi</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Startup">Startup</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
            </div>
            </td>
            </tr>

            <tr>
                <td width="35%">Akun Instagram Bisnis anda</td>
                <td>:</td>
                <td>
                    <input value="<?php echo $ig; ?>" class="form-control" type="text" name="ig">
                </td>
            </tr>
            <tr>
                <td width="35%">Page Facebook Bisnis anda</td>
                <td>:</td>
                <td>
                    <input value="<?php echo $fb; ?>" class="form-control" type="text" name="fb">
                </td>
            </tr>

            <tr>
                <td width="35%">Website Bisnis anda</td>
                <td>:</td>
                <td>
                    <input value="<?php echo $web; ?>" class="form-control" type="text" name="web">
                </td>
            </tr>

            <tr>
                <td width="35%">Provinsi</td>
                <td>:</td>
                <td>
                    <div class="form-group">

                        <select class="form-control" name="provinsi" required>

                            <?php

                            echo
                            "
                                <option value='$idpr'>$nmpr</option>
                            ";
                            $prov = $crud->eksekusiSQL("SELECT *FROM provinsi ORDER BY nama_provinsi ASC");

                            while ($p = mysqli_fetch_array($prov)) {
                                $idprov = $p['id_provinsi'];
                                $nmprov = $p['nama_provinsi'];
                                echo
                                "
                                    <option value='$idprov'>$nmprov</option>
                                ";
                            }

                            ?>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td width="35%">Alamat Bisnis<sup class="text-danger">
                        <font size='3'>*</font>
                    </sup></td>
                <td>:</td>
                <td>
                    <input value="<?php echo $alamatBis; ?>" class="form-control" type="text" name="alamat">
                </td>
            </tr>

            <tr>
                <td width="35%">E-mail Bisnis<sup class="text-danger">
                        <font size='3'>*</font>
                    </sup></td>
                <td>:</td>
                <td>
                    <input value="<?php echo $emailBis; ?>" class="form-control" type="email" name="email">
                </td>
            </tr>

            <tr>
                <td width="35%">No.Telp Bisnis<sup class="text-danger">
                        <font size='3'>*</font>
                    </sup></td>
                <td>:</td>
                <td>
                    <input class="form-control" value="<?php echo $telpBis; ?>" type="text" name="notelp">
                </td>
            </tr>

            <tr>
                <td colspan="3">

                    Omset Per Bulan : <br>
                    <?php
                    echo $tampilOmset;
                    ?>

                </td>
            </tr>

            <tr>
                <td colspan="3">

                    Jumlah Karyawan : <br>
                    <div style="margin-left: 30px; margin-top:10px;">
                        <!--radio-->
                        <?php
                        echo $banyakKar;
                        ?>
                        <!--radio-->
                    </div>



                </td>


            </tr>

            <tr>
                <td colspan="3">
                    <div class="form-group">
                        <label for="my-textarea">Jelaskan secara singkat produk/jasa/layanan Usaha anda:</label>
                        <textarea id="my-textarea" class="form-control" name="deskripsi" rows="3" placeholder="Isi Disini..." required><?php echo $deskrip; ?></textarea>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <p>Foto Usaha Anda:</p>
                    <div class="row">
                        <div class="col-4">
                            <?php echo $gambar; ?>
                            <p style="margin-top: 15px;">
                                <font color="gray">Gambar tampil disini</font>
                            </p>
                            <input type="file" name="foto" id="gambarAmbUsaha" onchange="return uploadUsaha(this)" />

                            <br>
                        </div>

                    </div>


                </td>
            </tr>


            </table>
            <br>
            <button type="submit" class="btn btn-primary btn-lg">SIMPAN</button>
            </form>



        </div>
    </div>

    </div>





</section>



<!-- Modal alamat-->
<div class="modal fade" id="editAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=akun-respon&mode=ubah&id=<?php echo $iduser; ?>&ini=alamat" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="my-textarea">Alamat</label>
                        <textarea id="my-textarea" class="form-control" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
                    </div>

                    <p>
                        <input type="submit" value="SIMPAN" class="btn btn-primary">
                    </p>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal no. hp-->
<div class="modal fade" id="editNohp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit No. Handphone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=akun-respon&mode=ubah&id=<?php echo $iduser; ?>&ini=nohp" enctype="multipart/form-data">

                    <p>
                        <input value="<?php echo $nohp; ?>" class="form-control" type="number" name="nohp" placeholder="Masukkan No. Handphone" required>
                    </p>

                    <p>
                        <input type="submit" value="SIMPAN" class="btn btn-primary">
                    </p>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Modal E-mail-->
<div class="modal fade" id="editEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit E-Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=akun-respon&mode=ubah&id=<?php echo $iduser; ?>&ini=email" enctype="multipart/form-data">

                    <p>
                        <input value="<?php echo $email; ?>" class="form-control" type="email" name="email" placeholder="E-Mail" required>
                    </p>

                    <p>
                        <input type="submit" value="SIMPAN" class="btn btn-primary">
                    </p>
                </form>

            </div>

        </div>
    </div>
</div>



<?php
include './fungsional/konfig/footer.php';
?>