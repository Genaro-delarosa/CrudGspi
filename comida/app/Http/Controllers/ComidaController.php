<?php

namespace App\Http\Controllers;

use App\Models\comida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['comidas']=Comida::paginate('5');
        return view('comida.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comida.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosComida = request()->except('_token');
        comida::insert($datosComida);
        return redirect('comida')->with('mensaje','Dato agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(comida $comida)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $comida=Comida::findOrFail($id);
        return view('canciones.edit', compact('canciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosComida = request()->except(['_token','_method']);

    
        Comida::where('id','=',$id)->update($datosComida);

        $comida=comida::findOrFail($id);
        return view('comida.edit', compact('comida'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        $comida=Comida::findOrFail($id);
        comida::destroy($id);
        return redirect('comida')->with('mensaje','Borrado con exito');
    }
}
