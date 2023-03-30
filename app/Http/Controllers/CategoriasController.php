<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller{
    
    public function index(){ // Vista de lista de categorías
        //return view("categorias.index");
    }

    public function create(){ // Vista del formulario
        //return view("categorias.create");
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse{
        $validator=$this->validate_data($request->all(),[
            'nombre'=>['max:255','unique:categorias']
        ]);
        if($validator!=null){
            return $this->return_bad_request($validator);
        }
        try{
            $categoria=new Categorias();
            $categoria->nombre=$request->nombre;
            $categoria->save();
            return $this->return_created($categoria);
        }catch(\Exception $e){
            return $this->return_error();
        }
    }

    public function show(int $id=null): \Illuminate\Http\JsonResponse{
        try{
            $categoria=$id==null?Categorias::paginate($request->paginate??10):Categorias::find($id);
            if($categoria==null){
                return $this->return_not_found();
            }
            return $this->return_success_data($categoria);
        }catch(\Exception $ex){
            return $this->return_error();
        }
    }

    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse{
        $validator=$this->validate_data($request->all(),[
            'nombre'=>['max:255','unique:categorias']
        ]);
        if($validator!=null){
            return $this->return_bad_request($validator);
        }
        try{
            $categoria=Categorias::find($id);
            if($categoria==null){
                return $this->return_not_found();
            }
            $categoria->nombre=$request->nombre??$categoria->nombre;
            $categoria->save();
            return $this->return_success_data($categoria);
        }catch(\Exception $ex){
            return $this->return_error();
        }
    }

    public function delete(int $id): \Illuminate\Http\JsonResponse{
        try{
            $categoria=Categorias::find($id);
            if($categoria==null){
                return $this->return_not_found();
            }
            $categoria->delete();
            return $this->return_no_content($categoria);
        }catch(\Exception $ex){
            return $this->return_error();
        }
    }

}
