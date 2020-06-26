<?php
class Bloque_calData {
	public static $tablename = "bloque_cal";


	public function __construct(){
		$this->nom_cal = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "insert into ".self::$tablename." (nom_cal,id_grado) ";
		$sql .= "value (\"$this->nom_cal\",$this->id_grado)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto Bloque_calData previamente utilizamos el contexto
	public function update(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "update ".self::$tablename." set tipo=\"$this->tipo\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Bloque_calData());
	}

	public static function getByATD($alumn,$team,$date_at){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where id_estudiante=$alumn and id_grado=$team and date_at=\"$date_at\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Bloque_calData());
	}

	public static function getAll(){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Bloque_calData());
	}

	public static function getAllByTeamId($id){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);
		$sql = "select * from ".self::$tablename." where id_grado=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Bloque_calData());
	}

	
	public static function getLike($q){
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		$sql = "select * from ".self::$tablename." where nom_cal like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Bloque_calData());
	}


}

?>