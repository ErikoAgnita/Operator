<div class="container" style="background-color:#525252;">
    <h4 class="page-header" style="text-aligntment:center;">Laporan Masyarakat</h4>
     <div class="container-fluid">
         <div class="pull-right">
           <nav>           
              <ul class="pagination">
                  <li> <?php echo $links; ?> </li>
              </ul>
           </nav>
        </div>
    </div>
    <div class="row">
        <?php if(isset($aspirasi)){foreach($aspirasi as $as){ ?>
        <div class="col-sm-3">
            <div class="box box-widget">
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle' src='<?php echo base_url(); ?>assets/images/people.png' alt='masyarakat'>
                    <span class='username'><a href="#"><?php echo $as->nama; ?></a></span>
                    <span class='description'><?php echo date("d M Y  H:i:s",strtotime($as->tanggal_saran)); ?></span>
                  </div><!-- /.user-block -->
                  
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                  <?php if($as->lampiran_saran!=NULL){echo "<img class='img-responsive pad' src='".base_url()."uploads/".$as->lampiran_saran."' alt='Photo'> <?php ";} ?>
                  <p><?php $baris= $as->saran;
    echo substr($baris, 0, 150); echo "<b> . . .</b>"; ?> <br></p>
                    <input type="hidden" name="saranid" value="<?php echo $as->id_saran; ?>" >
                  <button  href="#myModal<?php echo $as->id_saran; ?>" class='btn btn-info pull-right btn-xs' data-toggle="modal">Baca selengkapnya &nbsp; <i class='fa fa-share'></i></button>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
        
        <!-- Modal -->
<div class="modal fade" id="myModal<?php echo $as->id_saran; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="box box-widget">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<div class='box-header'>-->
                  <div class='user-block'>
                    <img class='img-circle' src='<?php echo base_url(); ?>assets/images/people.png' alt='masyarakat'>
                    <span class='username'><a href="#"><?php echo $as->nama; ?></a></span>
                    <span class='description'><?php echo date("d M Y H:i:s",strtotime($as->tanggal_saran)); ?></span>
                  </div><!-- /.user-block -->
                <!--</div> /.box-header -->
      </div>
      <div class="modal-body">
        
                <div class='box-body'>
                  <?php if($as->lampiran_saran!=NULL){echo "<img class='img-responsive pad' src='".base_url()."uploads/".$as->lampiran_saran."' alt='Foto Laporan Masyarakat'> <?php ";} ?>
                  <p><?php echo $as->saran; ?> <br></p>
                                    
                </div><!-- /.box-body -->
          <div class='box-footer box-comments'>
              <?php foreach($balasan as $rply){ if($as->id_saran == $rply->rid_saran) {?>
                  <div class='box-comment'>
                    <!-- User image -->
                    <img class='img-circle img-sm' src='<?php echo base_url(); ?>assets/images/logo.png' alt='pemerintah'>
                    <div class='comment-text'>
                      <span class="username">
                        <?php echo $rply->snama;?>
                        <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($rply->tanggal_respon)); ?></span>
                      </span><!-- /.username -->
                        <p><?php echo $rply->isi_respon; ?> <br></p>
                    </div><!-- /.comment-text -->
                  </div><!-- /.box-comment -->                    
                <?php }} ?>
              </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
        
        <?php ;}} ?>
    </div>
</div>
<script>

</script>