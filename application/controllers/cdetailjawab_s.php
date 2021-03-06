<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdetailjawab_s extends CI_Controller {

/* i. function construct */
function __construct(){
  parent::__construct();
}

public function showdetailjawab($id){
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
            Detail Tugas
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

          </div>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <?php
                $this->load->model('mdetailtugas');
                $query=$this->mdetailtugas->selectdetailjawab($id);
                foreach($query->result() as $row){
              ?>
              <tr>
                <td width="20%"><b>Judul Tugas</td></b>
                <td width="80%"><?php echo $row->judul?></td>
              </tr>
              <tr>
                <td><b>Konten</td></b>
                <td><?php echo $row->konten_jawaban?></td>
              </tr>
              <tr>
                <td><b>Tanggal Buat</td></b>
                <td><?php echo $row->tgl_jawaban?></td>
              </tr>
              <tr>
                <td><b>file</td></b>
                <td>
                <a href="<?php echo base_url(); ?>assets/filejawaban/<?=$row->file_jawaban?>"
                  download="<?=$row->file_jawaban?>"><?=$row->file_jawaban?></a>
                </td>
              </tr>
              <tr>
                <td><b>Matapelajaran</td></b>
                <td><?php echo $row->nama_mapel?></td>
              </tr>
              <tr>
                <td><b>Pengajar</td></b>
                <td><?php echo $row->nama?></td>
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
