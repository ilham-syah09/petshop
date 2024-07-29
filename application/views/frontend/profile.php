 <!-- Contact Start -->
 <div class="container-fluid pt-5">
     <div class="text-center mb-4">
         <h2 class="section-title px-5"><span class="px-2">Profile</span></h2>
     </div>
     <div class="row px-xl-5">
         <div class="col-lg-6 mb-5">
             <form action="<?= base_url('changeProfile'); ?>" method="post" enctype="multipart/form-data" id="form-profile">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="font-weight-semi-bold mb-4">Profile</h4>
                         <div class="text-center p-2 mb-3">
                             <img src="<?= base_url('upload/profile/' . $this->dt_user->image); ?>" width="150" class="img-fluid rounded-circle" alt="avatar">
                         </div>
                         <div class="row">
                             <input type="hidden" name="id" value="<?= $this->dt_user->id; ?>">
                             <input type="hidden" name="previmage" value="<?= $this->dt_user->image; ?>">
                             <div class="col-md-12 form-group">
                                 <label>Input Foto</label>
                                 <input class="form-control" type="file" name="image">
                             </div>
                             <div class="col-md-6 form-group">
                                 <label>Nama</label>
                                 <input class="form-control" type="text" value="<?= $this->dt_user->name; ?>" name="name">
                             </div>
                             <div class="col-md-6 form-group">
                                 <label>Email</label>
                                 <input class="form-control" type="text" value="<?= $this->dt_user->email; ?>" readonly name="email">
                             </div>
                             <div class="col-md-12 form-group">
                                 <label>No. Handphone/Whatsapp</label>
                                 <input class="form-control" type="text" value="<?= $this->dt_user->noHp; ?>" name="noHp">
                             </div>
                             <div class="col-md-12 form-group">
                                 <label>Alamat</label>
                                 <textarea name="alamat" class="form-control"><?= $this->dt_user->alamat; ?></textarea>
                             </div>
                         </div>
                         <div class="text-center">
                             <button type="submit" class="btn btn-primary">simpan</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
         <div class="col-lg-6 mb-5">
             <form action="<?= base_url('changePassword'); ?>" method="post" enctype="multipart/form-data">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="font-weight-semi-bold mb-4">Ganti Kata Sandi</h4>
                         <div class="row">
                             <div class="col-md-12 form-group">
                                 <label>Kata sandi saat ini</label>
                                 <input class="form-control" type="password" name="current_password">
                             </div>
                             <div class="col-md-12 form-group">
                                 <label>Kata sandi baru</label>
                                 <input class="form-control" type="password" name="password">
                             </div>
                             <div class="col-md-12 form-group">
                                 <label>Ketik kembali kata sandi baru</label>
                                 <input class="form-control" type="password" name="retype_password">
                             </div>
                         </div>
                         <div class="text-center">
                             <button type="submit" class="btn btn-primary">simpan</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- Contact End -->

 <!-- Jquery Validation -->

 <!-- jQuery CDN -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

 <script>
     $('#form-profile').validate({
         rules: {
             noHp: {
                 required: true,
                 number: true,
                 minlength: 10,
                 maxlength: 13,
             }
         },
         messages: {
             noHp: {
                 required: "Harap isi nomor hp",
                 minlength: "Panjang nomor hp kurang dari 10 digit",
                 maxlength: "Panjang nomor hp lebih dari 13 digit",
                 number: "Nomor hp harus berupa angka",
             }
         },
         errorElement: 'span',
         errorClass: 'text-danger'
     });
 </script>