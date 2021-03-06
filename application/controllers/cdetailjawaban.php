<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdetailjawaban extends CI_Controller {

/* i. function construct */
function __construct(){
  parent::__construct();
}

public function showdetailjawaban($id){
  echo $id;
  $this->db->query("UPDATE notifikasi set status_id=2 where login_id = '".$this->session->userdata('login_id')."' and tugas_jawaban_id='".$id."'");

  $id_login = $this->session->userdata('login_id');
  $this->load->model('mnotifikasi');//judul title
  $data['jlhnotif'] =$this->mnotifikasi->notif_count($id_login,1);  //menghitung jumlah post
  $data['notifikasi'] =$this->mnotifikasi->getnotifikasi($id_login,1); //menampilkan isi postingan

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
            Jawaban Tugas
        </h1>
         <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-files-o"></i> MENU KELOLA</a></li>
          <li class="active">Jawaban Tugas</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content" style="margin:0 0 0 250px;">
        <div class="container-fluid">

        <!-- Default box -->

  			<div class="box">
          <div class="box-header with-border">

          </div>
          <div class="panel-body"> <!-- tugas-->
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="30%">Tanggal</th>
                  <th width="20%">NIS</th>
                  <th width="25%">Nama</th>
                  <th width="30%">Jawaban</th>
                  <th width="30%">Opsi</th>
                </tr>
              </thead>
              <?php
              $this->load->model('mcrudtugas');
                  $query = $this->mcrudtugas->showjawaban($id);
              $i = 1;
              foreach($query->result() as $jawaban){
                ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $jawaban->tgl_buat?></td>
                    <td><?php echo $jawaban->nis?></td>
                    <td><?php echo $jawaban->nama?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>assets/filejawaban/<?=$jawaban->file?>"
                        download="<?=$jawaban->file?>"><?=$jawaban->file?></a>
                    </td>
                    <td>
                    <script>
                    function redirect(url){
                      location.href = url;
                    }
                    </script>
                    <button onclick="redirect('http://localhost/elearning-smip/index.php/cdetailjawab_s/showdetailjawab/<?= $jawaban->tugas_jawaban_id?>')"
                      type="button" class="btn btn-primary btn-xs">Detail</button>
                    </td>
                  </tr>
          <?php
          $i++;
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
