<?php

namespace App\Http\Controllers;

Use App\Tareas;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;
use App\Http\Requests\Tarea;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tareas.index',['tareas'=>Tareas::where('user','=',auth()->user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create',[
            'tareas'=> new Tareas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tareas $request)
    {
        $datos=request()->validate([
            'nombre'=>'required',
            'fecha'=>'required',
            'hora'=>'required',
            'user'=>'required',
            'descripcion'=>'nullable',
        ]);
        Tareas::create($datos);
        return redirect()->route('Tareas.index')->with('status','Se ha registrado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tareas $Tarea)
    {
        return view('tareas.edit',['tarea'=>$Tarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tareas $Tarea)
    {
        $datos=request()->validate([
            'nombre'=>'required',
            'fecha'=>'required',
            'hora'=>'required',
            'user'=>'required',
            'descripcion'=>'nullable',
        ]);
        $Tarea->update($datos);
        return redirect()->route('Tareas.index')->with('status','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tareas $Tarea)
    {
        $Tarea->delete($Tarea);
        return redirect()->route('Tareas.index')->with('status','Se ha eliminado correctamente');
    }
}
