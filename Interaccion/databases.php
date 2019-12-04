<?php 
$conexion = mysqli_connect("127.0.0.1:3306",'root','1510','information_schema'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

</head>

<body>
            <div>
        <div>
            <table> 
                <thead>
                  <ul>
                  <a>BASES DE DATOS</a>
                   <!-- <th>TABLA</th>-->
                   </ul>
                </thead>
                <tbody>
                <!-- Generamos el listado vaciando las variables de la consulta en la tabla -->
                  <?php 
                  $consulta = '';
                  function laConsulta(){
	                global $conexion, $consulta;
	                $sql = 'SELECT DISTINCT(TABLE_SCHEMA) FROM `TABLES` WHERE  TABLE_SCHEMA != "information_schema" AND TABLE_SCHEMA != "mysql"  AND TABLE_SCHEMA != "performance_schema" AND TABLE_SCHEMA != "phpmyadmin"';
                    return $conexion->query($sql);
                }
                $consulta = laConsulta();
                
                  while($databaseT = $consulta->fetch_assoc()) //Creamos un array asociativo con fetch_assoc 
                  {
                    $db= $databaseT['TABLE_SCHEMA'];
                    echo "<ul><li><a href='/Proyecto/Interaccion/tables.php?bd=$db&tabla=asignacion'>$db</a></li></ul>"
                  ?>

                     <!--  <ul> 
                      <li><a href=<?php/*  echo "/Proyecto/Interaccion/tables.php?bd=".$db."tabla=asignacion"; */?>
      
                      <?php /* echo $databaseT['TABLE_SCHEMA']; */ ?></a></li>
                      </ul> -->
                  <?php
                  
                  //$array = [$databaseT];
                  //echo $array;
                  }
                  ?>
                
                </tbody>
              </table>   
        </div>
        
    </div>

</body>

</html>