<?php
session_start();
if($_SESSION['usuario']){

}else{
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head> <!-- No se vera en la pagina-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Nuestro propio SGBD de MyQL">
	<meta name="author" content="The bestos">
	<title>Maí Sikuel | Bienvenidos</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link href="https://fonts.googleapis.com/css?family=Ranga|Sedgwick+Ave" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
<header>
	<div class="contenedor contenedor_header">
    <div id="marca">
    	<h1><span class="resaltado">Maí Sikuel</span> SGBD </h1>
    </div>
    <div class="text_black">
      <h2 class="texto_bienvenido">Bienvenido <?php echo $_SESSION['usuario'];?></h2>
    </div>
		<nav>
			<ul> 
                <li class="actual"><a href="./index.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="Interacción"><a href="./index2.php"><i class="fas fa-pencil-alt"></i>Interacción</a></li>
                <a>Servidor: 127.0.0.1</a>
                <li class="Interacción"><a href="./destroy.php"><i class="fas fa-pencil-alt"></i>Cerrar Sesión</a></li>
            </ul>
            
        </nav>
	</div>
</header>
<section id="cabecera">
    <div class="contenedor">
    <!-- titulo--><h1>Profesionales Expertos en Sistemas de gestión de Bases de datos</h1>
    </div>
    </section>
<footer>
	<p>Maí Sikuel, Copyright &copy; 2019</p>
</footer>
</body>
</html>