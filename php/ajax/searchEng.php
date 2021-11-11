<?php
   /*
   <a href='#'> <li>Result 1</li> </a>
   productPage.php?q=1
   */
   try{
      require_once '../class/connection.php';
      $connect = $shop->createConnection();

      $val = $_REQUEST['v'];
      $quer = $connect->query("SELECT id,prodFirma,prodName FROM products WHERE prodFirma LIKE '$val%' OR prodName LIKE '$val%'");

      if($quer->num_rows > 0){
         $text = '';
         while($row = $quer->fetch_assoc()){
            $text.="<a href='productPage.php?q=".$row['id']."'> <li>".$row['prodFirma']." ".$row['prodName']."</li> </a>";
         }
         echo $text;
      }else echo "null";
         
      $connect->close();
   }
   catch(Exception $err){
      echo "ERR: $err";
      $connect->close();
      exit();
   }

?>