<?php

namespace App\Http\Controllers;

use App\Models\GestionLinea;
use App\Models\Linea;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionLineaController extends Controller
{
    public function index(Request $request)
    {
        $gestionLineas = GestionLinea::search(request('search'))
        ->query(function($query) {
            $query->join('personals', 'gestion_lineas.personal_id', '=', 'personals.id')
            ->select('gestion_lineas.*','personals.nombre AS nombrePer');
            $query->join('lineas', 'gestion_lineas.linea_id', '=', 'lineas.id');
        })
        ->paginate(5);
        return view('gestionLineas.index',compact('gestionLineas'), array('user' => Auth::user()));
    }

    public function create()
    {
        $lineas = Linea::all();
        $personals = Personal::all();
        return view('gestionLineas.create', compact('lineas', 'personals'), array('user' => Auth::user()));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'observacion'=> 'nullable',
            'personal_id' => 'required',
            'linea_id' => 'required'
        ]);
        GestionLinea::create($validated);
        return to_route('gestionLineas.index')->with('message', 'Registrado correctamente.');
    }

    public function edit(GestionLinea $gestionLinea)
    {
        $lineas = Linea::all();
        $personals = Personal::all();
        return view('gestionLineas.edit', compact('gestionLinea', 'lineas', 'personals'), array('user' => Auth::user()));
    }


    public function update(Request $request, GestionLinea $gestionLinea)
    {
        $validated = $request->validate([
            'observacion'=> 'nullable',
            'personal_id' => 'required',
            'linea_id' => 'required'
        ]);
        $gestionLinea->update($validated);

        return to_route('gestionLineas.index')->with('message', 'Actualisado correctamente.');
    }

    public function destroy(GestionLinea $gestionLinea)
    {
        try{
            $gestionLinea->delete();
            return to_route('gestionLineas.index')->with('message', 'Eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'No se puede eliminar.');
        }
    }
}
