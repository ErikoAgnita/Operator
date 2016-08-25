 <!-- Page -->
  <div class="page">
      <?php foreach($pengguna as $p){ ?>
    <div class="page-header">
      <h1 class="page-title">Pengguna</h1>
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li>Edit Data Pengguna</li>
        <li><small><?php echo $p->nama; ?></small></li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
		<!-- Example Basic Form -->
              <div class="example-wrap">
                <div class="example">
          <div class="row row-lg">
              <form action="<?php echo base_url(). 'Cpengguna/do_update'; ?>" method="post" autocomplete="off">
				<div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicUsername">Username<span style="color:red">*</span></label>
                        <input type="hidden" name="id_pengguna" value="<?php echo $p->id_pengguna ?>">
                        <input type="text" class="form-control" id="inputBasicUsername" value="<?php echo $p->username ?>" name="username"
                         autocomplete="off" />
                         <?php
                          echo form_error('username','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicLevel">SKPD<span style="color:red">*</span></label>
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
                        <label class="control-label" for="inputBasicLevel">Level<span style="color:red">*</span></label>
                        <div>
                          <select class="form-control" name="level" required="off">
                            <?php if( $p->level =='Admin') { ?>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                            <?php } else { ?> 
                            <option value="Operator">Operator</option>
                            <option value="Admin">Admin</option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                     <label class="control-label" for="inputBasicNama">Nama Pengguna<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="inputBasicNama" value="<?php echo $p->nama ?>" name="nama"
                       autocomplete="off" />
                       <?php
                          echo form_error('nama','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                       <label class="control-label" for="inputBasicAlamat">Alamat Pengguna</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" value="<?php echo $p->alamat ?>" name="alamat"
                       autocomplete="off" />
                       <?php
                          echo form_error('alamat','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                     <div class="input-group">
                            <label class="control-label" style="color:red;"><small>*harus diisi</small></label>
                            <label></label>
                        </div>
				</div>
				<div class="col-sm-6">
                    
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" value="<?php echo $p->telepon ?>" name="telepon"
                       autocomplete="off" />
                       <?php
                          echo form_error('telepon','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                     <label class="control-label" for="inputBasicHandphone">Handphone</label>
                      <input type="text" class="form-control" id="inputBasicHandphone" value="<?php echo $p->handphone ?>" name="handphone"
                        autocomplete="off" />
                        <?php
                          echo form_error('handphone','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" id="inputBasicEmail" value="<?php echo $p->email ?>" name="email"
                       autocomplete="off" />
                       <?php
                          echo form_error('email','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
					<div class="form-group">
                     <label class="control-label" for="inputBasicKeterangan">Keterangan</label>
                      <input type="text" class="form-control" id="inputBasicKeterangan" value="<?php echo $p->keterangan ?>" name="keterangan"
                       autocomplete="off" />
                       <?php
                          echo form_error('keterangan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                    <div class="form-group">
                            <?php if($p->isAktif == '1'){
                                        $cekA = "checked";
                                        $cekP = "";
                                    }
                                     else {$cekP = "checked";
                                           $cekA = "";
                                          }
                            ?>
                          <label class="control-label" for="inputBasicisAktif">Status</label>
                          <div class="radio-custom radio-primary">
                              <input type="radio" id="inputRadios1" name="isAktif" value="1" <?php echo $cekA; ?>/>
                              <label for="inputRadios1">Aktif</label>
                            </div>
                            <div class="radio-custom radio-primary">
                              <input type="radio" id="inputRadios1" name="isAktif" value="0" <?php echo $cekP; ?> />
                              <label for="inputRadios1">Pasif</label>
                            </div>
                        </div>
                        
                    <div class="form-group">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
				</div>
			</form>
          </div>
		  </div>
              </div>
              <!-- End Example Basic Form -->
        </div>
      </div>
    </div>
<?php } ?>
  </div>
  <!-- End Page -->