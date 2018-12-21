<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="modal fade" id="myModalUser" role="dialog">
    <div class="modal-dialog">
<div class="modal-content">
  <form id="formUser" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data User</h4>
        </div>
        <div class="modal-body">
          {{csrf_field()}} {{ method_field('POST') }}
          <div class="form-group">
				<input type="hidden" name="id" id="id">
					<label class="col-md-4 control-label" for="textareaDefault"><h4 style="font-size: 16px;">Nama User</h4></label>
						<div class="col-md-6">
							<input class="form-control" data-plugin-maxlength maxlength="20" name="name" id="nama_supplier" id="name" />
						</div>
	                    @if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong style="color:red;">{{ $errors->first('name') }}</strong>
	                       	</span>
	                    @endif
		  </div>

		  <div class="form-group">
				<label class="col-md-4 control-label" for="textareaDefault"><h4 style="font-size: 16px;">No Telepon</h4></label>
					<div class="col-md-6">
						<input type="email" class="form-control" data-plugin-maxlength maxlength="13" name="email" id="email" />
					</div>
		            @if ($errors->has('email'))
		            <span class="help-block">
		                <strong style="color:red;">{{ $errors->first('email') }}</strong>
		            </span>
		            @endif
		  </div>

		  <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


        <div class="modal-footer">
          <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary" id="aksi"><i class="fa fa-check-circle"></i> Simpan</button>
          <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</body>
</html> 
