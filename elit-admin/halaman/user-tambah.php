
<form action="?hal=member-respon&mau=tambah&ingin=admin" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Administrator</h1>

        </div>


        <!-- Content Row -->

        <div class="row">
            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Administrator</h6>
                    </div>
                    <div class="card-body">
                        <p>
                            <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                        </p>
                        <p>
                            <textarea id="my-textarea" class="form-control" name="alamat" placeholder="Alamat" rows="3"></textarea>
                        </p>
                        <p>
                            <span>Tanggal Lahir : </span> <br>
                            <input class="form-control" type="date" name="tglahir" placeholder="Tgl Lahir" required>
                        </p>
                        <div class="form-check form-check-inline">
                            <input name="jekel" class="form-check-input" type="radio" id="inlineCheckbox1" value="Laki-laki">
                            <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="jekel" class="form-check-input" type="radio" id="inlineCheckbox2" value="Perempuan">
                            <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                        </div>

                        <p>
                            <input class="form-control" type="number" name="nohp" placeholder="No. Handphone" required>
                        </p>
                        <p>
                            <input class="form-control" type="email" name="email" placeholder="E-Mail" required>
                        </p>
                        <p>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </p>

                    </div>
                </div>




            </div>

            <div class="col-md-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Foto Profil Member</h6>

                    </div>


                    <div class="card-body">

                        <center>
                            <p>
                                <img id="gambarTampil" src="../img/nofoto.png" alt="Test" width="150" height="150">
                            </p>

                           
                            <div class="custom-file">
                                <input id="gambarAmbil" type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Upload Foto</label>
                            </div>
                        </center>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Simpan Data</h6>

                    </div>


                    <div class="card-body">

                        <center>
                            <p>
                                <input type="submit" value="DAFTAR" class="btn btn-primary btn-lg">
                            </p>
                        </center>

                    </div>
                </div>
            </div>
        </div>







        <!-- /.container-fluid -->
</form>