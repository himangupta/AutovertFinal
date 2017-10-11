<?php
/**
 * Created by PhpStorm.
 * User: rohan
 * Date: 10/11/2017
 * Time: 7:40 PM
 */

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = "cart";
    protected $fillable = ['product_id', 'quantity', 'per_item_cost','total_cost'];
    protected $primaryKey = 'id';

    public $timestamps = false;

//    public $product_id;
//    public $quantity;
//    public $per_item_cost;
//    public $total_cost;
}

