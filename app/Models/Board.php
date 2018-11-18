<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class board extends Tecno  {
	
	protected $table = 'board';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT board.* FROM board  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE board.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
