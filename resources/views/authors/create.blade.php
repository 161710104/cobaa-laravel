@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/authors') }}">Penulis</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Penulis</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Tambah Penulis</div>
                <br>
                    {!! Form::open(['url' => route('authors.store'),
                    'method' => 'post', 'class'=>'form-horizontal']) !!}
                    @include('authors._form')
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection