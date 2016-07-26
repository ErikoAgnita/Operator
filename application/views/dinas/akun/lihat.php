  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Lihat Profil Operator Dinas</h1>
      <ol class="breadcrumb">
        <li>Profil Operator Dinas</li>
        <li>Lihat</li>
      </ol>
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
                  <?php foreach($admin as $row){ ?>
                  <form autocomplete="off">
              <!--      <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="id_admin"
                        value="<?php echo $row->ID_ADMIN;?>" autocomplete="off" disabled />
                    </div> -->
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Nama Dinas</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="nama_dinas"
                        value="<?php echo $row->NAMA_DINAS;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat Dinas</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="alamat_dinas"
                      value="<?php echo $row->ALAMAT_DINAS;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="email_admin"
                      value="<?php echo $row->EMAIL_ADMIN;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="telepon"
                      value="<?php echo $row->TELEPON;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Username</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="username"
                      value="<?php echo $row->USERNAME;?>" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="password"
                      value="<?php echo $row->PASSWORD;?>" autocomplete="off" />
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