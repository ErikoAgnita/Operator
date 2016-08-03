  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h2 class="intro-text text-center">Profil Admin</h2>
   <!--   <ol class="breadcrumb">
        <li>Profil Operator Dinas</li>
        <li>Lihat</li>
      </ol> -->
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">

          <div class="row row-lg">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <div class="example">
                  <?php foreach($adata as $row){ ?>
                  <form action="<?php echo base_url();?>cpengguna/do_updateadmin" method="post">
              <!--      <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="id_admin"
                        value="<?php echo $row->ID_ADMIN;?>" autocomplete="off" disabled />
                    </div> -->
                    <h3 class="intro-text text-center">Satuan Kerja Perangkat Daerah</h3>
                     <h3 class="intro-text text-center"><?php echo strtoupper ($row->kode_unit);?></h3><br>
               <!--         <p><?=$this->session->flashdata('pesan')?> </p> -->
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Username</label>
                      <input type="hidden" name="id_pengguna" value="<?php echo $row->id_pengguna ?>" required>
                      <input type="text" class="form-control" name="username"
                      value="<?php echo $row->username;?>" required>
                    </div>
                    <?php
                      echo form_error('username','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
            <!--          <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="password" class="form-control" name="password"
                      value="<?php echo $row->password;?>" required>
                    </div>
           <!--         <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Kode Unit</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="kode_unit"
                        value="<?php echo $row->kode_unit;?>" autocomplete="off" />
                    </div> 
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Level</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="level"
                      value="<?php echo $row->level;?>" autocomplete="off" />
                    </div> -->
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Nama</label>
                      <input type="text" class="form-control" name="nama"
                      value="<?php echo $row->nama;?>" required>
                    </div>
                    <?php
                      echo form_error('nama','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat</label>
                      <input type="text" class="form-control" name="alamat"
                      value="<?php echo $row->alamat;?>" required>
                    </div>
                    <?php
                      echo form_error('alamat','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Telepon</label>
                      <input type="text" class="form-control" name="telepon"
                      value="<?php echo $row->telepon;?>" required>
                    </div>
                    <?php
                      echo form_error('telepon','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Handphone</label>
                      <input type="text" class="form-control" name="handphone"
                      value="<?php echo $row->handphone;?>" required>
                    </div>
                    <?php
                      echo form_error('handphone','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" name="email"
                      value="<?php echo $row->email;?>" required>
                    </div>
                    <?php
                      echo form_error('email','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                  <?php } ?>
                  <a type="button" class="btn btn-success" href="<?php echo base_url(); ?>Cpengguna/ganti_password_ad/<?php echo $row->id_pengguna;?>">Ganti Password</a>
              <!--    <button class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left" onClick="return redirect(' <?php echo base_url();?>password/ganti_passwordprofil');"> Ganti Password</button> -->
                  <button onclick="goBack()" class="btn btn-danger"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</button>
                </div>
              </div>
              <!-- End Example Basic Form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
function goBack() {
    window.history.back();
}
</script>

<script>
function redirect(url){
window.location.href = url;
return false;
}
</script>
  <!-- End Page -->