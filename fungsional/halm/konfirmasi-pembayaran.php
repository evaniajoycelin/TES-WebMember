<?php
    include './fungsional/konfig/headerUdahLogin.php';
?>

<?php
    $mau = @$_GET['mau'];
    $i = @$_GET['k'];

    if ($mau=='paket') 
    {
       $tampil = $crud->tampilId("paket_member", "id_paket", $i);
       foreach ($tampil as $key) 
       {
           $nama = $key['nama_paket'];
           $harga= $key['harga_member'];
       }

       $transaksi = "Upgrade Membership ke-".$nama;
    }
    else
    {
       $tampil = $crud->tampilId('event', 'id_event', $i);
       foreach ($tampil as $key) 
       {
           $nama = $key['nama_event'];
           $harga= $key['harga_event'];

       }
       $transaksi = "Mengikuti Event ".$nama;
    }


    $biaya = "Rp ".formatRupiah($harga).",-";
?>

<section class="lapak-putih" style="margin-top: 100px;">
    <div class="container">
       <center>
           <h1>Anda akan Melakukan Transaksi <span class="text-primary"><?php echo $transaksi; ?></span></h1>
           <h3>dengan nilai <span class="text-primary"><?php echo $biaya; ?></span></h3>

           <div class="row" style="margin-top: 30px;">
                <div class="col-md">
                    <h5>Silahkan Lengkapi Data Rekening Anda</h5>
                    <form action="?hal=konfirmasi-upload" method="post" style="width: 50%; margin:20px;">
                    <input type="hidden" name="k" value="<?php echo $i; ?>"> 
                    <input type="hidden" name="mau" value="<?php echo $mau; ?>">
                    <input type="hidden" name="harga" value="<?php echo $harga; ?>">
                    <input type="hidden" name="transaksi" value="<?php echo $transaksi; ?>">
                    <p align="left">
                            No. Rekening: <br>
                            <input class="form-control" type="number" name="norek" placeholder="No. Rekening" required>
                        </p>
                        <p align="left">
                            Atas Nama: <br>
                            <input class="form-control" type="text" name="nama" placeholder="Atas Nama" required>
                        </p>
                </div>

              <!--  <div class="col-md">
                    <h5>Upload Bukti Pembayaran</h5>
                    <p>
                        Jika anda sudah melakukan pembayaran, silahkan upload disini.
                    </p>
                    <input type="file" name="struk" required>
                </div>-->
           </div>

           

            <p>Konfirmasi Via Bank</p>

            <p style="margin-bottom: 50px;">
                <img src="./img/logo-bca.png" alt="Logo BCA" width="45%" height="200">
            </p>

            <h5>
                No. Rekening : 012 043 3075 <br>
                Atas Nama : Klement Bonaventura Rahardja
            </h5>

            <p>
                <button type="submit" class="btn btn-primary btn-lg">
                    Konfirmasi Pembayaran
                </button>
            </p>
           </form>
       </center>
    </div>
</section>

<?php
    include './fungsional/konfig/footer.php';
?>