<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cakun_s extends CI_Controller {

/* i. function construct */
function __construct(){
  parent::__construct();
}

public function showdetailakun(){
 $id = $this->session->userdata('login_id');
  // $this->db->query("UPDATE notifikasi set status_id=2 where login_id = '".$this->session->userdata('login_id')."'");

  $this->load->model('mnotifikasi');//judul title
  $data['jlhnotif'] =$this->mnotifikasi->notif_count($id,1);  //menghitung jumlah post
  $data['notifikasi'] =$this->mnotifikasi->getnotifikasi($id,1); //menampilkan isi postingan

  $this->load->view('top.php',$data);
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
            Detail Akun
        </h1>
         <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-files-o"></i> MENU KELOLA</a></li>
          <li class="active">detailakun</li>
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
              $this->load->model('mdetailakun');
              $query=$this->mdetailakun->selectdetailakun_s($id);
              foreach($query->result() as $row){
              ?>
              <tr>
                <td width="20%"><b>NIS</td></b>
                <td width="80%"><?php echo $row->nis?></td>
              </tr>
              <tr>
                <td><b>Nama</td></b>
                <td><?php echo $row->nama?></td>
              </tr>
              <tr>
                <td><b>Jenis Kelamin</td></b>
                <td><?php echo $row->jenis_kelamin?></td>
              </tr>
              <tr>
                <td><b>Tempat Lahir</td></b>
                <td><?php echo $row->tempat_lahir?></td>
              </tr>
              <tr>
                <td><b>Tanggal Lahir</td></b>
                <td><?php echo $row->tanggal?></td>
              </tr>
              <tr>
                <td><b>Agama</td></b>
                <td><?php echo $row->agama?></td>
              </tr>
              <tr>
                <td><b>Alamat</td></b>
                <td><?php echo $row->alamat?></td>
              </tr>
              <tr>
                <td><b>Tahun Masuk</td></b>
                <td><?php echo $row->tahun_masuk?></td>
              </tr>
              <tr>
                <td><b>Status</td></b>
                <td><?php echo $row->status_nama?></td>
              </tr>
              <tr>
                <td><b>Kelas</td></b>
                <td><?php echo $row->nama_kelas?></td>
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
