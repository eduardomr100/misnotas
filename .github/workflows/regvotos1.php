<html>
<head>
	<meta 'Content-Type: text/html; charset=ISO-8859-1'>
</head>
<body>
<?php
include("./lib/ClassConec.php");
$cone= new clasdb;
$enlace=$cone->conectar();
$periodo=$cone->periodo();
	
	echo "<blockquote> <Font color=#2d6a38><center><h3>Elecciones de personero - ".$periodo."</h3></center></font>";

	$sql="insert into person.votacion(nuipe,nuipc,periodo,fecha) values('".$_GET[c1]."','".$_GET[c2]."','".$periodo."','".$cone->fecha("L")."')";
	//echo $sql;
	if ($cone->vervotado($_GET[c1])>0){
		echo $cone->merror("Error el estudiante ya registro su voto.",1);
	}
	else{
		if ($cone->ejecuta($sql)) echo $cone->mok("Informaci&oacute;n Almacenada Correctamente",1);
		else echo $cone->merror("Error al Ingresar Datos.",1);
	}
?>
</body>
</html>