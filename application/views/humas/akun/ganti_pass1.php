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
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Ganti Password</h4>
                  <?php echo $this->session->flashdata('pesan'); ?>
                <div class="example">
                   <?php foreach($pengguna as $p){ ?>
                  <form action="<?php echo base_url().'Cpengguna/do_update_password_ad'; ?>" method="post" autocomplete="off">
          <div class='user-block'>
              <img class='img-circle' src='<?php echo base_url(); ?>assets/images/people.png' alt='masyarakat'> 
              <span class='username'><label><?php echo $p->nama; ?></label></span>
              <!--<span class='description'><?php// echo $p->nama_dinas; ?></span>-->
              <span class='description'>Level: <?php echo $p->level; ?></span>
          </div>
            <input type="hidden" name="id_pengguna" value="<?php echo $p->id_pengguna; ?>"/>
          <div class="form-group">
            <label class="control-label" for="inputBasicPassword">Masukan Password lama</label>
            <input type="password" class="form-control" id="inputBasicPassword" name="passwordlama"
                   autocomplete="off" />
              <?php
                echo form_error('passwordlama', '<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>'); 
                ?>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputBasicPassword">Masukan Password Baru</label>
            <input type="password" class="form-control" id="inputBasicPassword" name="password"
                   autocomplete="off" />
              <?php
                echo form_error('password', '<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>'); 
                ?>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputBasicPassword1">Konfirmasi Password</label>
            <input type="password" class="form-control" id="inputBasicPassword1" name="konfir_password"
                   autocomplete="off" />
              <?php
                echo form_error('konfir_password', '<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                ?>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp; Simpan</button>
            <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>Cpengguna/lihatawaladmin"><i class="icon wb-chevron-left"></i>&nbsp;&nbsp;Keluar</a>

         </div>
      </form>
       </div>
       <?php } ?>
              </div>
              <!-- End Example Basic Form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->