<?php
/**
 * Created by PhpStorm.
 * User: rohan
 * Date: 10/11/2017
 * Time: 12:27 PM
 */

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $table = "brands";
    public $id;
    public $name;
}