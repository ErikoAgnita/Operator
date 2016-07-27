<div class="container" style="background-color:#525252;">
    <h4 class="page-header" style="text-aligntment:center;">Aspirasi Warga</h4>
     <div class="container-fluid">
         <div class="pull-right">
           <nav>           
              <ul class="pagination">
                  <?php foreach ($links as $link) {
                    echo "<li>". $link."</li>";
                    } ?>
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
                  
                  <a href="#myModal<?php echo $as->id_saran; ?>" class='btn btn-info pull-right btn-xs' data-toggle="modal">Baca selengkapnya &nbsp; <i class='fa fa-share'></i></a>
                  
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
                    <span class='description'><?php echo date("d-m-Y H:i:s",strtotime($as->tanggal_saran)); ?></span>
                  </div><!-- /.user-block -->
                <!--</div> /.box-header -->
      </div>
      <div class="modal-body">
        
                <div class='box-body'>
                  <?php if($as->lampiran_saran!=NULL){echo "<img class='img-responsive pad' src='".base_url()."uploads/".$as->lampiran_saran."' alt='Photo'> <?php ";} ?>
                  <p><?php echo $as->saran; ?> <br></p>
                                    
                </div><!-- /.box-body -->
                <div class='box-footer box-comments'>
                  <div class='box-comment'>
                    <!-- User image -->
                    <img class='img-circle img-sm' src='../dist/img/user3-128x128.jpg' alt='user image'>
                    <div class='comment-text'>
                      <span class="username">
                        Admin
                        <span class='text-muted pull-right'>20 Juli 2016</span>
                      </span><!-- /.username -->
                        <p><?php $baris="Terima kasih atas saran dan masukan Saudara.<br>Pelaksanaan Salatiga Expo direncanakan 2 tahun sekali dan perlu diketahui bahwa expo ini merupakan pameran keberhasilan pembangunan Pemerintah Kota Salatiga sehingga yang ditampilkan adalah hasil pembangunan yang dilakukan setiap SKPD (Satuan Kerja Perangkat Daerah), bukan arena jual-beli makanan dan arena permainan.<br>Sedangkan masukan untuk panggung, kami koordinasikan untuk penyesuaian anggaran, karena semua penambilan ditentukan oleh besaran anggaran yang tersedia.<br>Gebyar UMKM seperti yang dilaksanakan pada tahun 2015 kemarin, untuk saat ini belum direncanakan kembali.";
    echo $baris; ?> <br></p>
                    </div><!-- /.comment-text -->
                  </div><!-- /.box-comment -->
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