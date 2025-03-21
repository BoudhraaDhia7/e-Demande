@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Material Dashboard')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-primary mb-3 text-center ">
                            <h4 class="card-title"><strong>Administration</strong></h4>
                        </div>
                        <div class="card-body">
                            <div class="card-title mx-auto text-center">
                                <img src="{{ asset('images') }}/3aaak3ak-halloween.png" alt="">
                            </div>
                            <hr>
                            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }} mt-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                        </span>
                                    </div>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="{{ __('Username...') }}"
                                        value="" required>
                                </div>
                                @if ($errors->has('username'))
                                    <div id="username-error" class="error text-danger pl-3" for="username"
                                        style="display: block;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="{{ __('Mot de passe...') }}"
                                        value="" required>
                                </div>
                                @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password"
                                        style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
