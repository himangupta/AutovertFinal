<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";
    public $id;
    public $brandId;
    public $catId;
    public $name;
    public $description;
    public $mrp;
    public $cost;
    public $imageUrl;
}
