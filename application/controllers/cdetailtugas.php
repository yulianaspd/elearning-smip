<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdetailtugas extends CI_Controller {

/* i. function construct */
function __construct(){
  parent::__construct();
}

public function showdetailtugas($id){
  echo $id;
  $this->db->query("UPDATE notifikasi set status_id=2 where login_id = '".$this->session->userdata('login_id')."'");

  $this->load->model('mnotifikasi');//judul title
  $data['jlhnotif'] =$this->mnotifikasi->notif_count($id,1);  //menghitung jumlah post
  $data['notifikasi'] =$this->mnotifikasi->getnotifikasi($id,1); //menampilkan isi postingan

  $this->load->view('top.php', $data);
  $this->load->view('lef.php');
  ?>
  <div class="content-wrapper" style="min-height: 1126px;">

  	<div class="modal fade" id="modal-default" style="display: none;">
  		<div class="modal-dialog">
  			<div id="id_MdlDefault" class="modal-content">
  			<!-- isi modal dinamis disini -->
  			</div>
  		<!-- /.modal-content -->
  		</div>
  	<!-- /.modal-dialog -->
  	</div>



      <!-- Content Header (Page header) -->
      <section class="content-header" style="margin:100px 0 0 250px;">
        <div class="container-fluid">
        <h1>

        </h1>
         <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-files-o"></i> MENU KELOLA</a></li>
          <li class="active">detailtugas</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content" style="margin:0 0 0 250px;">
        <div class="container-fluid">

        <!-- Default box -->

  			<div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Tugas</h3>

          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                   <thead>
                     <tr>
                         <th width="3%">Judul</th>
                         <th width="5%">Konten</th>
                         <th width="10%">Tanggal Buat</th>
                         <th width="10%">Tanggal Selesai</th>
                         <th width="10%">Matapelajaran</th>
                         <th width="10%">Pengajar</th>
                         <th width="10%">Kelas</th>
                         <th width="10%">file</th>
                     </tr>
                   </thead>
                 <tbody>
                   <?php
             $this->load->model('mdetailtugas');
             $query=$this->mdetailtugas->selectdetailtugas($id);
             foreach($query->result() as $row){
               ?>
               <tr>
                   <td><?php echo $row->judul?></td>
                   <td><?php echo $row->konten?></td>
                   <td><?php echo $row->tgl_buat?></td>
                   <td><?php echo $row->tgl_selesai?></td>
                   <td><?php echo $row->nama_mapel?></td>
                   <td><?php echo $row->nama?></td>
                   <td><?php echo $row->nama_kelas?></td>
                   <td><?php echo $row->file?></td>
                 </tr>
               <?php
               // $i++;
               }
               ?>
               </table>
          </div>
          <!-- /.box-body -->
            </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    </div>
    </div>



  <?php
  $this->load->view('bot.php');
}

}

?>
