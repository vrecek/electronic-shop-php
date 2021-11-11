<?php

class Pages{
      private int $max_items;
      private int $how_many;
      private int $curD;
      private int $cur;

      public function __construct($m, $h, $cd, $c){
         $this->max_items = $m;
         $this->how_many = $h;
         $this->curD = $cd;
         $this->cur = $c;
      }

      public function viewPages(){
         $pgTxt = '';
         for($i=1; $i<=$this->how_many; $i++){
            if($i == $this->curD) $pgTxt.="<div onclick='redPage($i, this)' class='page cur'>$i</div>";
            else $pgTxt.="<div onclick='redPage($i, this)' class='page'>$i</div>";   
         }
         return $pgTxt;
      }

      public function viewProducts($connect){
         $prTxt = '';
         $res = $connect->query("SELECT * FROM products WHERE stockAvailable>0 LIMIT $this->cur, $this->max_items");
         while($row = $res->fetch_assoc()){
            $prTxt.='<div onclick="redirectProd('.$row['id'].')" class="product">
                              <div class="image"> <img src="'.$row['prodImg'].'" alt=""> </div>
                              <div class="text">
                                 <h2> '.$row['prodFirma'].' - <span class="mark">'.$row['prodName'].'</span> </h2>
                                 <h3><i class="fas fa-shipping-fast"></i> Delivery in 24h! </h3>
                                 <h5> In stock: '.$row['stockAvailable'].' </h5>
                                 <h4>'.$row['prodPrice'].'$</h4>
                              </div>
                     </div>';
         }
         return $prTxt;
      }
   }

?>