<?php
class CursosData {
	public static $tablename = "cursos";

	public function __construct(){
		$this->nombre = "";
		$this->profesor = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,profesor) ";
		$sql .= "value (\"$this->nombre\",\"$this->profesor\")";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id_curso=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",profesor=\"$this->profesor\" where id_curso=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id_curso=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id_curso=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CursosData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CursosData());
	}

	public static function getAll(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);	
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CursosData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CursosData());
	}

	public static function getAllBy2($k,$v){
		 $sql = "select * from ".self::$tablename.", bloq_cur, bloque_cal
WHERE cursos.id_curso = bloq_cur.id_curso and bloq_cur.id_bloque_cal = bloque_cal.id and ".self::$tablename.".$k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CursosData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CursosData());
	}


}

?>