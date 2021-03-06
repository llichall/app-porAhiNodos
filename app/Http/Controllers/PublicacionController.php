<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Reportes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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
            ->simplePaginate(10);
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

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = "imagen/";
            $imagenPublicacion = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenPublicacion); 
            $publicacion->imagen = "$imagenPublicacion";
        }
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
    public function destroy(Request $request, $id)
    {
        Reportes::where("publicacion_id", $id)->delete();
        $publicacion = Publicacion::find($id);
        $publicacion->delete();
        return redirect(Route("publicaciones.reportados"))
        ->with("success", "la publicacion fue dada de baja correctamente!!!");
    }

    public function reportar(Request $request, $id)
    {
        $publicacion = Publicacion::where("id", $id)->first();
        return view('user.reportarPublicacion', compact("publicacion"));
    }

    public function saveReporte(Request $request)
    {
        $request->validate([
            "motivo" => "required",
        ]);
        $reporte = $request->all();

        $exsitsReporte = Reportes::where([
            "user_id" => $reporte["user_id"],
            "publicacion_id" => $reporte["publicacion_id"]
        ])->first();

        if ($exsitsReporte != null) {
            return redirect()->back()->withErrors([
                "reprote" => "no puedes reportar la misma publicaci??n mas de 2 veces",
            ]);
        }

        Reportes::create($reporte);

        return redirect(Route("publicaciones.reportarget", $reporte["publicacion_id"]))
            ->with("success", "su reporte se antender?? pronto, muchas gracias!!!");
    }

    public function showPublicacionesReportadas()
    {
        $publicaciones = DB::table('publicaciones')
            ->select(
                "reportes.publicacion_id",
                DB::raw("count(reportes.publicacion_id) as cant_reportes")
            )
            ->join("reportes", "publicaciones.id", "=", "reportes.publicacion_id")
            ->groupBy(
                "reportes.publicacion_id"
            )
            ->orderBy("cant_reportes", "desc")
            ->get();

        foreach ($publicaciones as $p) {
            $p->publicacion = Publicacion::where("id", $p->publicacion_id)->first();
        }
        return view("admin.publicaciones_reportes", compact("publicaciones"));
    }

    public function showPublicacionReportado(Request $request, $id)
    {
        $publicacion = Publicacion::where("id", $id)->first();
        $reportes = Reportes::where("publicacion_id", $id)->get();
        foreach($reportes as $r) {
            $r->user = User::where("id", $r->user_id)->first();
        }
        return view("admin.publicaciones_reporte", compact("publicacion", "reportes"));
    }
}
