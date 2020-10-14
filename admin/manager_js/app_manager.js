import {declareViewEvents} from "./declareViewEvents.js";
import {getOrderList} from "./admin_manager.js";
window.onload = ()=>
{
   declareViewEvents();
   getOrderList();
}