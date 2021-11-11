<?php

   class Connection{
      private string $db_host;
      private string $db_user;
      private string $db_pass;
      private string $db_base;

      public function __construct($h=0, $u=0, $p=0, $b=0){
         $this->db_host = $h;
         $this->db_user = $u;
         $this->db_pass = $p;
         $this->db_base = $b;
      }

      public function createConnection($name =null){
         $dir = $_SERVER['DOCUMENT_ROOT'].'/'.'SHOP/data/'.$name.'.json';

         try{
            if(file_exists($dir)){    
               $file = file_get_contents($dir);
               $final = json_decode($file,true);

               if($connect = new mysqli($final['db_host'], $final['db_login'], $final['db_pass'], $final['db_base'])) return $connect;
               else throw new Exception(mysqli_connect_errno());  
       
            }
            elseif ($connect = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_base)) return $connect;
            else throw new Exception(mysqli_connect_errno());
         }
         catch(Exception $err){
            echo "-ERROR-: $err";
            exit();
         }  
      }

      public function checkCart($con, $id){
         try{
            if($ress = $con->query("SELECT cartId FROM userscart WHERE userId='$id'")){
               return $ress->num_rows;
            }else throw new Exception($con->connect_errno);
         }
         catch(Exception $err){
            echo "-ERROR-: $err";
            exit();
         }    
      }

      public function countProds($con){
         $res = $con->query("SELECT id FROM products WHERE stockAvailable>0");
         return $res->num_rows;
      }

      public function displayCart($con, $quer){
         $text = '';
         $res = $con->query("$quer");

         if($res->num_rows != 0){
            while($row = $res -> fetch_assoc()){
               $text.='<article>
               <div class="bas-img">
                  <img src="'.$row['prodImg'].'" alt="">
               </div>
               <div class="text">
                  <h6>'.$row['prodFirma'].' '.$row['prodName'].'</h6>
                  <h5>Price: <span>'.$row['prodPrice'].'</span>$ </h5>
               </div>
               <i onclick="deleteCart('.$row['cartId'].','.$row['id'].')" class="fas fa-times"></i>
               <h4 onclick="redirectProd('.$row['id'].')" href="#">Inspect product page</h4>
            </article>';
            }
         }else{
            $text = "<h1 id='empty'>CART IS EMPTY</h1>";
         }
         
         return $text;
      }
   }

   ////////////////////////////////////////////////////////////////////////////////////////////////////v

   $shop = new Connection("localhost","root","","shop");

?>