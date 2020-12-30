<?php

namespace App\Models\MongoDB;

use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model;
use \MongoDB\BSON\UTCDateTime as DateTime;

class Test extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'tests';
    protected $fillable = ["title", "des", "date"];

    protected $dates = ['date'];

    public function create_test($request) {
        $data = Test::create(['title' => $request->input('title'), 'des' => $request->input('des'), 'date' => $request->input('date')]);

        return $data ? $data : false;
    }

    public function delete_test($request) {
        if (!$request->has('id'))
            return false;
        $test = Test::find($request->input('id'));
        if ($test->delete())
            return true;
    }

    // ito is using skip and take to get pagination using the right query provided by the library
    public function get_tests($request) {
        $default_limit = 50;

        $data = Test::skip($request->input('offset') ? $request->input('offset') : 0)
        ->take($request->input('limit') ? $request->input('limit') :  $default_limit)
        ->project(['the_title' => '$title', 'des' => '$des'])
        ->get();

        return $data ? $data : false;
    }

    // ito is for integrating searching data in between dates
    public function get_dates_inbetween($request) {

        $start = new DateTime(Carbon::parse($request->input('date_from'))); // we use the use \MongoDB\BSON\UTCDateTime as DateTime; to make this work here.
        $to = new DateTime(Carbon::parse($request->input('date_to')));

        $data = Test::whereBetween('date', array($start, $to))->get();

        return $data;
    }
}
