<?php
class Cursos2Data {
	public static $tablename = "cursos";

	public function __construct(){
		$this->id_prof = "";
		$this->nombre = "";
		$this->profesor = "";
		$this->linksala = "";
	}


	public static function getAllBy2($k,$v){
		 $sql = "select id_prof, nombre, profesor, linksala from ".self::$tablename.", bloq_cur, bloque_cal
WHERE cursos.id_curso = bloq_cur.id_curso and bloq_cur.id_bloque_cal = bloque_cal.id and ".self::$tablename.".$k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Cursos2Data());
	}


}

?>