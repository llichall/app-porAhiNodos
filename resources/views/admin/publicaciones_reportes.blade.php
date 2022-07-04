@extends('admin.layoutAdmin')

@section('contentAdmin')
<div class="col">
    <div class="container main-container">
        <div class="content col mb-2">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (Session::get('success'))
                        <div class="alert alert-success"> {{ Session::get('success') }}</div>
                        @endif

                        <table class="table">
                            <h5>Publicaciones Denunciadas como Falsas</h5>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Autor</th>
                                    <th>Fecha publicación</th>
                                    <th>Cantidad de Denuncias</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publicaciones as $key => $p)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$p->publicacion->user->nombres}} {{$p->publicacion->user->apellidos}}</td>
                                    <td>{{$p->publicacion->created_at}}</td>
                                    <td>{{$p->cant_reportes}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-success me-2" 
                                            href="{{route('publicaciones.reportado.ver', $p->publicacion_id)}}">
                                                ver
                                            </a>
                                            <a class="btn btn-danger" 
                                            href="{{route('publicaciones.eliminar', $p->publicacion_id)}}">
                                                dar de baja
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection