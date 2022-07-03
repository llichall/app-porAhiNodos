@extends('user.layoutUser')
@section('contentUser')
<div class="col">
    <div class="card p-3">
        <h5 class="card-title">Publicar nueva alerta</h5>
        <div class="card-body text-center">
            <div class="row">
                <form method="post" action="{{ route('regPub') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="descripcion"></textarea>
                            <label for="floatingTextarea2">Descripción</label>
                        </div>
                        <div class="mb-2">
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="imagen">
                        </div>
                    </div>
                    <div class="col">
                        <select class="form-select depas" aria-label="Default select example" name="departamento">
                            <option selected value='0'>Departamento</option>
                        </select>
                        <select class="form-select provs" aria-label="Default select example" name="provincia">
                            <option selected value='0'>Provincia</option>
                        </select>
                        <select class="form-select dists" aria-label="Default select example" name="distrito">
                            <option selected value='0'>Distrito</option>
                        </select>
                        <div class="mb-3">
                            <input class="form-control" id="formFileSm" type="text" placeholder="lugar específico" name="lugarEspecifico">
                        </div>
                    </div>
            </div>

            <div class="d-flex justify-content-center mb-0">
                <button type="submit" class="btn btn-primary">publicar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
