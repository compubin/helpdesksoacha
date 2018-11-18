<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tiposdiscoduro extends Tecno  {
	
	protected $table = 'tipo_disco_duro';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tipo_disco_duro.* FROM tipo_disco_duro  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tipo_disco_duro.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
