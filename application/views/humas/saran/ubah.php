<!-- Page -->
  <div class="page">
     <div class="page-content">
      <div class="panel">
      <header class="panel-heading">
        <div class="panel-actions"></div>
        <h3 class="panel-title">Ubah Saran</h3>
      </header>

      <div class="page-nav-tabs">
        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        </ul>
      </div>
        <div class="panel-body container-fluid">
            <div class="col-sm-12">
              <!-- Example Basic Form -->
              <div class="example-wrap">  
                <div class="example">
                <?php 
                foreach ($saran->result() as $row) { ?>
                  <form action="<?php echo base_url().'csaran/ubah_saran/'.$row->id_saran; ?>" method="post" autocomplete="off">

                  <div class="form-group">
                    <label class="control-label" for="">Nama Pelapor</label>
                    <input type="text" class="form-control" id="" value="<?php echo $row->nama; ?>" name="nama" autocomplete="off" readonly="true">
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="">Alamat</label>
                    <input type="text" class="form-control" id="" value="<?php echo $row->alamat; ?>" name="nama" autocomplete="off" readonly="true"/>
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="">Tanggal</label>
                    <input type="text" class="form-control" id="" value="<?php echo $row->tanggal_saran; ?>" name="nama" autocomplete="off" readonly="true"/>
                  </div>                  

                  <?php
                    echo "<div class='form-group'>";
                    echo form_label('Isi Saran'); echo "<span style='color:red'>*</span>";
		    echo form_error('saran','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                    $data_saran = array(
                      'name' => 'saran',
                      'rows' => '10',
                      'cols' => '100',                            
                      'id' => 'saran_id',
                      'class' => 'form-control',
                      'value' => $row->saran,
                      );
                    echo form_textarea($data_saran);
                  }
                  ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                  </div>
                  <div class="input-group">
                    <label class="control-label" style="color:red;"><small>*harus diisi</small></label>
                    <label></label>
                </div>
                </form>
                <?php ?>
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