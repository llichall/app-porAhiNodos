@extends('layouts.app')
<style>
    .py {
        width: 90%;
        margin: 0 auto;
    }
</style>

@section('content')
<div class="container main-container">
    <div class="row flex-nowrap">
        <div class="sidebar col-auto col-xl-2" id="sidebar">
            <div class="main-sidebar">
                <div class="card position-fixed">
                    <div class="card-body text-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAFZuRHYHo9YcIABEPV3EPS3XLm69ULYHUNw&usqp=CAU" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="mb-0">{{Auth::user()->name}}</h5>
                        <h5 class="mb-0">{{Auth::user()->nombres}}, {{Auth::user()->apellidos}}</h5>
                        <!-- <p class="text-muted mb-0">Full Stack Developer</p>
                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p> -->
                        <div class="d-flex justify-content-center mb-3">
                            <button type="button" class="btn btn-primary">ver perfil</button>
                        </div>
                        <div class="d-flex justify-content-center mb-0">
                            <a class="btn btn-danger" href="{{route('regPub')}}">publicar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @yield('contentUser')
    </div>
</div>
@endsection