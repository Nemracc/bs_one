<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosCliente extends Model
{
    // use HasFactory;
    protected $fillable = ['doc_codigo', 'cli_codigo', 'doc_path', 'doc_nombre_original'];
    protected $table = 'documentos_clientes';
    protected $primaryKey = 'doc_codigo';


    public function cliente()
    {
        // return $this->belongsTo(Clientes::class);
        return $this->belongsTo('App\ModelsClientes');
    }
}
