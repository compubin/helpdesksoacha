<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tiposequipo extends Tecno  {
	
	protected $table = 'tipos_equipo';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tipos_equipo.* FROM tipos_equipo  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tipos_equipo.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
