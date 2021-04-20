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
$xgrado=$_POST[xgrado];
$xasig=$_POST[xasig];
$xsede=$_POST[xsede];
$xper=$_POST[xper];
$xactiv=$_POST[xactiv];

	echo "<blockquote><Font color=#2d6a38><center><h3>Registrar Notas - Periodo ".$xper."</h3></center></font>";

	$cad="SELECT id, idmatri, idestud, apestud, nomestud, notap FROM notas.estudiante natural join notas.matricula natural join notas.notasp natural join notas.sede where ";
	if ($xgrado!=-1) $cad.=" idgrado='".$xgrado."'";
	if ($xsede!=-1) $cad.=" and idsede='".$xsede."'";
	if ($xasig!=-1) $cad.=" and idasignat='".$xasig."'";
	if ($xactiv!=-1) $cad.=" and idactiv='".$xactiv."'";
	if ($xper!=-1) $cad.=" and idper='".$xper."'";
	$cad.=" and aniolec=".$periodo. "order by apestud, nomestud";
	//echo $cad;
	$result = $cone->ejecuta($cad);
	if (pg_num_rows($result) != 0){
		echo "<center>";
		echo "<table border=0 cellspacing=2 cellpadding=1>";
		echo "<tr><td><b>Área:</b></td><td>".$cone->asignaturas($xasig)."</td>";
		echo "<td><b>Actividad:</b></td><td>".$cone->nactividad($xactiv)."</td></tr>";
		echo "<tr><td><b>Grado:</b></td><td>".$cone->grados($xgrado)."</td>";
		echo "<td><b>Sede:</b></td><td>".$cone->sedes($xsede)."</td></tr>";
		echo "</table>";
		
		echo "<form action=cdocidents.php method=POST>";
		echo "<table border=0 cellspacing=3 cellpadding=3>";
		
		echo "<tr bgcolor=#4b668f><th>No.</th><th>Idnota</th><th>Matrícula</th><th>Identificación</th><th>Apellidos</th><th>Nombres</th><th>Nota</th></tr>";
		while ($rows=pg_fetch_array($result)){
			$contar++;
			if ($contar%2!=0) $color="bgcolor=#d9e1f2";
			else $color="bgcolor=#eff2f8";
			echo "<tr ".$color."><td>".$contar."</td><td>".$rows[0]."</td><td>".$rows[1]."</td><td>".$rows[2]."</td><td>".$rows[3]."</td><td>".$rows[4]."</td>";
			echo "<td><input type=text name=notasx[] size=3 value=".$rows[5]."></td></tr>";
			echo "<input type=hidden name=xidnp[] value='".$rows[0]."'>";
			echo "<input type=hidden name=xcodmat[] value='".$rows[1]."'>";
		}
		echo "</table>";
		echo "<input type=hidden name=xasig value='".$xasig."'>";
		echo "<input type=hidden name=xactiv value='".$xactiv."'>";
		echo "<input type=hidden name=xgrado value='".$xgrado."'>";
		echo "<input type=hidden name=xsede value='".$xsede."'>";
		echo "<input type=hidden name=xper value='".$xper."'>";
		echo "<input type=hidden name=aniolec value='".$periodo."'>";
		echo "<input type=hidden name=xop value='UPD'>";
		echo "<input type='submit' name='Guardar' value='Guardar'/>";
		echo "</form>";
	}
	else {
		$cad="SELECT idmatri, idestud, apestud, nomestud FROM notas.estudiante natural join notas.matricula natural join notas.sede where ";
		if ($xgrado!=-1) $cad.=" idgrado='".$xgrado."'";
		if ($xsede!=-1) $cad.=" and idsede='".$xsede."'";
		$cad.=" and aniolec=".$periodo."order by apestud, nomestud";
		//echo $cad;
		$result = $cone->ejecuta($cad);
		
		echo "<center>";
		echo "<table border=0 cellspacing=2 cellpadding=1>";
		echo "<tr><td><b>Área:</b></td><td>".$cone->asignaturas($xasig)."</td>";
		echo "<td><b>Actividad:</b></td><td>".$cone->nactividad($xactiv)."</td></tr>";
		echo "<tr><td><b>Grado:</b></td><td>".$cone->grados($xgrado)."</td>";
		echo "<td><b>Sede:</b></td><td>".$cone->sedes($xsede)."</td></tr>";
		echo "</table>";
		
		echo "<form action=cdocidents.php method=POST>";
		echo "<table border=0 cellspacing=3 cellpadding=3>";
		echo "<tr bgcolor=#4b668f><th>No.</th><th>Matrícula</th><th>Identificación</th><th>Apellidos</th><th>Nombres</th><th>Nota</th></tr>";
		while ($rows=pg_fetch_array($result)){
			$contar++;
			if ($contar%2!=0) $color="bgcolor=#d9e1f2";
			else $color="bgcolor=#eff2f8";
			echo "<tr ".$color."><td>".$contar."</td><td>".$rows[0]."</td><td>".$rows[1]."</td><td>".$rows[2]."</td><td>".$rows[3]."</td>";
			echo "<td><input type=text name=notasx[] size=3 value=0.0></td></tr>";
			echo "<input type=hidden name=xcodmat[] value='".$rows[0]."'>";
		}
		echo "</table>";
		echo "<input type=hidden name=xasig value='".$xasig."'>";
		echo "<input type=hidden name=xactiv value='".$xactiv."'>";
		echo "<input type=hidden name=xgrado value='".$xgrado."'>";
		echo "<input type=hidden name=xsede value='".$xsede."'>";
		echo "<input type=hidden name=xper value='".$xper."'>";
		echo "<input type=hidden name=aniolec value='".$periodo."'>";
		echo "<input type=hidden name=xop value='INS'>";
		echo "<input type='submit' name='Guardar' value='Guardar'/>";
		echo "</form>";
	}
?>
</body>
</html>