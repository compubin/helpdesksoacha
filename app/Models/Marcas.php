<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class marcas extends Tecno  {
	
	protected $table = 'marcas';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT marcas.* FROM marcas  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE marcas.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
