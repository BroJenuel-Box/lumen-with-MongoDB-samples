<?php

namespace App\Http\Controllers\MongoDB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MongoDB\Test;

class TestController extends Controller
{
    /**
     * Sample controller instance.
     *
     * @return void
     */
    protected $test_model;
    public function __construct()
    {
        $this->test_model = new Test;
    }

    public function create_test(Request $request) {
        $create_data = $this->test_model->create_test($request);

        return response()->json($create_data);
    }

    function get_tests(Request $request) {
        $data = $this->test_model->get_tests($request);

        return response()->json($data);
    }

    function get_tests_with_dates(Request $request) {
        $data = $this->test_model->get_dates_inbetween($request);

        return response()->json($data);
    }

    function delete_test(Request $request) {
        $test = $this->test_model->delete_test($request);

        return $test ? 'Deleted' : 'Not Deleted';
    }
}
