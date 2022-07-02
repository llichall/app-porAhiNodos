@extends('layouts.app')
<style>
    .main-container {
        width: 90%;
        margin: 0 auto;
    }
</style>
@section('content')
<div class="container main-container">
    <div class="row flex-nowrap">
        <div class="sidebar col-auto col-xl-2">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAFZuRHYHo9YcIABEPV3EPS3XLm69ULYHUNw&usqp=CAU" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="mb-0">{{Auth::user()->name}}</h5>
                    <h5 class="mb-0">{{session("usuario")->nombres}}, {{session("usuario")->apellidos}}</h5>
                    <!-- <p class="text-muted mb-0">Full Stack Developer</p>
                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p> -->
                    <div class="d-flex justify-content-center mb-0">
                        <button type="button" class="btn btn-primary">ver perfil</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content col py-3">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-1">
                                <label for="exampleFormControlTextarea1" class="form-label">Publicar nueva alerta</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Imgen</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            <div class="d-flex justify-content-center mb-0">
                                <button type="button" class="btn btn-primary">publicar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection