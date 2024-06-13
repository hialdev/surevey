<?php
namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('manage.read', compact('questions'));
    }

    public function create()
    {
        return view('manage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'input_type' => 'required|integer',
            'options' => 'nullable|array',
        ]);

        $question = new Question();
        $question->question = $request->question;
        $question->input_type = $request->input_type;
        if ($request->input_type == 5) {
            $question->options = json_encode($request->options);
        }
        $question->save();

        return redirect()->route('manage.read')->with('success', 'Question created successfully.');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('manage.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'input_type' => 'required|integer',
            'options' => 'nullable|array',
        ]);

        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->input_type = $request->input_type;
        if ($request->input_type == 5) {
            $question->options = json_encode($request->options);
        }
        $question->save();

        return redirect()->route('manage.read')->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('manage.read')->with('success', 'Question deleted successfully.');
    }
}
