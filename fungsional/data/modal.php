<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="loginSukses" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>



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
              <input value="<?php echo $passw; ?>" class="form-control tampilinPass" type="password" name="password" placeholder="Password" required>
              &nbsp;<input type="checkbox" class="tampilPassword"> <small>Tampilkan Password</small> <br>
          </p>
        
          
          <p>
            <input type="submit" value="SIMPAN" class="btn btn-primary">
          </p>
        </form>

      </div>

    </div>
  </div>
</div>