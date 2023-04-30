<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'title' => ['required','string'],
            'description' => ['nullable','string'],
            'icon' => ['required','image','max:2000']
        ]);

        $data = $request->all();
        if(file_exists($request->file('icon'))){
            $request->file('icon')->move(public_path('uploads/category-images'), $request->file('icon')->getClientOriginalName());
            $data['icon'] = $request->file('icon')->getClientOriginalName();
        }
        $category = Category::create($data);
        return redirect()->route('category.index')->with('success','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required','string'],
            'description' => ['nullable','string'],
            'icon' => ['nullable','image','max:2000'],
            'status' => ['required']
        ]);

        if(file_exists($request->file('icon'))){
            $request->file('icon')->move(public_path('uploads/category-images'), $request->file('icon')->getClientOriginalName());
            $category->icon = $request->file('icon')->getClientOriginalName();
        }
        $category->title = $request->get('title');
        $category->description = $request->get('description');
        $category->status = $request->get('status');
        $category->title = $request->get('title');
        $category->save();
        return redirect()->route('category.index')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
