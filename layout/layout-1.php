 <!-- container section start -->
 <?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(empty($_SESSION)) 
    { 

      header( "location: index.php" );
    } 

?>  
  <section id="container" class="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="favicon-new.png">
    <title>กรมราชทัณฑ์</title>
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" /> 
    <link href="css/customs.css" rel="stylesheet" /> 
      <header class="header dark-bg" style="height:20px;">
            <div class="toggle-nav" style="margin-top: 8px;">
             <img src="layout/logo.png" alt="Smiley face" height="42" width="42">
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
                        <a  href="login/logout.php">
                            <span class="glyphicon glyphicon-user">
                                <img alt="" src="">
                            </span>
                            <span class="username"><?php echo $_SESSION['name']; ?></span>
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
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="dashboard">
                      <a class="" href="privet.php">
                          <i class="glyphicon glyphicon-home"></i>
                          <span>หน้าแรก</span>
                      </a>
                  </li>
                  <?php 
                  if($_SESSION['position'] != "พนักงานเรือนจำ")
                  {
                    ?>
                    <li class="outfile">
                        <a href="http://localhost/webkrt/send-out-file.php" class="">
                        <i class="glyphicon glyphicon-upload"></i>
                            <span>ส่งเอกสารภายนอก</span>
                            
                        </a>
                        
                    </li> 

                    
                  <?php
                  }
                  ?>

                  <?php 
                  if($_SESSION['position'] == "หัวหน้างาน")
                  {
                  ?>
                  <li class="sub">
                    <a href="http://localhost/webkrt/send-in-file.php" class="">
                       <i class="glyphicon glyphicon-download"></i>
                      <span>ส่งเอกสารภายใน</span>                            
                    </a>                        
                  </li>
                  <?php
                  }
                  ?>

                    <?php 
                  if($_SESSION['position'] == "ผู้ติดต่องาน")
                  {
                  ?>
                  <li class="sub">
                    <a href="http://localhost/webkrt/mailboxin.php" class="">
                       <i class="glyphicon glyphicon-download"></i>
                      <span>เอกสารจากหัวหน้า</span>                            
                    </a>                        
                  </li>
                  <?php
                  }
                  ?>

                  <?php 
                  if($_SESSION['position'] == "พนักงานเรือนจำ")
                  {
                  ?>
                    <li class="outfile">
                        <a href="http://localhost/webkrt/return-file.php" class="">
                        <i class="glyphicon glyphicon-upload"></i>
                            <span>ส่งเอกสารกลับ</span>                            
                        </a>                        
                    </li>  
                  <?php
                  }
                  ?>

                  <li>
                      <a class="" href="http://localhost/webkrt/Notifications.php">
                          <i class="glyphicon glyphicon-alert"></i>
                          <span>แจ้งเตือน</span>
                      </a>
                  </li>

                   <?php 
                  if($_SESSION['position'] == "พนักงานเรือนจำ")
                  {
                  ?>
                  <li>                     
                      <a class="" href="http://localhost/webkrt/mailbox.php">
                          <i class="glyphicon glyphicon-folder-open"></i>
                          <span>กล่องรับเอกสาร</span>
                          
                      </a>
                                         
                  </li>
                  <?php
                  }
                  ?>
                  <?php
                  if($_SESSION['position'] == "ผู้ติดต่องาน" || $_SESSION['position'] == "หัวหน้างาน"){
                  ?>           
                  <li>                     
                      <a class="" href="http://localhost/webkrt/mailboxreturn.php">
                          <i class="glyphicon glyphicon-folder-open"></i>
                          <span>กล่องรับเอกสาร</span>
                          
                      </a>
                                         
                  </li>
                  <?php
                  }
                  ?>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="glyphicon glyphicon-earphone"></i>
                          <span>ติดต่อ</span>
                          <span class=" "></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">Basic Table</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="glyphicon glyphicon-flash"></i>
                          <span>Pages</span>
                        
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">

         <!-- Zone write data -->

      <section class="wrapper">