<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\DocumentosCliente;

class DocumentosClienteController extends BaseController
{
    //
    protected $documento = '';

    public function __construct(DocumentosCliente $documento)
    {
        $this->middleware('auth:api');
        $this->documento = $documento;
    }

    public function index()
    {
    }

    public function show($cli_codigo)
    {
        $documentos = $this->documento->where('cli_codigo', $cli_codigo)->latest()->paginate(10);
        return $this->sendResponse($documentos, 'Client list');
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'file' => 'required|csv,txt,xlx,xls,pdf,png',
        // ]);

        $documento = new DocumentosCliente();
        if ($request->hasFile(key: 'cli_documento')) {
            // $archivo = $request->file(key: 'cli_documento')->store(path: 'documentos');
            // $path = $request->file('cli_documento')->store('public/files');
            // $archivo = Storage::putFileAs('documentos', $request->file('cli_documento'), $aleatorio.$extension);
            // $archivo = Storage::putFile('public/documentos', $request->file('cli_documento'));
            $aleatorio = mt_rand(100, 999);
            $extension = $request->file('cli_documento')->guessExtension();
            $cli_codigo = $request->get('cli_codigo');
            $archivo = Storage::putFileAs('documentos', $request->file('cli_documento'), $aleatorio.'.'.$extension);
            $nombreArchivo = $request->file('cli_documento')->getClientOriginalName();
            Storage::setVisibility($archivo, 'public');
            // Lo que se guarda en el archivo seria el id del archivo guardado
            //
            if ($archivo != "") {
                $documento->cli_codigo = $cli_codigo;
                $documento->doc_path = strval($archivo); // no se por que guarda en blob
                $documento->doc_nombre_original = $nombreArchivo;
                $documento->save();
                return $this->sendResponse($archivo, 'archivo cargado');
            } else {
                return $this->sendResponse($archivo, 'failed');
            }
        } else {
            return $this->sendResponse($archivo, 'Vacio');
        }
    }

    public function CountDocumentos($cli_codigo)
    {
        # code...
    }
}
