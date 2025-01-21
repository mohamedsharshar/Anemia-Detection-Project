<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorycenter;

class CategorycenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriescenter = Categorycenter::all();
        return view ('admin.center.categoriescenter')->with('categoriescenter',$categoriescenter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.center.createCategory');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'categoryName' => 'required|min:8'
       
    ]);
 
         $input = $request->all();
        Categorycenter::create($input);
        return redirect('categorycenter')->with('flash_message', 'Category Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Categorycenter::find($id);
        return view('admin.center.editcategory')->with('categories', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
        'categoryName' => 'required|min:8'
       
    ]);
        $category = Categorycenter::find($id);
        $input = $request->all();
        $category->update($input);
        return redirect('categorycenter')->with('flash_message', 'category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorycenter::destroy($id);
        return redirect('categorycenter')->with('flash_message', 'category deleted!'); 
    }
}
