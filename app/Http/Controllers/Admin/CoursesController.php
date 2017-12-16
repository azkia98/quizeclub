<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\v1\CategoryCollection;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Courses as CoursesResource;
use App\Http\Resources\CoursesCollection;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        return new CoursesCollection($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return response()->json($categories=Category::all()->pluck('title')->toArray());
        return new CategoryCollection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Course::create($request->all());
        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Course $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return new CoursesResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return 'ok';
    }
}
