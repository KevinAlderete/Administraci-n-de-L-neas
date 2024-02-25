<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function index(Request $request)
    {
        $personals = Personal::search(request('search'))->paginate(5);
        return view('personal.index',compact('personals'), array('user' => Auth::user()));
    }

    public function create()
    {
        return view('personal.create', array('user' => Auth::user()));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nombre' => 'required',
            'dni' => 'nullable',
            'jerarquia' => 'nullable'
        ]);
        Personal::create($validated);
        return to_route('personal.index')->with('message', 'Personal registrado correctamente.');
    }

    public function edit(Personal $personal)
    {
        return view('personal.edit', compact('personal'), array('user' => Auth::user()));
    }


    public function update(Request $request, Personal $personal)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'dni' => 'nullable',
            'jerarquia' => 'nullable'
        ]);
        $personal->update($validated);

        return to_route('personal.index')->with('message', 'Personal actualisado correctamente.');
    }

    public function destroy(Personal $personal)
    {
        try{
            $personal->delete();
            return to_route('personal.index')->with('message', 'Personal eliminado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Este personal no se puede eliminar.');
        }
    }
}
