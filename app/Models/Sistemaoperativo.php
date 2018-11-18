<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class sistemaoperativo extends Tecno  {
	
	protected $table = 'sistema_operativo';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT sistema_operativo.* FROM sistema_operativo  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE sistema_operativo.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
