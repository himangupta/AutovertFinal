<?php

namespace App\Http\Controllers\FunctionLayer;

use App\model\brands;
use App\model\categories;
use App\model\products;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    public static function getProducts(){
        return DB::table("products as p")
            ->leftjoin("brands as b","b.id","=","p.brand_id")
            ->leftjoin("categories as c","c.id","=","p.cat_id")
            ->leftjoin("cart as ca","ca.product_id","=","p.id")
            ->get(array('p.id','b.name as brand','c.name as category','p.name','description','mrp','cost','image_url','p.quantity','ca.quantity as incartquantity'));
    }
}
