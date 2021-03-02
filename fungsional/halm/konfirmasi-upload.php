<?php

include './fungsional/konfig/header.php';

$id = $_POST['k'];
$mau = $_POST['mau'];

$norek = $_POST['norek'];
$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$trans = $_POST['transaksi'];

$hargaRp = "Rp " . formatRupiah($harga) . ".,-";

?>
<form action="?hal=konfirmasi-respon" method="post" enctype="multipart/form-data">
<section style="margin-top: 60px; background-color: gainsboro; padding:20px;">
    <div class="container lapak-putih" style="padding: 45px;">

        <h1 align="center"><span class="text-primary"><?php echo $trans; ?></h1>
        
        <center>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md" style="margin-left: 30px;">
                    <input type="hidden" name="k" value="<?php echo $id; ?>">
                    <input type="hidden" name="mau" value="<?php echo $mau; ?>">
                    <input type="hidden" name="harga" value="<?php echo $harga; ?>">
                    <input type="hidden" name="transaksi" value="<?php echo $trans; ?>">
                    <input value="<?php echo $norek; ?>" class="form-control" type="hidden" name="norek" placeholder="No. Rekening" required>
                    <input value="<?php echo $nama; ?>" class="form-control" type="hidden" name="nama" placeholder="Atas Nama" required>
                    <h5>Keterangan : </h5>
                
                    <p>
                        <b>
                            No. Rekening : 012 043 3075 <br>
                            Atas Nama : Klement Bonaventura Rahardja
                        </b>
                    </p>

                    <p>Total Pembayaran : </p>
                    <h4><span class="text-primary"><?php echo $hargaRp; ?></span></h4>
                    

                    <h5>Upload Bukti Pembayaran</h5>
                
                    <input type="file" name="foto" id="gambarAmbil" required>
                    
                    <br><br>
                    <h5>Gambar Struk</h5>
                <p>
                    Jika sudah upload, hasil akan tampil di bawah ini.
                </p>

                <img id="gambarTampil" src="./img/nofoto.png" alt="Gambar" width="35%" height="170">
                <br><br>
            </div>

           

            
        </div>



       
            

            <p>
                <button type="submit" class="btn btn-primary btn-lg">
                    Konfirmasi Pembayaran
                </button>
            </p>
        </center>
       

    </div>
</section>
</form>