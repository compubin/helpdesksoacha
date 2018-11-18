<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class versionistemaoperativo extends Tecno  {
	
	protected $table = 'version_sistema_operativo';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT version_sistema_operativo.* FROM version_sistema_operativo  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE version_sistema_operativo.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
