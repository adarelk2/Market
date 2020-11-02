import {addToCart,deleteFromCart} from "./market_manager.js";
import {editProductManager} from "./user_manager.js";
class Product
{
   constructor(_parent,_id,_name,_subject,_price,_cate,_img)
   {
      this.id = _id;
      this.parent = _parent;
      this.name = _name;
      this.subject = _subject;
      this.price = _price;
      this.cate = _cate;
      this.img = _img;


   }
   render()
   {
 
      let newDiv = document.createElement("div");
      newDiv.className = "box ";
      if(this.img.length >=2)
      newDiv.innerHTML = `
      <img src=${this.img} class='w-100'>
      <h3>${this.name}</h3>
      <p>
        ${this.subject}
      </p>
      <div style="color:rgb(77, 77, 76);">Price: ${this.price}$</div>
      `;
      else
      newDiv.innerHTML = `
      <h3>${this.name}</h3>
      <p>
        ${this.subject}
      </p>
      <div style="color:rgb(77, 77, 76);">Price: ${this.price}$</div>
      `;
      document.querySelector(this.parent).append(newDiv);
      let btn = document.createElement("button");
      btn.className="btn btn-dark";
      btn.innerHTML = "Add to cart";
      newDiv.append(btn);
      btn.addEventListener("click",()=>{
         btn.disabled = true;
         this.index = Date.now();
         let obj = {
            name:this.name,
            price:this.price,
            subject:this.subject,
            id:this.id,
            index:this.index
         };
        addToCart(obj);


      })
   }
   adminRender()
   {
      let newDiv = document.createElement("div");
      newDiv.className = "box ";
      let title = document.createElement("input");
      title.value = this.name;
      title.className="form-control";
      let subject = document.createElement("input");
      subject.value = this.subject;
      subject.className="form-control";
      let price = document.createElement("input");
      price.className="form-control";
      price.type="number";
      price.value = this.price;
      let cate = document.createElement("input");
      cate.className="form-control";
      cate.value = this.cate;
      newDiv.append(title,subject,price,cate);
      let btn = document.createElement("button");
      btn.className="btn btn-dark mt-3";
      btn.innerHTML = "Save";
      newDiv.append(btn);
      document.querySelector(this.parent).append(newDiv);

      btn.addEventListener("click",()=>{
         this.index = Date.now();
         let obj = {
            name:title.value,
            price:price.value,
            subject:subject.value,
            id:this.id,
            cate:cate.value
         };
        editProductManager(obj,1);
      })
   }

   getCart(_index)
   {
      let newDiv = document.createElement("div");
      newDiv.className = "box";
      newDiv.innerHTML = `
      <h3>${this.name}</h3>
      <p>
        ${this.subject}
      </p>
      <div style="color:rgb(77, 77, 76);">Price: ${this.price}$</div>
      `;
      document.querySelector(this.parent).append(newDiv);
      let btn = document.createElement("button");
      btn.className="btn btn-dark";
      btn.innerHTML = "Remove";
      newDiv.append(btn);
      btn.addEventListener("click",()=>{
           
       deleteFromCart(_index);

      })
   }
}
export default ProductClass;
