 <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Pengguna</h1>
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li>Ganti Password Pengguna</li>
      </ol>
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
                   <?php echo form_open('Cpengguna/do_update_password'); ?>
                  <!--<form action="<?php //echo base_url().'Cpengguna/do_update_password'; ?>" method="post" autocomplete="off">-->
          <div class='user-block'>
              <img class='img-circle' src='<?php echo base_url(); ?>assets/images/people.png' alt='masyarakat'>
              <span class='username'><label><?php echo $p->nama; ?></label></span>
              <span class='description'>Level: <?php echo $p->level; ?></span>
              <br>
          </div>
            <input type="hidden" name="id_pengguna" value="<?php echo $p->id_pengguna; ?>"/>
          <div class="form-group">
            <label class="control-label" for="inputBasicPassword">Masukan Password Baru</label>
            <input type="password" class="form-control" id="inputBasicPassword" name="password"
                   autocomplete="off" value="<?php echo set_value('password'); ?>"/>
              <?php
                echo form_error('password','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                ?>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputBasicKonfirmasiPassword">Konfirmasi Password</label>
            <input type="password" class="form-control" id="inputBasicKonfirmasiPassword" name="konfir_password"
                   autocomplete="off" />
              <?php
                echo form_error('konfir_password','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                ?>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
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