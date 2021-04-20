<?php
	include("./lib/ClassConec.php");
	$cone= new clasdb;
	$enlace=$cone->conectar();

	$c1	= $_POST['c1'];
	$c2	= $_POST['c2'];
	$c3	= $_POST['c3'];
	$c4	= $_POST['xcheck'];
	foreach($c4 as $xid){
		$sql .= "INSERT INTO notas.matricula(idsede,idgrado,periodo,idestud) VALUES ('".$c1."','".$c2."','".$c3."','".$xid."');";
	}
	//echo $sql;
	if ($cone->ejecuta($sql)) echo $cone->mok("Informaci&oacute;n Almacenada Correctamente",1);
	else echo $cone->merror("Error al Ingresar Datos.",1);
 ?>