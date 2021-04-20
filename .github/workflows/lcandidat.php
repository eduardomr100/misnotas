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
$xnuipe=$_POST[xnuipe];
if ($xnuipe==""){
	$xnuipe=$_GET[xnuipe];
}
	echo "<center><Font color=#2d6a38><center><h3>Candidatos a Personero - ".$periodo."</h3></center></font>";
	if ($xnuipe!=""){
		$treg=explode("|",$cone->estudiantes($xnuipe));
		if ($treg[0]>0){
			echo "<center><h4>Bienvenido(a) ".$treg[2]." ".$treg[3]." - ".$treg[1]."<br><font color=red size=+1>Para elegir un candidato simplemente haz click sobre la foto del mismo</font></h4>";
			$result = $cone->ejecuta("SELECT nuipc, nombres, apellidos, foto FROM person.candidatos where periodo='".$periodo."' order by nuipc");
			echo "<table border=0 cellspacing=20 cellpadding=20><tr>";
			while ($rows=pg_fetch_array($result)){
				$nombres=$rows[1]."<br>".$rows[2];
				echo "<td align=center><a href='regvotos1.php?c1=".$treg[1]."&c2=".$rows[0]."' target='iframe'><img src=./images/".$rows[3]." width=180 height=180></a><br>".$nombres."</td>";
					//<a href='regvoto.php?c1=".$rows[0]."' target='iframe'><br>".htmlentities($nombres,0,'UTF-8')."</a></font><td>";
			}
			echo "</tr></table>";
		}
		else echo $cone->merror("Estudiante No registrado!!!",1);
	}
	else echo $cone->merror("Debe Ingresar un numero de identificaci&oacute;n!!!",1);
?>
</body>
</html>
