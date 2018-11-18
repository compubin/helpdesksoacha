<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class subcategorias extends Tecno  {
	
	protected $table = 'sub_categorias';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT sub_categorias.* FROM sub_categorias  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE sub_categorias.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
