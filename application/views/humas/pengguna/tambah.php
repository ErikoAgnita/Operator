  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Pengguna</h1>
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li>Tambah Pengguna</li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Tambah Pengguna</h4>
                <div class="example">
                  <form action="<?php echo base_url(). 'PenggunaController/do_tambah'; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">username</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="username"
                        placeholder="VIRA WIENA" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicAlamat">password</label>
                      <input type="password" class="form-control" id="inputBasicPassword" name="password"
                      placeholder="Jalan Argoboga" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicEmail">kode_unit</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="kode_unit"
                        placeholder="a13@mhs.its.ac.id" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">level</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="level"
                      placeholder="0813287787" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicUsername">nama</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="nama"
                      placeholder="5113100061" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">alamat</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="alamat"
                       autocomplete="off" />
                     <div class="form-group">
                      <label class="control-label" for="inputBasicLevel">telepon</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="telepon"
                       autocomplete="off" />                    
                     <div class="form-group">
                      <label class="control-label" for="inputBasicLevel">handphone</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="handphone"
                       autocomplete="off" />                       
                     <div class="form-group">
                      <label class="control-label" for="inputBasicLevel">email</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="email"
                       autocomplete="off" />
                     <div class="form-group">
                      <label class="control-label" for="inputBasicLevel">keterangan</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="keterangan"
                       autocomplete="off" />
                     <div class="form-group">
                      <label class="control-label" for="inputBasicLevel">isAktif</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="isAktif"
                       autocomplete="off" />
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