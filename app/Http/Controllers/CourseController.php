<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ProgrammingLanguage;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        $programmingLanguages = ProgrammingLanguage::all();
        $user = User::all();
        return view('course.create', compact('programmingLanguages','user')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'difficulty_level' => 'required|string|max:50',
            'instructor_id' => 'required|exists:users,id',
            'programming_language_id' => 'required|exists:programming_languages,id',
        ]);

        Course::create($request->all());

        return redirect()->route('course.index')
                         ->with('success', 'Course created successfully!');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('course.show', compact('course')); 
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $programmingLanguages = ProgrammingLanguage::all();
        $user = User::all();
        return view('course.edit', compact('course','programmingLanguages','user')); 
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'type' => 'string',
            'difficulty_level' => 'string|max:50',
            'instructor_id' => 'exists:users,id',
            'programming_language_id' => 'exists:programming_languages,id',
        ]);

        $course->update($request->all());

        return redirect()->route('course.index')->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Course deleted successfully!');
    }
}
