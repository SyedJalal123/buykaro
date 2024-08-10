<?php

use App\Models\Product;
use App\Models\Order;
use App\Models\Collection;
use App\Models\Cart;

function get_product_data($id){
    $product = Product::where('id',$id)->with('variations')->first();
    return $product;
}
function get_collections(){
    $collections = Collection::all();
    return $collections;
}
function get_carts(){
    if(isset(auth()->user()->id)){
        $cart = Cart::where('customer_id',auth()->user()->id)->get();
        return $cart;
    }else {
        return null;
    }
}
function active_orders_count(){
    $orders = Order::where('status','unfulfilled')->get();
    return count($orders);
}
function collection_products($title){
    $products = Product::where('collections','LIKE','%'.$title.'%')->get();
    return $products;
}