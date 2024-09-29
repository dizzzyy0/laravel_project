<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('question.index', compact('questions'));
    }

    public function create()
    {
        $quiz = Quiz::all();
        return view('question.create', compact('quiz'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question_text' => 'required|string',
            'question_type' => 'required|string',
        ]);

        Question::create($request->all());

        return redirect()->route('question.index')->with('success', 'Question created successfully!');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('question.show', compact('question'));
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quiz = Quiz::all();
        return view('question.edit', compact('question','quiz'));
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'quiz_id' => 'exists:quizzes,id',
            'question_text' => 'string',
            'question_type' => 'string',
        ]);

        $question->update($request->all());

        return redirect()->route('question.index')->with('success', 'Question updated successfully!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('question.index')->with('success', 'Question deleted successfully!');
    }
}
