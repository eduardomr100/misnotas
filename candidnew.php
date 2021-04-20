<html xmlns="http://www.w3.org/1999/xhtml"><head><link href="css/main.css" rel="stylesheet" type="text/css">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Registrar Alumno</title>
	<link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
	<script type="text/javascript" src="calendario/tcal.js"></script>
	<link href='./style/stylelg.css' rel='stylesheet' type='text/css'>
	<script type='text/javascript' src='./js/livevalidation.js'></script>
</head>
<body>
<?php
include("./lib/ClassConec.php");
$cone= new clasdb;
$enlace=$cone->conectar();
$periodo=$cone->periodo();
$xclave=$_POST[xclave];
$xopc=$_POST[xopc];
if (strtoupper($xclave)=="ESLACLAVE"){
	echo "<center>
	<form id='form1' name='form1' method='post' action='candidnews.php'> 
	<strong><h3>MATRICULAR ESTUDIANTES - ".$periodo."</h3></strong>
	<table width='90%' border='0' class='down1'>";
	echo "<tr>";
	
	$result=$cone->lestudiantes();
	echo "<td><table border='1' align='center' class='down1'>";
	echo "<th>Identificaci&oacute;n</th><th>Apellidos</th><th>Nombres</th><th>.:</th>";
	$cont=0;
	while ($rows=pg_fetch_array($result)){
		echo "<tr><td>".$rows[0]."</td><td>".$rows[1]."</td><td>".$rows[2]."</td><td><input type=checkbox name=xcheck[] value=".$rows[0]."></td></tr>";
	}
	echo "</table><td>";
	
	$result=$cone->sedes($id);
	echo "<td><b>Sede:</b>&nbsp;<select name='c1' id='c1' style='height: 30px; font-size:14pt;'><option default value=-1>--Seleccione--</option>";
	while ($rows=pg_fetch_array($result)){
		echo "<option value=".$rows[0].">".$rows[1];
	}
	echo "</select><br><br>";

	$result=$cone->grados($id);
	echo "<b>Grado:</b>&nbsp;<select name='c2' id='c2' style='height: 30px; font-size:14pt;'><option default value=-1>--Seleccione--</option>";
	while ($rows=pg_fetch_array($result)){
		echo "<option value=".$rows[0].">".$rows[1];
	}
	echo "</select><br><br>";
	  
	echo "<label><b>Periodo:</b></label>&nbsp;<select name='c3' id='c3' style='height: 30px; font-size:14pt;'/><option value='".$periodo."'/>".$periodo."</select>";
	echo "<br><br>";
	echo "<input type='reset' class='boot' name='limpia' value='LIMPIAR'><input type='submit' class='boot' name='guarda' value='GUARDAR'><br>";
	echo "</td>";
	
	echo "</td></tr></table>";
	echo "</form></center>";
}
else echo $cone->merror("Contraseña Invalida!!!",1);
?>
</body></html>