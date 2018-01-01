<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\v1\Category;
use App\Models\Answer;
use App\Models\AnswerSheet;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
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

    public function showAll($course_id=1)
    {
        $exams=Exam::whereCourseId($course_id)->get();
        $data=[];
        foreach ($exams as $exam)
        {
            $data[]=['content'=>$exam,'questionCount'=>$exam->questions->count()];
        }
        return response()->json([
            'data'=> $data,
            'courses'=>Course::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return new CoursesCollection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //{"examName":"New Exam","questions":[{"title":"questions 1","answers":["answer1","answer2","answer3","answer4"],"trueAnswer":[0]}]}
//        dd('fasd');
        $exam = Exam::create([
            'title' => $request->examName,
            'expiry' => Carbon::now()->addMonth(1),
            'course_id' => $request->course_id
        ]);
        foreach ($request->questions as $question) {
            $initQuestion = $exam->questions()->create(['title' => $question['title']]);
            foreach ($question['answers'] as $key => $answer) {
                $initAnswer = $initQuestion->answers()->create(['title' => $answer]);
                if (in_array($key, $question['trueAnswer']))
                    $initAnswer->correctAnswer()->create(['isCorrect' => true]);
            }
        }
        return response()->json([
            'msg' => 'success',
            'status' => '200'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $data=[
            'exam'=>$exam,
            'questions'=>$exam->questions()->with('answers')->get(),
        ];
        return response()->json(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }

    public function takeQuizExam($exam_id=1)
    {

        $exam=Exam::find($exam_id);
        $question=$exam->questions()->paginate(1);
        $data=[
            'data'=>[
                'exam'=>$exam,
                'question'=>$question,
                'answers'=>$question[0]->answers
            ]
        ];
        return response()->json($data);
    }

    public function saveTakedQuiz(Request $request)
    {
        $answerCount=sizeof($request->userAnswer);
        $question=Question::find($request->userAnswer[0]['question_id']);
        $data=[];
        $correctSelected=0;
        $data['answerIds']=[];
        foreach ($request->userAnswer as $answer)
        {
            array_push($data['answerIds'],$answer['answerId']);
        }
        $reallAnswers=Answer::find($data['answerIds']);
        foreach ($reallAnswers as $answer)
        {
            if($answer->correctAnswer()->get()[0]->isCorrect)
                $correctSelected++;
        }
        return $data;
    }
}
