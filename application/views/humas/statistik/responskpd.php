  <div class="page">
          
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
          <h3 class="panel-title">Total Respon dari SKPD</h3>
        <div class="panel-body">
          <div class="col-sm-12">
            <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr style="font-size:16px;">
                <th>NAMA SKPD</th>
                <th>Terdisposisi</th>
                <th>Terbalas</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($semua as $semua){?>
              <tr>
             <td ><?php echo $semua->skpd;?></td>  <!-- semua  -->             
              <td ><?php echo $semua->jumlah_pesan;?></td>
              <td >
              <?php $flag=0; foreach ($balas as $b) {
                if($semua->id == $b->id){
                  echo $b->jumlah_balas;
                  $flag =9999999;
                }
                else $flag--;
              }
              if($flag<0) echo "0";
              echo '</td>';
               }?>  <!-- semua  -->             
              </tr>
            </tbody>
          </table>
          </div>
          <!-- <div class="container-fluid">
          <div class="col-sm-12" style="margin-top:100px;">
              <form class="form-horizontal" id="exampleStandardForm" autocomplete="on" method="POST" action="<?php echo base_url();?>Cstatistik/responskpd">
                <div class="form-group">
                  
                  <div class="input-group">
      
      <select class="form-control" name="bulan" required="off">
                          <option value="">Pilih salah satu</option>
                          <option value="1">Januari</option>
                          <option value="2">Februari</option>
                          <option value="3">Maret</option>
                          <option value="4">April</option>
                          <option value="5">Mei</option>
                          <option value="6">Juni</option>
                          <option value="7">Juli</option>
                          <option value="8">Agustus</option>
                          <option value="9">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">Nopember</option>
                          <option value="12">Desember</option>
                        </select>
      <input type="number" class="form-control" placeholder="YYYY" name="tahun" >
      <div class="input-group-addon"><button type="submit" class="btn btn-primary" id="validateButton2">Filter</button></div>
    </div>
                  
                </div>
                
                
              </form>
          </div>
        </div> -->
        </div>
       </div>    
      </div>
      </div>
      </div>
      </div>
