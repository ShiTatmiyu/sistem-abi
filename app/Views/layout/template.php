<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn navbar-brand" id="closed" onclick="closeNav()">&times;</a>
      <a href="#">Dashboard</a>
      <div class="dropdown">
        <button class="dropbtn">Pengguna</button>
        <div class="dropdown-content">
          <a href="#">Admin</a>
          <a href="#">Guru</a>
          <a href="#">Murid</a>
          <a href="#">Wali Murid</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Ibadah</button>
        <div class="dropdown-content">
          <a href="#">Harian</a>
          <a href="#">Mingguan</a>
        </div>
      </div>
      <a href="#">Logout</a>
    </div>

    <div id="main">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="openbtn" id="openify" onclick="openNav()">&#9776;</button>
          <a class="navbar-brand" href="#">Sistem Informasi Ibadah Harian</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          </div>
        </div>
      </nav>
      <?= $this->renderSection('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
      /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
      function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        var x = document.getElementById("openify");
        if (x.style.display === "none") {
          x.style.display = "block";
          } else {
          x.style.display = "none";
        }
        var x = document.getElementById("closed");
        if (x.style.display === "block") {
          x.style.display = "none";
          } else {
          x.style.display = "block";
        }
      }

      /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
      function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        var x = document.getElementById("openify");
        if (x.style.display === "block") {
          x.style.display = "none";
          } else {
          x.style.display = "block";
        }
        var x = document.getElementById("closed");
        if (x.style.display === "none") {
          x.style.display = "block";
          } else {
          x.style.display = "none";
        }
      } 
    </script>
  </body>
</html>