<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = DB::table('usuario')->where('id_user', Auth::user()->id)->first();
        session(["usuario" => $usuario]);
       
        if (Auth::user()->role_id == 2) {
            return redirect('/publicaciones');    
        }
        return view('admin.home');
    }
}
