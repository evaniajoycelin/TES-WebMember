<form action="?hal=pilar-respon&mau=tambah" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Pilar</h1>

        </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Pilar</h6>
                    </div>


                    <div class="card-body">

                        <p>
                            <input class="form-control" type="text" name="nama" placeholder="Nama Pilar" required>
                        </p>




                        <p>
                            <textarea name="deskripsi" class="ckeditor"></textarea>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pengelompokan Kelas</h6>

                    </div>


                    <div class="card-body">

                        <div class="form-group" style="margin-right: 30px;">
                            <select name="idkelas" class="form-control" required>
                                <option value="">Pilih Kelas</option>
                                <?php

                                $perintah = $isi->eksekusiSQl("SELECT *FROM kelas");



                                // $tampilin = $isi->tampilData("user");


                                foreach ($perintah as $a) {
                                    $idkel  = $a['id_kelas'];
                                    $namakel = $a['nama_kelas'];


                                    echo
                                    "
                                            <option value='$idkel'>$namakel</option>
                                        ";
                                }






                                ?>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Opsi Simpan</h6>

                    </div>


                    <div class="card-body">

                        <center>
                            <input type="submit" value="POSTING" class="btn btn-primary" name="simpan">
                            <input type="submit" value="DRAFT" class="btn btn-secondary">
                        </center>

                    </div>
                </div>



            </div>


        </div>
        <!-- /.container-fluid -->
</form>