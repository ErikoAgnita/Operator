  
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Detail Saran</h1>
      <ol class="breadcrumb">
        <li>Saran</li>
        <li>Detail</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Detail Saran</h4>
                <div class="example">
                <?php foreach ($saran->result() as $row){?>
                  <form autocomplete="off" action="
                  <?php
                  $status = $row->STATUS_LAPORAN;
                  if($status==0){
                    echo base_url();?>SaranController/disposisi/<?php echo $row->ID_SARAN;
                  }
                  elseif($status == 2){
                    echo base_url();?>SaranController/publish/<?php echo $row->ID_SARAN;
                  }?>" 
                  method="post">
                    <a href="<?php echo base_url(); ?>SaranController/ubah/<?php echo $row->ID_SARAN;?>" class="btn btn-primary btn-rounded"><i class="icon-add position-left"></i>Ubah</a>
                    <a href="<?php echo base_url(); ?>SaranController/hapus/<?php echo $row->ID_SARAN;?>" class="btn btn-primary btn-rounded"><i class="icon-add position-left"></i>Hapus</a>
                    <div class="form-group">      
                        <label class="control-label" for="inputBasicFirstName">Nama Pelapor</label>
                        <input type="text" class="form-control" value="<?php echo $row->NAMA;?>" name="nama">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat</label>
                      <input type="text" class="form-control" value="<?php echo $row->ALAMAT;?>" name="alamat">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Email</label>
                      <input type="text" class="form-control" value="<?php echo $row->EMAIL;?>" name="email">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Telepon</label>
                      <input type="text" class="form-control" value="<?php echo $row->TELEPON;?>" name="telepon">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Aspirasi</label>
                      <input type="text" class="form-control" value="<?php echo $row->ASPIRASI;?>" name="aspirasi">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Tanggal Lapor</label>
                      <input type="text" class="form-control" value="<?php echo $row->TANGGAL_LAPOR;?>" name="tanggal_lapor">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Lampiran Aspirasi</label>
                      <input type="text" class="form-control" value="<?php echo $row->LAMPIRAN_ASPIRASI;?>" name="lampiran_aspirasi">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Status Laporan</label>
                      <input type="text" class="form-control" value="
                      <?php 
                      $status = $row->STATUS_LAPORAN;
                      if($status==0){
                        echo "Laporan Masuk";
                      }
                      elseif($status == 1){
                        echo "Telah Didisposisi";
                      }
                      elseif($status == 2){
                        echo "Respon SKPD Masuk";
                      }
                      elseif($status == 3){
                        echo "Respon dipublish";
                      }
                      ?>
                      " name="status_laporan">
                      <!-- <input type="text" class="form-control" value="<?php echo $row->STATUS_LAPORAN;?>" name="status_laporan"> -->
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Respon Humas</label>
                      <input type="text" class="form-control" value="<?php echo $row->RESPON_HUMAS;?>" name="respon_humas">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Tanggal Disposisi</label>
                      <input type="text" class="form-control" value="<?php echo $row->TANGGAL_DISPOSISI;?>" name="tanggal_disposisi">
                    </div>                    
                    <div class="form-group">
                      <?php
                      $status = $row->STATUS_LAPORAN;
                      if($status==0){
                        ?><button type="submit" class="btn btn-primary"><?php echo "Disposisi"; ?></button><?php
                      }
                      elseif($status == 2){
                        ?><button type="submit" class="btn btn-primary"><?php echo "Publish"; ?></button><?php
                      }
                      ?>
                      <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
                    </div>
                    <?php } ?>
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