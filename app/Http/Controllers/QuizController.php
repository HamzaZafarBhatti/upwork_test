<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //
    public function show($id)
    {
        try {
            $quiz = Quiz::with('questions.answers')->find($id);
            if(!empty($quiz)) {
                return response()->json([
                    'success' => true,
                    'errors' => [],
                    'data' => $quiz
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'Quiz not found'
                    ],
                    'data' => null
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'errors' => [
                    $th->getMessage()
                ],
                'data' => null
            ], 500);
        }
    }
}
