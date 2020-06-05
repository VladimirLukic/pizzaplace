let sum = 0;
let products = (JSON.parse(sessionStorage.getItem('products')))? JSON.parse(sessionStorage.getItem('products')):[];
let prices = document.querySelectorAll(".price");
let endSum = document.querySelector(".sum");

//form input fields
let input1 = document.querySelector("#input1");
let input2 = document.querySelector("#input2");

//click event on P tags with prices
prices.forEach(el=>el.onclick=(e)=>{
    sum += Number(el.getAttribute('value'));
    endSum.innerHTML = sum.toFixed(1);
    endSum.value= sum;

    //kreate an object with product data
    let parent = e.target.parentElement;
    let about = parent.children[3].innerHTML; // + ' - ' + el.innerHTML
    let product = {id:parent.children[0].innerHTML, img:parent.children[1].src, name:parent.children[2].innerHTML, 
        topping:about, price:Number(el.getAttribute('value')), quant:1};
    products.push(product);
    //filter out repeating product while increasing the quantity number of that same product
    for(let i=0;i<products.length;i++){
        for(let j=i+1;j<products.length;j++){
            if(products[i].id === products[j].id && products[i].price === products[j].price){
                products[i].quant++;
                products.splice(j, 1);
            }
        }
    }
});

document.querySelector(".choose").onclick = ()=>{
    sessionStorage.setItem('products', JSON.stringify(products));
    sessionStorage.setItem('sum', JSON.stringify(endSum.value));

    //stores values into input form
    input1.value = sessionStorage.getItem('products');
    input2.value = sessionStorage.getItem('sum');

}