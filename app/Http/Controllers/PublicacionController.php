<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::orderBy("created_at", "desc")
            ->paginate(10);
        return view('user.home', compact("publicaciones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.registrarPublicacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publicacion = new Publicacion();
        $publicacion->descripcion = $request->input("descripcion");
        $publicacion->lugar_especifico = $request->input("lugarEspecifico");
        $publicacion->id_departamento = $request->input("departamento");
        $publicacion->id_provincia = $request->input("provincia");
        $publicacion->id_distrito = $request->input("distrito");
        $publicacion->estado = 1;
        $publicacion->user_id = Auth::user()->id;

        // $publicacion = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = "imagen/";
            $imagenPublicacion = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenPublicacion);
            // $publicacion["imagen"] = "$imgenPublicacion"; 
            $publicacion->imagen = "$imagenPublicacion";
        }
        // dd($publicacion);
        $publicacion->save();
        return redirect("/publicaciones");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacion $publicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacion $publicacion)
    {
        //
    }

    public function reportar(Request $request, $id)
    {
        $publicacion = Publicacion::where("id", $id)->first();
        return view('user.reportarPublicacion', compact("publicacion"));
    }
}
