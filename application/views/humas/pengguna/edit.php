 <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Pengguna</h1>
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li>Edit Data Pengguna</li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Edit Akun</h4>
                <div class="example">
                  <?php foreach($pengguna as $p){ ?>
                  <span class='username'><h4><b><?php echo $p->nama; ?></b></h4></span>

                  <form action="<?php echo base_url(). 'Cpengguna/do_update'; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicUsername">Username</label>
                        <input type="hidden" name="id_pengguna" value="<?php echo $p->id_pengguna ?>">
                        <input type="text" class="form-control" id="inputBasicUsername" value="<?php echo $p->username ?>" name="username"
                         autocomplete="off" />
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="inputBasicLevel">SKPD</label>
                        <div>
                          <select class="form-control" name="id_skpd" required="off">
                            <?php  foreach ($skpd_data->result() as $row){ 
                                if($row->id_skpd == $p->id_skpd){
                                  echo "<option value='".$row->id_skpd."'>".$row->nama."</option>";
                                }
                             }foreach ($skpd_data->result() as $row){ 
                                  echo "<option value='".$row->id_skpd."'>".$row->nama."</option>";
                             }?>
                          </select>
                        </div>
                    </div>
                 
                    <div class="form-group">
                        <label class="control-label" for="inputBasicLevel">Level</label>
                        <div>
                          <select class="form-control" name="level" required="off">
                            <?php if( $pengguna->level=='Admin') { ?>
                            <option value='Admin'>Admin</option>
                            <option value='Operator'>Operator</option>
                            <?php } else { ?> 
                            <option value="Operator">Operator</option>
                            <option value="Admin">Admin</option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                      <div class="form-group">
                     <label class="control-label" for="inputBasicNama">Nama Pengguna</label>
                      <input type="text" class="form-control" id="inputBasicNama" value="<?php echo $p->nama ?>" name="nama"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                       <label class="control-label" for="inputBasicAlamat">Alamat Pengguna</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" value="<?php echo $p->alamat ?>" name="alamat"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" value="<?php echo $p->telepon ?>" name="telepon"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                     <label class="control-label" for="inputBasicHandphone">Handphone</label>
                      <input type="text" class="form-control" id="inputBasicHandphone" value="<?php echo $p->handphone ?>" name="handphone"
                        autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" id="inputBasicEmail" value="<?php echo $p->email ?>" name="email"
                       autocomplete="off" />
                    </div>
                     <label class="control-label" for="inputBasicKeterangan">Keterangan</label>
                      <input type="text" class="form-control" id="inputBasicKeterangan" value="<?php echo $p->keterangan ?>" name="keterangan"
                       autocomplete="off" />
                    </div>
                       <div class="form-group">
                      <label class="control-label" for="inputBasicTema">isAktif</label>
                      <input type="text" class="form-control" id="inputBasicTema" value="<?php echo $p->isAktif ?>" name="isAktif"
                       autocomplete="off" />
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