<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccaridashboard_p extends CI_Controller {

/* i. function construct */
function __construct(){
  parent::__construct();
}

public function showcaridashboard(){
  // echo $id;
  $this->db->query("UPDATE notifikasi set status_id=2 where login_id = '".$this->session->userdata('pengajar_id')."'");

  $this->load->model('mnotifikasi');//judul title
  // $data['jlhnotif'] =$this->mnotifikasi->notif_count($id,1);  //menghitung jumlah post
  // $data['notifikasi'] =$this->mnotifikasi->getnotifikasi($id,1); //menampilkan isi postingan

  $this->load->view('topsearch.php');
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
          Cari Jadwal
        </h1>
         <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-files-o"></i> MENU KELOLA</a></li>
          <li class="active">carijadwal</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content" style="margin:0 0 0 250px;">
        <div class="container-fluid">

        <!-- Default box -->

  			<div class="box">
          <div class="panel-body">
          <div class="box-header with-border">


          </div>
          <div class="panel-body">
					<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="15%">Hari</th>
                <th width="15%">jam_mulai</th>
                <th width="15%">jam_selesai</th>
                <th width="5%">Matapelajaran</th>
                <th width="20%">Pengajar</th>
                <th width="15%">Kelas</th>
              </tr>
            </thead>
            <?php
            $this->load->model('mcruddashboard');
                $query = $this->mcruddashboard->showtugascari_p($this->session->userdata('pengajar_id'));
            $i = 1;
            foreach($query->result() as $jawaban){
              ?>
                <tr>
                  <!-- <td><?php echo $i ?></td>. -->
                  <td><?php echo $jawaban->hari_nama?></td>
                  <td><?php echo $jawaban->jam_mulai?></td>
                  <td><?php echo $jawaban->jam_selesai?></td>
                  <td><?php echo $jawaban->nama_mapel?></td>
                  <td><?php echo $jawaban->nama?></td>
                  <td><?php echo $jawaban->nama_kelas?></td>
                </tr>
        <?php
        $i++;
        }
        ?>
          </table>
          </div>
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
