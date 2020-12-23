<?php

namespace App\Models\CozLesson;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CozLessonChanges extends Eloquent {

    protected $connection = 'utalk_server'; //need to set the connection
    protected $collection = 'coz_lesson_changes'; //pangalan ng table


    public function get_cozlesson_changes() {

    }

}