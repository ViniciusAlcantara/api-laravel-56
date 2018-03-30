<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadorModel extends Model
{
    protected $table = 'indicadormodel';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'dataIntegracao',
        'dataUltAlteracao',
        'formulaCalculo',
        'idDrgIntegracao',
        'identDirecaoSeta',
        'identPeriodicidade',
        'identReferencial',
        'informacoesAdicionais',
        'nome',
        'numDecimais',
        'objetivo',
        'unidade',
        'usuarioUltAlteracao',
        'versao'
    ];

    protected $guarded = [];

}
