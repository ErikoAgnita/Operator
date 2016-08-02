<style type="text/css">
  strong { 
    color: black;
  }
</style>

<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-content">
    <!-- Panel X-Editable -->
    <div class="panel">
      <header class="panel-heading">
        <h3 class="panel-title">Detail Saran</h3>
      </header>
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="editableUser">
              <tbody>
                <?php foreach ($saran->result() as $row){?>
                <form autocomplete="off" action="" method="post">
                  <tr>
                    <td>Nama</td>
                    <td>
                      <span class="notready"><?php echo $row->nama;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>
                      <span class="notready"><?php echo $row->alamat;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>
                      <span class="notready"><?php echo $row->email;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td>
                      <span class="notready"><?php echo $row->telepon;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Saran</td>
                    <td>
                      <span class="notready"><?php echo $row->tanggal_saran;?> WIB</span>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:20%">Topik</td>
                    <td>
                      <span class="notready"><?php echo $row->topik;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Saran</td>
                    <td>
                      <span class="notready"><?php echo $row->saran;?></span>
                    </td>
                  </tr>                
                  <tr>
                    <td>Lampiran Saran</td>
                    <td>                    
                      <span class="notready">
                        <?php if($row->lampiran_saran!=NULL){
                          echo "<img class='img-responsive pad' src='".base_url()."uploads/saran/".$row->lampiran_saran."' 
                          alt='Photo'> <?php ";
                        } ?>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>Spam</td>
                    <td>
                      <span class="notready"><?php echo $row->isSpam;?></span>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            </form>
          </div>
      </div>
      
      <header class="panel-heading">
        <h3 class="panel-title">Respon SKPD</h3>
      </header>
      <div class="page-content tab-content page-content-table nav-tabs-animate">
        <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
          <table class="table is-indent">          
            <tbody>
            <div class="panel">
              <div class="panel-body container-fluid">
               <div class="row row-lg">
                  <div class="col-sm-6">
                  <?php
                    foreach ($respon->result() as $row2){
                    if($row2->isi_respon){?>
                      <form autocomplete="off" action="" method="post">
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                          <td class="pre-cell"></td>
                          <td class="cell-60 responsive-hide">
                            <a>
                              <img class="img-responsive" src="<?php  echo base_url(); ?>assets/images/logo.png" alt="...">
                            </a>
                          </td>
                          <td>
                            <div>
                              <div class="metas">
                                <span class="username">
                                  <strong><?php echo $row2->id_skpd;?></strong>
                                  <?php
                                  if($row2->isi_respon){?>
                                    <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row2->tanggal_respon));?> WIB</span> 
                                  <?php } ?>
                                </span>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </form>
                    <?php }
                    else{?>
                      <form action="<?php echo base_url();?>crespon/kirim_respon/<?php echo $row2->id_respon;?>" method="post" autocomplete="off">
                        <div class="form-group">      
                          <label class="control-label" for="inputBasicFirstName">Kategori</label>
                          <input type="text" class="form-control" value="" name="kategori">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="inputBasicEmail">Respon</label>
                          <input type="text" class="form-control" value="" name="isi_respon">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                          <input type="file" class="form-control" value="" name="lampiran_respon">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" value="" name="id_saran">
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                          <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
                        </div>
                    <?php } ?>       
                    </form>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</div>