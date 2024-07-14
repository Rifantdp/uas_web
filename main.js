let side=document.querySelector(".aside");
let txt=document.querySelectorAll(".m_text");
let a=document.querySelector("#logo_a");
let b=document.querySelector("#logo_b");
lside();
function rside(){
  side.style.width="180px";
  for(let i=0;i<=7;i++){
    txt[i].style.display="block";
  }
  a.style.display="none";
  b.style.display="block";
}
function lside(){
  side.style.width="46px";
  for(let i=0;i<=7;i++){
    txt[i].style.display="none";
  }
  b.style.display="none";
  a.style.display="block";
}
let m_ikon=document.querySelectorAll(".m_ikon");
let isi=document.querySelectorAll(".isi");

function bg(){
  for(let i=1;i<=7;i++){
    m_ikon[i].style.backgroundColor="black";}
  for(let i=0;i<7;i++){
    isi[i].style.display="none";
  }
}
bg();
m_ikon[1].addEventListener("click", function(){
  bg();
  m_ikon[1].style.backgroundColor="gray";
  isi[0].style.display="block";
});
m_ikon[2].addEventListener("click", function(){
  bg();
  m_ikon[2].style.backgroundColor="gray";
  isi[1].style.display="block";
});
m_ikon[3].addEventListener("click", function(){
  bg();
  m_ikon[3].style.backgroundColor="gray";
  isi[2].style.display="block";
});
m_ikon[4].addEventListener("click", function(){
  bg();
  m_ikon[4].style.backgroundColor="gray";
  isi[3].style.display="block";
});
m_ikon[5].addEventListener("click", function(){
  bg();
  m_ikon[5].style.backgroundColor="gray";
  isi[4].style.display="block";
});
m_ikon[6].addEventListener("click", function(){
  bg();
  m_ikon[6].style.backgroundColor="gray";
  isi[5].style.display="block";
});
m_ikon[7].addEventListener("click", function(){
  bg();
  m_ikon[7].style.backgroundColor="gray";
  isi[6].style.display="block";
});
