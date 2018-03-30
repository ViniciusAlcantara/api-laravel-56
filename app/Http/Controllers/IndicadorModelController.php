<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 28/03/2018
 * Time: 21:41
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Negocio\IndicarModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class IndicadorModelController extends Controller
{
    public function save(Request $request)
    {
        try {
            $indicador = new IndicarModel();
            if($request['id'])
            {
                $result = $indicador->editar($request->all());
                return response()->json([
                    "mensagem" => "Indicador editado com sucesso!",
                    "indicadores" => $result
                ],200);
            }else{
                $result = $indicador->save($request->all());
                if($result->id)
                {
                    return response()->json([
                        "mensagem" => "Indicador cadastrado com sucesso!",
                        "indicadores" => $result
                    ],200);
                }
            }
            return response()->json([
                "mensagem"=>"Indicador não encontrado!",
            ],400);
        }catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => "Erro ao salvar indicadores",
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ],400);
        }

    }

    public function todos()
    {
        try {
            $indicador = new IndicarModel();
            $result = $indicador->retornarTodos();
            if($result)
            {
                return response()->json([
                    "indicadores" => $result
                ],200);
            }
            return response()->json([
                "mensagem"=>"Indicador não encontrado!",
            ],400);
        }catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => "Erro ao retornar indicadores",
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ],400);
        }
    }

    public function retornar($id)
    {
        try {
            $indicador = new IndicarModel();
            $result = $indicador->retornarById($id);
            if($result)
            {
                return response()->json([
                    "indicador" => $result
                ],200);
            }
            return response()->json([
                "mensagem"=>"Indicador não encontrado!",
            ],400);
        }catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => "Erro ao buscar indicador",
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ],400);
        }
    }

    public function deletar($id)
    {
        try {
            $indicador = new IndicarModel();
            $result = $indicador->deleteById($id);
            if($result)
            {
                return response()->json([
                    "mensagem" => 'Registro deletado!'
                ],200);
            }
            return response()->json([
                "mensagem"=>"Indicador não deletado!",
            ],400);
        }catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => "Erro ao deletar",
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ],400);
        }
    }
}