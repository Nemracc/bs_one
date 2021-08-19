<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesActividades extends Model
{
    // use HasFactory;
    protected $fillable = ['cli_act_codigo', 'cli_codigo', 'cli_act_fecha_operacion', 
    'cli_act_fecha_inicio', 'cli_act_hora_inicio', 'cli_act_fecha_fin', 
    'cli_act_hora_fin', 'cli_act_comentario', 'cli_act_estado', 'cli_act_codigo_ref', 
    'fun_codigo', 'cli_act_siglas_segui', 'cli_act_monto_pago'];

    protected $primaryKey = 'cli_act_codigo';
}
