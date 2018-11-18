<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class trazabilidadticket extends Tecno  {
	
	protected $table = 'trazabilidad_ticket';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT trazabilidad_ticket.* FROM trazabilidad_ticket  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE trazabilidad_ticket.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
