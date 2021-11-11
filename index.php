<?php
   session_start();
   require_once 'php/class/connection.php';
   require_once 'php/class/cookie.php';
   require_once 'php/class/pages.php';
   echo $mc->pop_up();

   $connect = $shop->createConnection();

   if(isset($_SESSION['loggedId'])){
      $id = $_SESSION['loggedId'];

      $roww = $shop->checkCart($connect, $id);
      
   }elseif(isset($_COOKIE['remember'])){
      $id = $_COOKIE['LOG_ID'];

      $roww = $shop->checkCart($connect, $id);
      
   }else $roww = 0;

   /////////

   $max_items = 6;
   $amount = $shop->countProds($connect);
   $how_many = ceil($amount / $max_items);

   if(!isset($_REQUEST['num'])){
      $curD = 1;
      $cur = 1;
   }else{
      $curD = $_REQUEST['num'];
      $cur = ($_REQUEST['num'] - 1) * $max_items;
   }

   $page = new Pages($max_items, $how_many, $curD, $cur);

   $prTxt = $page->viewProducts($connect);
   $pgTxt = $page->viewPages();

   $connect->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style/indexStyle.css">
   <link rel="stylesheet" href="style/cookieStyle.css">
   <link rel="stylesheet" href="style/upperReqStyle.css">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
   <title>Shop</title>
