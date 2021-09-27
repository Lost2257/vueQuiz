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

    public function submit(Request $request) {
        Quiz::create([
            'answer' => request('answer')
        ]);
        return response()->json(null,200);
    }
    public function countAnswer(){
        $total = Quiz::all('answer')->count();
        $good = Quiz::where('answer','=','good')->count();
        $bad = Quiz::where('answer','=','bad')->count();
        $neutral = Quiz::where('answer','=','neutral')->count();
        $fair = Quiz::where('answer','=','fair')->count();
        $goodPercent = $good / $total * 100;
        $fairPercent = $fair / $total * 100;
        $neutralPercent = $neutral / $total *100;
        $badPercent = $bad / $total * 100;

        return response()->json(array(
            'total' => $total,
            'good' => $good,
            'bad' => $bad,
            'neutral' => $neutral,
            'fair' => $fair,
            'goodPercent' => $goodPercent,
            'fairPercent' => $fairPercent,
            'neutralPercent' => $neutralPercent,
            'badPercent' => $badPercent,
            ),200);
    }
}
