let ordersum = document.querySelector("#ordersum");
let delivery = Number(document.querySelector("#delivery").getAttribute('value'));
let total = document.querySelector("#totalsum");

//arrays
let prices = document.querySelectorAll(".prices");
let quantities = document.querySelectorAll(".inp");
let delButtons = document.querySelectorAll(".delete");
let storage = JSON.parse(sessionStorage.getItem("products"));

//total order value
let len = prices.length, sum = 0;
for(let i=0;i<len;i++){
    sum += Number(prices[i].getAttribute('value')) * Number(quantities[i].value);
    ordersum.value = sum;
}
total.value = Number(ordersum.value) + delivery;

//quantity changes
quantities.forEach(el=>el.onchange=(e)=>{
    let id = e.target.parentElement.children[0].innerHTML;
    let len = prices.length, sum = 0;
    for(let i=0;i<len;i++){
        sum += Number(prices[i].getAttribute('value')) * Number(quantities[i].value);
        ordersum.value = sum;
        storage[i]['quant']=quantities[i].value;
        sessionStorage.setItem('products', JSON.stringify(storage));
    }
    total.value = Number(ordersum.value) + delivery;    
});

//DELETE buttons event
delButtons.forEach(el=>el.onclick=(e)=>{
    let id = e.target.parentElement.children[0].innerHTML;
    let quantity = Number(e.target.parentElement.children[5].value);
    let price = Number(e.target.parentElement.children[4].getAttribute('value'));
    ordersum.value = Number(ordersum.value) - quantity * price;
    total.value = Number(ordersum.value) + 5;
    e.target.parentElement.remove();
    (ordersum.value <= 0)? total.value = 0:'';
    storage.forEach((el, ind)=>(el['id'] == id)? storage.splice(ind, 1):'');
    sessionStorage.setItem('products', JSON.stringify(storage));
})

//submit
document.querySelector("#submit").onclick = (e)=>{
    sessionStorage.setItem('total', JSON.stringify(document.querySelector("#totalsum").value));
}

