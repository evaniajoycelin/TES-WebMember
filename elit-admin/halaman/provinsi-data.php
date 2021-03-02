<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Provinsi</h1>

    </div>


    <!-- Content Row -->

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Provinsi</h6>

                </div>


                <div class="card-body">

                    <form action="?hal=provinsi-respon&mau=tambah" method="post">

                        <div class="form-group">
                            <label for="">Masukkan Nama Provinsi</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan disini..." required>


                        </div>

                        <p>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </p>
                    </form>

                </div>
            </div>


        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Provinsi</h6>
                </div>
                <div class="card-body">


                    <?php

                    //$mau = @$_GET['mau'];





                    $perintah = $isi->eksekusiSQl("SELECT *FROM provinsi ORDER BY nama_provinsi ASC");
                    $hitung   = $isi->hitungData($perintah);

                    if ($hitung == 0) {
                        pesanKosong();
                    } else {
                        echo
                        "
                    
                    <div class='table-responsive'>
                            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0' style='font-size:14px;'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Provinsi</th>
                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                
                        ";



                        $no = 1;
                        foreach ($perintah as $a) {
                            $idprov = $a['id_provinsi'];
                            $nama  = $a['nama_provinsi'];









                            echo
                            "
                                <tbody>
                                    <tr>
                                        <td align='center'>$no</td>
                                        <td>
                                           $nama
                                        </td>
                                   
                                    
                                        
                                        <td>


                                            <center>
                                                <a class='btn btn-warning btn-sm' href='#' data-toggle='modal' data-target='#provinsi$idprov'>Edit</a>
                                                <a class='btn btn-danger btn-sm' href='?hal=provinsi-respon&id=$idprov&mau=hapus'>Hapus</a>
                                            </center>
                                        </td>
                                    </tr>


                                    <!-- Button trigger modal -->


                                    <!-- Modal -->
                                    <div class='modal fade' id='provinsi$idprov' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title'>Edit Provinsi</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form action='?hal=provinsi-respon&mau=edit' method='post'>

                                                        <div class='form-group'>
                                                            <input type='hidden' name='id' value='$idprov'>
                                                            <label for=''>Masukkan Nama Provinsi</label>
                                                            <input value='$nama' type='text' class='form-control' name='nama' placeholder='Masukkan disini...' required>


                                                        </div>

                                                        <p>
                                                            <button type='submit' class='btn btn-primary'>SIMPAN</button>
                                                        </p>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                        
                            
                    

                            ";
                            $no++;
                        }



                        echo
                        "
                                </tbody>
                            </table>
                        </div>
                    ";
                    }

                    ?>

                </div>
            </div>




        </div>


    </div>

    <!-- Button trigger modal -->


    