  <div class="page">
          
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
          <h3 class="panel-title">Total Saran yang Masuk dari Masyarakat</h3>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Total Saran</th>
               <th>Spam</th>
               <th>Bukan Spam</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($semua as $semua){?>
              <?php foreach ($spam as $spam){?>
              <?php foreach ($bukanspam as $bukanspam){?>
              <tr>
              <td style="width:20%"><?php echo $semua->jumlah_saran;?></td><?php }?>  <!-- semua  -->
              <td style="width:20%"><?php echo $spam->jumlah_spam;?></td><?php }?>  <!-- spam  -->
              <td style="width:20%"><?php echo $bukanspam->bukan_spam;?></td><?php }?>  <!-- bukan spam  -->              
              </tr>
            </tbody>
          </table>
                  <div class="title"><br>
        <a type="button" class="btn btn-round btn-info" href="<?php echo base_url(); ?>Cstatistik/detailsaran">Detail</a>
     <div class="pull-right"> 
        </div>
        </div>
        </div>
       </div>    
      </div>
</div>
    </div>          
<!--    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
       
                 <h3 class="panel-title">Total Saran yang Sudah dan Belum di Publish ke Masyarakat</h3>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Total Saran bukan spam</th>
               <th>Publish</th>
               <th>Belum Publish</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bukanspamp as $bukanspamp){?>
              <?php foreach ($publish as $publish){?>
              <?php foreach ($belumpublish as $belumpublish){?>
              <tr>
              <td style="width:20%"><?php echo $bukanspamp->bukan_spamp;?></td><?php }?>  <!-- semua  -->
  <!--<!--            <td style="width:20%"><?php echo $publish->saran_publish;?></td><?php }?>  <!-- publish  -->
  <!--            <td style="width:20%"><?php echo $belumpublish->belum_publish;?></td><?php }?>  <!-- belom publish  -->              
 <!--             </tr>
            </tbody>
          </table>
                  <div class="title"><br>
        <a type="button" class="btn btn-round btn-info" href="<?php echo base_url(); ?>Cstatistik/detailpublish">Detail</a>
     <div class="pull-right"> 
        </div>

      </div>    
      </div>
       </div>    
      </div>
</div>
    </div>
  </div> -->
  </div>
  </div> 