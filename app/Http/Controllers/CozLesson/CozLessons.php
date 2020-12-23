<?php

namespace App\Http\Controllers\CozLesson;

use App\Models\CozLesson\CozLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CozLessons extends Controller
{
    /**
     * Sample controller instance.
     *
     * @return void
     */
    protected $cozLesson_model;
    public function __construct()
    {
        $this->cozLesson_model = new CozLesson;
    }

    public function get_cozlesson_changes(Request $request) {
        $data = $this->cozLesson_model->getLessonChanges($request);

        return $data;
    }
}