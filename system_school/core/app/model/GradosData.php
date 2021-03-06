<?php
class GradosData {
	public static $tablename = "grados";

	public function __construct(){
		$this->nombre = "";
		$this->nivel = "";
	}

	public function add(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "insert into ".self::$tablename." (nombre,nivel) ";
		$sql .= "value (\"$this->nombre\",\"$this->nivel\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_grado=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\" where id_grado=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_grado=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where id_grado=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GradosData());
	}

	public static function getBy($k,$v){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GradosData());
	}

	public static function getAll(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}

	public static function getAllBy($k,$v){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}
	public static function getAllByUserId($id){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}

	public static function getLike($q){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GradosData());
	}


}

?>