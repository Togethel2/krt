<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Project</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    

  </head>

  <body>
    
      <!-- container section start -->
  <section id="container" class="">
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo">กรมราชทัณฑ์ <span class="lite">สารบัญ</span></a>
            <!--logo end-->
            
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="">
                            </span>
                            <span class="username">เข้าสู่ระบบ</span>
                            <b class="caret"></b>
                        </a>
                        
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
            
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">

         <!-- Zone write data -->

          <section class="wrapper">
              
                <div class="row">
                    <div class="container">
                        <div class="col-md-2"></div>
                        <div class="col-md-6" align="center">

                            <div class="card card-container">
                                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                                <p id="profile-name" class="profile-name-card"></p>
                                <form class="form-signin" id="frmLogin">
                                    <span id="reauth-email" class="reauth-email"></span>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username"><br>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"><br>
                                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">เข้าสู่ระบบ</button><br>
                                    <a class="btn btn-lg btn-default btn-block" href="public.php">เยี่ยมชม</a>
                                </form><!-- /form -->
 
                            </div><!-- /card-container -->
                        </div>
                    </div>
                </div>
              

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->


    <!-- javascripts -->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script src="jquery/jquery-1.11.3.min.js"></script>
    <script src="jquery/jquery-2.1.4.min.js"></script>
    
    
    <script>
        //ส่งข้อมูล
            $('#frmLogin').submit(function(event){
                
                event.preventDefault();
                
                    $.ajax({
                            url:"login/login.php",
                            type:"POST",
                            data: new FormData(this),
                            cache:false,
                            processData:false,
                            contentType:false
                    }).done(function(value){
                        console.log(value);
                        if(value.flag){ 
                            alert("Login Success");
                            window.location.href = "privet.php";

                        }
                        else{
                           alert("Username or Password Incorrect");
                            $('#username').val("");
                            $('#password').val("");
                        }

                    });

            });

    </script>
</body>
</html>
