<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class calificaciontickets extends Tecno  {
	
	protected $table = 'calificacion_ticket';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT calificacion_ticket.* FROM calificacion_ticket  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE calificacion_ticket.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
