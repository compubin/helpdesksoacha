<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class categorias extends Tecno  {
	
	protected $table = 'categorias';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT categorias.* FROM categorias  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE categorias.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
