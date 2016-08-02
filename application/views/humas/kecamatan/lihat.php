 <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Kecamatan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kecamatan</li>
        <li>Data Kecamatan</li>
      </ol>
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar Kecamatan</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kecamatan</th>
                <th>Nama Kecamatan</th>
                <th>isAktif</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($kecamatan->result() as $row){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->kode_kecamatan;?></td>
                <td><?php echo $row->nama_kecamatan;?></td>
                <td><?php echo $row->isAktif;?></td>
                <td class="text-nowrap">
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>Ckecamatan/update/<?php echo $row->kode_kecamatan;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Ckecamatan/hapus/<?php echo $row->kode_kecamatan;?>"><i class="icon wb-close" aria-hidden="true"></i></a>
                  </button>
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