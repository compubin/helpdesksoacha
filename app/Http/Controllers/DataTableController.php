<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Yajra\Datatables\Datatables;

class DataTableController extends Controller
{
    public function getTickets(Request $request)
    {
        $query = DB::table('tickets AS t');
        $query->join('categorias AS c', 't.categorias_id', '=', 'c.id', 'left');
        $query->join('sub_categorias AS sc', 't.sub_categorias_id', '=', 'sc.id', 'left');
        $query->join('clasificacion AS cl', 't.clasificacion_id', '=', 'cl.id', 'left');
        $query->join('tb_users AS tbu', 't.usuario_id', '=', 'tbu.id', 'left');
        $query->join('usuarios AS u', 'tbu.id', '=', 'u.tb_users_id', 'left');
        $query->join('dependencias AS du', 'u.dependencias_id', '=', 'du.id', 'left');
        $query->join('tb_users AS tbt', 't.tecnico_id', '=', 'tbt.id', 'left');

        if($request->input('access_user_group') == 3)
        {
            $query->where('t.tecnico_id', $request->input('access_user_id'));
            $query->orWhere('t.tecnico_id', null);
        }

        if($request->input('access_user_group') == 4)
        {
            $query->where('t.usuario_id', $request->input('access_user_id'));
        }

        $data = $query->select(
            't.id AS ticketId',
            'c.nombre AS categoria',
            'sc.nombre AS subcategoria',
            'cl.nombre AS clasificacion',
            't.incidencia',
            DB::raw('CONCAT("Dep: ", du.nombre," | ",tbu.first_name," ",tbu.last_name) AS usuario'),
            DB::raw('CONCAT(tbt.first_name," ",tbt.last_name) AS tecnico'),
            't.estado',
            't.created_at',
            't.updated_at'
        )->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" class="ids" name="ids[]" value="'.$data->ticketId.'" />';
            })
            ->addColumn('action', function ($data) use ($request) {

                $columnOptions = '';

                if($request->input('access_is_detail') == 1)
                {
                    $url = url('tickets/show/'.$data->ticketId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_view');
                    $button = Lang::get('core.btn_view');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                if($request->input('access_is_edit') == 1)
                {
                    $url = url('tickets/update/'.$data->ticketId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_edit');
                    $button = Lang::get('core.btn_edit');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                $column = '
                <div class="dropdown">
				    <button class="btn btn-success btn-sm btn-outline  btn-circle dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-arrow-down"></i><span class="caret"></span></button>
				    <ul class="dropdown-menu">
				    '.$columnOptions.'				
				    </ul>
			    </div>';

                return $column;
            })
            ->addColumn('semaforo', function ($data) {

                $carbon = new Carbon;
                $carbon->setLocale('es');
                $now = $carbon->now();
                $created_at = $carbon->parse($data->created_at);
                $semaforo = $created_at->diffInHours($now);

                $label = '';

                if($data->estado != 'Finalizado' && $semaforo <= 2)
                {
                    $label = "<span class='label label-success'> {$created_at->diffForHumans($now)}</span>";
                }
                elseif($data->estado != 'Finalizado' && ($semaforo > 2 && $semaforo <= 8))
                {
                    $label = "<span class='label label-warning'> {$created_at->diffForHumans($now)}</span>";
                }
                elseif($data->estado != 'Finalizado' && ($semaforo > 8))
                {
                    $label = "<span class='label label-danger'> {$created_at->diffForHumans($now)}</span>";
                }
                else
                {
                    $label = "<span class='label label-default'> Finalizado </span>";
                }

                return $label;
            })
            ->addColumn('semaforo_search', function ($data) {

                $carbon = new Carbon;
                $carbon->setLocale('es');
                $now = $carbon->now();
                $created_at = $carbon->parse($data->created_at);
                $semaforo = $created_at->diffInHours($now);

                $label = '';

                if($data->estado != 'Finalizado' && $semaforo <= 2)
                {
                    $label = "{$created_at->diffForHumans($now)}";
                }
                elseif($data->estado != 'Finalizado' && ($semaforo > 2 && $semaforo <= 8))
                {
                    $label = "{$created_at->diffForHumans($now)}";
                }
                elseif($data->estado != 'Finalizado' && ($semaforo > 8))
                {
                    $label = "{$created_at->diffForHumans($now)}";
                }
                else
                {
                    $label = "Finalizado";
                }

                return $label;
            })
            ->make(true);
    }

    public function getTrazabilidadTickets(Request $request)
    {
        $query = DB::table('tickets AS t');
        $query->join('tb_users AS tbu', 't.usuario_id', '=', 'tbu.id', 'left');
        $query->join('tb_users AS tbt', 't.tecnico_id', '=', 'tbt.id', 'left');
        $query->join('usuarios AS u', 'tbu.id', '=', 'u.tb_users_id', 'left');
        $query->join('categorias AS c', 't.categorias_id', '=', 'c.id', 'left');
        $query->join('sub_categorias AS sc', 't.sub_categorias_id', '=', 'sc.id', 'left');
        $query->join('clasificacion AS cl', 't.clasificacion_id', '=', 'cl.id', 'left');
        $query->join('trazabilidad_ticket AS tt', 't.id', '=', 'tt.id');
        if($request->input('access_user_group') == 3)
        {
//            $query->where('t.tecnico_id', $request->input('access_user_id'));
//            $query->orWhere('t.tecnico_id', null);
        }
        if($request->input('access_user_group') == 4)
        {
//            $query->where('t.usuario_id', $request->input('access_user_id'));
        }

        $data = $query->select(
            't.id AS ticketId',
            'tt.ticket_id AS tId',
            DB::raw("concat(`c`.`nombre`,' - ',`sc`.`nombre`,' - ',`cl`.`nombre`) AS clasificacion"),
            't.usuario_id AS usuario_id',
            DB::raw("concat(`tbu`.`first_name`,' ',`tbu`.`last_name`) AS usuario"),
            't.estado AS estado',
            DB::raw("concat(' Tecnico: ',`tbt`.`first_name`,' ',`tbt`.`last_name`) AS tecnico"),
            'tt.comentario'
        )->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" class="ids" name="ids[]" value="'.$data->ticketId.'" />';
            })
            ->addColumn('action', function ($data) use ($request) {

                $columnOptions = '';

                if($request->input('access_is_detail') == 1)
                {
                    $url = url('trazabilidadticket/show/'.$data->ticketId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_view');
                    $button = Lang::get('core.btn_view');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                if($request->input('access_is_edit') == 1)
                {
                    $url = url('trazabilidadticket/update/'.$data->ticketId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_edit');
                    $button = Lang::get('core.btn_edit');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                $column = '
                <div class="dropdown">
				    <button class="btn btn-success btn-sm btn-outline  btn-circle dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-arrow-down"></i><span class="caret"></span></button>
				    <ul class="dropdown-menu">
				    '.$columnOptions.'				
				    </ul>
			    </div>';

                return $column;
            })
            ->make(true);
    }

    public function getUsuarios(Request $request)
    {
        $query = DB::table('usuarios AS u');
        $query->join('tb_users AS tbu', 'u.tb_users_id', '=', 'tbu.id');
        $query->join('secretarias AS s', 'u.secretarias_id', '=', 's.id');
        $query->join('dependencias AS d', 'u.dependencias_id', '=', 'd.id');
        $query->join('cargos AS c', 'u.cargos_id', '=', 'c.id');

        $data = $query->select(
            'u.id AS userId',
            DB::raw('CONCAT(tbu.first_name," ",tbu.last_name) AS usuario'),
            's.nombre AS secretaria',
            'd.nombre AS dependencia',
            'c.nombre AS cargo',
            'u.fecha_nacimiento',
            'u.tipo_documento',
            'u.documento',
            'u.telefono',
            'u.ext',
            'u.genero'
        )->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" class="ids" name="ids[]" value="'.$data->userId.'" />';
            })
            ->addColumn('action', function ($data) use ($request) {

                $columnOptions = '';

                if($request->input('access_is_detail') == 1)
                {
                    $url = url('completarusuarios/show/'.$data->userId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_view');
                    $button = Lang::get('core.btn_view');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                if($request->input('access_is_edit') == 1)
                {
                    $url = url('completarusuarios/update/'.$data->userId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_edit');
                    $button = Lang::get('core.btn_edit');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                $column = '
                <div class="dropdown">
				    <button class="btn btn-success btn-sm btn-outline  btn-circle dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-arrow-down"></i><span class="caret"></span></button>
				    <ul class="dropdown-menu">
				    '.$columnOptions.'				
				    </ul>
			    </div>';

                return $column;
            })

            ->make(true);
    }

    public function getUsers(Request $request)
    {
        $query = DB::table('tb_users AS tbu');
        $query->join('tb_groups AS tbg', 'tbu.group_id', '=', 'tbg.group_id');

        $data = $query->select(
            'tbu.id AS tbuId',
            'tbu.avatar',
            'tbg.name AS grupo',
            'tbu.username',
            'tbu.first_name',
            'tbu.last_name',
            'tbu.email',
            'tbu.active'
        )->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" class="ids" name="ids[]" value="'.$data->tbuId.'" />';
            })
            ->addColumn('action', function ($data) use ($request) {

                $columnOptions = '';

                if($request->input('access_is_detail') == 1)
                {
                    $url = url('core/users/show/'.$data->tbuId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_view');
                    $button = Lang::get('core.btn_view');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                if($request->input('access_is_edit') == 1)
                {
                    $url = url('core/users/update/'.$data->tbuId.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_edit');
                    $button = Lang::get('core.btn_edit');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                $column = '
                <div class="dropdown">
				    <button class="btn btn-success btn-sm btn-outline  btn-circle dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-arrow-down"></i><span class="caret"></span></button>
				    <ul class="dropdown-menu">
				    '.$columnOptions.'				
				    </ul>
			    </div>';

                return $column;
            })
            ->addColumn('avatar', function ($data) use ($request) {
                if( file_exists( './uploads/users/'.$data->avatar) && $data->avatar !='')
                {
                    return "<a href='".asset('uploads/users')."/{$data->avatar}' class='previewImage'>
                                <img src='".URL::to('uploads/users')."/{$data->avatar}' border='0' width='40' class='img-circle' />
							</a>";
                }
                else
                {
                    return '<img alt="" src="http://www.gravatar.com/avatar/{{ md5('.$data->email.') }}" width="40" class="img-circle" />';
                }
            })
            ->addColumn('status', function ($data) use ($request) {
                if($data->active == 1)
                {
                    return '<label class="label label-success">Active</label>';
                }
                else
                {
                    return '<label class="label label-danger">Inactive</label>';
                }

            })->make(true);
    }

    public function getCalificacion(Request $request)
    {
        $query = DB::table('tickets AS t');
        $query->join('tb_users AS tbu', 't.usuario_id', '=', 'tbu.id', 'left');
        $query->join('usuarios AS u', 'tbu.id', '=', 'u.tb_users_id', 'left');
        $query->join('categorias AS c', 't.categorias_id', '=', 'c.id', 'left');
        $query->join('sub_categorias AS sc', 't.sub_categorias_id', '=', 'sc.id', 'left');
        $query->join('clasificacion AS cl', 't.clasificacion_id', '=', 'cl.id', 'left');
        $query->join('calificacion_ticket AS ct', 't.id', '=', 'ct.tickets_id');
        $query->join('tb_users AS tbt', 't.tecnico_id', '=', 'tbt.id', 'left');
        $query->join('usuarios AS tu', 'tbt.id', '=', 'tu.tb_users_id', 'left');

        if ($request->input('access_user_group') == 3)
        {
            $query->where('t.tecnico_id', $request->input('access_user_id'));
        }
        elseif ($request->input('access_user_group') == 4)
        {
            $query->where('t.usuario_id', $request->input('access_user_id'));
        }

        $data = $query->select(
            't.id AS idTicket',
            DB::raw("concat(c.nombre,' - ',sc.nombre,' - ',cl.nombre) AS ticket"),
            'ct.calificacion AS calificacion',
            DB::raw("concat(tbu.first_name,' ',tbu.last_name) AS usuario"),
            't.estado AS estado',
            DB::raw("concat(tbt.first_name,' ',tbt.last_name) AS tecnico")
        )->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" class="ids" name="ids[]" value="'.$data->idTicket.'" />';
            })
            ->addColumn('action', function ($data) use ($request) {

                $columnOptions = '';

                if($request->input('access_is_detail') == 1)
                {
                    $url = url('calificaciontickets/show/'.$data->idTicket.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_view');
                    $button = Lang::get('core.btn_view');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                if($request->input('access_is_edit') == 1)
                {
                    $url = url('calificaciontickets/update/'.$data->idTicket.'?return='.$request->input('access_return'));
                    $title = Lang::get('core.btn_edit');
                    $button = Lang::get('core.btn_edit');
                    $columnOptions .= "<li><a href='{$url}' class='tips' title='{$title}'><i class='fa  fa-search '></i> {$button} </a></li>";
                }

                $column = '
                <div class="dropdown">
				    <button class="btn btn-success btn-sm btn-outline  btn-circle dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-arrow-down"></i><span class="caret"></span></button>
				    <ul class="dropdown-menu">
				    '.$columnOptions.'				
				    </ul>
			    </div>';

                return $column;
            })
            ->make(true);
    }

}
