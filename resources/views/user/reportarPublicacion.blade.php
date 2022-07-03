@extends('user.layoutUser')
@section('contentUser')
<div class="col">
    <div class="card p-3">
        <!-- <h5 class="card-title">Denunciar Publicación</h5> -->
        <div class="card-body text-center">
            <div class="row justify-content-start">
                <div class="">
                    <h5>Denunciar Publicaión</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Autor de la publicacion</th>
                                <th>Nombre de Usuario</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$publicacion->user->nombres}} {{$publicacion->user->apellidos}}</td>
                                <td>{{$publicacion->user->name}}</td>
                                <td>{{$publicacion->descripcion}}</td>
                                <td>
                                    <img src="/imagen/{{$publicacion->imagen}}" alt="{{$publicacion->imagen}}" width="300px">
                                </td>
                                <td>
                                    <p><b>fecha publicación:</b><br>{{$publicacion->created_at}}</p>
                                    <p><b>lugar:</b>{{$publicacion->departamento->nombre}}, {{$publicacion->provincia->nombre}}, {{$publicacion->distrito->nombre}} - {{$publicacion->lugar_especifico}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
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

                <form method="post" action="{{ route('publicaciones.reportar') }}">
                    @csrf
                    <div class="col">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="motivo"></textarea>
                            <label for="floatingTextarea2">Motivo de la denuncia</label>
                        </div>
                        <input type="hidden" value="{{$publicacion->id}}" name="publicacion_id">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    </div>
            </div>

            <div class="d-flex justify-content-center mb-0">
                <button type="submit" class="btn btn-danger">enviar reporte</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection