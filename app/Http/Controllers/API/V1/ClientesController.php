<?php

namespace App\Http\Controllers\API\V1;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clientes;
 
class ClientesController extends BaseController
{
    // 
    protected $clientes = '';


    /*Crear una nueva instancia del controlador */
    public function __construct(Clientes $clientes)
    {
        $this->middleware('auth:api');
        $this->clientes = $clientes;
    }
    
    public function index()
    {
        $clientes = $this->clientes->latest()->paginate(10);
        return $this->sendResponse($clientes, 'Client list');
    }

    public function RecuperarCliente($cli_codigo)
    {
        $cliente = $this->clientes->where('cli_codigo', $cli_codigo)->first();

        return $this->sendResponse($cliente, 'Client list');
    }


    public function store(Request $request)
    {
        // $clientes = $this->clientes->create([
        //     'cli_nombres' => $request->get('cli_nombres'),
        //     'cli_apellidos' => $request->get('cli_apellidos')
        // ]);

        // $clientes = $this->clientes->create($request);
        $cliente = new Clientes();
        $cliente->cli_nombres =  $request->get('cli_nombres');
        $cliente->cli_apellidos = $request->get('cli_apellidos');
        $cliente->cli_ruc = $request->get('cli_ruc');
        $cliente->cli_mail = $request->get('cli_mail');
        $cliente->cli_telefono1 = $request->get('cli_telefono1');
        $cliente->cli_telefono2 = $request->get('cli_telefono2');

        $cliente->save();
        return $this->sendResponse($cliente, 'Cliente creado satisfactoriamente');
    }

    // desde VUE lo llamo mediante PUT y debo pasar este formato (xxxxx/clientes/{cli_codigo})    
    public function update(Request $request, $cli_codigo)
    {
        // Recuperamos al cliente que vamos a actualizar y le cargamos los datos

        // este busca por el campo ID, si en tu modelo no esta especificado
        $cliente = $this->clientes->findOrFail($cli_codigo);

        $cliente->cli_nombres =  $request->get('cli_nombres');
        $cliente->cli_apellidos = $request->get('cli_apellidos');
        $cliente->cli_ruc = $request->get('cli_ruc');
        $cliente->cli_mail = $request->get('cli_mail');
        $cliente->cli_telefono1 = $request->get('cli_telefono1');
        $cliente->cli_telefono2 = $request->get('cli_telefono2');

        $cliente->save();
        return $this->sendResponse($cliente, 'Cliente actualizado satisfactoriamente');
    }
}
