@extends('layouts/app')

@section('title','User')
@section('header','User')

@section('content')
					<ul class="app-breadcrumb breadcrumb side">
					    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
					    <li class="breadcrumb-item">User</li>
					</ul>
          
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
						
								<h2 class="panel-title"><i class="fa fa-user"></i> User
                  &nbsp<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" id="TambahSupplier">
                    <i class="fa fa-plus"></i> Tambah User</button>
                    @include('User.modal')
								</h2>
							</header>
							<div class="panel-body">
                			<div class="table-responsive">
								<table class="table mb-none" id="datatable-ajax">
									<thead>
										<tr>
							               	<th>Nama</th>
                             				<th>Email</th>
							               	<th><center> Action</center></th>
										</tr>
									</thead>
									<tbody>
                    <tr>
                              @foreach ($users as $item)
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>
                              <center><a href="#" data-id="'.$users->id.'" rel="tooltip" title="Edit" 
                              class="btn btn-warning btn-simple btn-xs editSupplier"><i class="fa fa-pencil"></i></a>
                              &nbsp<a href="/admin/users/'.$users->id.'/delete" rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs delete" data-name="'.$users->nama.'"><i class="fa fa-trash-o"></i></a></center>   
                              </td>
                            </tr>
                            @endforeach
							          	
							          </tbody>
								</table>
                </div>
							</div>
						</section>

@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#datatable-ajax').DataTable();
  });
  </script>
@endsection