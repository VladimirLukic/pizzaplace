
(!sessionStorage.getItem('currency'))?
sessionStorage.setItem('currency', 'USD'):'';

let currNotes = document.querySelectorAll(".price");
let currencies = document.querySelectorAll("div.currency span");

currNotes.forEach(el=>el.innerHTML += sessionStorage.getItem('currency'));

//changes the currency
currencies.forEach(el=>el.onclick = ()=>{
    sessionStorage.setItem('currency', el.innerHTML);
    location.reload();
})

