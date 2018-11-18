<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class categoriastecnicos extends Tecno  {
	
	protected $table = 'categorias_has_usuarios';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT categorias_has_usuarios.* FROM categorias_has_usuarios  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE categorias_has_usuarios.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
