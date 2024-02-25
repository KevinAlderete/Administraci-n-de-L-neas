<?php

namespace App\Http\Controllers;

use App\Models\GestionLinea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        try{
            $query =  GestionLinea::search(request('search'))
                ->query(function($query) {
                    $query->join('personals', 'gestion_lineas.personal_id', '=', 'personals.id')
                    ->select('gestion_lineas.*','personals.nombre AS nombrePer');
                    $query->join('lineas', 'gestion_lineas.linea_id', '=', 'lineas.id');
                })
                ->paginate(5);
        
            return view('reportes.index',compact('query'), array('user' => Auth::user()));
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Error.');
        }
    }



    public function report(Request $request)
    {
        try{
            $formDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
            $query =  GestionLinea::query(function($query) {
                $query->join('personals', 'gestion_lineas.personal_id', '=', 'personals.id')
                ->select('gestion_lineas.*','personals.nombre AS nombrePer');
                $query->join('lineas', 'gestion_lineas.linea_id', '=', 'lineas.id');
                })
                ->where('created_at', '>=', $formDate)
                ->where('created_at', '<=', $toDate)
                ->paginate(5);
                //dd($query);
            return view('reportes.index',compact('query'), array('user' => Auth::user()));
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Complete bien los campos.');
        }
    }
}
