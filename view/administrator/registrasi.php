<?php
require '../../function.php';


if(isset($_POST['submit'])){
  if(registrasi($_POST) > 0){
    echo "<script>
      alert('user berhasil ditambahkan');
    </script>";
  }else{
    echo mysqli_error($conn);
  }
}

?>

<!doctype html>
<!-- registrasi untuk penambahan admin/petugas -->
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
      
      <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>

      <label for="nama" class="sr-only">nama petugas</label>
      <input type="text" id="nama" class="form-control" placeholder="nama petugas" required name="namapetugas" autofocus>

      <label for="username" class="sr-only">username</label>
      <input type="text" id="username" class="form-control" placeholder="username" required name="username" autofocus>

     <label for="telephone" class="sr-only">Telephone</label>
      <input type="text" id="telephone" class="form-control" placeholder="08xxxxxxxx." required name="telephone" autofocus>

      <select name="level" id="" class="form-control">
        <option value="admin">admin</option>
        <option value="petugas">petugas</option>
      </select>

       <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

       <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password entry" name="passwords" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</body>
</html>
