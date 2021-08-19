<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Models\ClientesActividades;
use Carbon\Carbon;

class ClientesActividadesController extends BaseController
{
    //
    protected $clientesActividades  = '';

    public function __construct(ClientesActividades $clientesActividades)
    {
        # code...
        $this->middleware('auth:api');
        $this->clientesActividades = $clientesActividades;
    }

    public function store(Request $request)
    {
        // Obtener hora de un timestamp
        $horaInicio = Carbon::parse( $request->get('cli_act_fecha_inicio') )->toTimeString();
        $horaFin = Carbon::parse( $request->get('cli_act_fecha_fin') )->toTimeString();

        $cliActividad = new ClientesActividades();
        $cliActividad->cli_codigo = $request->get('cli_codigo');
        $cliActividad->cli_act_fecha_operacion = $request->get('cli_act_fecha_operacion');
        $cliActividad->cli_act_fecha_inicio = $request->get('cli_act_fecha_inicio');
        $cliActividad->cli_act_hora_inicio = $horaInicio;
        $cliActividad->cli_act_fecha_fin = $request->get('cli_act_fecha_fin');
        $cliActividad->cli_act_hora_fin = $horaFin;
        $cliActividad->cli_act_comentario = $request->get('cli_act_comentario');
        $cliActividad->cli_act_estado = $request->get('cli_act_estado');
        $cliActividad->cli_act_codigo_ref = $request->get('cli_act_codigo_ref');
        $cliActividad->fun_codigo = $request->get('fun_codigo');
        $cliActividad->cli_act_siglas_segui = $request->get('cli_act_siglas_segui');
        $cliActividad->cli_act_monto_pago = $request->get('cli_act_monto_pago');

        $cliActividad->save();

        return $this->sendResponse($cliActividad, 'Actividad creada satisfactoriamente');

    }

    public function update(Request $request)
    {
        # code...
    }
}
