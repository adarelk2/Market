import {confirmLoading} from "./admin_manager.js";
class LoadingClass
{
   constructor(_parent,_order,_userName,_time,_index)
   {
      this.parent = _parent;
      this.order = _order;
      this.userName = _userName;
      this.time =_time;   
      this.index =_index;
   }
    render()
   {
   let newDiv = document.createElement("div");
   newDiv.className ="row col-12 justify-content-between text-center";
   newDiv.innerHTML =`
   <div class="col-md-1 mb-3">${this.index+1}.</div>
   <div class="col-md-3 mb-3">${this.userName}</div>
   <div class="col-md-2 mb-3">${this.time}</div>
   <div class="col-md-2 mb-3"><a href='${this.order}' target=_blank>Click here</a></div>`;
   document.querySelector(this.parent).append(newDiv);
   let insideDiv = document.createElement("div");
   insideDiv.className="col-md-4 mb-3";
   newDiv.append(insideDiv);
   let confrimBtn = document.createElement("button");
   let cancelBtn = document.createElement("button");
   confrimBtn.className = "btn btn-success mr-1";
   confrimBtn.innerHTML = "Confrim";
   cancelBtn.className = "btn btn-danger";
   cancelBtn.innerHTML = "Cancel";
    insideDiv.append(confrimBtn,cancelBtn);  
    confrimBtn.addEventListener("click",()=>{
      confirmLoading(this.order,this.userName,1);
    })
    cancelBtn.addEventListener("click",()=>{
      confirmLoading(this.order,this.userName,0);
    })
   }
}
export default LoadingClass ;