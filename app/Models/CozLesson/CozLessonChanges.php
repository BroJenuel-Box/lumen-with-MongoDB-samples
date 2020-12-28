<?php

namespace App\Models\CozLesson;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CozLessonChanges extends Eloquent {

    protected $connection = 'utalk_server'; //need to set the connection
    protected $collection = 'coz_lesson_changes'; //pangalan ng table


    public function get_cozlesson_changes($request) {

        $limit = $request->has('limit') ? (int)$request->input('limit') : 10;
        $skip = $request->has('page') ? ($limit * (int)$request->input('page')) - ($limit) : 0;

        $data = CozLessonChanges::where(function($query) use ($request) {

            //find lesson id
            // if ($request->has('lesson_id'))
            //     $query->where('lesson_id',new \MongoDB\BSON\ObjectId($request->input('lesson_id')));
            
            if ($request->has('lesson_id'))
                $query->whereIn('lesson_id', [new \MongoDB\BSON\ObjectId('5fdd41cfc8c832ba57cdb3a6'), new \MongoDB\BSON\ObjectId('5fd84e467f180d5db02be90f')]);

            $query->whereNotNull('lesson_id');

        })->skip($skip)->take($limit)->get();

        return $data;
    }

}