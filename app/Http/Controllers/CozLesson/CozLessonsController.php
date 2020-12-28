<?php

namespace App\Http\Controllers\CozLesson;

use App\Models\CozLesson\CozLesson;
use App\Models\CozLesson\CozLessonChanges;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CozLessonsController extends Controller
{
    /**
     * Sample controller instance.
     *
     * @return void
     */
    protected $cozLesson_model;
    protected $cozLessonChanges_model;
    public function __construct()
    {
        $this->cozLesson_model = new CozLesson;
        $this->cozLessonChanges_model = new CozLessonChanges;
    }

    public function getCozLesson(Request $request) {
        $data = $this->cozLesson_model->getCozLesson($request);

        return $data;
    }

    public function get_cozlesson_changes(Request $request) {
        $data = $this->cozLessonChanges_model->get_cozlesson_changes($request);

        return $data;
    }

    public function get_change_lesson(Request $request) {
        $data = $this->cozLesson_model->getLessonChanges($request);

        return json_encode($data);
    }
}