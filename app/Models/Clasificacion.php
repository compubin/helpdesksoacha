<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class clasificacion extends Tecno  {
	
	protected $table = 'clasificacion';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT clasificacion.* FROM clasificacion  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE clasificacion.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
