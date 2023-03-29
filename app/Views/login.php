<html>
    <head>
        <title>Login</title>
        <!-- <link rel="stylesheet" href="css/login.css"> -->
        <link rel="stylesheet" href="/css/login.css">
	    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->    
    </head>
    <body>
        <?php 
            $session = session();
            $login = $session->getFlashdata('login');
            $username = $session->getFlashdata('username');
            $password = $session->getFlashdata('password');
        ?>
        
        
        <?php if($login){ ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $login?>
            </div>
            <?php } ?>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="myform form ">
                            <div class="logo mb-3">
                                <div class="col-md-12 text-center">
                                    <h1 class="mb-2">Login</h1>
                                    <span class="ul"></span>
                                </div>
                            </div>
                            <form method="post" action="/auth/attempt">
                                <div class="wrap">
                                    <input type="username" name="username" class="input" placeholder="username">
                                    <span class="underline"></span><br>
                                    <?php if($username){ ?>
                                    <div class="alert alert-danger" role="alert">
                                    <?php echo $username?>
                                    </div>
                                    <?php } ?> 
                                </div>
                            <div class="wrap">
                                <input type="password" name="password" class="input" placeholder="Password">
                                <span class="underline"></span><br>
                                <?php if($password){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $password?>
                                    </div>
                                    <?php } ?>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn-a">Login</button>
                            </div>
                        </form>
				    </div>
                </div>
            </div>
        </div>
    </body>
    </html>