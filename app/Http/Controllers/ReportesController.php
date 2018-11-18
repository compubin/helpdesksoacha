<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class ReportesController extends Controller
{
    public function index()
    {

        $usuarios = DB::table('v_usuarios')->get();
        $dependencias = DB::table('dependencias')->get();
        $secretarias = DB::table('secretarias')->get();
        $tecnicos = DB::table('v_usuarios_tecnicos')->get();
        $categorias = DB::table('categorias')->get();
        $estados = ['Pendiente', 'En proceso', 'Finalizado'];
        $tipoSolicitud = ['App', 'Telefonico'];
        $calificacion = ['Sin calificar', 'Muy satisfecho', 'Satisfecho', 'Poco satisfecho', 'Nada satisfecho'];
        $trazabilidad = ['Si', 'No'];

        return view('reportes.index', compact('usuarios', 'dependencias', 'secretarias', 'tecnicos', 'categorias', 'estados', 'tipoSolicitud', 'calificacion', 'trazabilidad'));
    }

    public function generate(Request $request)
    {
        $fecha_desde = $request->input('fecha_desde');
        $fecha_hasta = $request->input('fecha_hasta');
        $usuario = $request->input('usuario');
        $dependencia = $request->input('dependencia');
        $secretaria = $request->input('secretaria');
        $tecnico = $request->input('tecnico');
        $categoria = $request->input('categoria');
        $estado = $request->input('estado');
        $tipo_solicitud = $request->input('tipo_solicitud');
        $calificacion = $request->input('calificacion');

        $query = DB::table('tickets AS t')
            ->join('categorias AS c', 't.categorias_id', '=', 'c.id')
            ->join('sub_categorias AS sc', 't.sub_categorias_id', '=', 'sc.id')
            ->join('clasificacion AS cl', 't.clasificacion_id', '=', 'cl.id')
            ->join('v_usuarios AS user', 't.usuario_id', '=', 'user.tb_user_id')
            ->join('v_usuarios AS tec', 't.tecnico_id', '=', 'tec.tb_user_id')
            ->join('trazabilidad_ticket AS tt', 't.id', '=', 'tt.ticket_id', 'left')
            ->join('usuarios AS u', 't.usuario_id', '=', 'u.tb_users_id', 'left')
            ->join('calificacion_ticket AS ct', 't.id', '=', 'ct.tickets_id', 'left');

        if (!empty($fecha_desde)) {
            $query->where('t.created_at', '>=', $fecha_desde);
        }

        if (!empty($fecha_hasta)) {
            $query->where('t.created_at', '<=', $fecha_hasta);
        }

        if (!empty($usuario)) {
            $query->where('t.usuario_id', $usuario);
        }

        if (!empty($dependencia)) {
            $query->where('u.dependencias_id', $dependencia);
        }

        if (!empty($secretaria)) {
            $query->where('u.secretarias_id', $secretaria);
        }

        if (!empty($tecnico)) {
            $query->where('t.tecnico_id', $tecnico);
        }

        if (!empty($categoria)) {
            $query->where('t.categorias_id', $categoria);
        }

        if (!empty($estado)) {
            $query->where('t.estado', $estado);
        }

        if (!empty($tipo_solicitud)) {

            if ($tipo_solicitud == 'App') {
                $query->where('t.tipo', 'App');
            } elseif ($tipo_solicitud == 'Telefonico') {
                $query->where('t.tipo', 'Telefonico');
            }
        }

        if (!empty($calificacion)) {
            $query->where('ct.calificacion', $calificacion);
        }

        $queryResult = $query
            ->groupBy('t.id')
            ->select(
                't.id AS id',
                \DB::raw("concat(user.nombres,' ',user.apellidos) AS usuario"),
                'user.dependencia AS dependencia',
                't.created_at AS fecha_solicitud',
                't.estado AS estado',
                't.incidencia AS incidencia',
                \DB::raw("concat(tec.nombres,' ',tec.apellidos) AS tecnico"),
                't.updated_at AS fecha_resuelto',
                'c.nombre AS categoria',
                'sc.nombre AS sub_categoria',
                'cl.nombre AS item',
                \DB::raw('GROUP_CONCAT(CONCAT("Comentario: ",tt.comentario, " - Fecha:", tt.created_at), \' | \') AS trazabilidad'),
                'ct.calificacion',
                't.tipo'
            )
            ->get();

        if($queryResult->isEmpty())
        {
            return redirect()->back()->with('status', 'No se encontraro registros para esta búsqueda.');
        }

        \Excel::create('reporte-' . date('Y-m-d'), function ($excel) use ($queryResult) {

            $excel->sheet('Sheetname', function ($sheet) use ($queryResult) {


                foreach ($queryResult AS $key => $element)
                {
                    $data[] = [
                        'id' => $element->id,
                        'usuario' => $element->usuario,
                        'dependencia' => $element->dependencia,
                        'fecha_solicitud' => $element->fecha_solicitud,
                        'estado' => $element->estado,
                        'incidencia' => $element->incidencia,
                        'tecnico' => $element->tecnico,
                        'fecha_resuelto' => $element->fecha_resuelto,
                        'categoria' => $element->categoria,
                        'sub_categoria' => $element->sub_categoria,
                        'item' => $element->item,
                        'trazabilidad' => $element->trazabilidad,
                        'calificacion' => $element->calificacion,
                        'tipo' => $element->tipo
                    ];
                }

                $sheet->fromArray($data);
            });



        })->export('xls');
    }
}
