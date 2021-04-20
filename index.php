<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="./estilos/dropdown.css" type="text/css" />
	<script type="text/javascript" src="./js/dropdown.js"></script>
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
<![endif]-->
<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
</head>
<body>
<center>
<table width=98% border=0 cellspacing=0 cellpadding=0>
<tr><td><img src="images/header.png" width="100%" height="200"></td></tr>
<tr bgcolor=#498a48><td>
	<div>
	<dl class="dropdown">
	  <dt id="one-ddheader" onmouseover="ddMenu('one',1)" onmouseout="ddMenu('one',-1)"  onclick="self.location.href='index.php'">Inicio</dt>
	</dl>
	<dl class="dropdown">
	  <dt id="three-ddheader" onmouseover="ddMenu('four',1)" onmouseout="ddMenu('four',-1)" onclick="iframe.location.href='./validar.php?opc=0'">Matricular</dt>
	  <!--<dd id="six-ddcontent" onmouseover="cancelHide('six')" onmouseout="ddMenu('six',-1)"></dd>-->
	</dl>
	<dl class="dropdown">
	  <dt id="three-ddheader" onmouseover="ddMenu('three',1)" onmouseout="ddMenu('three',-1)" onclick="iframe.location.href='./cdocident0.php?xper=1'">Notas P1</dt>
	  <!--<dd id="six-ddcontent" onmouseover="cancelHide('six')" onmouseout="ddMenu('six',-1)"></dd>-->
	</dl>
	<dl class="dropdown">
	  <dt id="three-ddheader" onmouseover="ddMenu('three',1)" onmouseout="ddMenu('three',-1)" onclick="iframe.location.href='./cdocident0.php?xper=2'">Notas P2</dt>
	  <!--<dd id="six-ddcontent" onmouseover="cancelHide('six')" onmouseout="ddMenu('six',-1)"></dd>-->
	</dl>
	<dl class="dropdown">
	  <dt id="three-ddheader" onmouseover="ddMenu('three',1)" onmouseout="ddMenu('three',-1)" onclick="iframe.location.href='./cdocident0.php?xper=3'">Notas P3</dt>
	  <!--<dd id="six-ddcontent" onmouseover="cancelHide('six')" onmouseout="ddMenu('six',-1)"></dd>-->
	</dl>
	<dl class="dropdown">
	  <dt id="two-ddheader" onmouseover="ddMenu('two',1)" onmouseout="ddMenu('two',-1)" onclick="iframe.location.href='./consultar0.php'">Consultar</dt>
	  <!--<dd id="six-ddcontent" onmouseover="cancelHide('six')" onmouseout="ddMenu('six',-1)"></dd>-->
	</dl>	
	<dl class="dropdown">
	  <dt id="five-ddheader" onmouseover="ddMenu('five',1)" onmouseout="ddMenu('five',-1)" onclick="iframe.location.href='./validar.php?opc=1'">Resultados</dt>
	  <!--<dd id="six-ddcontent" onmouseover="cancelHide('six')" onmouseout="ddMenu('six',-1)"></dd>-->
	</dl>	
	</div>
</td></tr>
<tr><td>
<iframe width="100%" height="500" frameborder="0" scrolling="auto" name="iframe" id="iframe" src="body.php"></iframe>
<!--<iframe width="1010" height="120" frameborder="0" scrolling="no" name="foot" id="foot" src="foot.php"></iframe>-->
</td></tr>
</table>
</center>
</body>
</html>
