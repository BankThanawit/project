const product = [
    {
        id: 0,
        images: 'images/บรรทัด.jpg',
        title: 'Ruler',
        price: 10,
    },
    {
        id: 1,
        images: 'images/ดินสอ.jpg',
        title: 'Pencil',
        price: 5,
    },
    {
        id: 2,
        images: 'images/ยางลบ.jpg',
        title: 'Eraser',
        price: 5,
    },
    {
        id: 3,
        images: 'images/กระดาษสี.jpeg',
        title: 'Colored Paper',
        price: 20,
    },
    {
        id: 4,
        images: 'images/กระดาษa4.jpg',
        title: 'A4 Paper',
        price: 50,
    },
    {
        id: 5,
        images: 'images/กระดาษฟลิปชาร์ท.jpg',
        title: 'Flip Chart Paper',
        price: 80,
    }
];
const categories = [...new Set(product.map((item)=>
   {return item}))]
   let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
   var {images, title, price} = item;
   return(
       `<div class='box'>
           <div class='img-box'>
               <img class='images' src=${images}></img>
           </div>
       <div class='bottom'>
       <p>${title}</p>
       <h2>$ ${price}.00</h2>`+
       "<button onclick='addtocart("+(i++)+")'>Add to cart</button>"+
       `</div>
       </div>`
   )
}).join('')

var cart =[];

function addtocart(a){
   cart.push({...categories[a]});
   displaycart();
}
function delElement(a){
   cart.splice(a, 1);
   displaycart();
}

function displaycart(){
   let j = 0, total=0;
   document.getElementById("count").innerHTML=cart.length;
   if(cart.length==0){
       document.getElementById('cartItem').innerHTML = "Your cart is empty";
       document.getElementById("total").innerHTML = "$ "+0+".00";
   }
   else{
       document.getElementById("cartItem").innerHTML = cart.map((items)=>
       {
           var {images, title, price} = items;
           total=total+price;
           document.getElementById("total").innerHTML = "$ "+total+".00";
           return(
               `<div class='cart-item'>
               <div class='row-img'>
                   <img class='rowimg' src=${images}>
               </div>
               <p style='font-size:12px;'>${title}</p>
               <h2 style='font-size: 15px;'>$ ${price}.00</h2>`+
               "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i></div>"
           );
       }).join('');
   }

   
}
