<?php
   session_start();

   

   if(isset($_SESSION['isLogged'])){
      unset($_SESSION['isLogged']);
      unset($_SESSION['loggedId']);
   }elseif(isset($_COOKIE['LOG_ID'])){
      require_once 'class/cookie.php';
      myCookie::staticDelCookie("remember");
      myCookie::staticDelCookie("LOG_ID");
   }

   header('location: ../index.php');

?>