<?php session_start();
if(isset($_SESSION['usuario']))
{
    header('location:home.php');
}
else{
  if(isset($_POST['submit'])){
      try{
        if(isset($_POST['username']) && isset($_POST['password'])){
          $conection = new PDO('mysql:host=127.0.0.1',$_POST['username'],$_POST['password']);
            header('location:home.php');
            $_SESSION['usuario']=$_POST['username'];
            $_SESSION['password']=$_POST['password'];
        }
      }catch (PDOException $error){
          $mensaje=$error->getMessage();
          echo '<h2>'.$mensaje.'</h2>';
      }
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="sign_up.css">
    <title>MAI SIKUEL</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Inicia Sesión</h3>
                    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>' method="POST">
                      <div class="form-label-group">
                        <input type="text" id="username" class="form-control" placeholder="Email address" name='username'  required autofocus>
                        <label for="inputEmail">Nombre de usuario</label>
                      </div>
      
                      <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name='password' required>
                        <label for="inputPassword">Contraseña</label>
                      </div>
      
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
                      </div>
          
                      <button type="submit" name="submit" id="submit" value="Evaluar" class='btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2'>Iniciar Sesion</butto>
                      <div class="text-center">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>