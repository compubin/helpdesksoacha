<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class dependencias extends Tecno  {
	
	protected $table = 'dependencias';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dependencias.* FROM dependencias  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dependencias.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
