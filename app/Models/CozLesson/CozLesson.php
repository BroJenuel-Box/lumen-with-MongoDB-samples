<?php


// NOTE: This is still not working
// REF: https://github.com/jenssegers/laravel-mongodb/discussions/2162#discussioncomment-236051

namespace App\Models\CozLesson;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CozLesson extends Eloquent {

    protected $connection = 'utalk_server'; //need to set the connection
    protected $collection = 'coz_lessons'; //pangalan ng table
    protected $primaryKey = '_id';

    public function coz_lesson_changes()
    {
        // Note: if the field in a different 
        // NOTE: according to the library this is applicable only for string foreign keys, cant be available for
        // Object Id foreign keys.
        return $this->hasMany(CozLessonChanges::class, 'lesson_id');
    }

    public function getCozLesson($request) {
        $data = CozLesson::skip(0)
        ->take(10)
        ->get();

        return $data;
    }

    public function getLessonChanges($request) {
        $lesson = CozLesson::find($request->input('id'));
        $data  = $lesson->coz_lesson_changes()->get();

        return $data ? $data : false;   
    }

}