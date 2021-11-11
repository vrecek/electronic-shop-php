<?php
   session_start();
   require_once 'class/connection.php';

   if(isset($_SESSION['isLogged'])) $user = $_SESSION['loggedId'];
   elseif(isset($_COOKIE['LOG_ID'])) $user = $_COOKIE['LOG_ID'];
   else{
      echo "NTL";
      return;
   } 

   try{
      $nr = $_REQUEST['q'];

      $connect = $shop->createConnection();
      if($connect->query("INSERT INTO userscart VALUES(NULL,'$user','$nr')") &&
         $connect->query("UPDATE products SET stockAvailable = stockAvailable - 1 WHERE id='$nr'") &&
         $result = $connect->query("SELECT cartId FROM userscart WHERE userId='$user'")){
            $num = $result->num_rows;
            echo $num;
         }   
         
      $connect->close();
   }
   catch(Exception $err){
      echo "ERROR: $err";
      $connect->close();
      exit();
   }

   

   
   



?>