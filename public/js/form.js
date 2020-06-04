
let inputs = document.querySelectorAll("input");

inputs.forEach(element =>(e) => {
    (element.value == '')? e.prevent.default():'';
});

document.querySelector("#products").value = sessionStorage.getItem('products');
document.querySelector("#total").value = sessionStorage.getItem('total');
document.querySelector("#submit").onclick = ()=>{
    sessionStorage.removeItem('products');
    sessionStorage.removeItem('total');
    sessionStorage.removeItem('sum');
};