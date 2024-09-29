<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        $recommendations = Recommendation::all();
        return view('recommendation.index', compact('recommendations'));
    }

    public function create()
    {
        $user = User::all();
        $course = Course::all();
        return view('recommendation.create',compact('user','course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'nullable|exists:courses,id',
            'recommendation_text' => 'required|string',
        ]);

        Recommendation::create($request->all());

        return redirect()->route('recommendation.index')->with('success', 'Recommendation created successfully!');
    }

    public function show($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        return view('recommendation.show', compact('recommendation'));
    }

    public function edit($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        $user = User::all();
        $course = Course::all();
        return view('recommendation.edit', compact('recommendation','user','course'));
    }

    public function update(Request $request, $id)
    {
        $recommendation = Recommendation::findOrFail($id);

        $request->validate([
            'user_id' => 'exists:users,id',
            'course_id' => 'nullable|exists:courses,id',
            'recommendation_text' => 'string',
        ]);

        $recommendation->update($request->all());

        return redirect()->route('recommendation.index')->with('success', 'Recommendation updated successfully!');
    }

    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        $recommendation->delete();

        return redirect()->route('recommendation.index')->with('success', 'Recommendation deleted successfully!');
    }
}
