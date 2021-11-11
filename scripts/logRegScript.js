const formCont = document.querySelector('#sep');

//////////////////////////////////////////////////
//Move login / register form

//Change form
const choose = document.querySelectorAll('.ch');
choose.forEach((item, nr)=>{
   item.addEventListener('click',()=>{changeForm(nr)});
})
let actual = 0;

const changeForm = nr => {
   if(nr === actual) return

   choose[actual].classList.toggle('active');
   choose[nr].classList.toggle('active');

   const size = document.querySelector('main').clientWidth;
   nr === 0 ? formCont.style.transform=`translateX(0)` : formCont.style.transform=`translateX(${-size}px)`;

   formCont.style.transition='all .3s linear';
   actual = nr;
}

//////////////////////////////////////////////////
//Move input span
const inputs = document.querySelectorAll('.log'); //LOGIN
const spans = document.querySelectorAll('#log span');

inputs.forEach((item, nr)=>{
   item.addEventListener('focus',()=>{
      switch(nr){
         case 0: spans[nr].style.transform='translateY(-100%) translateX(-270%)'; break;
         case 1: spans[nr].style.transform='translateY(-100%) translateX(-150%)'; break;
      }
   });
})

inputs.forEach((item, nr)=>{
   item.addEventListener('focusout',()=>{
      spans[nr].style.transform='translateY(0) translateX(0)';
   });
})

////

const inputsR = document.querySelectorAll('.reg'); //REGISTER
const spansR = document.querySelectorAll('#reg span');

inputsR.forEach((item, nr)=>{
   item.addEventListener('focus',()=>{
      switch(nr){
         case 0:
         case 2: spansR[nr].style.transform='translateY(-100%) translateX(-270%)'; 
            break;
         case 1: 
         case 3: spansR[nr].style.transform='translateY(-100%) translateX(-140%)'; 
            break;
         case 4: spansR[nr].style.transform='translateY(-100%) translateX(-50%)';
            break;
      }
   });
})

inputsR.forEach((item, nr)=>{
   item.addEventListener('focusout',()=>{
      spansR[nr].style.transform='translateY(0) translateX(0)';
   });
})

//Remember reg / log
const logB = document.querySelector('#logBtn');
const regB = document.querySelector('#regBtn');

let selected = JSON.parse(sessionStorage.getItem("selected"));
if(selected == 1){
   let size = document.querySelector('main').clientWidth;
   formCont.style.transform=`translateX(${-size}px)`;
}else if(selected == 0){
   let size = document.querySelector('main').clientWidth;
   formCont.style.transform=`translateX(0)`;
}else{
   selected = 0;
}

regB.addEventListener('click', e =>{
   let select = 1;
   sessionStorage.setItem("selected", JSON.stringify(select));
})


logB.addEventListener('click', e =>{
   let select = 0;
   sessionStorage.setItem("selected", JSON.stringify(select));
})

changeForm(selected);

/////////////////////////////////////////////////////////////////////////

document.querySelector('#backArr').addEventListener('click', ()=>{document.location.href='puppet-online-shop'});



