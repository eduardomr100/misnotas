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
	//<img src='./images/separadr.png'><br>";
	echo "<form action=cdocident.php method=POST>";
	echo "<center><table border=0 cellspacing=0 cellpadding=0><tr>";
		echo "<td><img src=./images/estudiantes.png width=200 height=200></td><td>&nbsp;&nbsp;</td>
		<td><h3>Por favor ingrese su primer nombre<br>o su primer apellido:</h3>
		<input type=text style='HEIGHT: 49px; font-size:16pt;' name=xdato size=20><br><br><input type='image' name='imageField' src='./images/search.jpg' />";
		//<input type='submit' name=enviar value='Buscar'></td>";
	echo "</tr></table></form></center>";
?>
</body>
</html>
