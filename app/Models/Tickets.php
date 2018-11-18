<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tickets extends Tecno  {
	
	protected $table = 'tickets';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tickets.* FROM tickets  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tickets.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
