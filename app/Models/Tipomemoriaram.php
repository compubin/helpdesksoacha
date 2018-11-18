<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tipomemoriaram extends Tecno  {
	
	protected $table = 'tipo_memoria_ram';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tipo_memoria_ram.* FROM tipo_memoria_ram  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tipo_memoria_ram.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
