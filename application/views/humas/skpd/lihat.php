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
                    <a href="#myModal<?php echo $row->id_skpd;?>" data-toggle="modal"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  </button>
                 <!-- <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php //echo base_url(); ?>Cskpd/update/<?php //echo $row->id_skpd;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button> -->
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Cskpd/hapus/<?php echo $row->id_skpd;?>"><i class="icon wb-close" aria-hidden="true"></i></a>
                  </button>
                </td>
              </tr>
              <?php }?>              
            </tbody>
          </table>

<!-- Modal -->
<?php foreach ($skpd as $row){?> 
            
<div id="myModal<?php echo $row->id_skpd;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class='user-block'>
              <img src='<?php echo base_url(); ?>assets/images/logo.png' alt='masyarakat'>
              <span class='username'><label><?php echo $row->nama; ?></label></span>
              <span class='description'><?php echo $row->alamat; ?></span>
          </div>
        <!--<h4 class="modal-title">Modal Header</h4>-->
      </div>
      <div class="modal-body">
        <table class="table table-hover dataTable table-striped width-full" style="width:100%">
        <tr>
          <td>Kode Unit</td>
          <td><?php echo $row->kodeUnit; ?></td>
        </tr>
        <tr>
          <td>Bagian</td>
          <td><?php echo $row->bagian; ?></td>
        </tr>
        <tr>
          <td>Bentuk</td>
          <td><?php echo $row->kodeUnit; ?></td>
        </tr>
        <tr>
          <td>Nama SKPD</td>
          <td><?php echo $row->nama; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><?php echo $row->alamat; ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><?php echo $row->telepon; ?></td>
        </tr>
        <tr>
          <td>Fax</td>
          <td><?php echo $row->fax; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $row->email; ?></td>
        </tr>
        <tr>
          <td>Website</td>
          <td><?php echo $row->website; ?></td>
        </tr>
        <tr>
          <td>Terakhir di Ubah</td>
          <td><?php echo $row->last_update; ?></td>
        </tr>
        <tr>
          <td>Urut</td>
          <td><?php echo $row->urut; ?></td>
        </tr>
        <tr>
          <td>Tema</td>
          <td><?php echo $row->tema; ?></td>
        </tr>
        <tr>
          <td>isLink</td>
          <td><?php echo $row->isLink; ?></td>
        </tr>
        <tr>
          <td>isAktif</td>
          <td><?php echo $row->isAktif; ?></td>
        </tr>
        <br>
</table>
        

      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-info">-->
          <a type="button" class="btn btn-info" href="<?php echo base_url(); ?>Cskpd/update/<?php echo $row->id_skpd;?>">Update</a>
        <!--</button>-->
          <a type="button" class="btn btn-success" href="<?php echo base_url(); ?>Cskpd/do_ganti_password/<?php echo $row->id_skpd;?>">Ganti Password</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->   
<?php }?>

        <div class="pull-right">
            <nav>           
                <ul class="pagination">
                  <li> <?php echo $links; ?> </li>
                </ul>
            </nav>
        </div>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->