<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="/css/template.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <link rel="stylesheet" href="/css/create_admin.css">
    </head>
    <body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title"><img src="/img/logo_sib.png" alt="SIB" width="67" height="61"></div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="/img/<?= session('user_photo') ?>" alt="">
                        <p><?= session('user_name') ?></p>
                    </center>
                    <li class="item">
                        <a href="/admin/dashboard" class="menu-btn">
                            <i class="fas fa-desktop"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Pengguna <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="/admin2"><i class="fa-solid fa-user-gear"></i><span>Admin</span></a>
                            <a href="/guru2"><i class="fas fa-chalkboard-teacher"></i><span>Guru</span></a>
                            <a href="/murid2"><i class="fa-solid fa-user-graduate"></i><span>Murid</span></a>
                            <a href="/walimurid2"><i class="fa-solid fa-user"></i><span>Walimurid</span></a>
                        </div>
                    </li>  
                    <li class="item">
                        <a href="/ibadahad2" class="menu-btn">
                        <i class="fa-solid fa-mosque"></i><span>Data Ibadah</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/profil/<?= session('user_id') ?>" class="menu-btn">
                        <i class="fa-solid fa-cog"></i><span>Profil</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/logout" class="menu-btn">
                        <i class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
                        </a>
                    </li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">
              <?= $this->renderSection('content'); ?>
            </div>
            <!--main container end-->
        </div>
        <!--wrapper end-->

        <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>

    </body>
</html>
      