
    <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Saran</h1>
      <ol class="breadcrumb">
        <li>Saran</li>
        <li>Lihat</li>
      </ol>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar Saran</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Topik</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Saran</th>
                <th>Tanggal Saran</th>
                <th>Status Saran</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no=1 ?>
              <?php foreach ($saran->result() as $row){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->topik;?></td>
                <td><?php echo $row->nama;?></td>
                <td><?php echo $row->alamat;?></td>
                <td><?php echo $row->email;?></td>
                <td><?php echo substr($row->saran, 0,200); echo '...'?></td>
                <td><?php echo $row->tanggal_saran;?></td>
                <td><?php echo $row->isStatus;?></td>
                <td class="text-nowrap">
                  <a href="<?php echo base_url(); ?>SaranController/detail/<?php echo $row->id_saran;?>">Detail</a>
                </td>
              </tr>
              <?php }?>              
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->