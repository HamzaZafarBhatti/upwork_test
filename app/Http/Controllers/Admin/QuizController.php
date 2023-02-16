<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    //
    public function store(Request $request)
    {
        // return $request;
        try {
            DB::transaction(function () use ($request) {
                $quiz_data = [
                    'title' => $request->title,
                    'description' => $request->description,
                ];
                $quiz = Quiz::create($quiz_data);
                if ($request->has('questions')) {
                    foreach ($request->questions as $key => $question_value) {
                        $question_data = [
                            'question' => $question_value['question'],
                            'is_mandatory' => $question_value['is_mandatory'],
                            'quiz_id' => $quiz->id
                        ];
                        $question = Question::create($question_data);
                        if (!empty($question_value['answers'])) {
                            foreach ($question_value['answers'] as $key => $answer_value) {
                                $answer_data = [
                                    'answer' => $answer_value['answer'],
                                    'is_right' => $answer_value['is_right'],
                                    'question_id' => $question->id
                                ];
                                $answer = Answer::create($answer_data);
                            }
                        }
                    }
                }
            });
            return response()->json([
                'success' => true,
                'errors' => [],
                'data' => null
            ], 200);
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
