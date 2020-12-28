<?php

namespace App\Models\CozLesson;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CozLessonChanges extends Eloquent {

    protected $connection = 'utalk_server'; //need to set the connection
    protected $collection = 'coz_lesson_changes'; //pangalan ng table


    public function get_cozlesson_changes($request, $lesson_ids = []) {

        $limit = $request->has('limit') ? (int)$request->input('limit') : 10;
        $skip = $request->has('page') ? ($limit * (int)$request->input('page')) - ($limit) : 0;

        $data = CozLessonChanges::where(function($query) use ($request, $lesson_ids) {

            if ($lesson_ids) {

                $setLessonIds = function($lesson_id) {
                    return new \MongoDB\BSON\ObjectId($lesson_id);
                };

                $lesson_ids = array_map($setLessonIds, $lesson_ids);

                $query->whereIn('lesson_id', $lesson_ids);
            }
                

            $query->whereNotNull('lesson_id');

        })->skip($skip)->take($limit)->get();

        return $data;
    }

}