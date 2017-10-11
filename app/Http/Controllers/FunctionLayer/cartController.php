<?php

namespace App\Http\Controllers\FunctionLayer;

use App\model\cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class cartController extends Controller
{
    public static function addToCart(array $array){
        $toCheckArray=array();
        $toCheckArray['product_id']=$array['product_id'];
        $toCheckArray['per_item_cost']=$array['per_item_cost'];
        $cartDetails=cart::where($toCheckArray)->get();
        if($cartDetails->count()){
            $cartDetailsArray = $cartDetails->toArray();
            foreach ( $cartDetailsArray as $item) {
                $array['quantity']+=$item['quantity'];
                $array['total_cost']=$array['quantity']*$array['per_item_cost'];
            }
            cart::where($toCheckArray)->update($array);
        }else{
            $array['total_cost']=$array['quantity']*$array['per_item_cost'];
            print_r($array);
            cart::create($array);
        }
        return 200;
    }

    public static function deleteFromCart($id){
        cart::where("id",$id)->delete();
        return 200;
    }

    public static function getCartProducts(){
        return DB::table("cart as ca")
            ->leftjoin("products as p","ca.product_id","=","p.id")
            ->leftjoin("brands as b","b.id","=","p.brand_id")
            ->leftjoin("categories as c","c.id","=","p.cat_id")
            ->get(array('ca.id','b.name as brand','c.name as category','p.name','description','ca.quantity','ca.per_item_cost','ca.total_cost','p.image_url'));
    }
}
