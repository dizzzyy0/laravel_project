<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('lesson.index', compact('lessons'));
    }

    public function create()
    {
        $course = Course::all();
        return view('lesson.create',compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer',
        ]);

        Lesson::create($request->all());

        return redirect()->route('lesson.index')->with('success', 'Lesson created successfully!');
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lesson.show', compact('lesson'));
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $course = Course::all();
        return view('lesson.edit', compact('lesson','course'));
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $request->validate([
            'course_id' => 'exists:courses,id',
            'title' => 'string|max:255',
            'content' => 'string',
            'order' => 'integer',
        ]);

        $lesson->update($request->all());

        return redirect()->route('lesson.index')->with('success', 'Lesson updated successfully!');
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return redirect()->route('lesson.index')->with('success', 'Lesson deleted successfully!');
    }
}
