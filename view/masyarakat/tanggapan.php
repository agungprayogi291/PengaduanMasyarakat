<?php
session_start();
require '../../db.php';
  //simpan session username
 $name = $_SESSION['username'];

  //sudahkah login
if(!isset($_SESSION['login'])){


  header('location:../../index.php');
  exit;
}
//jika memiliki level 
if($_SESSION['level'] != ''){
  //pindah kembali login
  header('location:login.php');
  exit;
}

$sql = "SELECT * FROM pengaduan";
$execute = mysqli_query($conn,$sql);
$getdata = mysqli_fetch_All($execute,MYSQLI_ASSOC);


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>tanggapan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

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
    <link href="../../assets/dist/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Desa Multi</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid ">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="tanggapan.php">
              <span data-feather="users"></span>
            tanggapan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php">
              <span data-feather="bar-chart-2"></span>
              Pengaduan
            </a>
          </li>

        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Pengaduan :</h1>
        
      </div>
      <p>Welcome <b><?php echo $name ;?></b></p>
      <div class="container col-md-12">
      <table class="table table-hover">
        <thead class="bg-dark text-white ">
            <tr>
              <th>tanggal</th>
              <th>isi laporan</th>
              <th>bukti</th>
              <th>status</th>
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody >
          <?php foreach($getdata as $data) : 

            $status = $data['status'];
               if($status == '0')
            {
              //ubah menjadi terkirim
              $status = 'terkirim';

            }
            //status bernilai proses
            else if($status == 'proses')
            {
              //ubah menjadi terbaca
              $status = '<p class="text-primary">terbaca</p>';
            }
            else
            {
              //status ubah menjadi diterima
              $status = '<p class="text-success">ditanggapi</p>';
            }
            ?>
          <tr>

            <td><?php echo $data['tgl_pengaduan'];?></td>
            <td><?php echo $data['isi_laporan'];?></td>
            <td><img src="../../img/<?php echo $data['foto'];?>"  width ="50px"alt=""></td>
            <td class="text-success "><b><?php echo $status ;?></b></td>
            <td><a href="" class="text-danger">Delete</a></td>
          </tr>
        <?php endforeach ;?>
        </tbody>
      </table>
    </div>
    </main>

  
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="../../assets/dist/js/dashboard.js"></script></body>
</html>
