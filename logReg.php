<?php  
   session_start(); 
   require_once 'php/class/cookie.php';
      echo $mc->pop_up();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style/logRegStyle.css">
   <link rel="stylesheet" href="style/cookieStyle.css">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
   <title>Account</title>
</head>
<body>
   <i id='backArr' class="fas fa-long-arrow-alt-left"></i>
   <main>
      <section class="choose">
         <div class="ch active">
            <h1>Login</h1>
         </div>

         <div class="ch">
            <h1>Register</h1>
         </div>
      </section>

      <div id='sep'>
         <?php 
            if(isset($_SESSION['logErr'])){
               echo $_SESSION['logErr'];
               unset($_SESSION['logErr']);          
            }
         ?>
         <form id='log' action="php/login.php" method="POST">  <!-- LOGIN -->
            <div> <input class='log' type="text" name='mail' autocomplete="off"> <span>E-mail</span></div>
            <div> <input class='log' type="password" name='pass'> <span>Password</span></div>
            <input type="checkbox" id='rem' name='rem'> <label for="rem">Rembember login</label>
            <a href="#">Forgot password?</a>
            <button id="logBtn"> <span>Submit</span> </button>
         </form>

         <form id='reg' action='php/register.php' method="POST"> <!-- REGISTER -->
            <?php //NAME
               if(isset($_SESSION['nErr'])){
                  echo $_SESSION['nErr'];
                  unset($_SESSION['nErr']);          
               }
            ?>
            <div id='item'> <input class='reg' type="text" name='name'> <span>Name</span></div>
            <div id='item'> <input class='reg' type="text" name='surename'> <span>Surename</span></div>

            <?php //EMAIL
               if(isset($_SESSION['eErr'])){
                  echo $_SESSION['eErr'];
                  unset($_SESSION['eErr']);
               }
            ?>
            <div id='item'> <input class='reg' type="text" name='mail'> <span>E-mail</span></div>

            <?php //PASSWORD
               if(isset($_SESSION['pErr'])){
                  echo $_SESSION['pErr'];
                  unset($_SESSION['pErr']);          
               }
            ?>
            <div id='item'> <input class='reg' type="password" name='pass'> <span>Password</span></div>

            <?php //EMAIL
               if(isset($_SESSION['pcErr'])){
                  echo $_SESSION['pcErr'];
                  unset($_SESSION['pcErr']);        
               }
            ?>
            <div id='item'> <input class='reg' type="password" name='confPass'> <span>Confirm password</span></div>

            <?php //EMAIL
               if(isset($_SESSION['checkErr'])){
                  echo $_SESSION['checkErr'];
                  unset($_SESSION['checkErr']);       
               }
            ?>
            <div> 
               <input type="checkbox" name='check' id='chck'> 
               <label for="chck">I read <a href='#'>regulamin</a> and accept all its details.</label>
            </div>
            <button id='regBtn'> <span>Submit</span> </button>
         </form>
      </div>
   </main>

<script src="scripts/required.js"></script>
<script src="https://kit.fontawesome.com/d04fe8415f.js" crossorigin="anonymous"></script>
<script src="scripts/logRegScript.js"></script>
</body>
</html>