<script type="text/javascript">
  function readURL(input) {

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#bla').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#uploadFile").change(function(){
      readURL(this);
  });
</script>

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
				   <div class="pull-right"> 
                                      <div class="btn-group">
                                        <?php 
                                            if($row->isAktif==1 and $row->isSpam==0){
                                                $wrnP = "badge-success";    $titleP = "Sudah dipublikasikan";
                                            }
                                            else{
                                                $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            }
                                        ?>
				       </div> 
                                        <span class="badge badge-radius <?php echo $wrnP; ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo $titleP; ?>">&#9679;</span>
                                    </div>

                              <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row->tanggal_saran));?></span>
                            </span>
                          </div>
                          <div class="metas">
                            <span class=""><?php echo '<b>Alamat: </b>'.$row->alamat ?></span>
                          </div>
                          <div class="metas">
                            <span class=""><?php echo '<b>Telepon: </b>'.$row->telepon ?></span>
                          </div>
                          <div class="metas">
                            <span class="">
                            	<?php if($row->email){ echo '<b>Email: </b>'.$row->email; }
                            	else { echo '<b>Email: - </b>'; }?>
                            </span>
                          </div>
                          <div class="metas">
                            <span class="">
                            	<?php if($row->topik){ echo '<b>Topik: </b>'.$row->topik; }
                            	else { echo '<b>Topik: - </b>'; }?>
                            </span>
                          </div>
                          <div class="metas">
                            <span class="">
                            	<?php if($row->keterangan){ echo '<b>Keterangan: </b>'.$row->keterangan; }
                            	else { echo '<b>Keterangan: - </b>'; }?>
                            </span>
                          </div>
                          <div class="metas">
                            <span class="">
                              <?php if($row->lampiran_saran){
                              echo "<img class='img-responsive pad' src='".base_url()."uploads/saran/".$row->lampiran_saran."' 
                              alt='Photo' width=600 heigt=600> <?php ";
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
                      foreach ($saran->result() as $sar){                        
                        $id_saran = $sar->id_saran; 
                      }
                      foreach ($respon->result() as $res){
                        if($res->id_skpd == $Idskpd and $res->id_saran=$id_saran and $res->isi_respon==NULL){
                          $flag=TRUE;
                          $id_respon = $res->id_respon;
                          $id_skpd = $res->id_skpd;
                          $id_saran = $res->id_saran;
                          $kategori = $res->kategori;
                          $isi_respon = $res->isi_respon;
                        }
                      }?>

                      <?php
                      if($flag==FALSE){?>
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Respon</button>
                        <?php 
                          echo form_error('isi_respon','<div class="alert alert-danger">','<button href="#" close="close" data-dismiss="alert">&times;</button></div>');
                        ?>
                          <div id="demo" class="collapse">
                            <div>                            
                              <form autocomplete="on" enctype="multipart/form-data" action="<?php echo base_url();?>crespon/addRespon" method="post">
                                <div>      
                                  <?php
                                    foreach($respon->result() as $resp){
                                    	if($resp->id_skpd == $Idskpd){	
                                    	   if($resp->tanggal_disposisi){
                                    	      $tgl_disp = $resp->tanggal_disposisi;
					   }
                                    	}
                                    }
                                  ?>
				    <input type="hidden" name="tanggal_disposisi" value=set_value($tgl_disp) />
                                </div>
                                <div>      
                                  <label class="control-label" for="inputBasicFirstName">Kategori</label>
                                  <?php $kategori = array(
                                    'name' => 'kategori',
                                    'value' => set_value('kategori'),
                                    'rows' => 2,                                     
                                    'cols' => 100,
                                    'class' => 'form-control',
                                    );
                                  echo form_textarea($kategori);?>
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Respon</label>
                                  <?php $isi_respon = array(
                                    'name' => 'isi_respon',
                                    'value' => set_value('isi_respon'),
                                    'rows' => 7,                                     
                                    'cols' => 100,
                                    'class' => 'form-control',
                                    );
                                  echo form_textarea($isi_respon);?>
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                                  <input id="uploadFile" type="file" class="form-control" name="image" data-provides="uploadFile"/>
                                  <!-- <img id="bla"/> -->
                                  <div id="imagePreview"></div>
                                </div>
                                <div>
                                  <input type="hidden" class="form-control" value="<?php echo $id_saran;?>" name="id_saran">
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                              </form>
                            </div>
                          </div>
                        <?php }

                        //SUKSES
                        elseif($flag==TRUE) {?>
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Respon</button>
                        <?php 
                          echo form_error('isi_respon','<div class="alert alert-danger">','<button href="#" close="close" data-dismiss="alert">&times;</button></div>');
                        ?>
                          <div id="demo" class="collapse">
                            <div>                            
                              <form runat="server" autocomplete="on" enctype="multipart/form-data" action="<?php echo base_url();?>crespon/kirim_respon/<?php echo $id_respon;?>" method="post">
                                <div>      
                                  <label class="control-label" for="inputBasicFirstName">Kategori</label>
                                  <?php $kategori = array(
                                    'name' => 'kategori',
                                    'value' => set_value('kategori'),
                                    'rows' => 2,                                     
                                    'cols' => 100,
                                    'class' => 'form-control',
                                    );
                                  echo form_textarea($kategori);?>
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Respon</label>
                                  <?php $isi_respon = array(
                                    'name' => 'isi_respon',
                                    'value' => set_value('isi_respon'),
                                    'rows' => 7,                                     
                                    'cols' => 100,
                                    'class' => 'form-control',
                                    );
                                  echo form_textarea($isi_respon);?>
                                </div>
                                <div>
                                  <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                                  <input id="uploadFile" type="file" class="form-control" name="image" data-provides="uploadFile"/>
                                  <!-- <img id="bla"/> -->
                                  <div id="imagePreview"></div>
                                </div>                                
                                <div>
                                  <input type="hidden" class="form-control" value="<?php echo $id_saran;?>" name="id_saran">
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                                  <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
                              </form>
                            </div>
                          </div>
                        <?php } ?>
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
                    foreach ($respon->result() as $row2){ ?>
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
                                  <div class="pull-right"> 
                                      <div class="btn-group">
                                        <?php 
                                            if($row2->ria==1){
                                                $wrnP = "badge-success";    $titleP = "Sudah dipublikasikan";
                                            }
                                            else{
                                                $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            }
                                        ?> 
                                        <span class="badge badge-radius <?php echo $wrnP; ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo $titleP; ?>">&#9679;</span>
                                      </div>
                                    </div>
                                    <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row2->tanggal_respon));?>&nbsp;&nbsp;</span> 
                                  <?php } ?> 
                                </span>
                              </div>
                                <div class="metas"> 
                                  <span class="started"> 
                                     <?php if($row2->tanggal_disposisi){ echo '<b>Tanggal disposisi: </b>'.$row2->tanggal_disposisi; } 
                                     else { echo '<b>Tanggal Disposisi: - </b>'; } ?>
                                  </span>                      
                                </div>
                              <?php 
                              if($row2->isi_respon){?>
                                <div class="metas"> 
                                  <span class="started"> 
                                     <?php if($row2->kategori){ echo '<b>Kategori: </b>'.$row2->kategori; } 
                                     else { echo '<b>Kategori: - </b>'; } ?>
                                  </span>                      
                                </div>
                                <?php if($row2->lampiran_respon){?>
                                  <div class="metas">                 
                                    <span class="tags">
                                      <?php if($row2->lampiran_respon!=NULL){
                                        echo "<img class='img-responsive pad' src='".base_url()."uploads/respon/".$row2->lampiran_respon."' 
                                        alt='Photo' width=600 height=600> <?php ";
                                      } ?>
                                    </span>
                                  </div>  
                                <?php } ?>                                                                
                                <div class="title">
                                  <?php echo $row2->isi_respon; ?>
                                </div>
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
                    <?php
                    }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }?>
