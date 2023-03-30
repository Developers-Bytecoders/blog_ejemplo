<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Repuestas json
     * 200 Todo bien
     * 201 Creado
     * 204 Eliminado
     * 202 Aceptado
     * 404 No encontrado
     * 401 No autorizado
     * 400 Datos incorrectos
     */

    public function return_error(): \Illuminate\Http\JsonResponse{
        return response()->json([
            "error"=>"Error en el servidor"
        ],500);
    }

    public function return_success_data($data): \Illuminate\Http\JsonResponse{
        return response()->json([
            "data"=>$data
        ],200);
    }

    public function return_created($data): \Illuminate\Http\JsonResponse{
        return response()->json([
            "data"=>$data
        ],201);
    }

    public function return_accepted(?\Illuminate\Database\Eloquent\Collection $data): \Illuminate\Http\JsonResponse{
        return response()->json([
            "data"=>$data
        ],202);
    }

    public function return_no_content(): \Illuminate\Http\JsonResponse{
        return response()->json([],204);
    }

    public function return_bad_request(\Illuminate\Validation\Validator $validator): \Illuminate\Http\JsonResponse{
        return response()->json([
            "error"=>"Datos incorrectos",
            "data"=>$validator->errors()
        ],400);
    }

    public function return_not_auth(): \Illuminate\Http\JsonResponse{
        return response()->json([
            "error"=>"No autorizado"
        ],401);
    }

    public function return_not_found(): \Illuminate\Http\JsonResponse{
        return response()->json([
            "error"=>"No encontrado"
        ],404);
    }

    /**
     * Validaciones
     */

    public function validate_data(array $data, array $rules): ?\Illuminate\Validation\Validator{
        $validator=Validator::make($data,$rules);
        return $validator->fails()?$validator:null;
    }

}
