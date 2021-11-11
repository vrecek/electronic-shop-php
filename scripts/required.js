const delCookiePop = that => {
   const xml = new XMLHttpRequest();

   xml.open("GET","./php/class/cookie.php?bool=true", true);

   xml.onload = function () {
      that.parentElement.remove();
   }

   xml.send();
}

//////

const sett = document.querySelector('#usr');
const menu = document.querySelector('.accMenu');
if(sett != null){
   sett.addEventListener('click',()=>{
      menu.classList.toggle('hide');
      sett.classList.toggle('selected');
   })
}

/////

//DELETE SEARCH
const del = document.querySelector('.fa-times');
const search = document.querySelector('#srch');
const result = document.querySelector('.res');

//focus
if(search != null){
   search.addEventListener('focusin',()=>{
      del.style.visibility='visible';
      del.style.opacity='1';
   })
   search.addEventListener('focusout',(e)=>{
      if(e.target.value != '') return
      else del.style.visibility='hidden';
      del.style.opacity='0';
   })
   //
   
   del.addEventListener('click',(e)=>{
      if(search.value!=''){
         search.value='';
         result.style.display='none';
      } 
      search.focus();
   })

   // SEARCH RESULTS
   search.addEventListener('keyup',(e)=>{
      if(e.target.value == "") result.style.display='none';
      else{
         const xml = new XMLHttpRequest();
         xml.open("GET","./php/ajax/searchEng.php?v="+e.target.value, true);
         xml.onload = function () {
            if(this.responseText != "null"){
               result.innerHTML = this.responseText;
               result.style.display='block';
            }else result.style.display='none';   
         }
         xml.send(); 
      }
   })

}





