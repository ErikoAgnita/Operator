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
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Username</label>
                      <input type="hidden" name="id_pengguna" value="<?php echo $row->id_pengguna ?>" required>
                      <input type="text" class="form-control" id="inputBasicPassword" name="username"
                      value="<?php echo $row->username;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="password" class="form-control" id="inputBasicPassword" name="password"
                      value="<?php echo $row->password;?>" autocomplete="off" />
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
                      <input type="text" class="form-control" id="inputBasicEmail" name="nama"
                      value="<?php echo $row->nama;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="alamat"
                      value="<?php echo $row->alamat;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="telepon"
                      value="<?php echo $row->telepon;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Handphone</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="handphone"
                      value="<?php echo $row->handphone;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="email"
                      value="<?php echo $row->email;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Simpan</button>
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

  <!-- End Page -->