<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addview()
    {
        if(Auth::user()->usertype==1)
        {
            return view('admin.add_specialist');
        }
        else 
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        Validator::make($request->all(), [
            'specialistname'=>'required',
            'file'=>'required',
            'phonenumber'=>'required',
            'speciality'=>'required',
        ],[
            'specialistname.required'=>"This field is required",
            'file.required'=>"This field is required",
            'phonenumber.required'=>"This field is required",
            'speciality.required'=>"This field is required",
        ])->validate();
        if(Auth::user()->usertype==1)
        {
            $specialist = new Specialist;

            $image = $request->file;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('specialistimage', $imagename);
            $specialist->image = $imagename;

            $specialist->name = $request->specialistname;
            $specialist->phone = $request->phonenumber;
            $specialist->speciality = $request->speciality;

            $specialist->save();

            return redirect('/show_specialist_view')->with('message', 'Specialist Added Seccessfully !');
        }
        else 
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showview()
    {
        if(Auth::user()->usertype==1)
        {
            $specialists = Specialist::all();
            return view('admin.show_specialist', compact('specialists'));
        }
        else 
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editspecialist($id)
    {
        if(Auth::user()->usertype==1)
        {
            $specialist = Specialist::find($id);
            return view('admin.edit_specialist', compact('specialist'));
        }
        else 
        {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatespecialist(Request $request, $id)
    {
        if(Auth::user()->usertype==1)
        {
            $specialist = Specialist::find($id);
            $specialist->name = $request->specialistname;
            $specialist->phone = $request->phonenumber;
            $specialist->speciality = $request->speciality;

            $image = $request->file;
            if($image)
            {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->file->move('specialistimage', $imagename);
                $specialist->image = $imagename;
            }

            $specialist->save();

            return redirect('/show_specialist_view')->with('message', 'Specialist Edited Seccessfully !');
        }
        else 
        {
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletespecialist($id)
    {
        if(Auth::user()->usertype==1)
        {
            $specialist = Specialist::find($id);
            $specialist->delete();
            return redirect()->back();
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function specialists()
    {   
            $specialists = Specialist::all();
            return view('user.specialists', compact('specialists'));

    }
}
