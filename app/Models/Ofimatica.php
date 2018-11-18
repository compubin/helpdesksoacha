<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ofimatica extends Tecno  {
	
	protected $table = 'ofimatica';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT ofimatica.* FROM ofimatica  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE ofimatica.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
