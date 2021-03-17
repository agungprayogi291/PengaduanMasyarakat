<?php
// terhubung file function.php->akses method-method;
require '../../function.php';


// submit true
if(isset($_POST['submit'])){
  if(daftar($_POST) > 0 ){
      header('Location:login.php');
  }else{
    // error
    echo mysqli_error($conn);
  }
}


?>
<!-- file registrasi -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="">
      
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="nama" class="sr-only">nama</label>
      <input type="text" id="nama" class="form-control" placeholder="nama"  name="nama"required autofocus>

      <label for="username" class="sr-only">username</label>
      <input type="text" id="username" class="form-control" placeholder="username." required name="username" autofocus>

      <label for="nik" class="sr-only">nik</label>
      <input type="text" id="nama" class="form-control" placeholder="xxxxx"  name="nik"required autofocus>

      <label for="telephone" class="sr-only">telp</label>
      <input type="text" id="telephone" class="form-control" placeholder="08xxxxxxx" required name="telephone" autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

       <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword agin" class="form-control" placeholder="Password" name="password2" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">submit</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</body>
</html>
