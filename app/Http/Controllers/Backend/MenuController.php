<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ValidacionMenu;
use App\Models\Backend\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::getMenu();
        return view('theme.back.menu.index', compact('menus'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        //
        return view('theme.back.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(ValidacionMenu $request)
    {
        $validado = $request->validated();
        // dd($validado);
        Menu::create($validado);
        return redirect()->route('menu')->with('mensaje', 'Menu creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function editar( $id)
    {
        $data = Menu::findOrFail($id);
        return view('theme.back.menu.editar', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(ValidacionMenu $request, $id)
    {
        Menu::findOrFail($id)->update($request->validated());
        return redirect()->route('menu')->with('mensaje', 'Menú actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menu')->with('mensaje', 'Menú eliminado correctamente');
    }
    public function guardarOrden(Request $request) {
        
        if($request->ajax()){
            Menu::guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ley']);
        }
        else {
            abort(404);
        }
    }
}
