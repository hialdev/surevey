<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
    {
        $responses = Response::select('responses.user_id', 'users.name', 'users.email')
        ->leftJoin('users', 'responses.user_id', '=', 'users.id')
        ->groupBy('responses.user_id', 'users.name', 'users.email')
        ->get();

        return view('response.index', compact('responses'));
    }

    public function show($userId)
    {
        $responses = Response::where('user_id', $userId)->get();

        // Ambil data pertanyaan untuk setiap respons
        $responses->load('question');
        return view('response.show', compact('responses'));
    }
}
