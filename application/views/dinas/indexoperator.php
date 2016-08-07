
  <!-- Page -->
  <div class="page">
          
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
       <h1 class="intro-text text-center">Satuan Kerja Perangkat Daerah</h1>
      <h2 class="intro-text text-center">Pemerintah Kota Salatiga</h2><br> 

              
      <img src="<?php  echo base_url(); ?>assets/images/logo.png" 
      style="width:180px; height:250px; display: block; margin-left: auto; margin-right: auto"><br>

      <h1 class="intro-text text-center"><b>SELAMAT DATANG</b></h1> 
      <?php foreach ($adata as $row){?>
           <h3 class="intro-text text-center"> - <?php echo strtoupper ($row->username);?> - </h3>
            <!--  <h3 class="intro-text text-center">- Operator -</h3>
               End Example Basic Form -->
<?php } ?>
      </div>    
      </div>
</div>
    </div>
  </div>

  <!-- End Page -->