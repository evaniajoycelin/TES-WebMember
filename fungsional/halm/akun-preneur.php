<form action="?hal=akun-respon&mode=preneur" method="post" enctype="multipart/form-data">
    <!--<input type="hidden" name="k" value="<?php echo $i; ?>">-->

    <h2>Akun Bisnis Anda</h2>

    <table width="100%" class="tabelForm">
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


                <select class="form-control" name="bidang" required>
                    <option value="">PILIH BIDANG</option>
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
                    <option value="">PILIH INDUSTRI</option>
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
            <td width="35%">Provinsi</td>
            <td>:</td>
            <td>
                <div class="form-group">

                    <select class="form-control" name="provinsi" required>
                        <option value="">PILIH PROVINSI</option>
                        <?php

                            $prov = $crud->eksekusiSQL("SELECT *FROM provinsi ORDER BY nama_provinsi ASC");

                            while ($p=mysqli_fetch_array($prov)) 
                            {
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
                <input class="form-control" type="text" name="alamat" required>
            </td>
        </tr>

        <tr>
            <td width="35%">E-mail Bisnis<sup class="text-danger">
                    <font size='3'>*</font>
                </sup></td>
            <td>:</td>
            <td>
                <input class="form-control" type="email" name="email" required>
            </td>
        </tr>

        <tr>
            <td width="35%">No.Telp Bisnis<sup class="text-danger">
                    <font size='3'>*</font>
                </sup></td>
            <td>:</td>
            <td>
                <input class="form-control" type="text" name="notelp" required>
            </td>
        </tr>

        <tr>
            <td colspan="3">

                Omset Per Bulan : <br>
                <div style="margin-left: 30px; margin-top:10px;">
                    <!--radio-->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio1" value="< Rp 10 Juta">
                        <label class="form-check-label" for="inlineRadio1">
                            < Rp 10 Juta</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio2" value="Rp 10 Juta - Rp 20 Juta">
                        <label class="form-check-label" for="inlineRadio2">Rp 10 Juta - Rp 20 Juta</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="omset" id="inlineRadio3" value="Rp 25 Juta - Rp 50 Juta">
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
                        <label class="form-check-label" for="karyawan">
                            < 10 Orang</label>
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

        <tr>
            <td colspan="3">
                <p>Foto Usaha Anda:</p>
                <div class="row">
                    <div class="col-4">
                        <img id="gambarUsaha" src="img/nofoto.png" width="100%" height="200">
                        <p style="margin-top: 15px;">
                            <font color="gray">Gambar tampil disini</font>
                        </p>
                        <input type="file" name="foto" id="gambarAmbUsaha" onchange="return uploadUsaha(this)"/>

                        <br>
                    </div>

                </div>


            </td>
        </tr>





    </table>
    <br><br>
    <button type="submit" class="btn btn-primary btn-lg">SIMPAN</button>
</form>