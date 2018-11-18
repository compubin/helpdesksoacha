<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class software extends Tecno  {
	
	protected $table = 'software';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT software.* FROM software  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE software.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
