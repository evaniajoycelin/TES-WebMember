<form action="?hal=event-respon&mau=tambah" method="post" enctype="multipart/form-data">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Event</h1>

        </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->

            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Event</h6>
                    </div>


                    <div class="card-body">


                        <p>
                            <input class="form-control" type="text" name="nama" placeholder="Judul Event" required>
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
                        <h6 class="m-0 font-weight-bold text-primary">Opsi Simpan</h6>
                       
                    </div>


                    <div class="card-body">

                        <center>
                            <input type="submit" value="POSTING" class="btn btn-primary" name="simpan">
                            <input type="submit" value="DRAFT" class="btn btn-secondary">
                        </center>

                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Info Tambahan</h6>
                    </div>  
                        
                   
                   <div class="card-body">
                        <p>
                            <textarea name="lokasi" placeholder="Lokasi" rows="5" class="form-control" required></textarea>
                        </p>


                        <p>
                            <input class="form-control" type="text" name="vanue" placeholder="Vanue">
                        </p>

                        <p>
                            <label for="">Waktu Pelaksanaan</label>
                            <input type="datetime-local" name="waktu" class="form-control" required>
                        </p>

                        <p>
                            <input class="form-control" type="number" name="kuota" placeholder="Jumlah Peserta" required>
                        </p>

                        <p>
                            <input class="form-control" type="number" name="harga" placeholder="Harga" required>
                        </p>

                    
                   </div> 


                    
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Gambar Event</h6>
                       
                    </div>


                    <div class="card-body">

                        <center>
                            <p>
                            <img  id="gambarTampil" src="../img/nofoto.png" alt="Test" width="150" height="150">
                            </p>

                            <input id="gambarAmbil" type="file" name="foto" class="btn btn-primary">
                        </center>

                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->
</form>