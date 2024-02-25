<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LineaController extends Controller
{
    public function index(Request $request)
    {
        $lineas = Linea::search(request('search'))->paginate(5);
        return view('lineas.index',compact('lineas'), array('user' => Auth::user()));
    }

    public function create()
    {
        return view('lineas.create', array('user' => Auth::user()));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'linea' => 'required',
            'tipo' => 'required',
            'plan' => 'required',
            'precio'=> 'nullable',
            'sim' => 'required',
            'sede'=> 'nullable',
            'estado' => 'required'
        ]);
        Linea::create($validated);
        return to_route('lineas.index')->with('message', 'Línea registrada correctamente.');
    }

    public function edit(Linea $linea)
    {
        return view('lineas.edit', compact('linea'), array('user' => Auth::user()));
    }


    public function update(Request $request, Linea $linea)
    {
        $validated = $request->validate([
            'linea' => 'required',
            'tipo' => 'required',
            'plan' => 'required',
            'precio'=> 'nullable',
            'sim' => 'required',
            'sede'=> 'nullable',
            'estado' => 'required'
        ]);
        $linea->update($validated);

        return to_route('lineas.index')->with('message', 'Línea actualisada correctamente.');
    }

    public function destroy(Linea $linea)
    {
        try{
            $linea->delete();
            return to_route('lineas.index')->with('message', 'Línea eliminada correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este linea no se puede eliminar.');
        }
    }
}
