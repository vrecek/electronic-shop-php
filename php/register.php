<?php
   session_start();
   $canRegister = true;

   // Name & Surename
   $name = $_POST['name'];
   $surename = $_POST['surename'];
   if(!(ctype_alnum($name) && ctype_alnum($surename)) || (strlen($name)>50 || strlen($name)<2) || (strlen($surename)>50 || strlen($surename)<2)){
      $_SESSION['nErr'] = '<p id="regErr">Enter valid name and surename!</p>';
      $canRegister = false;
   }

   // Mail
   $mail = $_POST['mail'];
   $mailv = filter_var($mail,FILTER_SANITIZE_STRING);

   if(!filter_var($mail,FILTER_VALIDATE_EMAIL) || $mail != $mailv){
      $_SESSION['eErr'] = '<p id="regErr">Enter valid e-mail address</p>';
      $canRegister = false;
   }

   // Password
   $pass = $_POST['pass'];
   $passC = $_POST['confPass'];

   if(strlen($pass) < 4){
      $_SESSION['pErr'] = '<p id="regErr">Password must contain minimum 4 characters</p>';
      $canRegister = false;
   }elseif($pass != $passC){
      $_SESSION['pcErr'] = '<p id="regErr">Passwords are different</p>';
      $canRegister = false;
   }

   // Checkbox
   if(!isset($_POST['check'])){
      $canRegister = false;
      $_SESSION['checkErr'] = '<p id="regErr">Accept our regulamin</p>';
   }

////

   if(!$canRegister){
      header('location:../logReg.php');
      exit();
   }

   try{
      require_once 'class/connection.php';
      mysqli_report(MYSQLI_REPORT_STRICT);

      $connect = $shop->createConnection();

      $result = $connect->query("SELECT id FROM users WHERE userMail='$mail'");
      if($result->num_rows > 0){
         $canRegister = false;
         $_SESSION['eErr'] = 'This mail address is already taken';
      }

      if($canRegister){ // SUCCESS
         $hash = password_hash($pass,PASSWORD_DEFAULT);
         if($res = $connect->query("INSERT INTO users VALUES(NULL,'$name','$surename','$mail','$hash')")){
            header('location:../logReg.php'); 
         }else throw new Exception($connect->connect_errno);       
      }else{
         header('location:../logReg.php');
      }

      $connect->close();
   }
   catch(Exception $err){
      echo "-ERROR-: $err";
      $connect->close();
      exit();
   }

?>