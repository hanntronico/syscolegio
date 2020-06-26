<?php
class AccesosData {
	public static $tablename = "accesos";

// acc_codigo
// acc_fecha
// acc_origen
// usr_codigo

	public function __construct(){
		$this->acc_fecha = "";
		$this->acc_origen = "";
		$this->usr_codigo = "";
	}
  
	public function add(){
		$sql="insert into ".self::$tablename." (acc_fecha, acc_origen, usr_codigo) value (\"$this->acc_fecha\",\"$this->acc_origen\",$this->usr_codigo)" ;
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

// partiendo de que ya tenemos creado un objecto ConductaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set tipo=\"$this->tipo\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where acc_codigo=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ConductaData());
	}

	// public static function getByATD($alumn,$team,$date_at){
	// 	$sql = "select * from ".self::$tablename." where id_estudiante=$alumn and id_grado=$team and date_at=\"$date_at\"";
	// 	$query = Executor::doit($sql);
	// 	return Model::one($query[0],new ConductaData());
	// }

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConductaData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConductaData());
	}


}

?>