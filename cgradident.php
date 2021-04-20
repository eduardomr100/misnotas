<html>
<head>
	<meta 'Content-Type: text/html; charset=ISO-8859-1'>
	<style>
		#estilo1{color:blue;background:blue;}
		#estilo2{color:green;background:green;}
		#estilo3{color:red;background:red;}
	</style>
</head>
<body>
<?php
include("./lib/ClassConec.php");
$cone= new clasdb;
$enlace=$cone->conectar();
$periodo=$cone->periodo();
$xdato=$_POST[xdato];
	echo "<blockquote><Font color=#2d6a38><center><h3>Resultados Elecciones de Personero - ".$periodo."</h3></center></font>";
	if ($xdato!=""){
		$result = $cone->ejecuta("SELECT nuipe, nombres, apellidos FROM person.estudiantes where periodo='".$periodo."' and (nombres like '%".strtoupper($xdato)."%' or apellidos like '%".strtoupper($xdato)."%')");
		echo "<center><table border=0 cellspacing=3 cellpadding=3>";
		while ($rows=pg_fetch_array($result)){
			$contar++;
			if ($contar%2!=0) $color="bgcolor=#d9e1f2";
			else $color="bgcolor=#eff2f8";
			echo "<tr ".$color."><td>".$rows[0]."</td><td>".$rows[1]."</td><td>".$rows[2]."</td><td><a href=./lcandidat.php?xnuipe=".$rows[0].">Votar</a></td></tr>";
		}
		echo "</table>";
	}
	else echo $cone->merror("Estudiante No registrado!!!",1);
?>
</body>
</html>