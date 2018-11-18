<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class frecuenciamemoriaram extends Tecno  {
	
	protected $table = 'frecuencia_memoria_ram';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT frecuencia_memoria_ram.* FROM frecuencia_memoria_ram  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE frecuencia_memoria_ram.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
