<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GestionLinea;
use App\Models\Linea;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function dashboard()
    {
        $lineas = Linea::count();
        $personals = Personal::count();
        $gestionLineas = GestionLinea::count();

        $countLineas = Linea::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');

        $labels = $countLineas->keys();
        $data = $countLineas->values();

        $countPersonal = Personal::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('cantidad', 'month_name');
        $labels1 = $countPersonal->keys();
        $data2 = $countPersonal->values();

        return view('dashboard',compact('lineas', 'personals', 'gestionLineas', 'data','data2', 'labels','labels1') , array('user' => Auth::user()));
    }
    
}
