<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomTicketsController extends Controller {
	public function autoAssignTicket(Request $request) {

		$this->validate($request, [
			'technical_id' => 'required|exists:tb_users,id',
			'ticket_id' => 'required|exists:tickets,id',
		]);

		DB::beginTransaction();

		try {
			DB::table('tickets')
				->where('id', $request->ticket_id)
				->update(['tecnico_id' => $request->technical_id]);

		} catch (Exception $e) {
			DB::rollBack();
			return back()->with('messagetext', "Ticket no asignado: {$e->getMessage()}")->with('msgstatus', 'error');
		}

		DB::commit();
		return back()->with('messagetext', "Ticket asignado correctamente")->with('msgstatus', 'success');
		
	}
}
