<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class asignacionequipos extends Tecno  {
	
	protected $table = 'asignacion_equipos';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT asignacion_equipos.* FROM asignacion_equipos  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE asignacion_equipos.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
