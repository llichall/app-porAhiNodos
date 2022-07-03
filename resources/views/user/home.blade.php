@extends('user.layoutUser')

@section('contentUser')
<div class="col">
    <div class="container main-container">
        <!-- <div class="content col mb-2">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Alertas</div>

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
        </div> -->
        <div class="col">

            @foreach($publicaciones as $p)
            <!-- <div class="col-lg-4 offset-lg-4 card"> -->
            <div class="m-auto card mb-3 p-3" style="width:65%">
                <div class="d-flex">
                    <img class="me-3 rounded-circle" src="https://iconarchive.com/download/i102645/graphicloads/flat-finance/person.ico" alt="img" width="60px" height="60px" />
                    <div>
                        <h5 class="fw-bold"> {{ $p->user->name }} </h5>
                        {{ $p->updated_at }}
                    </div>
                </div>
                
                <p class="m-lg-1 mt-1"> {{ $p->descripcion }} </p>
                <img class="img-fluid mt-3 border rounded" src="/imagen/{{$p->imagen }}" alt="{{ $p->imagen }}">
                <h6 class="m-lg-1 mt-1"> {{$p->departamento->nombre}} - {{$p->provincia->nombre}} - {{$p->distrito->nombre}}</h6>
                <h6 class="m-lg-1 mt-1"> {{$p->lugar_especifico }}</h6>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection