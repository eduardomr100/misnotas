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
	
	echo "<center><Font color=#2d6a38><center><h3>Registro de Notas - ".$periodo."</h3></center></font>";
	//<img src='./images/separadr.png'><br>";
/*	$result = $cone->ejecuta("SELECT idgrado, nomgrado FROM notas.grados order by idgrado");

	echo "<table border=0 cellspacing=20>";
	//echo "<tr><td colspan=4 align=center><Font color=blue size=+1>Para mirar las propuestas de cada candidato haz click en la foto de cada uno de ellos</font><br>";
	//echo "<Font color=red size=+1>Para Votar has click en el bot&oacute;n <b>Votemos</b> en la parte superior</img></td></tr><tr>";
	$cont=0;
	while ($rows=pg_fetch_array($result)){
		$nombres=$rows[1]."<br>".$rows[2];
		$cont++;
		if ($cont==5) echo "</tr><tr>";
		echo "<td align=center><a href=./".$rows[4]."><img src=./images/".$rows[3]." width=180 height=180></a><br>".$nombres."</td>";
			//<a href='regvoto.php?c1=".$rows[0]."' target='iframe'><br>".htmlentities($nombres,0,'UTF-8')."</a></font><td>";
	}
	echo "</tr></table>";
*/
?>
</body>
</html>
