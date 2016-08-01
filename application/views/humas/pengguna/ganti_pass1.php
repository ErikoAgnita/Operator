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
                <div class="example">
                   <?php foreach($pengguna as $p){ ?>
                  <form action="<?php echo base_url(). 'Cpengguna/do_update'; ?>" method="post" autocomplete="off">
          <div class='user-block'>
              <img class='img-circle' src='<?php echo base_url(); ?>assets/images/people.png' alt='masyarakat'>
              <span class='username'><label><?php echo $row->nama_pengguna; ?></label></span>
              <span class='description'><?php echo $row->nama_dinas; ?></span>
              <span class='description'>Level: <?php echo $row->level; ?></span>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputBasicPassword">Masukan Password Baru</label>
            <input type="password" class="form-control" id="inputBasicPassword" name="password"
                   autocomplete="off" />
          </div>
          <div class="form-group">
            <label class="control-label" for="inputBasicPassword1">Konfirmasi Password</label>
            <input type="password" class="form-control" id="inputBasicPassword1" name="konfir_password"
                   autocomplete="off" />
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
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