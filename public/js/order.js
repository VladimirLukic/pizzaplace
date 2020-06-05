let ordersum = document.querySelector("#ordersum");
let delivery = parseInt(document.querySelector("#delivery").getAttribute('value'));
let total = document.querySelector("#totalsum");

//arrays
let prices = document.querySelectorAll(".prices");
let quantities = document.querySelectorAll(".inp");
let delButtons = document.querySelectorAll(".delete");
let storage = JSON.parse(sessionStorage.getItem("products"));
//total order value
let len = prices.length, sum = 0;
for(let i=0;i<len;i++){
    sum += parseInt(prices[i].getAttribute('value')) * parseInt(quantities[i].value);
    ordersum.value = sum;
}
total.value = parseInt(ordersum.value) + delivery;

//quantity changes
quantities.forEach(el=>el.onchange=(e)=>{
    let id = e.target.parentElement.children[0].innerHTML;
    let len = prices.length, sum = 0;
    for(let i=0;i<len;i++){
        sum += parseInt(prices[i].getAttribute('value')) * parseInt(quantities[i].value);
        ordersum.value = sum;
        storage[i]['quant']=quantities[i].value;
        sessionStorage.setItem('products', JSON.stringify(storage));
    }
    total.value = parseInt(ordersum.value) + delivery;    
});

//DELETE buttons event
delButtons.forEach(el=>el.onclick=(e)=>{
    let id = e.target.parentElement.children[0].innerHTML;
    let quantity = parseInt(e.target.parentElement.children[5].value);
    let price = parseInt(e.target.parentElement.children[4].getAttribute('value'));
    ordersum.value = parseInt(ordersum.value) - quantity * price;
    total.value = parseInt(ordersum.value) + 5;
    e.target.parentElement.remove();
    (ordersum.value <= 0)? total.value = 0:'';
    storage.forEach((el, ind)=>(el['id'] == id)? storage.splice(ind, 1):'');
    sessionStorage.setItem('products', JSON.stringify(storage));
})

//submit
document.querySelector("#submit").onclick = (e)=>{
    storeTotal = total.value + document.querySelector('label').innerHTML;
    sessionStorage.setItem('total', JSON.stringify(storeTotal));
}

