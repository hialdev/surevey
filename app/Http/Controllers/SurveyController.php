<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function index() {
        return view('survey.pre');
    }

    public function going() {
        $questions = Question::all();
        return view('survey.on', compact('questions'));
    }
    
    public function finish(Request $request) {
        $user = Auth::user();
        $data = $request->all();
        foreach ($data['responses'] as $questionId => $response) {
            Response::create([
                'id' => (string) Str::uuid(),
                'question_id' => $questionId,
                'user_id' => $user->id,
                'response' => $response,
            ]);
        }
        return redirect()->route('finish')->with('success', 'Survey responses submitted successfully.');
    }

    public function finished() {
        return view('survey.end');
    }
}
