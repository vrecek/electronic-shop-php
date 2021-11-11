
const redirectProd = nr => {
   window.location.href='./productPage.php?q='+nr;
}

////////////////////////////////////////////////////////////////////////////////////

const sect = document.querySelector('#bsec1');
const bask = document.querySelector('.fa-shopping-basket span');
const its = document.querySelector('#bsec2 h2 span');
const cost = document.querySelector('#bsec2 h3 span');

const xml1 = (nr,nrprod) => {
   start();
   return new Promise((resolve) => {
      setTimeout(() => {
         const xml1 = new XMLHttpRequest();
         xml1.open("GET", "./php/ajax/delCart.php?q="+nr+"&w="+nrprod, true);
         xml1.onload = function(){
            if(this.status === 200){
               sect.innerHTML = this.responseText;
            }
         }
         xml1.send();

         resolve();
      }, 0);
   })
}

const xml2 = () => {
   return new Promise((resolve) => {
      setTimeout(() => {
         const xml2 = new XMLHttpRequest();
         xml2.open("GET", "./php/ajax/delCart.php?b=true", true);
         xml2.onload = function(){
            if(this.status === 200){
               bask.textContent = this.responseText;
               its.textContent = this.responseText;
               console.log(this.responseText);
            }
         }
         xml2.send();

         resolve();
      }, 500);       
   })
}

const xml3 = () => {
   return new Promise((resolve) => {
      setTimeout(() => {
         const xml3 = new XMLHttpRequest();
         xml3.open("GET", "./php/ajax/delCart.php?cos=true", true);
         xml3.onload = function(){
            if(this.status === 200){
               cost.textContent = this.responseText;
               end();
            }
         }
         xml3.send();

         resolve();
      }, 0);
   })
}

const deleteCart = async (nr,nrprod) => {
   await xml1(nr,nrprod);
   await xml2();
   await xml3();
}

////////////////////////////////////////////////////////////////////////////////////

function start(){
   const image = document.createElement('img');
   image.src='./images/load.gif';
   document.body.className='loadbody'; 
   image.className='loadgif';
   document.body.appendChild(image);
}

function end(){
   const gif = document.querySelector('.loadgif');
   document.body.className='';
   document.body.removeChild(gif);
}