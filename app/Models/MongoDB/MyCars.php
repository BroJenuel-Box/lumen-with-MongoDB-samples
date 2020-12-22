<?php

namespace App\Models\MongoDB;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MyCars extends Eloquent {

    protected $connection = 'mongodb'; //need to set the connection
    protected $collection = 'my_cars'; //pangalan ng table
    protected $fillable = ["car_name"];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
