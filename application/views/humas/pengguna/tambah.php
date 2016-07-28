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
                  <form action="<?php echo base_url()?>Cpengguna/do_tambah" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label class="control-label" for="inputBasicUsername">Username</label>
                        <input type="text" class="form-control" id="inputBasicUsername" name="username"
                        placeholder="vira" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="password" class="form-control" id="inputBasicPassword" name="password"
                       autocomplete="off" />
                    </div>
                      <div class="form-group">
                        <label class="control-label" for="inputBasicKodeUnit">SKPD</label>
                        <div>
                          <select class="form-control" name="id_skpd" required="off">
                            <option value="disabled selected">-Pilih SKPD-</option>
                            <?php  foreach ($skpd->result() as $row){
                              echo "<option value='".$row->id_skpd."'>".$row->nama."</option>";                              
                            }?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicLevel">Level</label>
                        <div>
                          <select class="form-control" name="level" required="off">
                            <option value="disabled selected">-Pilih Level-</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicNama">Nama Pengguna</label>
                      <input type="text" class="form-control" id="inputBasicNama" name="nama"
                       placeholder="VIRA WIENA" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicAlamat">Alamat Pengguna</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" name="alamat" 
                       placeholder="Jl. Letjend. Sukowati No. 51, Salatiga, Jawa Tengah 50724" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" name="telepon"
                       placeholder="(0298) 326767" autocomplete="off" />
                    </div>
                        <div class="form-group">
                      <label class="control-label" for="inputBasicHandphone">Handphone</label>
                      <input type="text" class="form-control" id="inputBasicHandphone" name="handphone"
                       placeholder="085747123456" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" id="inputBasicEmail" name="email"
                       placeholder="devira13@mhs.if.its.ac.id" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKeterangan">Keterangan</label>
                      <input type="text" class="form-control" id="inputBasicKeterangan" name="keterangan"
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