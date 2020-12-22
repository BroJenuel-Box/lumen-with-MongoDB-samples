<?php

namespace App\Models\MongoDB;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Person extends Eloquent {

    protected $connection = 'mongodb'; //need to set the connection
    protected $collection = 'person'; //pangalan ng table
    protected $fillable = ["username"];
    protected $dates = ['my_information.updated_at','my_information.created_at','my_books.updated_at','my_books.created_at'];

    // NOTE: pag embeds kasama siya sa table
    // pag embeds to many array of objects
    public function my_books(){
        return $this->embedsMany(MyBooks::class);
    }

    // embeds one ay iisang object lang
    public function my_information(){
        return $this->embedsOne(MyInformation::class);
    }


    //NOTE: gomamit ng hasMany if table is separated
    public function my_cars()
    {
        return $this->hasMany(MyCars::class);
    }





    public function get_person() {
        $data = Person::all();

        return $data;
    }

    // gawa ng person
    public function person_create($request) {
        $data = Person::create(['username' => $request->input('username')]);

        return $data ? $data : false;
    }

    // e set ung person ng person using embed relation to one
    public function set_my_information($request) {
        $person = Person::find($request->input('id'));

        $my_information = $person->my_information()->create([
                "first_name" => $request->input('first_name'),
                "last_name" => $request->input('last_name')
            ]);

        return $my_information ? $my_information : false;
    }

    //  mag add ng books ng person using embedd relation tomany
    public function add_books($request) {
        $person = Person::find($request->input('id'));

        $person->my_books()->create(['title' => $request->input('title')]);

        return $person ? $person : false;
    }



    // add data to my cars
    public function add_car($request) {
        $person = Person::find($request->input('id'));
        $person->my_cars()->create([
            'car_name' => $request->input('car_name')
        ]);

        return $person;
    }
}
