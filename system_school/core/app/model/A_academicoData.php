<?php
class A_academicoData {
	public static $tablename = "a_academico";

	public function __construct(){
		$this->nombre = "";
		$this->anio = "";
		$this->estado = "";
	}

	public function add(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "insert into ".self::$tablename." (nombre,anio,estado) ";
		$sql .= "value (\"$this->nombre\",\"$this->anio\",\"$this->estado\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_a=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",anio=\"$this->anio\",estado=\"$this->estado\" where id_a=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_a=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where id_a=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new A_academicoData());
	}

	public static function getBy($k,$v){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new A_academicoData());
	}

	public static function getAll(){
		$sqlsetnames = "set names utf8";
		$query = Executor::doit($sqlsetnames);
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new A_academicoData());
	}

	public static function getAllBy($k,$v){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new A_academicoData());
	}


	public static function getLike($q){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new A_academicoData());
	}


}

?>