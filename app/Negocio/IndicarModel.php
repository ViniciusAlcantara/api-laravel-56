<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 28/03/2018
 * Time: 22:01
 */
namespace App\Negocio;

class IndicarModel
{
    public function save($parametros)
    {
        return \App\IndicadorModel::create($parametros);
    }

    public function editar($parametros)
    {
        $indicador = \App\IndicadorModel::find($parametros['id']);
        $indicador->dataIntegracao= $parametros['dataIntegracao'];
        $indicador->dataUltAlteracao= $parametros['dataUltAlteracao'];
        $indicador->formulaCalculo= $parametros['formulaCalculo'];
        $indicador->idDrgIntegracao= $parametros['idDrgIntegracao'];
        $indicador->identDirecaoSeta= $parametros['identDirecaoSeta'];
        $indicador->identPeriodicidade= $parametros['identPeriodicidade'];
        $indicador->identReferencial= $parametros['identReferencial'];
        $indicador->informacoesAdicionais= $parametros['informacoesAdicionais'];
        $indicador->nome= $parametros['nome'];
        $indicador->numDecimais= $parametros['numDecimais'];
        $indicador->objetivo= $parametros["objetivo"];
        $indicador->unidade= $parametros['unidade'];
        $indicador->usuarioUltAlteracao= $parametros["usuarioUltAlteracao"];
        $indicador->versao= $parametros['versao'];
        return $indicador->save();
    }

    public function retornarById($id)
    {
        return \App\IndicadorModel::find($id);
    }

    public function retornarTodos()
    {
        return \App\IndicadorModel::all();
    }

    public function deleteById($id)
    {
        return \App\IndicadorModel::destroy($id);
    }
}