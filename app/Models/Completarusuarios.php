<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class completarusuarios extends Tecno  {
	
	protected $table = 'usuarios';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT usuarios.* FROM usuarios  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE usuarios.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
