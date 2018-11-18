<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class memoriaram extends Tecno  {
	
	protected $table = 'memoria_ram';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT memoria_ram.* FROM memoria_ram  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE memoria_ram.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
