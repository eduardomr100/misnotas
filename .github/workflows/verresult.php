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
$xclave=$_POST[xclave];
	echo "<blockquote><Font color=#2d6a38><center><h3>Resultados Elecciones de Personero - ".$periodo."</h3></center></font>";
	if ($xclave=="eslaclave" || $xclave=="ESLACLAVE"){
		$treg=explode("|",$cone->estudiantes($xnuipe));
		$result = $cone->ejecuta("SELECT count(nuipc) as cant, nuipc FROM person.votacion where periodo='".$periodo."' group by nuipc order by cant desc");
		echo "<center><table border=0 cellspacing=20 cellpadding=20><tr valign=bottom>";
		while ($rows=pg_fetch_array($result)){
			$tot=$rows[0]*2;
			$cont++;
			if ($cont==1) echo "<td align=center>".$rows[0]."<br><div style='color:blue;background:blue;height:".$tot.";'></div>".$cone->vercandidato($rows[1])."</td>";
			if ($cont==2) echo "<td  align=center>".$rows[0]."<br><div style='color:green;background:green;height:".$tot.";'></div>".$cone->vercandidato($rows[1])."</td>";
			if ($cont==3) echo "<td  align=center>".$rows[0]."<br><div style='color:red;background:red;height:".$tot.";'></div>".$cone->vercandidato($rows[1])."</td>";
			if ($cont==4) echo "<td  align=center>".$rows[0]."<br><div style='color:purple;background:purple;height:".$tot.";'></div>".$cone->vercandidato($rows[1])."</td>";
		}
		$sql1="select count(nuipe) from person.estudiantes where nuipe not in(select nuipe from person.votacion where periodo='".$periodo."') and periodo='".$periodo."'";
		$result = $cone->ejecuta($sql1);
		while ($rows=pg_fetch_array($result)){
			$tot1=$rows[0]*2;
			echo "<td  align=center>".$rows[0]."<br><div style='color:yellow;background:yellow;height:".$tot1.";'></div>ESTUDIANTES QUE<br>NO HAN VOTADO</td>";
		}
		echo "</tr></table>";
	}
	else echo $cone->merror("Contraseña Invalida!!!",1);
?>
</body>
</html>