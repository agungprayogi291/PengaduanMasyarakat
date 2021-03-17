<?php
require 'db.php';


function registrasi($data){
  global $conn;

  $namapetugas = strtolower(stripslashes($data['namapetugas']));
  $username =strtolower(stripslashes($data['username']));
  $level = strtolower(stripslashes($data['level']));
  $telp = strtolower(stripslashes($data['telephone']));
  $password =$data['password'];
  $passwords = $data['passwords'];
  
  // cek akun
  $ceking = mysqli_query($conn,"SELECT * FROM petugas WHERE username='$username'");
  if(mysqli_fetch_All($ceking)){
    echo "<script>alert('akun sudah terdaftar')</script>";
    return false;
  }


  // cek password 
  if($password != $passwords){
    echo
    "
    <script>
    alert('cek for password');
    </script>
    ";
    return false;
  }

  // enkripsi password
  $sql = "INSERT INTO petugas VALUES('','$namapetugas','$username','$password','$telp','$level')";
  $execute = mysqli_query($conn,$sql);
  header('location:petugas/index.php');

}

function daftar($data){
  global $conn;
  $nik = $data['nik'];
  $nama = $data['nama'];
  $username = $data['username'];
  $telephone = $data['telephone'];
  $password = $data['password'];
  $password2 = $data['password2'];

  //cek akun
  $ceking = mysqli_query($conn,"SELECT * FROM masyarakat WHERE username ='$username' ");
  if(mysqli_fetch_All($ceking)){
    echo "<script> alert('akun telah terdaftar');</script>";
    return false;
  }

  // cek password
  if($password != $password2){
    echo "<script> alert('password tidak sama')</script>";
  }
  $sql ="INSERT INTO masyarakat(nik,nama,username,password,telp) VALUES('$nik','$nama','$username','$password','$telephone')";
  $execute = mysqli_query($conn,$sql);
  
  header('location:index.php  ');

}

