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
$xaniolec=$cone->periodo();
$xasig=$_POST[xasig];
$xgrado=$_POST[xgrado];
$xper=$_POST[xper];
$xidestud=$_POST[xidestud];


	echo "<blockquote><Font color=#2d6a38><center><h3>Registrar Notas - Periodo ".$xper."</h3></center></font>";

	$cad="SELECT idactiv, notap FROM notas.estudiante natural join notas.matricula natural join notas.notasp natural join notas.sede where ";
	if ($xidestud!=-1) $cad.=" idestud='".$xidestud."'";
	if ($xasig!=-1) $cad.=" and idasignat='".$xasig."'";
	if ($xgrado!=-1) $cad.=" and idgrado='".$xgrado."'";
	if ($xper!=-1) $cad.=" and idper='".$xper."'";
	$cad.=" and aniolec=".$xaniolec." order by idactiv";
	//echo $cad;
	$result = $cone->ejecuta($cad);
	if (pg_num_rows($result) != 0){
		echo "<center>";
		echo "<table border=0 cellspacing=2 cellpadding=1>";
		echo "<tr><td><b>Área:</b></td><td>".$cone->asignaturas($xasig)."</td>";
		echo "<td><b>Grado:</b></td><td>".$cone->grados($xgrado)."</td></tr>";
		echo "<tr><td><b>Estudiante:</b></td><td>".$cone->estudiante($xidestud)."</td>";
		echo "<td><b>Periodo:</b></td><td>".$xper."</td></tr>";
		echo "</table>";
		
		echo "<table border=0 cellspacing=3 cellpadding=3 with=70%>";
		
		echo "<tr bgcolor=#4b668f><th>No.</th><th>Actividad</th><th>Nota</th></tr>";
		while ($rows=pg_fetch_array($result)){
			$contar++;
			if ($contar%2!=0) $color="bgcolor=#d9e1f2";
			else $color="bgcolor=#eff2f8";
			echo "<tr ".$color."><td>".$contar."</td><td>".$cone->nactividad($rows[0])."</td><td>".$rows[1]."</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "<font color=red><h4>No se encontraron resultados</h4></font>";
	}
?>
</body>
</html>