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

                          <?php if($row->lampiran_saran){?>
                            <div class="metas">                 
                              <span class="tags">
                                <?php
                                  echo "<img class='img-responsive pad' src='".base_url()."uploads/saran/".$row->lampiran_saran."' 
                                  alt='Photo' width=600 height=600> <?php ";
                                ?>
                              </span>
                            </div>  
                          <?php } ?>

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
                      $id_respon;
                      $id_skpd;
                      $kategori;
                      $isi_respon;
                      $lampiran_respon;
                      $tanggal_respon;

                      //flag=0 artinya saran tidak didisposisikan
                      //flag=1 artinya saran telah didisposisikan namun belum dibalas
                      foreach ($respon->result() as $row2){
                      if($row2->id_skpd == $Idskpd){
                        if($row2->isi_respon==null){
                          $flag=1;
                        }
                        $id_respon = $row2->id_respon;
                        $id_skpd = $row2->id_skpd;
                        $kategori = $row2->kategori;
                        $isi_respon = $row2->isi_respon;
                        $lampiran_respon = $row2->lampiran_respon;
                        $tanggal_respon = $row2->tanggal_respon;
                      }
                      }?>
                  <?php //jika tidak di disposisi
                  if($flag==0) {?>
                  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#addrespon">Respon</button>
                    <div id="addrespon" class="collapse">
                      <div>                            
                        <form autocomplete="on" enctype="multipart/form-data" action="<?php echo base_url();?>crespon/addRespon" method="post">
                          <div>      
                            <label class="control-label" for="inputBasicFirstName">Kategori</label>
                            <textarea type="text" class="form-control" value="" name="kategori"></textarea> 
                          </div>
                          <div>
                            <label class="control-label" for="inputBasicEmail">Respon</label>
                            <textarea rows="8" type="text" class="form-control" value="" name="isi_respon"> </textarea>
                          </div>
                          <div>
                            <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                            <input id="uploadFile" type="file" class="form-control" name="image" data-provides="uploadFile"/>
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
                  //Membalas Saran yang telah didisposisikan namun belum dibalas
                  elseif($flag==1) { ?>
                  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#blsrespon">Respon</button>
                    <div id="blsrespon" class="collapse">
                      <div>                            
                        <form autocomplete="on" enctype="multipart/form-data" action="<?php echo base_url();?>crespon/kirim_respon/<?php echo $id_respon;?>" method="post">
                          <div>      
                            <label class="control-label" for="inputBasicFirstName">Kategori</label>
                            <textarea type="text" class="form-control" value="" name="kategori"></textarea> 
                          </div>
                          <div>
                            <label class="control-label" for="inputBasicEmail">Respon</label>
                            <textarea rows="8" type="text" class="form-control" value="" name="isi_respon"></textarea>
                          </div>
                          <div>
                            <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                            <input id="uploadFile" type="file" class="form-control" name="image" data-provides="uploadFile"/>
                            <div id="imagePreview"></div>
                          </div>
                          <div>
                            <input type="hidden" class="form-control" value="<?php echo $id_saran;?>" name="id_saran">
                          </div>
                          <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
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
                    foreach ($respon->result() as $row2){?>
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
                                <?php if($row2->lampiran_respon){?>
                                  <div class="metas">                 
                                    <span class="tags">
                                      <?php
                                        echo "<img class='img-responsive pad' src='".base_url()."uploads/respon/".$row2->lampiran_respon."' 
                                        alt='Photo' width=600 height=600> <?php ";
                                      ?>
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
                              <?php if ($row2->id_skpd == $Idskpd and $row2->isi_respon!=NULL) {?>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ubah">Ubah Respon</button>
                                <div id="ubah" class="collapse">
                                  <div>                            
                                    <form runat="server" autocomplete="on" enctype="multipart/form-data" action="<?php echo base_url().'crespon/UbahRespon/'.$row2->id_respon;?>" method="post">
                                      <div>      
                                        <label class="control-label" for="inputBasicFirstName">Kategori</label>
                                        <textarea cols="50" type="text" class="form-control" value="<?php echo $row2->kategori;?>" name="kategori"><?php echo $row2->kategori;?></textarea> 
                                      </div>
                                      <div>
                                        <label class="control-label" for="inputBasicEmail">Respon</label>
                                        <textarea rows="8" type="text" class="form-control" value="<?php echo $row2->isi_respon;?>" name="isi_respon"><?php echo $row2->isi_respon;?></textarea>
                                      </div>
                                      <div>
                                        <label class="control-label" for="inputBasicEmail">Lampiran Respon</label>
                                        <input id="uploadFile" type="file" class="form-control" name="image" data-provides="uploadFile"/>
                                        <!-- <img id="bla"/> -->
                                        <div id="imagePreview"></div>
                                      </div>                                
                                      <div>
                                        <input type="hidden" class="form-control" value="<?php echo $row2->id_saran;?>" name="id_saran">
                                      </div>
                                      <div>
                                        <input type="hidden" class="form-control" value="<?php echo $flag;?>" name="flag">
                                      </div>
                                      <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                                        <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
                                    </form>
                                  </div>
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
<?php }?>
</div>