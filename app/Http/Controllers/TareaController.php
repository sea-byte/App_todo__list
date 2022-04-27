<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\Categoria;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::latest()->paginate(5);
       

        return view('tareas.index',compact('tareas'))
            ->with('i',(request()->input('page',1)-1)*5);

    }

  
    public function create()
    {
        $categorias = Categoria::all();
        return view('tareas.create' ,compact('categorias'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'categoria_id'=>'required',
        ]);

        Tarea::create($request->all());
   
        return redirect()->route('tareas.index')
                        ->with('success','Tarea adicionada con exito.');
    }
  
    public function show(Tarea $tarea)
    {
        return view('tareas.show',compact('tarea'));
    }


    public function edit(Tarea $tarea)
    {
      
        return view('tareas.edit',compact('tarea'));
        
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
  
        $tarea->update($request->all());
  
        return redirect()->route('tareas.index')
                        ->with('success','Tarea actualizada con exito');
    }
  


    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')
                        ->with('success','Tarea Eliminada con Exito');
    }
}
