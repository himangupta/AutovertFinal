<?php
/**
 * Created by PhpStorm.
 * User: rohan
 * Date: 10/11/2017
 * Time: 12:30 PM
 */

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = "categories";
    public $id;
    public $name;
}