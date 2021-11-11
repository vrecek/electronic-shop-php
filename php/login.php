<?php

   session_start();
   
   try{
      require_once 'class/connection.php';
      mysqli_report(MYSQLI_REPORT_STRICT);

      $connect = $shop->createConnection();

      $mail = htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8");
      $pass = $_POST['pass'];

      if($result = $connect->query(
         sprintf("SELECT userPass,id FROM users WHERE userMail='%s'",
         mysqli_real_escape_string($connect,$mail)))
      ){
         $row = $result->fetch_assoc();
         if($result->num_rows > 0 && password_verify($pass,$row['userPass'])){ //SUCCESS
            if(isset($_POST['rem'])){
               require_once 'class/cookie.php';
               $rem = new myCookie("remember","user", (2**32) - 1);
               $rem->setCookie();

               $idc = new myCookie("LOG_ID",$row['id'], (2**32)-1);
               $idc->setCookie();
            }else{
               $_SESSION['isLogged'] = true;
               $_SESSION['loggedId'] = $row['id'];
            }   
            header('location: ../index.php');
         }else{
            $_SESSION['logErr'] = '<p id="logErr">Invalid username or password.</p>';
            header('location: ../logReg.php');
         }
      }else throw new Exception(mysqli_connect_errno()); 

      $connect->close();
      
   }
   catch(Exception $err){
      echo "-ERROR-: $err";
      $connect->close();
      exit();
   }

?>