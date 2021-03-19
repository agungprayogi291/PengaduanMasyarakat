<?php 
session_start();
require '../../db.php';


  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $acount = mysqli_query($conn,"SELECT * FROM petugas WHERE username = '$username'");

    //cek username

    if(mysqli_num_rows($acount) === 1){
      $data = mysqli_fetch_assoc($acount);
        if($password == $data['password']){
          // create session
          $_SESSION['login'] =true;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['id_petugas'] = $data['id_petugas'];
          $_SESSION['level'] = $data['level'];
          if($data['level'] == 'admin'){
          header('location:index.php');
          
          }else if($data['level'] == 'petugas'){
            header('location:../petugas/index.php');
            
          }else{
            return false;
          }
        
        }
    }

    $error = true;

  }else if(isset($_POST['regist'])){
     header('location:../registrasi.php');
  }

?>
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
    <link href="../../assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
   
    <form class="form-signin" method="post" action="">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">username</label>
      <input type="text" id="inputEmail"  class="form-control" placeholder="username"   name="username" autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" >

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
     <?php if(isset($error)):?>
      <p class="text-danger ">username/password salah</p>
    <?php endif ;?>
</form>
</body>
</html>
