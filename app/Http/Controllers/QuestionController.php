<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($categoryId)
    {
        $data['category'] = Category::findOrFail($categoryId);
        return view('question.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required'],
            'title' => ['required','string'],
            'description' => ['nullable','string'],
            'image' => ['nullable','image','max:2000'],
            'correct' => ['required','integer'],
            'option1' => ['required','string'],
            'option2' => ['required','string'],
            'option3' => ['required','string'],
            'option4' => ['required','string'],
        ]);

        
        $data = $request->all();
        if(file_exists($request->file('image'))){
            $request->file('image')->move(public_path('uploads/question-images'), $request->file('image')->getClientOriginalName());
            $data['image'] = $request->file('image')->getClientOriginalName();
        }

        $question = Question::create($data);

        return redirect()->route('category.show',$request->category_id)->with('success','Question Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId,$questionId)
    {
        $question = Question::findOrFail($questionId);
        $question->options = [$question->option1,$question->option2,$question->option3,$question->option4]; 
        $data['question'] = $question;
        return view('question.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId, $questionId)
    {
        $data['question'] = Question::findOrFail($questionId);
        $data['category'] = Category::findOrFail($categoryId);
        return view('question.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'category_id' => ['required'],
            'title' => ['required','string'],
            'description' => ['nullable','string'],
            'image' => ['nullable','image','max:2000'],
            'correct' => ['required','integer'],
            'option1' => ['required','string'],
            'option2' => ['required','string'],
            'option3' => ['required','string'],
            'option4' => ['required','string'],
        ]);

        
        $data = $request->all();
        if(file_exists($request->file('image'))){
            $request->file('image')->move(public_path('uploads/question-images'), $request->file('image')->getClientOriginalName());
            $data['image'] = $request->file('image')->getClientOriginalName();
        }

        $question->update($data);
        $question->save();
        return redirect()->route('category.show',$request->category_id)->with('success','Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
