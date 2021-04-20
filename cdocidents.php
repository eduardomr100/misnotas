<?php
	include("./lib/ClassConec.php");
	$cone= new clasdb;
	$enlace=$cone->conectar();

	$c1	= $_POST['xasig'];
	$c2	= $_POST['xactiv'];
	$c3	= $_POST['xgrado'];
	$c4	= $_POST['xsede'];
	$c5 = $_POST['xper'];
	$c6 = $_POST['xcodmat'];
	$c7 = $_POST['notasx'];
	$c8 = $_POST['xidnp'];
	$aniolec = $_POST['aniolec'];
	$xop = $_POST['xop'];
	$i=0;

if ($xop=="INS"){
	foreach($c6 as $xid){
		$sql .= "INSERT INTO notas.notasp(idasignat,idactiv,idgrado,idsede,idper,idmatri,notap, aniolec)
		VALUES ('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$xid."','".$c7[$i]."',".$aniolec.");";
		$i++;
	}
	//echo $sql;
	if ($cone->ejecuta($sql)) echo $cone->mok("Informaci&oacute;n Almacenada Correctamente",1);
	else echo $cone->merror("Error al Ingresar Datos.",1);
}
if ($xop=="UPD"){
	foreach($c8 as $xidnp){
		$sql .= "UPDATE notas.notasp SET notap=".$c7[$i]." WHERE id=".$xidnp.";";
		$i++;
	}
	//echo $sql;
	if ($cone->ejecuta($sql)) echo $cone->mok("Informaci&oacute;n Actualizada Correctamente",1);
	else echo $cone->merror("Error al Actualizar Datos.",1);
}
 ?>