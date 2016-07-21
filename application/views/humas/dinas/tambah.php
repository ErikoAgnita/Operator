  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Tambah Data Dinas</h1>
      <ol class="breadcrumb">
        <li>Dinas</li>
        <li>Tambah</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Tambah Data Dinas</h4>
                <div class="example">
                  <form autocomplete="off" action="<?php echo base_url();?>DinasController/insert" method="post">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicNamaDinas">Nama Dinas</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="nama_dinas"
                        placeholder="Dinas Pendidikan" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicUsernmae">Username</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="username"
                      placeholder="DisPendik" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="telepon"
                      placeholder="0812xxxxxxxx" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="password" class="form-control" id="inputBasicPassword" name="password"
                      placeholder=".." autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
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