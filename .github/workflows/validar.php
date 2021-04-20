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
if($_GET[opc]==0 || $_GET[opc]==1){ //Registro Primaria
	echo "<form action=candidnew.php method=POST>";
	echo "<blockquote><Font color=#2d6a38><center><h3>Matricula de estudiantes Primaria - ".$periodo."</h3></center></font>";
	echo "<center><table border=0 cellspacing=0 cellpadding=0><tr>";
	echo "<td><b>Para matricular estudiantes debe ingresar la contraseña</b></td></tr>";
	echo "<tr><td>&nbsp;</td></tr>";
	echo "<tr><td><input type=password style='height: 49px; font-size:16pt;' name=xclave size=30></td></tr>";
	echo "<tr><td>&nbsp;</td></tr>";
	echo "<tr><td colspan=2 align=center><input type='image' name='imageField' src='./images/next.jpg'/></td>";
	echo "</tr></table><input type=hidden name=xopc value='.$_GET[opc].'>";
}
$fechas="select * from person.convoca where fapertura<='".$cone->fechac()."' and fcierre>='".$cone->fechac()."'";
$result=$cone->consulta($fechas);
if(pg_numrows($result)==0){
	echo $cone->merror("Lo sentimos, NO existen convocatorias vigentes",1);
}
else{
	if($_GET[opc]==2){ //Registro Secundaria
		echo "<form action=verresult.php method=POST>";
		echo "<blockquote><Font color=#2d6a38><center><h3>Matricula de Estudiantes Secundaria - ".$periodo."</h3></center></font>";
		echo "<center><table border=0 cellspacing=0 cellpadding=0><tr>";
		echo "<td><b>Para mirar los resultados debe ingresar una contraseña</b><br></td></tr>";
		echo "<tr><td>&nbsp;</td></tr>";
		echo "<tr><td><input type=password style='height: 49px; font-size:16pt;' name=xclave size=30></td></tr>";
		echo "<tr><td>&nbsp;</td></tr>";
		echo "<tr><td colspan=2 align=center><input type='image' name='imageField' src='./images/next.jpg'/></td>";
		echo "</tr></table>";
	}
}
?>
</body>
</html>
