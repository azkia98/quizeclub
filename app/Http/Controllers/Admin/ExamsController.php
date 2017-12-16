<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ExamCollection;
use App\Http\Resources\Courses as CourseResource;
use App\Http\Resources\CoursesCollection;
use function PHPSTORM_META\type;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {

        return new ExamCollection(Exam::paginate(3));
        return Exam::with('questions')->paginate(3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return new CoursesCollection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //{"examName":"New Exam","questions":[{"title":"questions 1","answers":["answer1","answer2","answer3","answer4"],"trueAnswer":[0]}]}
//        dd('fasd');
        $exam=Exam::create([
            'title'=>$request->examName,
            'expiry'=>Carbon::now()->addMonth(1),
            'course_id'=>$request->course_id
        ]);
        foreach ($request->questions as $question){
            $initQuestion=$exam->questions()->create(['title'=>$question['title']]);
            foreach($question['answers'] as $key => $answer)
            {
                $initAnswer=$initQuestion->answers()->create(['title'=>$answer]);
                if(in_array($key,$question['trueAnswer']))
                    $initAnswer->correctAnswer()->create(['isCorrect'=>true]);
            }
        }
        return response()->json([
            'msg'=>'success',
            'status'=>'200'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
