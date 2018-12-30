$('#TambahSupplier').click(function(){
            $('#myModalSupplier').modal('show');
            $('#aksi').val('TambahSupplier');
            state = "insert";
            });

           $('#myModalSupplier').on('hidden.bs.modal',function(e){
            $(this).find('#formSupplier')[0].reset();
            $('span.has-error').text('');
            $('.form-group.has-error').removeClass('has-error');
            });