<?php
   
   try{
      mysqli_report(MYSQLI_REPORT_STRICT);
      require_once '../class/connection.php';
      if(isset($_SESSION['loggedId'])) $id = $_SESSION['loggedId']; 
      elseif(isset($_COOKIE['remember'])) $id = $_COOKIE['LOG_ID']; 

      $connect = $shop->createConnection();

      if(isset($_REQUEST['q'])){
         $q = $_REQUEST['q']; //cart id
         $w = $_REQUEST['w']; //prod id
         
         $connect->query("DELETE FROM userscart WHERE cartId='$q'");  
         $connect->query("UPDATE products SET stockAvailable=1 WHERE id='$w'");
         $text = $shop->displayCart($connect,"SELECT prodImg,prodFirma,prodName,prodPrice,products.id,userscart.cartId FROM products,userscart WHERE userscart.userId=$id AND userscart.productId=products.id");
         echo $text;
      }elseif(isset($_REQUEST['b'])){
         $nr = $shop->checkCart($connect,$id);
         echo $nr;
      }elseif(isset($_REQUEST['cos'])){
         $result = $connect->query("SELECT prodPrice FROM products,userscart WHERE userscart.userId='$id' AND userscart.productId=products.id");
         $num = 0;
         while($rec = $result->fetch_assoc()){
            $num += $rec['prodPrice'];
         }
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