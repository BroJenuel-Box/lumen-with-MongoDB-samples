<?php

namespace App\Models\MongoDB;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MyBooks extends Eloquent {

    protected $connection = 'mongodb'; //need to set the connection
    protected $collection = 'my_books'; //pangalan ng table
    protected $fillable = ["title"];
}
