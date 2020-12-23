<?php

namespace App\Models\MongoDB;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MyInformation extends Eloquent {

    protected $connection = 'mongodb'; //need to set the connection
    protected $collection = 'my_information'; //pangalan ng table
    protected $fillable = ["first_name","last_name"]; // add fillable para alam ni mongodb kong anu ang mga fields na pwedi lagyan
}
