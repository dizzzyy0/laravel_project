<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quiz.index', compact('quizzes'));
    }

    public function create()
    {
        $user = User::all();
        $course = Course::all();
        return view('quiz.create',compact('user','course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:users,id',
            'passing_score' => 'required|integer|min:0',
        ]);

        Quiz::create($request->all());

        return redirect()->route('quiz.index')->with('success', 'Quiz created successfully!');
    }

    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('quiz.show', compact('quiz'));
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $user = User::all();
        $course = Course::all();
        return view('quiz.edit', compact('quiz','user','course'));
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $request->validate([
            'title' => 'string|max:255',
            'course_id' => 'exists:courses,id',
            'instructor_id' => 'exists:users,id',
            'passing_score' => 'integer|min:0',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully!');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully!');
    }
}
