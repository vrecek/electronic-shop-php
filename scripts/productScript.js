
/////////////////////////////////////////////////////
const basket = document.querySelector('.fa-shopping-basket span');

const addCartBtn = nr => {
   start();
   const xml = new XMLHttpRequest();
   

   xml.open("GET", "./php/addCart.php?q="+nr, true);

   xml.onload = function () {
      const txt = this.responseText;
      if(txt != "NTL"){
         basket.textContent = this.responseText;
         end();
      }else window.location.href='./logReg.php';
   }

   xml.send();
}

////////////////////////////////////////////////////

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