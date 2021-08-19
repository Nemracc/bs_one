<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{ 
    // use HasFactory;

    protected $primaryKey = 'cli_codigo';
    protected $fillable = ['cli_codigo', 'cli_nombres', 'cli_apellidos'
                            , 'cli_ruc', 'cli_mail', 'cli_telefono1', 'cli_telefono2'];

    public $timestamps = true;


    public function Documentos()
    {
        return $this->hasMany('App\Models\DocumentosCliente');
    }
}
