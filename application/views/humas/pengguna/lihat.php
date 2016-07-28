  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Pengguna</h1>
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li>Data Pengguna</li>
      </ol>
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar Pengguna</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Handphone</th>
                <th>Email</th>
                <th>Bagian SKPD</th>
                <th>Level</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($pengguna->result() as $row){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->nama_pengguna;?></td>
                <td><?php echo $row->alamat;?></td>
                <td><?php echo $row->handphone;?></td>
                <td><?php echo $row->email;?></td>
                <td><?php echo $row->nama_dinas;?></td>
                <td><?php echo $row->level;?></td>                
                <td><?php echo $row->keterangan;?></td>
                 <td class="text-nowrap">
                   <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Detail">
                    <a href="<?php echo base_url(); ?>Cpengguna/detail/<?php echo $row->id_pengguna;?>"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>Cpengguna/update/<?php echo $row->id_pengguna;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Cpengguna/hapus/<?php echo $row->id_pengguna;?>"><i class="icon wb-close" aria-hidden="true"></i></a>
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