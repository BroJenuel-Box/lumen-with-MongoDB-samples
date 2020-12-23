<?php


// NOTE: This is still not working
// REF: https://github.com/jenssegers/laravel-mongodb/discussions/2162#discussioncomment-236051

namespace App\Models\CozLesson;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CozLesson extends Eloquent {

    protected $connection = 'utalk_server'; //need to set the connection
    protected $collection = 'coz_lessons'; //pangalan ng table

    public function coz_lesson_changes()
    {
        return $this->hasMany(CozLessonChanges::class,'_id', 'lesson_id')->whereNotNull('lesson_id');;
    }

    public function getLessonChanges($request) {
        $lesson = CozLesson::find($request->input('id'));
        
        $data  = $lesson->coz_lesson_changes()->get();

        return $data;
    }

}