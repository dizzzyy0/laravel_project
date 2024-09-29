<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::all();
        return view('answer.index', compact('answers'));
    }

    public function create()
    {
        $question = Question::all();
        return view('answer.create',compact('question'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'required|string|max:255',
            'is_correct' => 'required|boolean',
        ]);

        Answer::create($request->all());

        return redirect()->route('answer.index')->with('success', 'Answer created successfully!');
    }

    public function show($id)
    {
        $answer = Answer::findOrFail($id);
        return view('answer.show', compact('answer'));
    }

    public function edit($id)
    {
        $answer = Answer::findOrFail($id);
        $question = Question::all();
        return view('answer.edit', compact('answer','question'));
    }

    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);

        $request->validate([
            'question_id' => 'exists:questions,id',
            'answer_text' => 'string|max:255',
            'is_correct' => 'boolean',
        ]);

        $answer->update($request->all());

        return redirect()->route('answer.index')->with('success', 'Answer updated successfully!');
    }

    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return redirect()->route('answer.index')->with('success', 'Answer deleted successfully!');
    }
}
