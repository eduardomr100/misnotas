
<html>
<head>
	<meta 'Content-Type: text/html; charset=ISO-8859-1'>
</head>
<body>
<?php
include("./lib/ClassConec.php");
$cone= new clasdb;
$enlace=$cone->conectar();
$aniolec=$cone->periodo();
	
	echo "<blockquote> <Font color=#2d6a38><center><h3>Consulta de Notas - ".$aniolec." - Periodo ".$xper." </h3></center></font>";
	//<img src='./images/separadr.png'><br>";
	echo "<form action=consultar.php method=POST>";
	echo "<center><table border=0 cellspacing=1 cellpadding=1><tr>";
	echo "<tr><td colspan=6><h3>***Digite su numero de identificación y la Asignatura***</h3></td></tr>";
	//echo "<tr><td>&nbsp;</td><td><b>Nombre o&acute; Apellido:</b></td><td><input type=text style='height: 30px; font-size:14pt;' name=xdato size=40 value=0></td>";
	
	echo "<tr><td>&nbsp;&nbsp;</td><td><b>No. Identificación:</b></td><td><input type=text name=xidestud value=''></td></tr>";
	$result=$cone->asignaturas($id);
	echo "<tr><td>&nbsp;&nbsp;</td><td><b>Asignatura:</b></td><td><select name=xasig style='height: 25px; font-size:14pt;'><option default value=-1>--Seleccione--</option>";
	while ($rows=pg_fetch_array($result)){
		echo "<option value=".$rows[0].">".$rows[1];
	}
	echo "</select></td></tr>";

	$result=$cone->grados($id);
	echo "<tr><td>&nbsp;&nbsp;</td><td><b>Grado:</b></td><td><select name=xgrado style='height: 25px; font-size:14pt;'><option default value=-1>--Seleccione--</option>";
	while ($rows=pg_fetch_array($result)){
		echo "<option value=".$rows[0].">".$rows[1];
	}
	echo "</select></td></tr>";

	$result=$cone->periodos($id);
	echo "<tr><td>&nbsp;&nbsp;</td><td><b>Periodo:</b></td><td><select name=xper style='height: 25px; font-size:14pt;'><option default value=-1>--Seleccione--</option>";
	$rows=pg_fetch_array($result);
	for($i=1;$i<=$rows[0];$i++){
		echo "<option value=".$i.">".$i;
	}
	echo "</select></td></tr>";

	echo "<tr><td colspan=6>&nbsp;</td></tr>";
	echo "<tr><td colspan=6 align=center><input type='image' name='imageField' src='./images/search.jpg'/></td></tr>";
	echo "</table></form></center>";
?>
</body>
</html>
