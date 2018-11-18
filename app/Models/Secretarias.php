<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class secretarias extends Tecno  {
	
	protected $table = 'secretarias';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT secretarias.* FROM secretarias  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE secretarias.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
