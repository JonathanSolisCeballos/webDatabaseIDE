
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="home.css">
  <title>Home | Mai Síkuel Workbench</title>
</head>
<body>
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>' method="POST">
  <div class="container-query mt-5 container">
      <h2 class="font-weight-bold text-center pt-4">Console</h2>
      <div class="content mt-5 mx-auto">
<input class="input" id="form-one" type="text" placeholder="Ingresa tu query SQL aquí..." name='input_query'>
<span class="border"></span>
</div>
<div class='btnContainer'>
<input class="btn btn-primary m-4" type="submit" value="Submit" name='submit'>
      </div>
    </div>
</form>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    try{
      if(isset($_POST['input_query'])){
        $conection = new PDO('mysql:host=127.0.0.1;dbname=cpremier','superboy','maisikuel');
        // echo 'conexion hecha bien maestro';
        $statement=$conection->prepare($_POST['input_query']);
        $statement->execute();
        $result=$statement->fetchAll();
        $number_of_rows = $statement->rowCount();
      
        echo "<pre>";
        print_r($result);
        echo "</pre>";


        echo "<div class='alert alert-success mx-4' role='alert'> Ok, ". $number_of_rows . " rows affected. </div>";
        $conection = null;
      }
    }catch (PDOException $error){
        $mensaje=$error->getMessage();
        echo '<h2>'.$mensaje.'</h2>';
    }
}
?>