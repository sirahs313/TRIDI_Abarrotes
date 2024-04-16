<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        $busqueda=$request->busqueda;
        $categorias= categoria::where('codigo','LIKE','%'.$busqueda.'%')
                     ->orWhere('nombre','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(2);
        $data=[
            'categorias'=>$categorias,
            'busqueda'=>$busqueda,
        ];
        return view('categorias.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria=new categoria();
        $categoria->codigo=$request->codigo;
        $categoria->nombre=$request->nombre;
        $categoria->save();
        return redirect()->route("categorias.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria=categoria::find($id);
        $data=[
            'categoria'=>$categoria,
        ];
        return view('categorias.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria=categoria::find($id);
        $data=[
            'categoria'=>$categoria,
        ];
        return view('categorias.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria=Categoria::find($id);
        $categoria->codigo=$request->codigo;
        $categoria->nombre=$request->nombre;
        $categoria->save();
        return redirect()->route("categorias.index");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria=categoria::find($id);
        $categoria->delete();
        return redirect()->route("categorias.index");
    }
}

