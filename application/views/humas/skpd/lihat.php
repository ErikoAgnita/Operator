  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Satuan Kerja Perangkat Daerah (SKPD)</h1>
      <ol class="breadcrumb">
        <li>SKPD</li>
        <li>Data SKPD</li>
      </ol>
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar SKPD</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Unit</th>
                <th>Nama Dinas</th>
                <th>Alamat Dinas</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no = $this->uri->segment('3') + 1; ?>
              <?php foreach ($skpd as $row){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->kodeUnit;?></td>
                <td><?php echo $row->nama;?></td>
                <td><?php echo $row->alamat;?></td>
                <td><?php echo $row->telepon;?></td>                
                <td><?php echo $row->email;?></td>
                <td class="text-nowrap">
                   <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Detail">
                    <a href="<?php echo base_url(); ?>Cskpd/detail/<?php echo $row->id_skpd;?>"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>Cskpd/update/<?php echo $row->id_skpd;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Cskpd/hapus/<?php echo $row->id_skpd;?>"><i class="icon wb-close" aria-hidden="true"></i></a>
                  </button>
                </td>
              </tr>
              <?php }?>              
            </tbody>
          </table>
          <br/>
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->