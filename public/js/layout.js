
let valuta = document.querySelectorAll(".valuta");

valuta.forEach(el=>el.onclick=()=>{
    sessionStorage.removeItem('products');
    sessionStorage.removeItem('total');
    sessionStorage.removeItem('sum');
})
