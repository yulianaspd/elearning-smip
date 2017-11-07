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
    <section class="content-header">
      <div class="container-fluid">
      <h1>
        <?php echo $title ?>
      </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i>MENU KELOLA</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <!-- Default box -->

			<div class="box">
        <div class="box-header with-border">
          <a  id="id_BtnAddTugas" class="btn btn-primary">Tambah Tugas</a>

        </div>

        <div class="box-body">
         <div id="id_DivTugas">
            	<!-- data user akan tampil disini -->
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

<script>
	// ketika DOM ready
	$(document).ready(function(){
		GenDatatugas();
	});

// ketika tombol tambah user di klik
  $(document).on('click', '#id_BtnAddTugas', function(){
    // tampilkan modal
    $('#modal-default').modal('show');

    // isi modal dengan form add user
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudtugas/addtugas",
            success: function(res) {


                $('#id_MdlDefault').html(res);
								// rubah editor
								CKEDITOR.replace( 'id_konten' );
                //Date picker
                $('#id_tam').datepicker({
                    autoclose: true
                });
								// form validation on ready state
								 $().ready(function(){
										 $('#id_FrmAddTugas').validate({
												 rules:{
											//			 id_ppnnik: {
											//					required: true,
											//					maxlength: 5
											//			 },
														 id_namatugas: {
			 															required: true,
			 															maxlength: 5
			 													 }
												 },
												 messages: {
														 id_namatugas: "isi nama tugas dengan benar"
												}
										 });
								 });
								 //Date picker
								 $('#id_tbuat').datepicker({
								 		autoclose: true
								 });
        SaveTugas();
            },
            error: function(xhr){
               $('#id_MdlDefault').html("error");
            }
        });
  })

	// function untuk populate data user dari table database
	function GenDatatugas(){
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudtugas/showtugas",
            success: function(res) {
                $('#id_DivTugas').html(res);
				$(function() {
					$('#example1').DataTable({
            'retrieve'    : true,
						'paging'      : true,
						'lengthChange': false,
						'searching'   : true,
						'ordering'    : true,
						'info'        : true,
						'autoWidth'   : true
					})
				})
            },
            error: function(xhr){
               $('#id_DivTugas').html("error");
            }
        });
	}



  // save user
  function SaveTugas(){
		$(document).off('click','#id_tugasbtn');
    $(document).on('click', '#id_tugasbtn', function(e){
			// falidasi
			e.preventDefault();
            	if($('#id_FrmAddTugas').valid()){

			jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudtugas/savetugas",
        data: {

					id_judul: $('#id_judul').val(),
				 	id_konten: $('#id_konten').val(),
          id_file: $('#id_file').val(),
          id_tbuat: $('#id_tbuat').val(),
					id_mapel: $('#id_mapel').val(),
          id_pengajar: $('#id_pengajar').val(),
        	id_kelas: $('#id_kelas').val()
        },
              success: function(res) {
          $('#modal-default').modal('hide');
          alert("Data saved!" + res);
          GenDatatugas();
        },
            error: function(xhr){
               $('#id_DivTugas').html("error");
            }
        });
							} else {
						// dan jika gagal
							 return false;
							}
    })
  }

	function DetailTugas(id){
		$('#modal-default').modal('show');
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudtugas/showdetailtugas",
				data: {
					id_list_tugas: id
				},
				success: function(res) {
					$('#id_MdlDefault').html(res);
					//Date picker
					$('#id_tm').datepicker({
							autoclose: true
					});
					$('#id_judul').attr('readonly', true);
					$('#id_konten2').attr('readonly', true);
					$('#id_ttampil').attr('readonly', true);
					$('#id_ttutup').attr('readonly', true);
					$('input[name="radio1"]').attr('disabled', 'disabled');
					$('input[name="radio2"]').attr('disabled', 'disabled');
				},
				error: function(xhr){
					 $('#id_DivTugas').html("error");
				}
			});
	}
  //Saat Tombol Edit di Klik
  function EditTugas(id){
    $('#modal-default').modal('show');
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudtugas/showedittugas",
        data: {
          id_list_tugas: id
        },
        success: function(res) {
          $('#id_MdlDefault').html(res);
          //Date picker
          $('#id_tam').datepicker({
              autoclose: true
          });
        },
        error: function(xhr){
           $('#id_DivTugas').html("error");
        }
      });
  }

  //Saat tombol save change di klik
  function Updtugas(){
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>" + "index.php/ccrudtugas/Edittugas",
      data: {
         id_tugas: $('#id_tugas').val(),

         id_namatugas: $('#id_namatugas').val(),
         id_parent: $('#id_parent').val(),

         id_status: $('#id_status').val()
      },

      success: function(res) {
        $('#modal-default').modal('hide');
        alert("Data Updated!");
        GenDatatugas();
      },
      error: function(xhr){
         $('#id_DivTugas').html("error");
      }
    });
  }

//Saat tombol Hapus di klik
function DelTugas(id){
	console.log(id);
	var delconf = confirm("Hapus data?");
	if(delconf){
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/ccrudtugas/Deltugas",
			data: {
				id_list_tugas: id
			},
			success: function(res) {
				console.log(res);
				$('#modal-default').modal('hide');
				alert("Data Terhapus!");
				GenDatatugas();
			},
			error: function(xhr){
				 $('#id_DivTugas').html("error");
			}
		});
	}
}

</script>
