<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
  strong { 
    color: black;
  }

</style>

<?php
if($saran->result()){?>
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-content">
    <!-- Panel X-Editable -->
    <div class="panel">
      <header class="panel-heading">
        <h3 class="panel-title">Detail Saran</h3>
      </header>
      <div class="panel-body">
        <div class="page-content tab-content page-content-table nav-tabs-animate">
          <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
            <div class="panel-body container-fluid">
              <table class="table is-indent">          
                <tbody>
                  <?php foreach ($saran->result() as $row){
                  ?>
                  <form autocomplete="off" action="" method="post">
                    <tr data-url="panel.tpl" data-toggle="slidePanel">      
                      <td class="cell-60 responsive-hide">
                        <a>
                          <img class="" width="50px" src="<?php  echo base_url(); ?>assets/images/comment.png" alt="...">
                        </a>
                      </td>
                      <td>
                        <div>
                          <div class="metas">
                            <span class="">
                              <strong><?php echo $row->nama ?></strong>
                              <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row->tanggal_saran));?> WIB</span>
                            </span>
                          </div>
                          <div class="metas">
                            <span class=""><?php echo $row->alamat ?></span>
                          </div>
                          <div class="metas">
                            <span class=""><?php echo $row->telepon ?></span>
                          </div>
                          <div class="metas">
                            <span class=""><?php echo $row->email ?></span>
                          </div>
                          <div class="metas">
                            <span class=""><?php echo $row->topik ?></span>
                          </div>
                          <div class="metas">
                            <span class="">
                              <?php if($row->lampiran_saran){
                              echo "<img class='img-responsive pad' src='".base_url()."uploads/saran/".$row->lampiran_saran."' 
                              alt='Photo'> <?php ";
                            } ?>
                            </span>
                          </div>
                          <div class="metas">
                            <span class=""><?php echo $row->saran ?></span>
                          </div>                        
                        </div>
                      </td>
                    </tr>
                  </form>
                  <?php } ?>
                </tbody>
              </table>
              <table class="table is-indent">   
                <tbody>
                  <?php
                      foreach ($saran->result() as $row){                        
                        $id_saran = $row->id_saran; 
                      }
                      $id_respon=NULL;
                      $id_skpd=NULL;
                      $kategori=NULL;
                      $isi_respon=NULL;
                      $lampiran_respon=NULL;
                      $tanggal_respon=NULL;

                      foreach ($respon->result() as $row2){
                      if($row2->id_skpd == $Idskpd){
                        $flag=1;
                        if($row2->isi_respon){
                          $flag=2;
                        }
                        $id_respon = $row2->id_respon;
                        $id_skpd = $row2->id_skpd;
                        $kategori = $row2->kategori;
                        $isi_respon = $row2->isi_respon;
                        $lampiran_respon = $row2->lampiran_respon;
                        $tanggal_respon = $row2->tanggal_respon;
                      }
                      }?>

                      <?php
                      if($flag==0 or $flag==1){?>
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Respon</button>
                          <div id="demo" class="collapse">
                            <div class="col-sm-6">                            
                              <form autocomplete="on" enctype="multipart/form-data" action="
                              <?php 
                              if($flag==1){
                                echo base_url();?>crespon/kirim_respon/<?php echo $id_respon;
                              }
                              else{
                                echo base_url();?>crespon/addRespon
                              <?php }
                              ?>
                              " method="post">
                                <div>      
                                  <label class="control-label" for="inputBasicFirstName">Kategori</label>
                                  <input type="text" class="form-control" value="" name="kategori">
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Respon</label>
                                  <input type="text" class="form-control" value="" name="isi_respon">
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                                  <span class="input-group-addon"><i class="fa fa-upload"></i></span>
                                  <input id="uploadFile" type="file" class="form-control" name="image" data-provides="uploadFile"/>
                                  <div id="imagePreview"></div>
                                </div>
                                <div>
                                  <input type="hidden" class="form-control" value="<?php echo $id_saran;?>" name="id_saran">
                                </div>
                                <div>
                                  <input type="hidden" class="form-control" value="<?php echo $flag;?>" name="flag">
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                              </form>
                            </div>
                          </div>
                        <?php }
                        else{?>
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Ubah Respon</button>
                          <div id="demo" class="collapse">
                            <div class="col-sm-6">                            
                              <form autocomplete="on" enctype="multipart/form-data" action="<?php echo base_url();?>crespon/kirim_respon/<?php echo $id_respon;?>" method="post">
                                <div>      
                                  <label class="control-label" for="inputBasicFirstName">Kategori</label>
                                  <input type="text" class="form-control" value="<?php echo $kategori;?>" name="kategori">
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Respon</label>
                                  <input type="text" class="form-control" value="<?php echo $isi_respon;?>" name="isi_respon">
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                                  <input id="uploadFile" type="file" class="form-control" name="image" data-provides="uploadFile"/>
                                </div>
                                <div>
                                  <input type="hidden" class="form-control" value="<?php echo $id_saran;?>" name="id_saran">
                                </div>
                                <div>
                                  <input type="hidden" class="form-control" value="<?php echo $flag;?>" name="flag">
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                                  <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
                              </form>
                            </div>
                          </div>
                        <?php
                      }?>
                </tbody>
              </table>            
            </div>
          </div>
      </div>

      <header class="panel-heading">
        <h3 class="panel-title">Respon SKPD</h3>
      </header>
      <div class="panel-body">
        <div class="page-content tab-content page-content-table nav-tabs-animate">
          <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
              <table class="table is-indent">   
                <tbody>
                  <?php
                    foreach ($respon->result() as $row2){
                    if($row2->id_skpd != $Idskpd or $row2->isi_respon){?>
                      <form autocomplete="off" action="" method="post">
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                          <td class="cell-60 responsive-hide">
                            <a>
                              <img class="" width="50px" src="<?php  echo base_url(); ?>assets/images/logo.png" alt="...">
                            </a>
                          </td>
                          <td>
                            <div>
                              <div class="metas">
                                <span class="username">
                                  <strong><?php echo $row2->nama;?></strong>
                                  <?php 
                                  if($row2->isi_respon){?>
                                    <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row2->tanggal_respon));?> WIB</span> 
                                  <?php } ?>
                                </span>
                              </div>
                              <?php 
                              if($row2->isi_respon){?>
                                <div class="metas">                        
                                  <span class="started"><?php echo $row2->kategori;?></span>
                                </div>
                                <div class="title">
                                  <?php echo $row2->isi_respon; ?>
                                </div>
                                <?php if($row2->lampiran_respon){?>
                                  <div class="metas">                 
                                    <span class="tags">
                                      <?php if($row->lampiran_saran!=NULL){
                                        echo "<img class='img-responsive pad' src='".base_url()."uploads/respon/".$row2->lampiran_respon."' 
                                        alt='Photo'> <?php ";
                                      } ?>
                                    </span>
                                  </div>
                                <?php } ?>
                              <?php }
                              else{?>                                                                 
                                <div class="metas">                 
                                  <span class="tags">(Belum ada Respon)</span>
                                </div>
                              <?php } ?>       
                            </div>
                            </div>
                          </td>
                        </tr>
                      </form>
                    <?php } 
                    }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>