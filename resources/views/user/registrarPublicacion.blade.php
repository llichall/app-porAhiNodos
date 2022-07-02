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

<script>
    const d = document;

    const loadDepartamentos = () => {
        fetch("http://localhost:8000/loadDepartamentos")
            .then(d => d.json())
            .then(jsonData => {
                const $departamentos = d.querySelector(".depas");
                console.log("Llamando departamentos")
                $departamentos.innerHTML = ""
                $departamentos.innerHTML = "<option selected value='0'>Departamento</option>"
                jsonData.forEach(dep => {
                    const $option = d.createElement("option");
                    $option.value = dep.id;
                    $option.textContent = dep.nombre
                    $departamentos.appendChild($option);
                });
            })
    }

    const loadProvincias = (idDepartamento) => {
        fetch(`http://localhost:8000/loadProvincias/${idDepartamento}`)
            .then(d => d.json())
            .then(jsonData => {
                const $provincias = d.querySelector(".provs");
                $provincias.innerHTML = ""
                $provincias.innerHTML = "<option selected value='0'>Provincia</option>"
                jsonData.forEach(dep => {
                    const $option = d.createElement("option");
                    $option.value = dep.id;
                    $option.textContent = dep.nombre
                    $provincias.appendChild($option);
                });
            })
    }

    const loadDistritos = (idProvincia) => {
        fetch(`http://localhost:8000/loadDistritos/${idProvincia}`)
            .then(d => d.json())
            .then(jsonData => {
                const $distritos = d.querySelector(".dists");
                $distritos.innerHTML = ""
                $distritos.innerHTML = "<option selected value='0'>Distrito</option>"
                jsonData.forEach(dep => {
                    const $option = d.createElement("option");
                    $option.value = dep.id;
                    $option.textContent = dep.nombre
                    $distritos.appendChild($option);
                });
            })
    }

    d.addEventListener("DOMContentLoaded", () => {
        loadDepartamentos()
        const $departamentos = d.querySelector(".depas");
        $departamentos.addEventListener("change", (e) => {
            if (e.target.value != 0) {
                console.log("llamando provincias")
                loadProvincias(e.target.value)
            }
        })

        const $distritos = d.querySelector(".provs");
        $distritos.addEventListener("change", (e) => {
            if (e.target.value != 0) {
                console.log("llamando distritos")
                loadDistritos(e.target.value)
            }
        })
    })
</script>