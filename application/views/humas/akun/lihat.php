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
                  <?php foreach($jdata->result() as $row2){ ?>
                  <form action="<?php echo base_url();?>cpengguna/do_updateadmin" method="post">
              <!--      <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="id_admin"
                        value="<?php echo $row->ID_ADMIN;?>" autocomplete="off" disabled />
                    </div> -->
                    <h3 class="intro-text text-center">Satuan Kerja Perangkat Daerah</h3>
                     <h3 class="intro-text text-center"><?php echo strtoupper ($row2->nama);?></h3><br><?php } ?>
               <!--         <p><?=$this->session->flashdata('pesan')?> </p> -->
                  <?php foreach($adata as $row){ ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Username</label>
                      <input type="hidden" name="id_pengguna" value="<?php echo $row->id_pengguna ?>">
                      <input type="text" class="form-control" name="username"
                      value="<?php echo $row->username;?>">
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
                      value="<?php echo $row->nama;?>">
                    </div>
                    <?php
                      echo form_error('nama','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat</label>
                      <input type="text" class="form-control" name="alamat"
                      value="<?php echo $row->alamat;?>" >
                    </div>
                    <?php
                      echo form_error('alamat','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Telepon</label>
                      <input type="text" class="form-control" name="telepon"
                      value="<?php echo $row->telepon;?>" >
                    </div>
                    <?php
                      echo form_error('telepon','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Handphone</label>
                      <input type="text" class="form-control" name="handphone"
                      value="<?php echo $row->handphone;?>" >
                    </div>
                    <?php
                      echo form_error('handphone','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" name="email"
                      value="<?php echo $row->email;?>" >
                    </div>
                    <?php
                      echo form_error('email','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp; Simpan</button>
                    <a type="button" class="btn btn-success" href="<?php echo base_url(); ?>Cpengguna/ganti_password_ad/<?php echo $row->id_pengguna;?>"><i class="icon wb-wrench"></i>&nbsp;&nbsp;Ganti Password</a>
              <!--    <button class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left" onClick="return redirect(' <?php echo base_url();?>password/ganti_passwordprofil');"> Ganti Password</button> -->
                <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>Cpengguna/lihatawaladmin"><i class="icon wb-chevron-left"></i>&nbsp;&nbsp;Keluar</a>

              <!--    <button onclick="goBack()" class="btn btn-danger"><i class="icon wb-chevron-left"></i>&nbsp;&nbsp; Kembali</button> -->
                    </div>
                  </form>
                  <?php } ?>
                  
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