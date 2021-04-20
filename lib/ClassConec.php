<?php
class clasdb{
	var $linea,$link;
	function conectar(){
		$cad="host=localhost port=5432 dbname=moodle user=usrmoodle password=moodle";
		$this->link = pg_connect($cad);
		return $this->link;
	}

	function cerrar(){
		pg_close($this->link);
	}

	function consulta($q){
		return pg_query($this->link, $q);
	}

	function ejecuta($q){
		return pg_exec($this->link, $q);
	}

	function merror($mensaje,$ruta){
		if ($ruta==2) $ruta="../images/error.jpg";
		else $ruta="images/error.jpg";
		return "<center><table border=0 cellspadding=0 cellspacing=0>
		<tr><td colspan=2 Align=center><b>Sistema de elecci&oacute;n de personero<br>Centro Educativo Municipal los &Aacute;ngeles</b></td></tr><tr><td colspan=2>&nbsp;</td></tr>
		<tr><td><img src='".$ruta."'></td><td><font color=red><label>".$mensaje."</font></label></td></tr>
		</table><center>"; 
	}

	function mok($mensaje,$ruta){
		if ($ruta==2) $ruta="../images/ok.jpg";
		else $ruta="images/ok.jpg";
		return "<center><table border=0 cellspadding=0 cellspacing=0>
		<tr><td colspan=2 Align=center><b>Sistema de Registro de Notas	<br>Centro Educativo Municipal los &Aacute;ngeles</b></td></tr><tr><td colspan=2>&nbsp;</td></tr>
		<tr><td><img src='".$ruta."'></td><td><font color=red><label>".$mensaje."</font></label></td></tr>
		</table><center>"; 
	}

	function periodo(){
		$periodo=date("Y");
		return $periodo;
	}

	function fecha($xt){
		if ($xt=="L") return date("Y-m-d")."-".date("H:i:s");
		if ($xt=="C")return date("Y-m-d");
	}
	 
	function imprimir($op){
		if($op==1){
			return "<script lanjuage=javascript>
				function framePrint(whichFrame){
					parent[whichFrame].focus();
					parent[whichFrame].print();
				}
				</script>
				<a href=\"javascript:framePrint('iframe');\"><img src=./images/printer.gif></a>";
		}
		else{
			return "<script lanjuage=javascript>
				function framePrint(whichFrame){
					parent[whichFrame].focus();
					parent[whichFrame].print();
				}
				</script>
				<a href=\"javascript:framePrint('iframe');\"><img src=../images/printer.gif></a>";
		}
	}
	function candidatos($xper){//59653014
		if($xper!=""){
			$sql="SELECT nuipc, nombres, apellidos FROM person.candidatos where periodo='".$xper."'";
			return $result=$this->consulta($sql);
		}
	}
	function grados($id){
		if($id!=""){
			$sql="SELECT nomgrado FROM notas.grado where idgrado='".$id."'";
			$result=$this->consulta($sql);
			$row=pg_fetch_array($result);
			return $row[0];
		}
		else {
			$sql="SELECT idgrado, nomgrado FROM notas.grado";
			return $result=$this->consulta($sql);
		}
	}
	function asignaturas($id){
		if($id!=""){
			$sql="SELECT nomasig FROM notas.asignatura where idasig='".$id."'";
			$result=$this->consulta($sql);
			$row=pg_fetch_array($result);
			return $row[0];
		}
		else {
			$sql="SELECT idasig, nomasig FROM notas.asignatura";
			return $result=$this->consulta($sql);
		}
	}
	function sedes($id){
		if($id!=""){
			$sql="SELECT nomsede FROM notas.sede where idsede='".$id."'";
			$result=$this->consulta($sql);
			$row=pg_fetch_array($result);
			return $row[0];
		}
		else {
			$sql="SELECT idsede, nomsede FROM notas.sede";
			return $result=$this->consulta($sql);
		}
	}
	function actividades($xper){
			$sql="SELECT idactiv, nomactiv FROM notas.actividad where peracad='".$xper."'";
			return $result=$this->consulta($sql);
	}
	function nactividad($id){
			$sql="SELECT nomactiv FROM notas.actividad where idactiv='".$id."'";
			$result=$this->consulta($sql);
			$row=pg_fetch_array($result);
			return $row[0];
	}
	function periodos(){
			$sql="SELECT nperiodos FROM notas.peracad where estperacad='A'";
			return $result=$this->consulta($sql);
	}
	function estudiantes($ide){
		if($ide!=""){
			$sql="SELECT idestud, nomestud, apestud FROM notas.estudiante where idestud='".$ide."'";
			$result=$this->consulta($sql);
			$row=pg_fetch_array($result);
			$cadena=pg_num_rows($result)."|".$row[0]."|".$row[1]."|".$row[2];
			return $cadena;
		}
	}

	function estudiante($ide){
		if($ide!=""){
			$sql="SELECT apestud, nomestud FROM notas.estudiante where idestud='".$ide."'";
			$result=$this->consulta($sql);
			$row=pg_fetch_array($result);
			$cadena=$row[0]." ".$row[1];
			return $cadena;
		}
	}
	
	function lestudiantes(){
		$sql="SELECT idestud, apestud, nomestud FROM notas.estudiante where idestado='A' and idestud not in(";
		$sql.="select idestud from notas.matricula where periodo='".$this->periodo()."') order by apestud";
		return $result=$this->consulta($sql);
	}

	function fechac(){
		return date("Y-m-d");
	}
}
?>
