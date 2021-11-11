<?php

   class myCookie {
      public string $name;
      private string $value;
      private int $time;

      public function __construct($n, $v, $t){
         $this->name = $n;
         $this->value = $v;
         $this->time = $t;
      }

      static public function staticDelCookie($name){
         if(isset($_COOKIE[$name])){
            unset($_COOKIE[$name]);
            setcookie($name, '', -1, "/");
         } 
      }

      public function delCookie(){
         if(isset($_COOKIE[$this->name])){
            unset($_COOKIE[$this->name]);
            setcookie($this->name, '', -1, "/");
         } 
      }

      public function setCookie(){
         if(!isset($_COOKIE[$this->name])) setcookie($this->name, $this->value, $this->time, "/");
      } 

      public function pop_up(){
         if(!isset($_COOKIE[$this->name])){
            $text = '<div class="cookiePop">
                        <p>While using this page you accept cookie policy for our partners. <a href="#">Read about cookies</a></p>
                        <i onclick="delCookiePop(this)"class="far fa-times-circle"></i>
                     </div>';
            return $text;
         }
      }
   }

   $mc = new myCookie("privacy", "data", (2**32) - 1);

   
   if(isset($_REQUEST['bool'])){
      $mc->setCookie();
   }

?>