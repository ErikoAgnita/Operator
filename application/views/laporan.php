<div class="container" style="background-color:#525252;">
    <h1 class="page-header" style="text-aligntment:center; color:#62a8ea;">
            <b>Laporan Masyarakat</b>
          </h1>
    <form role="form" method="POST" action="<?php echo base_url();?>csaran/search/" >
         <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="<?php echo set_value('cari'); ?>" name="cari" placeholder="Cari . . .">
            <span class="input-group-btn">
              <button class="btn btn-info btn-flat" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </div>
     </form>
     
    <?php echo $this->session->flashdata('pesancari'); ?>
    <div class="row" style="margin-top:20px;">
        <?php if($aspirasi!=0){foreach($aspirasi as $as){ ?>
        <div class="col-sm-3">
            <div class="box box-widget">
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle' src='<?php echo base_url(); ?>assets/images/comment.png' alt='masyarakat'>
                    <span class='username'><b><label><?php echo $as->nama; ?></label></b></span>
                    <span class='description'><?php echo date("d M Y  H:i:s",strtotime($as->tanggal_saran)); ?></span>
                  </div><!-- /.user-block -->
                  
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                  <?php if($as->lampiran_saran!=NULL){echo "<img class='img-responsive pad' src='".base_url()."uploads/saran/".$as->lampiran_saran."' alt='Photo'> <?php ";} ?>
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
                    <img class='img-circle' src='<?php echo base_url(); ?>assets/images/comment.png' alt='masyarakat'>
                    <span class='username'><label><?php echo $as->nama; ?></label></span>
                    <span class='description'><?php echo date("d M Y H:i:s",strtotime($as->tanggal_saran)); ?></span>
                  </div><!-- /.user-block -->
                <!--</div> /.box-header -->
      </div>
            
      <div class="modal-body">
            <div class='box-body'>
              <?php if($as->lampiran_saran!=NULL){echo "<img class='img-responsive pad' src='".base_url()."uploads/saran/".$as->lampiran_saran."' alt='Foto Laporan Masyarakat'> <?php ";} ?>
              <p><?php echo $as->saran; ?> <br></p>

            </div><!-- /.box-body -->
          <?php if($balasan!=0){?>
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
          <?php } ?>
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
    <div class="page-footer">
        <div class="pull-right">
           <nav>           
              <ul class="pagination">
                  <li> <?php echo $links; ?> </li>
              </ul>
           </nav>
        </div>
    </div>
</div>

<script>

</script>