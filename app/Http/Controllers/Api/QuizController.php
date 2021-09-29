<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return QuizResource::collection(Quiz::all());
    }

    public function submit(Request $request)
    {
        Quiz::create([
            'answer' => request('answer')
        ]);
        return response()->json(['message' => 'success'], 200);
    }
    public function countAnswer()
    {
        $total = Quiz::all('answer')->count();
        $good = Quiz::where('answer', '=', 'good')->count();
        $bad = Quiz::where('answer', '=', 'bad')->count();
        $neutral = Quiz::where('answer', '=', 'neutral')->count();
        $fair = Quiz::where('answer', '=', 'fair')->count();
        $percentage = \DB::table('quizzes') ->select([ 'answer', \DB::raw('(count(answer) / (select count(1) from quizzes) * 100) as percentage') ]) ->groupBy('answer') ->get();



        return response()->json([
            'total' => $total,
            'good' => $good,
            'bad' => $bad,
            'neutral' => $neutral,
            'fair' => $fair,
            'percentage' => $percentage,
            ], 200);
    }
}
