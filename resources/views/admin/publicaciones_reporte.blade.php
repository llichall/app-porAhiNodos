@extends('admin.layoutAdmin')

@section('contentAdmin')
<div class="col">
    <div class="container main-container">
        <div class="content col mb-2">
            <!-- <div class="row justify-content-center"> -->
            <div class="row justify-content-center">

                <div class="col">
                    <table class="table">
                        <thead>
                            <h5>Autor de la publicación</h5>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Denuncias</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Motivo</th>
                                <th>Fecha reporte</th>
                                <th>Usuario quien hizo el reporte</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportes as $key => $r)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$r->motivo}}</td>
                                <td>{{$r->created_at}}</td>
                                <td>
                                    {{$r->user->nombres}} {{$r->user->apellidos}}
                                    <p><b>Username:</b> {{$r->user->name}}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-danger" href="{{route('publicaciones.eliminar', $publicacion->id)}}">
                            Dar de baja publicación
                        </a>
                    </div>
                </div>

                <div class="col card mb-3 p-3" style="width:30%">
                    <div class="d-flex">
                        <img class="me-3 rounded-circle" src="https://iconarchive.com/download/i102645/graphicloads/flat-finance/person.ico" alt="img" width="60px" height="60px" />
                        <div>
                            <h5 class="fw-bold"> {{ $publicacion->user->name }} </h5>
                            {{ $publicacion->updated_at }}
                        </div>
                    </div>

                    <p class="m-lg-1 mt-1"> {{ $publicacion->descripcion }} </p>
                    <img class="img-fluid mt-3 border rounded" src="/imagen/{{$publicacion->imagen }}" alt="{{ $publicacion->imagen }}">
                    <h6 class="m-lg-1 mt-1"> {{$publicacion->departamento->nombre}} - {{$publicacion->provincia->nombre}} - {{$publicacion->distrito->nombre}}</h6>
                    <h6 class="m-lg-1 mt-1"> {{$publicacion->lugar_especifico }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection