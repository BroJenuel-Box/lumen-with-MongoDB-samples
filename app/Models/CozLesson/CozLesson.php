<?php

namespace App\Models\CozLesson;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CozLesson extends Eloquent {

    protected $connection = 'utalk_server'; //need to set the connection
    protected $collection = 'coz_lessons'; //pangalan ng table

    public function coz_lesson_changes()
    {
        return $this->hasMany(CozLessonChanges::class,'lesson_id','_id');
    }

    public function getLessonChanges($request) {
        $lesson = CozLesson::find($request->input('id'));
        $data  = $lesson->coz_lesson_changes()->get();


        return $data;
    }

}