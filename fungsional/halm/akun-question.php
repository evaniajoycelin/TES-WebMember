<?php
include './fungsional/konfig/headerUdahLogin.php';
?>
<!--
  <header class="masthead gambar-bgUser" style="margin-top:0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Selamat Datang</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere repellendus excepturi, placeat molestias molestiae rem iusto odio magni at sapiente voluptatum dolorum illum, optio qui minus aliquam repudiandae earum autem!
          </p>
        </div>

        <div class="col-md-6">
          <img src="./img/laptop.png" alt="Yeah" width="100%">
        </div>
      </div>
    </div>
  </header>
-->

<?php
$mau = @$_GET['mau'];
$i = @$_GET['k'];

/*if ($mau == 'paket') {
    $tampil = $crud->tampilId("paket_member", "id_paket", $i);
    foreach ($tampil as $key) {
        $nama = $key['nama_paket'];
        $harga = $key['harga_member'];
    }

    $transaksi = "Upgrade Membership ke-" . $nama;
} else {
    $tampil = $crud->tampilId('event', 'id_event', $i);
    foreach ($tampil as $key) {
        $nama = $key['nama_event'];
        $harga = $key['harga_event'];
    }
    $transaksi = "Mengikuti Event " . $nama;
}


$biaya = "Rp " . formatRupiah($harga) . ",-";*/
?>

<section class="lapak-putih" style="margin-top: 0;">

    <div class="container lapak-putih" style="padding: 20px; margin-top:100px;">

        <div class="row">
            <div class="col-md-2">

                <?php
                include './fungsional/data/membership.php';
                ?>
            </div>

            <div class="col-md-10">
                <h1 style="margin: 30px; margin-bottom:0px;"><?php echo "$namauser"; ?></h1>
                
                <hr>

                <h5 style="margin-left: 25px;">Form Pertanyaan</h5>

                <form action="?hal=akun-respon&mode=preneur&m=<?php echo "$mau&k=$i"; ?>" method="post">
                    <input type="hidden" name="k" value="<?php echo $i; ?>">

                    <table width="100%">
                        <tr>
                            <td width="35%">Nama Bisnis Anda <sup class="text-danger">
                                    <font size='3'>*</font>
                                </sup></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="text" name="nama" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Tahun Berapa bisnis anda didirikan? <sup class="text-danger">
                                    <font size='3'>*</font>
                                </sup></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="number" name="tahun" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Bergerak di bidang apa bisnis anda? <sup class="text-danger">
                                    <font size='3'>*</font>
                                </sup></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="text" name="bidang" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Akun Instagram Bisnis anda</td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="text" name="ig">
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Page Facebook Bisnis anda</td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="text" name="fb">
                            </td>
                        </tr>

                        <tr>
                            <td width="35%">Website Bisnis anda</td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="text" name="web">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">

                                Omset Per Bulan : <br>
                                <div style="margin-left: 30px; margin-top:10px;">
                                    <!--radio-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio1" value="< Rp 10 Juta">
                                        <label class="form-check-label" for="inlineRadio1"> < Rp 10 Juta</label> 
                                    </div> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio2" value="Rp 10 Juta - Rp 20 Juta">
                                        <label class="form-check-label" for="inlineRadio2">Rp 10 Juta - Rp 20 Juta</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio3" value="500-1000 Orang">
                                        <label class="form-check-label" for="inlineRadio2">Rp 25 Juta - Rp 50 Juta</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio3" value="Rp 50 Juta - Rp 100 Juta">
                                        <label class="form-check-label" for="inlineRadio2">Rp 50 Juta - Rp 100 Juta</label>
                                    </div>

                                    <!--radio-->
                                </div>

                                <div style="margin-left: 30px; margin-top:10px;">
                                    <!--radio-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio1" value="Rp 100 Juta - Rp 250 Juta">
                                        <label class="form-check-label" for="inlineRadio1"> Rp 100 Juta - Rp 250 Juta</label> 
                                    </div> 
                                   
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio1" value="Rp 250 Juta - Rp 1 Milyar">
                                        <label class="form-check-label" for="inlineRadio1"> Rp 250 Juta - Rp 1 Milyar</label> 
                                    </div> 

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio1" value="> Rp 1 Milyar">
                                        <label class="form-check-label" for="inlineRadio1"> > Rp 1 Milyar</label> 
                                    </div> 
                                    <!--radio-->
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">

                                Jumlah Karyawan : <br>
                                <div style="margin-left: 30px; margin-top:10px;">
                                    <!--radio-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jumkar" id="karyawan" value="< 10 Orang">
                                        <label class="form-check-label" for="karyawan"> < 10 Orang</label> 
                                    </div> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jumkar" id="karyawan" value="10-50 Orang">
                                        <label class="form-check-label" for="karyawan">10-50 Orang</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jumkar" id="karyawan" value="50-100 Orang">
                                        <label class="form-check-label" for="karyawan">50-100 Orang</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jumkar" id="karyawan" value="500-1000 Orang">
                                        <label class="form-check-label" for="karyawan">500-1000 Orang</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jumkar" id="karyawan" value=">1000 Orang">
                                        <label class="form-check-label" for="karyawan">>1000 Orang</label>
                                    </div>

                                    <!--radio-->
                                </div>

                               

                            </td>


                        </tr>

                        <tr>
                            <td colspan="3">
                                <div class="form-group">
                                    <label for="my-textarea">Jelaskan secara singkat produk/jasa/layanan Usaha anda:</label>
                                    <textarea id="my-textarea" class="form-control" name="deskripsi" rows="3" placeholder="Isi Disini..." required></textarea>
                                </div>
                            </td>
                        </tr>


                    </table>

                    <button type="submit" class="btn btn-primary btn-lg">LANJUT KE PEMBAYARAN</button>
                </form>


            </div>
        </div>

    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="editUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="?hal=akun-respon&mode=edit" enctype="multipart/form-data">
                    <p>
                        <input value="<?php echo $namauser; ?>" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                    </p>
                    <p>
                        <textarea id="my-textarea" class="form-control" name="alamat" placeholder="Alamat" rows="3"><?php echo $alamat; ?></textarea>
                    </p>
                    <p>
                        <input value="<?php echo $nohp; ?>" class="form-control" type="number" name="nohp" placeholder="No. Handphone" required>
                    </p>
                    <p>
                        <input value="<?php echo $email; ?>" class="form-control" type="email" name="email" placeholder="E-Mail" required>
                    </p>
                    <p>
                        <input value="<?php echo $passw; ?>" class="form-control" type="password" name="password" placeholder="Password" required>
                    </p>
                    <p>
                        <input class="form-control" type="file" name="foto" placeholder="Password">
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