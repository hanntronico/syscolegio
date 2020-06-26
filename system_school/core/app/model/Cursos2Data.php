<?php
class Cursos2Data {
	public static $tablename = "cursos";

	public function __construct(){
		$this->id_prof = "";
		$this->nombre = "";
		$this->profesor = "";
		$this->linksala = "";
		$this->nomgra = "";
		$this->codgrado = "";
	}


	public static function getAllBy2($k,$v){

// 		select * from cursos, bloq_cur, bloque_cal, grados
// WHERE cursos.id_curso = bloq_cur.id_curso 
// and bloq_cur.id_bloque_cal = bloque_cal.id 
// and bloque_cal.id_grado = grados.id_grado
// and cursos.id_prof=19
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		 $sql = "select cursos.id_prof, cursos.nombre, profesor, linksala, grados.nombre as nomgra, grados.id_grado as codgrado from ".self::$tablename.", bloq_cur, bloque_cal, grados
WHERE cursos.id_curso = bloq_cur.id_curso and bloq_cur.id_bloque_cal = bloque_cal.id and bloque_cal.id_grado = grados.id_grado and ".self::$tablename.".$k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Cursos2Data());

	}

		public static function getCursosByProfyGrad($k,$v){

// 		select * from cursos, bloq_cur, bloque_cal, grados
// WHERE cursos.id_curso = bloq_cur.id_curso 
// and bloq_cur.id_bloque_cal = bloque_cal.id 
// and bloque_cal.id_grado = grados.id_grado
// and cursos.id_prof=19
		$sqlsetutf = "set names utf8";
		$query2 = Executor::doit($sqlsetutf);		
		 $sql = "select cursos.id_prof, cursos.nombre, profesor, linksala, grados.nombre as nomgra, grados.id_grado as codgrado, bloque_cal.id, bloque_cal.nom_cal from ".self::$tablename.", bloq_cur, bloque_cal, grados
WHERE cursos.id_curso = bloq_cur.id_curso and bloq_cur.id_bloque_cal = bloque_cal.id and bloque_cal.id_grado = grados.id_grado and ".self::$tablename.".id_prof=$k and grados.id_grado=$v";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Cursos2Data());
	}


}

?>