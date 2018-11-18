<?php

namespace App\Services;

class DataService {

	public function getTechnicalCategory($userId) 
	{
		$query = \DB::table('usuarios AS u')
			->join('categorias_has_usuarios AS cu', 'u.id', '=', 'cu.usuarios_id')
			->where('u.tb_users_id', $userId)
			->select('cu.categorias_id')
			->get();
		$categoriesId = $query->pluck('categorias_id')->all();
		return $categoriesId;
	}

	public function getCategory($id) 
	{
		$query = \DB::table('categorias AS c')->find($id);
		return $query;
	}

	public function getAllSuccessTicketsUnRated()
	{
		$query = \DB::table('tickets AS t')
			->join('tb_users AS tbu', 't.usuario_id', '=', 'tbu.id')
			->leftJoin('usuarios AS u', 'tbu.id', '=', 'u.tb_users_id')
			->leftJoin('dependencias AS d', 'u.dependencias_id', '=', 'd.id')
			->join('categorias AS c', 't.categorias_id', '=', 'c.id')
			->join('sub_categorias AS sc', 't.sub_categorias_id', '=', 'sc.id')
			->join('clasificacion AS cl', 't.clasificacion_id', '=', 'cl.id')
			->leftJoin('calificacion_ticket AS ct', 't.id', '=', 'ct.tickets_id')
			->where('t.estado', 'Finalizado')
			->where('ct.id', NULL)
			->select(
				't.id',
				\DB::raw('CONCAT("Ticket: ", c.nombre, " - ", sc.nombre, " - ", cl.nombre, " | Dep: ", IF(d.nombre != "", d.nombre, "Sin asignar"), " | ", tbu.first_name, " ", tbu.last_name) AS clasificacion')
			)
			->get();
		return $query;
	}

	public function getSuccessTicketsByUserUnRated($userId) 
	{
		$query = \DB::table('tickets AS t')
			->join('tb_users AS tbu', 't.usuario_id', '=', 'tbu.id')
			->leftJoin('usuarios AS u', 'tbu.id', '=', 'u.tb_users_id')
			->leftJoin('dependencias AS d', 'u.dependencias_id', '=', 'd.id')
			->join('categorias AS c', 't.categorias_id', '=', 'c.id')
			->join('sub_categorias AS sc', 't.sub_categorias_id', '=', 'sc.id')
			->join('clasificacion AS cl', 't.clasificacion_id', '=', 'cl.id')
			->leftJoin('calificacion_ticket AS ct', 't.id', '=', 'ct.tickets_id')
			->where('t.usuario_id', $userId)
			->where('t.estado', 'Finalizado')
			->where('ct.id', NULL)
			->select(
				't.id',
				\DB::raw('CONCAT("Ticket: ", c.nombre, " - ", sc.nombre, " - ", cl.nombre, " | Dep: ", IF(d.nombre != "", d.nombre, "Sin asignar"), " | ", tbu.first_name, " ", tbu.last_name) AS clasificacion')
			)
			->get();
		return $query;
	}

	public function getUsers()
	{
		$query = \DB::table('v_usuarios')->get();
		return $query;
	}

	public function getTicketById($id)
	{
		$query = \DB::table('v_tickets')->find($id);
		return $query;	
	}	

	public function getTechnicalOpenTicket($technical_id)
	{
		$query = \DB::table('tickets AS t')
			->join('tb_users AS tbu', 't.usuario_id', '=', 'tbu.id')
			->leftJoin('usuarios AS u', 'tbu.id', '=', 'u.tb_users_id')
			->leftJoin('dependencias AS d', 'u.dependencias_id', '=', 'd.id')
			->join('categorias AS c', 't.categorias_id', '=', 'c.id')
			->join('sub_categorias AS sc', 't.sub_categorias_id', '=', 'sc.id')
			->join('clasificacion AS cl', 't.clasificacion_id', '=', 'cl.id')
			->leftJoin('calificacion_ticket AS ct', 't.id', '=', 'ct.tickets_id')
			->where('t.tecnico_id', $technical_id)
			->where('t.estado', '!=', 'Finalizado')
			->where('ct.id', NULL)
			->select(
				't.id',
				\DB::raw('CONCAT("Ticket: ", c.nombre, " - ", sc.nombre, " - ", cl.nombre, " | Dep: ", d.nombre, " | ", tbu.first_name, " ", tbu.last_name) AS clasificacion')
			)
			->get();
		return $query;
	}

	public function checkUserClosedTickets($userId)
	{
		$query = \DB::table('tickets AS t')->leftJoin('calificacion_ticket AS ct', 'ct.tickets_id', '=', 't.id')->where('t.usuario_id', $userId)->whereNull('ct.id')->count();
		return $query;
	}

	public function getTicketTraceability($tikcet)
    {
        $query = \DB::table("tickets AS t")
            ->join('trazabilidad_ticket AS tt', 't.id', '=', 'tt.ticket_id')
            ->join('tb_users AS tbu', 'tt.tecnico_id', '=', 'tbu.id')
            ->where('t.id', $tikcet)
            ->orderBy('t.id', 'DESC')
            ->select(
                \DB::raw('CONCAT(tbu.first_name, " ", tbu.last_name) AS tecnico'),
                'tt.comentario',
                'tbu.email',
                'tt.created_at'
            )
            ->get();

        return $query;
    }

    public function getTechnicals()
    {
        return \DB::table('tb_users AS tbu')->where('tbu.group_id', 3)->get();
    }

    public function getAdmins()
    {
        return \DB::table('tb_users AS tbu')->whereIn('tbu.group_id', [1,2])->get();
    }

    public function getTechnicalsById($id)
    {
        return \DB::table('tb_users AS tbu')->where('tbu.id', $id)->first();
    }

    public function getUserById($id)
    {
        return \DB::table('tb_users AS tbu')->where('tbu.id', $id)->first();
    }

    public function getCompletarUsuarios()
    {
    	$users = \DB::table('usuarios')->select('tb_users_id')->get()->pluck('tb_users_id')->all();
    	return \DB::table('tb_users')->whereNotIn('id', $users)->get();
    }

    public function getMarcas()
    {
        return \DB::table('marcas')->orderBy('nombre', 'ASC')->get();

    }

}



