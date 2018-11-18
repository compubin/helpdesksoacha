<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class procesador extends Tecno  {
	
	protected $table = 'procesador';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT procesador.* FROM procesador  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE procesador.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
