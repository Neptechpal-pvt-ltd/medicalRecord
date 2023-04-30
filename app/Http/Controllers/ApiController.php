<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allCategories()
    {
        $catgories = Category::where('status',1)->get()->map(function($category) {
            return [
                'id' => $category->id,
                'title' => $category->title,
                'description' => $category->description,
                'icon' => $category->icon ? asset('uploads/question-images').'/'.$category->icon : null
                // 'sets' => 
            ];
        });
        return response()->json(['categories' => $catgories, 'message'=> 'Categories Listed Successfully']);
    }

    public function getQuestionByCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $questions = Question::where('category_id',$categoryId)->where('status',1)->get()->map(function($question){
            return [
                'id' => $question->id,
                'category_id' => $question->category_id,
                'title' => $question->title,
                'description' => $question->description,
                'image_path' => $question->image ? asset('uploads/question-images').'/'.$question->image : null,
                'options' =>  [$question->option1,$question->option2,$question->option3,$question->option4],
                'correct_option' => $question->correct
            ];
        });
        return response()->json(['categories' => $category, 'questions' => $questions, 'message'=> 'Questions Listed Successfully']);
    }


    // $question = Question::findOrFail($questionId);
    //     $question->options = [$question->option1,$question->option2,$question->option3,$question->option4];
}
