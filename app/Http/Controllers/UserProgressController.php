<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\UserProgress;
use Illuminate\Http\Request;

class UserProgressController extends Controller
{
    public function index()
    {
        $progress = UserProgress::all();
        return view('userProgress.index', compact('progress'));
    }

    public function create()
    {
        $lesson = Lesson::all();
        $course = Course::all();
        $quiz = Quiz::all();
        $user = User::all();
        return view('userProgress.create',compact('user','quiz','lesson','course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'quiz_id' => 'nullable|exists:quizzes,id',
            'status' => 'required|string',
            'score' => 'nullable|integer|min:0',
            'completion_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        UserProgress::create($request->all());

        return redirect()->route('userProgress.index')->with('success', 'Progress created successfully!');
    }

    public function show($id)
    {
        $progress = UserProgress::findOrFail($id);
        return view('userProgress.show', compact('progress'));
    }

    public function edit($id)
    {
        $progress = UserProgress::findOrFail($id);
        $lesson = Lesson::all();
        $course = Course::all();
        $quiz = Quiz::all();
        $user = User::all();
        return view('userProgress.edit', compact('progress','user','quiz','lesson','course'));
    }

    public function update(Request $request, $id)
    {
        $progress = UserProgress::findOrFail($id);

        $request->validate([
            'user_id' => 'exists:users,id',
            'course_id' => 'exists:courses,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'quiz_id' => 'nullable|exists:quizzes,id',
            'status' => 'string',
            'score' => 'nullable|integer|min:0',
            'completion_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        $progress->update($request->all());

        return redirect()->route('userProgress.index')->with('success', 'Progress updated successfully!');
    }

    public function destroy($id)
    {
        $progress = UserProgress::findOrFail($id);
        $progress->delete();

        return redirect()->route('userProgress.index')->with('success', 'Progress deleted successfully!');
    }
}
