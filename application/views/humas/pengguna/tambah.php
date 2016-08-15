  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Pengguna</h1>
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li>Buat Pengguna</li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
            <form action="<?php echo base_url()?>Cpengguna/do_tambah" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="row row-lg">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                
                <div class="example">
            <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicUsername">Username<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputBasicUsername" name="username" value="<?php echo set_value('username'); ?>"
                        placeholder="vira" autocomplete="off" />
                     <?php
                          echo form_error('username','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password<span style="color:red">*</span></label>
                      <input type="password" class="form-control" id="inputBasicPassword" name="password" value="<?php echo set_value('password'); ?>"
                       autocomplete="off" />
                        <?php
                          echo form_error('password','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                      <div class="form-group">
                        <input type="hidden" name="kode_unit">
                        <label class="control-label" for="inputBasicKodeUnit">SKPD<span style="color:red">*</span></label>
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
                        <label class="control-label" for="inputBasicLevel">Level<span style="color:red">*</span></label>
                        <div>
                          <select class="form-control" name="level" required="off">
                            <option value="disabled selected">-Pilih Level-</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                          </select>
                        </div>
                         <?php
                          echo form_error('level','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicNama">Nama Pengguna<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="inputBasicNama" name="nama" value="<?php echo set_value('nama'); ?>"
                       placeholder="VIRA WIENA" autocomplete="off" />
                        <?php
                          echo form_error('nama','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                     <div class="input-group">
                            <label class="control-label" style="color:red;"><small>*harus diisi</small></label>
                            <label></label>
                        </div>
            </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label" for="inputBasicAlamat">Alamat Pengguna</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" name="alamat" value="<?php echo set_value('alamat'); ?>"
                       placeholder="Jl. Letjend. Sukowati No. 51, Salatiga, Jawa Tengah 50724" autocomplete="off" />
                     <?php
                          echo form_error('alamat','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" name="telepon" value="<?php echo set_value('telepon'); ?>"
                       placeholder="(0298) 326767" autocomplete="off" />
                     <?php
                          echo form_error('telepon','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                        <div class="form-group">
                      <label class="control-label" for="inputBasicHandphone">Handphone</label>
                      <input type="text" class="form-control" id="inputBasicHandphone" name="handphone" value="<?php echo set_value('handphone'); ?>"
                       placeholder="085747123456" autocomplete="off" />
                     <?php
                          echo form_error('handphone','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" id="inputBasicEmail" name="email" value="<?php echo set_value('email'); ?>"
                       placeholder="devira13@mhs.if.its.ac.id" autocomplete="off" />
                        <?php
                          echo form_error('email','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKeterangan">Keterangan</label>
                      <input type="text" class="form-control" id="inputBasicKeterangan" name="keterangan" value="<?php echo set_value('keterangan'); ?>"
                       autocomplete="off" />
                        <?php
                          echo form_error('keterangan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
            </div>
                  </div>
              </div>
              <!-- End Example Basic Form -->
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->