<?php

namespace App\Http\Controllers\MongoDB;

use App\Models\MongoDB\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    /**
     * Sample controller instance.
     *
     * @return void
     */
    protected $person_model;
    public function __construct()
    {
        $this->person_model = new Person;
    }

    public function get_persons() {
        $data = $this->person_model->get_person();

        return json_encode($data);
    }

    public function create_person(Request $request) {
        // Use of Redis cache
        $data = $this->person_model->person_create($request);

        return $data;
    }

    public function set_information(Request $request) {
        if (!$request->has('id'))
            return json_encode("Please Pass Id");
        // Use of Redis cache
        $data = $this->person_model->set_my_information($request);

        return $data;
    }

    public function addBooks(Request $request) {
        if (!$request->has('id'))
            return json_encode("Please Pass Id");

        $data = $this->person_model->add_books($request);

        return $data;

    }

    public function add_to_car(Request $request) {
        if (!$request->has('id'))
            return json_encode("Please Pass Id");
        if (!$request->has('car_name'))
            return json_encode("Please Pass car_name");

        $data = $this->person_model->add_car($request);

        return $data;
    }
}
