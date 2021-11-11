
//IMAGE AUTO SLIDER
   const cont = document.querySelector('figure div');
   const imgs = document.querySelectorAll('figure img');
   const divs = document.querySelectorAll('.radios span');
   let previous = 0;
   let size = document.querySelector('figure').clientWidth;
   let counter = 1;


   cont.style.transform = `translateX(${-size}px)`;

   window.addEventListener('resize',()=>{ //window resize
      cont.style.transition='none';
      size = document.querySelector('figure').clientWidth;
      cont.style.transform = `translateX(${-size * counter}px)`;
   })

   setInterval(() => { //change every
      if(!document.hasFocus()) return;

      size = document.querySelector('figure').clientWidth;
      cont.style.transition='all 1s linear';
      counter++;
      cont.style.transform = `translateX(${-size * counter}px)`;
   }, 6000);

   cont.addEventListener('transitionend',()=>{ //transit end roll back
      divs[counter-1].className='rad-enabled';
      divs[previous].className='';
      previous = counter-1;

      if(counter == imgs.length - 1){    
         cont.style.transition='none';
         cont.style.transform = `translateX(0)`;
         counter = 0;
      } 
   })

//

//REDIRECT TO SHOW CLICKED PRODUCT

const redirectProd = nr => {
   window.location.href='./productPage.php?q='+nr;
}


//CHANGE PAGE 
const redPage = num => {
   window.location.href='./puppet-online-shop?num='+num;
}