</head>
<body>
   <header>
      <div class="logo">
         <img src="images/logo.png" alt="">
      </div>
      <div class="search">
         <div class="inp flex-center-alig">
             <i class="fas fa-search"></i> <input id='srch' type="text" placeholder="Search.."><i class="fas fa-times"></i> 
         </div>
         
         <ul class='res'>
            
         </ul>
      </div>
      <nav>
         <ul>
            <li> <a href="puppet-online-shop"> <i class="fas fa-home"></i> <span class="ac">Main page</span> </a> </li>
            <li> <a href="#"> <i class="fas fa-id-badge"></i> Contact </a> </li>
            <li> 
               <a href="shop-basket"> 
                  <i class="fas fa-shopping-basket"> <span id='basit'><?php echo $roww ?></span> </i> <span class='acb'>Basket</span> 
               </a> 
            </li>
            <li id='usr'> <i class="fas fa-bars"></i> <span class='ac'>Account</span>
               <ol class='accMenu'>
                  <li> <i class="fas fa-cog"></i> <a href="#">Account Settings</a> </li>
                  <li> <i class="fas fa-info"></i> <a href="#">Privacy Policy</a> </li>
                  <li> <i class="fas fa-at"></i> <a href="#">Terms&Services</a> </li>
                  <li> <i class="far fa-question-circle"></i> <a href="#">About</a> </li>
                  <li> <i class="far fa-address-book"></i> <a href="#">Contact us</a> </li>
                  <?php 
                     if(!isset($_SESSION['isLogged']) && !isset($_COOKIE['LOG_ID'])){
                        echo '<li> <i class="fas fa-sign-in-alt last"></i> <a href="login-register">Log in / Register</a> </li>';
                     }else{
                        echo '<li> <i class="fas fa-sign-in-alt last"></i> <a href="php/logout.php">Log off</a> </li>';
                     }
                  ?>
               </ol>
            </li>
         </ul>
      </nav>
   </header>
   
   <section class='flex-center-alig' id='sec1'>
      <h1>Categories: </h1>
      <nav>
         <ul class='flex-center-all'>
            <li class='chld'><span class="navN">Phones</span> 
               <i class="fas fa-sort-down"></i>
               <div class="inner">
                  <ol>
                     <li>Brands</li>
                     <li> <a href="#">LG</a> </li>
                     <li> <a href="#">Samsung</a> </li>
                     <li> <a href="#">Huawei</a> </li>
                     <li> <a href="#">iPhone</a> </li>
                     <li> <a href="#">Motorola</a> </li>
                     <li> <a href="#">Xiaomi</a> </li>
                  </ol>

                  <ol>
                     <li>Glass</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Applications</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Jack</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Lorem</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Ipsum</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>
               </div>
            </li>

            <li class='chld'><span class="navN">Laptops</span> 
               <i class="fas fa-sort-down"></i>
               <div class="inner">
                  <ol>
                     <li>Brands</li>
                     <li> <a href="#">HP</a> </li>
                     <li> <a href="#">Asus</a> </li>
                     <li> <a href="#">Mac</a> </li>
                     <li> <a href="#">Predator</a> </li>
                     <li> <a href="#">Acer</a> </li>
                     <li> <a href="#">Dell</a> </li>
                  </ol>

                  <ol>
                     <li>Accessory</li>
                     <li> <a href="#">Battery</a> </li>
                     <li> <a href="#">Power Supply</a> </li>
                     <li> <a href="#">Keys</a> </li>
                     <li> <a href="#">Carry bag</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                  </ol>

                  <ol>
                     <li>Components</li>
                     <li> <a href="#">Graphic</a> </li>
                     <li> <a href="#">Processor</a> </li>
                     <li> <a href="#">Memory</a> </li>
                     <li> <a href="#">DVD</a> </li>
                     <li> <a href="#">Motherboard</a> </li>
                     <li> <a href="#">Cooler</a> </li>
                     <li> <a href="#">SSD</a> </li>  
                  </ol>

                  <ol>
                     <li class='no-border'>-</li>
                     <li> <a href="#">HDD</a> </li>
                     <li> <a href="#">Fans</a> </li>
                     <li> <a href="#">Cables</a> </li>
                     <li> <a href="#">LEDs</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Applications</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>
               </div>
            </li>

            <li class='chld'><span class='navN'>PC</span>
               <i class="fas fa-sort-down"></i>
               <div class="inner">
                  <ol>
                     <li>Monitors</li>
                     <li> <a href="#">16:9</a> </li>
                     <li> <a href="#">21:9</a> </li>
                     <li> <a href="#">4:3</a> </li>
                     <li> <a href="#">4k</a> </li>
                     <li> <a href="#">Wide</a> </li>
                     <li> <a href="#">Fat</a> </li>
                  </ol>

                  <ol>
                     <li>Sizes</li>
                     <li> <a href="#">19"</a> </li>
                     <li> <a href="#">21"</a> </li>
                     <li> <a href="#">25"</a> </li>
                     <li> <a href="#">27"</a> </li>
                     <li> <a href="#">30"</a> </li>
                  </ol>

                  <ol>
                     <li>Components</li>
                     <li> <a href="#">Graphic</a> </li>
                     <li> <a href="#">Processor</a> </li>
                     <li> <a href="#">Memory</a> </li>
                     <li> <a href="#">Power suppply</a> </li>
                     <li> <a href="#">Memory</a> </li>
                     <li> <a href="#">Cables</a> </li>
                  </ol>

                  <ol>
                     <li class='no-border'>-</li>
                     <li> <a href="#">LEDs</a> </li>
                     <li> <a href="#">DVD</a> </li>
                     <li> <a href="#">Cooler</a> </li>
                     <li> <a href="#">Thermo past</a> </li>
                     <li> <a href="#">Fans</a> </li>
                     <li> <a href="#">Sound card</a> </li>
                  </ol>

                  <ol>
                     <li class='no-border'>-</li>
                     <li> <a href="#">SSD</a> </li>
                     <li> <a href="#">HDD</a> </li>
                     <li> <a href="#">Case</a> </li>
                     <li> <a href="#">Glass panel</a> </li>
                  </ol>

                  <ol>
                     <li>Ipsum</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>
               </div>
            </li>

            <li class='chld'><span class="navN">Accessories</span>
                <i class="fas fa-sort-down"></i>
                <div class="inner">
                  <ol>
                     <li>Userable</li>
                     <li> <a href="#">Keyboards</a> </li>
                     <li> <a href="#">Speakers</a> </li>
                     <li> <a href="#">Mouse</a> </li>
                     <li> <a href="#">Pads</a> </li>
                     <li> <a href="#">Camera</a> </li>
                     <li> <a href="#">Microphone</a> </li>
                  </ol>

                  <ol>
                     <li>Headphones</li>
                     <li> <a href="#">Big</a> </li>
                     <li> <a href="#">Small</a> </li>
                     <li> <a href="#">Quieter</a> </li>
                  </ol>

                  <ol>
                     <li>Music</li>
                     <li> <a href="#">MP3</a> </li>
                     <li> <a href="#">Radio</a> </li>
                     <li> <a href="#">Boombox</a> </li>
                     <li> <a href="#">Big panels</a> </li>
                  </ol>

                  <ol>
                     <li>Other</li>
                     <li> <a href="#">Air spray</a> </li>
                     <li> <a href="#">Stickers</a> </li>
                     <li> <a href="#">Hangers</a> </li>
                     <li> <a href="#">Clean paper</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li class='no-border'>-</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
               </div>
            </li>

            <li class='chld'><span class="navN">Services</span> 
               <i class="fas fa-sort-down"></i>
               <div class="inner">
                  <ol>
                     <li>Cleaning</li>
                     <li> <a href="#">LG</a> </li>
                     <li> <a href="#">Samsung</a> </li>
                     <li> <a href="#">Huawei</a> </li>
                     <li> <a href="#">iPhone</a> </li>
                     <li> <a href="#">Motorola</a> </li>
                     <li> <a href="#">Xiaomi</a> </li>
                  </ol>

                  <ol>
                     <li>Repairing</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Building</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Information</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>

                  <ol>
                     <li>Other</li>
                     <li> <a href="#">Lorem</a> </li>
                     <li> <a href="#">Ipsum</a> </li>
                     <li> <a href="#">Dolore</a> </li>
                     <li> <a href="#">Amiseti</a> </li>
                     <li> <a href="#">Rowaron</a> </li>
                     <li> <a href="#">Alento</a> </li>
                  </ol>
               </div>
            </li>
         </ul>
      </nav>
   </section>

   <figure>
      <div>
         <img src="images/slider/first.png" alt="">
         <img src="images/slider/img1.png" alt="">
         <img src="images/slider/img2.png" alt="">
         <img src="images/slider/img3.png" alt="">
         <img src="images/slider/img4.png" alt="">
      </div>
      <div class='radios flex-center-all'>
         <span class='rad-enabled'></span>
         <span></span>
         <span></span>
         <span></span>
      </div>  
   </figure>

   <article id='art1'>
      <div>
         <h1 class='bld'>upet.com</h1>
         <p class='lg'>Online computronic shop</p>
         <p class='in'>Look for a new discounts for best products!</p>
         <p class='in'>Variety new products available</p>
         <p class='in clr'>Free delivery from 50$</p>
      </div>
         
      <div>
         <button> <span>New Trends</span> </button>
         <button> <span>Popular</span> </button>
      </div>
   </article>
   <div class="line"></div>

   <main>
      <div class='cont'>
         <?php
            echo $prTxt;
         ?>
      </div>

      <div class='pag'>
         <?php
            echo $pgTxt;
            
         ?>      
      </div>
   </main>

   <footer>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet aut fugit laborum voluptates.</p>
      <section>
         <div class="col">
            <h2>Lorem</h2>
            <ul>
               <li><a href="#"> Dolore</a></li>
               <li><a href="#"> Consect</a></li>
               <li><a href="#"> Elit</a></li>
               <li><a href="#"> Labor</a></li>
               <li><a href="#"> Volupt</a></li>
            </ul>
         </div>

         <div class="col">
            <h2>Ipsum</h2>
            <ul>
               <li><a href="#"> Omni</a></li>
               <li><a href="#"> Perist</a></li>
               <li><a href="#"> Tastle</a></li>
               <li><a href="#"> Aliquid</a></li>
               <li><a href="#"> Culpa</a></li>
            </ul>
         </div>

         <div class="col">
            <h2>Dolore</h2>
            <ul>
               <li><a href="#"> Autem</a></li>
               <li><a href="#"> Quidem</a></li>
               <li><a href="#"> Delect</a></li>
               <li><a href="#"> Itaque</a></li>
               <li><a href="#"> Rerum</a></li>
            </ul>
         </div>
      </section>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet aut fugit laborum voluptates.</p>
      <p class='clr'><i class="far fa-envelope"></i> Amet consectetur adipisicing elit <i class="far fa-envelope"></i></p>
   </footer>

<script src="scripts/indexScript.js"></script>
<script src="scripts/required.js"></script>
<script src="https://kit.fontawesome.com/d04fe8415f.js" crossorigin="anonymous"></script>
</body>
</html>