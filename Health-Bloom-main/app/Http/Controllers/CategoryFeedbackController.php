<?php

namespace App\Http\Controllers;
use App\Models\CategoryFeedback;
use Illuminate\Http\Request;

class CategoryFeedbackController extends Controller
{
    public function index()
    {
        $categories = CategoryFeedback::all();
        return view ('categoryFeedback.backend.index')->with('categories', $categories);
    }
    
    public function create()
    {
        return view('categoryFeedback.backend.createCategory');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        CategoryFeedback::create($input);
        return redirect('category')->with('flash_message', 'CategoryFeedback Addedd!');  
    }
    
    public function show($id)
    {
        $categoryFeedback = CategoryFeedback::find($id);
        return view('categoryFeedback.backend.showCategory')->with('categories', $categoryFeedback);
    }
    
    public function edit($id)
    {
        $category = CategoryFeedback::find($id);
        return view('categoryFeedback.backend.editCategory')->with('categories', $category);
    }
  
    public function update(Request $request, $id)
    {
        $category = CategoryFeedback::find($id);
        $input = $request->all();
        $category->update($input);
        return redirect('category')->with('flash_message', 'categoryFeedback Updated!');  
    }
  


    public function destroy($id)
    {
        CategoryFeedback::destroy($id);
        return redirect('category')->with('flash_message', 'CategoryFeedback deleted!');  
    }
}
