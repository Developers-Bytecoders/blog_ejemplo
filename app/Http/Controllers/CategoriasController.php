<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categorias;

class CategoriasController extends Controller{

    // 200 Todo bien
    // 201 Creado
    // 204 Eliminado
    // 202 Aceptado
    // 404 No encontrado
    // 401 No autorizado
    // 400 Datos incorrectos

    
    public function index(){ // Vista de lista de categorías
        //return view("categorias.index");
    }

    public function create(){ // Vista del formulario
        //return view("categorias.create");
    }

    public function store(Request $request){
        try{
            $validator=Validator::make($request->all(),[
                'nombre'=>['required','max:255']
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            $categoria=new Categorias();
            $categoria->nombre=$request->nombre;
            $categoria->save();
        }catch(\Exception $e){
            return response()->json([
                'error' => "Error al crear la categoría"
            ],500);
        }
        return response()->json($categoria,201);
    }

    public function show($id){ // Detalles del registro
        try{
            $categoria=Categorias::find($id);
            return response()->json($categoria,200);
        }catch(\Exception $ex){
            return response()->json([
                'error' => "No existe la categoría"
            ],500);
        }
    }

    public function update(Request $request, $id){
        try{
            $validator=Validator::make($request->all(),[
                'nombre'=>['max:255']
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            $categoria=Categorias::find($id);
            $categoria->nombre=$request->nombre;
            $categoria->save();
            return response()->json($categoria,200);
        }catch(\Exception $ex){
            return response()->json([
                'error' => "Error al actualizar"
            ],500);
        }
    }

    public function delete($id){
        try{
            $categoria=Categorias::find($id);
            $categoria->delete();
            return response()->json([
                'message' => "Categoría eliminada"
            ],200);
        }catch(\Exception $ex){
            return response()->json([
                'error' => "Error al eliminar"
            ],500);
        }
    }

}
