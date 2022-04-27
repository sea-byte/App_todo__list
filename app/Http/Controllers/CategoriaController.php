<?php

namespace App\Http\Controllers;

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
        $tareas = Categoria::latest()->paginate(5);
       

        return view('categorias.index',compact('categorias'))
            ->with('i',(request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
    
        ]);

        Tarea::create($request->all());
   
        return redirect()->route('tareas.index')
                        ->with('success','Tarea created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //return view('tareas.show',compact('tarea'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Tarea  $tarea
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit',compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'id'=>'required',
           
        ]);
        
        $tarea->update($request->all());
        return redirect()->route('tareas.index')
        ->with('success','Product updated successfully');
}

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Tarea  $tarea
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')
                        ->with('success','Tarea update Succefully');
    }
}
