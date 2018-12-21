@extends('layouts.login')

@section('content')
<section class="body-sign">
            <div class="center-sign">
                <a href="/" class="logo pull-left">
                    <img src="assets/images/logo.png" height="54" alt="Porto Admin" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Masuk</h2>
                    </div>
                    <div class="panel-body">
                          <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}  
                            <div class="form-group mb-lg">
                                <label>Alamat Email</label>
                                <div class="input-group input-group-icon">
                                    <input id="email" type="email" class="form-control input-lg" name="email" {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Kata Sandi</label>
                                    <a href="pages-recover-Kata Sandi.html" class="pull-right">Lupa Kata sandi?</a>
                                </div>
                                <div class="input-group input-group-icon">
                                   
                                    <input id="password" type="password" class="form-control input-lg" name="password" {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                                  @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                       
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="RememberMe">Ingat Saya</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Masuk</button>
                                    
                                </div>
                            </div>

                            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                <span>atau</span>
                            </span>

                            <div class="mb-xs text-center">
                               
                            </div>

                            <p class="text-center">Don't have an account yet? <a href="{{ url('/register') }}">Daftar!</a>

                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
            </div>
        </section>
@endsection
