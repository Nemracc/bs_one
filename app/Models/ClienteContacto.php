<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteContacto extends Model
{
    //use HasFactory;
    protected $primaryKey = 'cli_con_codigo';
    protected $timestaps = true;
    protected $filleble = [ 
        'cli_con_codigo', 'cli_con_nombre', 'cli_con_apellido', 'cli_con_fecha_nacimiento', 'tp_codigo'
        , 'cli_con_documento', 'cli_con_direccion', 'cli_con_telefono1', 'cli_con_telefono2', 'cli_con_celular'
        , 'tc_codigo', 'cli_con_obs'
    ];
}
