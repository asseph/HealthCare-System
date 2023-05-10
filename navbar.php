<?php
error_reporting(0);
session_start();
$_SESSION['email'];

?>
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="#" style="float:right"class="navbar-brand logo">
                <img src="logo.png" style="width: 10%;float:right" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="#" class="menu-logo">
                    <img src="logo.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="index.php">Home</a>
                </li>
                <li class="has-submenu">
                    <a href="feature.php">Feature </a>
                   
                </li>	
                <li class="has-submenu">
                    <a href="specialities.php">Clinic</a>
                    
                </li>	
                <?php
              	if($_SESSION['loggedin'] == 'true'){
                  echo'<li class="login-link">
                    <a href="logout.php">Logout</a>
                </li>';
                }
              else{
              echo'
               <li class="login-link">
                    <a href="login.php">Login / Signup</a>
                </li>
              ';
              }
              ?>
               
            </ul>		 
        </div>		 
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>							
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +91 9653001839</p>
                </div>
            </li>
           <?php
              	if($_SESSION['loggedin'] == 'true'){
                  echo' <li class="nav-item">
                <a class="nav-link header-login" href="logout.php">logout </a>
            </li>';
                }
              else{
              echo'
               <li class="nav-item">
                <a class="nav-link header-login" href="login.php">login / Signup </a>
            </li
              ';
              }
              ?>
               
           
        </ul>
    </nav>
</header>