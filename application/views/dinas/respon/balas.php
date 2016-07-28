
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Ubah Respon</h1>
      <ol class="breadcrumb">
        <li>Respon</li>
        <li>Ubah</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Ubah Respon</h4>
                <div class="example">
                <?php foreach ($respon->result() as $row){?>
                  <form autocomplete="off" action="<?php echo base_url();?>crespon/kirim_respon/<?php echo $row->id_respon;}?>" method="post">
                    <div class="form-group">      
                        <label class="control-label" for="inputBasicFirstName">Kategori</label>
                        <input type="text" class="form-control" value="<?php echo $row->kategori;?>" name="kategori">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Respon</label>
                      <input type="text" class="form-control" value="<?php echo $row->isi_respon;?>" name="isi_respon">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                      <input type="file" class="form-control" value="<?php echo $row->lampiran_respon;?>" name="lampiran_respon">
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $row->id_saran;?>" name="id_saran">
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                      <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
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