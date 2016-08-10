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
       <form role="form" method="POST" action="<?php echo base_url();?>Cskpd/search/" >
         <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="<?php echo set_value('cari'); ?>" name="cari" placeholder="Cari Kode Unit atau Nama Dinas ...">
            <span class="input-group-btn">
              <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </div>
     </form>
   </br>
     <?php echo $this->session->flashdata('pesan'); ?>
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar SKPD</h3>
        </header>
        <div class="panel-body">
          <div class="table-responsive">
          <table class="table table-hover dataTable table-striped width-full table-responsive" data-plugin="dataTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Unit</th>
                <th scope="col">Nama Dinas</th>
                <th scope="col">Alamat Dinas</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no = $this->uri->segment('3') + 1; ?>
              <?php foreach ($skpd as $row){?>
              <tr>
                <td scope="row"><?php echo $no++ ?></td>
                <td scope="row"><?php echo $row->kodeUnit;?></td>
                <td scope="row"><?php echo $row->nama;?></td>
                <td scope="row"><?php echo $row->alamat;?></td>
                <td scope="row"><?php echo $row->telepon;?></td>                
                <td scope="row"><?php echo $row->email;?></td>
                <td class="text-nowrap" scope="row">
                   <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Detail">
                    <a href="#myModal<?php echo $row->id_skpd;?>" data-toggle="modal"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  </button>
                 <!-- <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php //echo base_url(); ?>Cskpd/update/<?php //echo $row->id_skpd;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button> -->
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Cskpd/hapus/<?php echo $row->id_skpd;?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->nama;?>')"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
          <td>Keterangan</td>
          <td><?php if($row->isAktif==1){
                        echo "<span class=\"label label-success\">Aktif</span>";
                    }
                    else echo "<span class=\"label label-default\">Tidak Aktif</span>";
              
              ?></td>
        <br>
</table>
        

      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-info">-->
          <a type="button" class="btn btn-info btn-primary" href="<?php echo base_url(); ?>Cskpd/update/<?php echo $row->id_skpd;?>"><i class="fa fa-edit"></i>&nbsp;&nbsp;Ubah</a>
        <!--</button>-->
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon wb-close"></i>&nbsp;&nbsp;Tutup</button>
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
    </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->