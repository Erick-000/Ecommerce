<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My ecommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b>My</b> ecommerce
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Logueate</p>

      <?php
      if(isset($_REQUEST['login'])){
        session_start();
        $email = $_REQUEST['email'] ?? ''; // Capturar el valor del campo de email
        $pasword = $_REQUEST['pass'] ?? ''; // Capturar el valor del campo de contraseña
        $pasword = md5($pasword);
        include_once "db_ecommerce.php";
        $con = mysqli_connect($host, $user, $pass, $db);
        $query = "SELECT id,email,nombre from usuarios where email ='" . $email . "' and pass = '" .$pasword. "';  ";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($res);
        if($row > 0 ){ //Si tiene datos va a trabajar con la sessión
          $_SESSION['id'] = $row['id'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['nombre'] = $row['nombre'];
          // Enviar del formulario hacia el panel
          header("location: panel.php");
          exit; // Salir del script después de la redirección
        } else {
          ?>
          <div class="alert alert-danger" role="alert">
            Usuario o contraseña inválidos <img src="images/no-valido.png" width="200px">
          </div>
          <?php
        }
      }
      ?>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email"> <!-- Agregar el atributo name="email" -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
