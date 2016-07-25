
<div class="container" style="background-color:#525252;">
    <h4 class="page-header" style="text-aligntment:center;">Aspirasi Warga</h4>
     <div class="container-fluid">
         <div class="pull-right">
           <nav>
              <ul class="pagination">
                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
              </ul>
           </nav>
        </div>
    </div>
    <div class="row">
        
        <?php foreach($aspirasi as $as){ ?>
        <div class="col-sm-3">
            <div class="box box-widget">
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle' src='../dist/img/user1-128x128.jpg' alt='user image'>
                    <span class='username'><a href="#"><?php echo $as->NAMA; ?></a></span>
                    <span class='description'>18 Juli 2016</span>
                  </div><!-- /.user-block -->
                  
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                  <img class="img-responsive pad" src="<?php echo base_url(); ?>uploads/<?php echo $as->LAMPIRAN_ASPIRASI; ?>" alt="Photo">
                  <p><?php $baris= $as->ASPIRASI;
    echo substr($baris, 0, 150); echo "<b> . . .</b>"; ?> <br></p>
                  
                  <a href="#myModal<?php echo $as->ID_SARAN; ?>" class='btn btn-info pull-right btn-xs' data-toggle="modal">Baca selengkapnya &nbsp; <i class='fa fa-share'></i></a>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
        
        <!-- Modal -->
<div class="modal fade" id="myModal<?php echo $as->ID_SARAN; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="box box-widget">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class='box-header'>
                  <div class='user-block'>
                    <img class='img-circle' src='../dist/img/user1-128x128.jpg' alt='user image'>
                    <span class='username'><a href="#">Masyarakat</a></span>
                    <span class='description'>18 Juli 2016</span>
                  </div><!-- /.user-block -->
                </div><!-- /.box-header -->
      </div>
      <div class="modal-body">
        
                <div class='box-body'>
                  <img class="img-responsive pad" src="<?php echo base_url(); ?>uploads/<?php echo $as->LAMPIRAN_ASPIRASI; ?>" alt="Photo">
                  <p><?php echo $as->ASPIRASI; ?> <br></p>
                                    
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
        
        
        <?php ;} ?>
    </div>
</div>
<script>

</script>