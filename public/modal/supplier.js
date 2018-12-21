$(document).ready(function() {
	createData();
          $('#datatable-ajax').DataTable({
              processing: true,
              serverSide: true,
		      ajax : '/jsonsupplier',
		      columns : [
		        {data : 'nama', name: 'nama'},
		        {data : 'alamat' , name: 'alamat'},
		        {data : 'no_telepon', name: 'no_telepon'},
		        {data: 'action', orderable: false, searchable: false}
              ],
            });
          $('#TambahSupplier').click(function(){
            $('#myModalSupplier').modal('show');
            $('.modal-title').text('Masukan Data Supllier');
            $('#aksi').val('TambahSupplier');
            state = "insert";
            });

           $('#myModalSupplier').on('hidden.bs.modal',function(e){
            $(this).find('#formSupplier')[0].reset();
            $('span.has-error').text('');
            $('.form-group.has-error').removeClass('has-error');
            });

        //  	$('#formSatuan').submit(function(e){
	       //      $.ajaxSetup({
	       //        header: {
	       //          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
	       //        }
	       //      });
        //     error.preventDefault();

        //     if (state == 'insert'){
              
        //       $.ajax({
        //         type: "POST",
        //         url: "{{url ('/storesatuan')}}",
        //         data: new FormData(this),
        //        // data: $('#student_form').serialize(),
        //         contentType: false,
        //         processData: false,
        //         dataType: 'json',
        //         success: function (data){
        //           console.log(data);
        //           swal({
        //               title:'Success Tambah!',
        //               text: data.message,
        //               type:'success',
        //               timer:'2000'
        //             });
        //           $('#myModalSatuan').modal('hide');
        //           $('#dataTableSatuan').DataTable().ajax.reload();
        //         },
        //         //menampilkan validasi error
        //         error: function (data){
        //           $('input').on('keydown keypress keyup click change', function(){
        //           $(this).parent().removeClass('has-error');
        //           $(this).next('.help-block').hide()
        //         });
        //           var coba = new Array();
        //           console.log(data.responseJSON.errors);
        //           $.each(data.responseJSON.errors,function(name, value){
        //             console.log(name);
        //             coba.push(name);
        //             $('input[name='+name+']').parent().addClass('has-error');
        //             $('input[name='+name+']').next('.help-block').show().text(value);
        //           });
        //           $('input[name='+coba[0]+']').focus();
        //         }
        //       });
        //     }
        // });

        function createData() {
	        $('#formSupplier').submit(function(e){
	            $.ajaxSetup({
	              header: {
	                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
	              }
	            });
	            e.preventDefault();
	            if (state == 'insert') {
	            $.ajax({
	                url:'/storesuppliers',
	                type:'post',
	                data: new FormData(this),
	                cache: true,
	                contentType: false,
	                processData: false,
	                async:false,
	                dataType: 'json',
	                success: function (data){
	                  console.log(data);
	                  swal({
	                      title:'Success Tambah!',
	                      text: data.message,
	                      type:'success',
	                      timer:'2000'
	                    });
	                  $('#myModalSatuan').modal('hide');
	                  $('#dataTableSatuan').DataTable().ajax.reload();
	                },
	                complete: function() {
	                    $("#formSatuan")[0].reset();
	                }
            	});
	        }
	    //     else{
	    //         $.ajax({
	    //             url:'satuan/edit' + '/' + $('#id').val(),
	    //             type:'post',
	    //             data: new FormData(this),
	    //             cache: true,
	    //             contentType: false,
	    //             processData: false,
	    //             async:false,
	    //             dataType: 'json',
	    //             success: function (data){
	    //               console.log(data);
	    //               swal({
	    //                   title:'Success Edit !',
	    //                   text: data.message,
	    //                   type:'success',
	    //                   timer:'2000'
	    //                 });
	    //               $('#myModalSatuan').modal('hide');
	    //               $('#dataTableSatuan').DataTable().ajax.reload();
	    //             },
	    //             complete: function() {
	    //                 $("#formSatuan")[0].reset();
	    //             }
     //        	});

	    //     }
     //    	});
    	// }
    	// $(document).on('click', '.editSatuan', function(){
     //        var nomor = $(this).data('id');
     //        $('#formSatuan').submit('');
     //        $.ajax({
     //          url:'satuan/getedit' + '/' + nomor,
     //          method:'get',
     //          data:{id:nomor},
     //          dataType:'json',
     //          success:function(data){
     //            console.log(data);
     //            state = "update";
     //            $('#id').val(data.id);
     //            $('#nama_satuan').val(data.nama_satuan);
     //            $('#nilai_satuan').val(data.nilai_satuan);
     //            $('#myModalSatuan').modal('show');
     //            $('#aksi').val('Simpan');
     //            $('.modal-title').text('Masukan Data Satuan');
     //            }
     //          });
          });

		$(document).on('hide.bs.modal','#myModalSupplier', function() {
	            $('#dataTableSupplier').DataTable().ajax.reload();
	          });
		drawCallback : function( settings ) {
        $("[rel=tooltip]").tooltip();
        $('.delete').click(function(e) {
        e.preventDefault(); // Prevent the href from redirecting directly
        var linkURL = $(this).attr("href");
        var name = $(this).attr("data-name");
        warnBeforeRedirect(linkURL,name);
        });
         function warnBeforeRedirect(linkURL,name) {
           swal({
               title: "Apakah Anda Yakin?",
               text: "Anda akan menghapus data dengan nama = "+name+" !",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya, Hapus!",
               cancelButtonText: "Tidak, Batalkan!",
               closeOnConfirm: false,
               closeOnCancel: false
             },
            function(isConfirm){
          if (isConfirm) {
            console.log('done');
            swal("Dihapus!", "Data dengan nama  "+name+" sudah di hapus.", "success");
            window.location.href = linkURL;
          } else {
              swal("Dibatalkan", "Data dengan nama "+name+" aman :)", "error");
          }
        });
          }
    }
    	
