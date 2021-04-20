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
$fechas="select * from person.convoca where fapertura<='".$cone->fechac()."' and fcierre>='".$cone->fechac()."'";
$result=$cone->consulta($fechas);
if(pg_numrows($result)==0){
	echo $cone->merror("Lo sentimos, NO existen convocatorias vigentes",1);
}
else{	
	echo "<blockquote> <Font color=#2d6a38><center><h3>Elecciones de personero - ".$periodo."</h3></center></font>";
	//<img src='./images/separadr.png'><br>";
	echo "<form action=lcandidat.php method=POST>";
	echo "<center><table border=0 cellspacing=0 cellpadding=0><tr>";
		echo "<td><img src=./images/estudiantes.png width=200 height=200></td><td>&nbsp;&nbsp;</td><td><h3>Para iniciar el proceso de votación, <br>ingrese su numero de identificaci&oacute;n:</h3>
		<input type=text style='height: 49px; font-size:16pt;' name=xnuipe size=30><br><br><input type='image' name='imageField' src='./images/next.jpg' />";
		//<input type='submit' name=enviar value='Siguiente'></td>";
	echo "</tr></table></form></center>";
}
?>
</body>
</html>
