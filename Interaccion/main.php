<?php
session_start();
if($_SESSION['usuario']){
  $conexion = mysqli_connect("127.0.0.1:3306",$_SESSION['usuario'],$_SESSION['password'],'information_schema'); 
}else{
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Nuestro propio SGBD de MyQL">
  <meta name="author" content="The bestos">
  <title>Maí Sikuel | Bienvenidos</title>
  <link href="https://fonts.googleapis.com/css?family=Ranga|Sedgwick+Ave" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./main.css">
  <link rel="stylesheet" href="styles2.css">
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
  integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
  </script>

</head>

<body>
  <div class="wrapper">
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Maí sikuel</h3>
      </div>
      <ul class="list-unstyled components">
        <p>Bienvenido</p>
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle pl-1 color1" >Servidor 127.0.0.1</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          <li>
            <a href="#pageSubmenu10" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle pl-2 color2">Bases de datos</a>
            <ul class="collapse list-unstyled" id="pageSubmenu10">
              <li>
                <?php 
                $consulta1 = '';
                function laConsulta1(){
	              global $conexion, $consulta1;
	              $sql = 'SELECT DISTINCT(TABLE_SCHEMA) FROM `TABLES` WHERE  TABLE_SCHEMA != "information_schema" AND TABLE_SCHEMA != "mysql"  AND TABLE_SCHEMA != "performance_schema" AND TABLE_SCHEMA != "phpmyadmin"';
                return $conexion->query($sql);
                }
                $consulta1 = laConsulta1();
                $count = 1;
                while($database = $consulta1->fetch_assoc()) //Creamos un array asociativo con fetch_assoc 
                {
               $db= $database['TABLE_SCHEMA'];
               
               $count++;
               echo 
               "<li>
               <a href='#pageSubmenu".$count."' aria-expanded='false' class='dropdown-toggle pl-3 color3' data-toggle='collapse' target='_self' onclick='window.location.href = `./main.php?bd=$db`'>$db</a>
               <ul class='collapse list-unstyled' id='pageSubmenu".$count."'>
               <a href='#pageSubmenu2".$count."' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle pl-4 color4'>Tablas</a>
                   <ul class='collapse list-unstyled' id='pageSubmenu2".$count."'>
                   
                  <li>
                  
                  <a class='color5 pl-5'> </a></li>
                  
                   </ul>
                   
                   <a href='#pageSubmenu7".$count."' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle pl-4 color4'>Vistas</a>
                   <ul class='collapse list-unstyled' id='pageSubmenu7".$count."'>
                   <li><a class='color5 pl-5'> </a></li>
                   
                   </ul>
                   
                   </ul>
               </li>";
               ?>
               <?php  
               }
               ?>
           </ul>
          </li>
      </ul>
    </nav>
     <!-- Page Content  -->
     <div id="content">

       <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">

           <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Opciones</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index2.php"><i class="fas fa-pencil-alt"></i>
                    Interacción</a>
                  </li>
                </ul>
              </div>
    </div>
  </nav>
  
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?'.http_build_query($_GET); ?>" method="POST">
    <div class="container-query mt-5 container">
      <h2 class="font-weight-bold text-center pt-4">Console</h2>
      <div class="content mt-5 mx-auto">
        <textarea class="input" id="form-one"  placeholder="Ingresa tu query SQL aquí..." name='input_query'></textarea>
<span class="border"></span>
</div>
<!-- <input type="hidden" name="bd" value="<?php echo htmlspecialchars($_GET['bd']);?>"> -->
<div class='btnContainer'>
<input class="btn btn-primary m-4" type="submit" value="Submit" name='submit'>
      </div>
    </div>
  </form>
  <?php

   
  
  if (!isset($_GET['bd']))
   {
    // echo "<h3>IMPORTANTE:  Se espera recibir 1 parametros via GET. Se debe agregar'?bd=dbname'...</h3>";
    header('location:main.php?bd=information_schema');
  }else{
    $base= $_GET['bd']; 
  }
if(isset($_POST['submit'])){
  try{
    if(isset($_POST['input_query'])){
        $conection = new PDO('mysql:host=127.0.0.1;dbname=cpremier',$_SESSION['usuario'],$_SESSION['password']);
        // echo 'conexion hecha bien maestro';
        $sql=($_POST['input_query']);
        $statement=$conection->prepare($_POST['input_query']);
        $statement->execute();
        $result=$statement->fetchAll();
        $number_of_rows = $statement->rowCount();
      /*
      echo "<pre>";
      print_r($result);
      echo "</pre>";
      */
      

        echo "<div class='alert alert-success mx-4 my-4' role='alert'> Ok, ". $number_of_rows . " rows affected. </div>";
        $conection = null;
      }
    }catch (PDOException $error){
        $mensaje=$error->getMessage();
        echo '<h2>'.$mensaje.'</h2>';
    }
if($result>0){

  // $conexion = mysqli_connect("127.0.0.1:3306",'root','1510','cpremier');  /* conexion a BD  */
    $conexion->select_db($base);
   if(!$result = mysqli_query($conexion, $sql)) {    /* ejecucion del query  */
     echo "<h3><center> error en SQL, ¡No regresó resultados o no puedo ejecutar el Query  para formar la tabla!</center></h3>";
     var_dump($conexion);
     echo "<center>La sentencia ejecutada fue: ".$sql." </center>";
    //  die(); 
   }

   
  
   $rawdata = array();   
   $i=0;
   
  /* recuperacion fila x fila del resulset */
   while($row = mysqli_fetch_array($result))  
   {   $rawdata[$i] = $row;  /* almacen en vector de cada registro  */
       $i++;
   }
   
   $columnas = count($rawdata[0])/2;
   $filas = count($rawdata);
   echo "<center><h4>Filas: ".$filas.", Columnas: ".$columnas."  </h4><br>Ejecución del Query bien hecha. <br>".$sql." </center>";
   echo '<table width="90%" border="1" style="text-align:center; margin-left: 4% ;">';   /* inicio de la tabla  */
   echo "<th><b>#</b></th>";   /* primer ciclo para imprimir cabeceras   */
   for($i=1;$i<count($rawdata[0]);$i=$i+2){
      next($rawdata[0]);
      echo "<th><b>".key($rawdata[0])."</b></th>";
      next($rawdata[0]);
   }
   for($i=0;$i<$filas;$i++){   /* segundo ciclo para enviar los datos de cada registro */
      echo "<tr><td>".($i+1)."</td>";   /* inicio del renglon  */
      for($j=0;$j<$columnas;$j++){
         echo "<td>".$rawdata[$i][$j]."</td>";  /* columna x columna   matriz[fila i,columna j] */
      }
      echo "</tr>\n";   /* fin del renglon  */
   }
   echo "</table><HR/><button id='btnExportToCSV' class='btn btn-outline-dark'>Exportar a CSV</button>\n\n\n";   /*fin de la tabla   */

   
  

}

   



  }

 


?>


</div>
  </div>
  <script defer src="./exportResultToCSV.js"></script>
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
  </script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>
</body>
<footer>
  <p>Maí Sikuel, Copyright &copy; 2019</p>
</footer>

</html>
