<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Categorycenter;
use Illuminate\Support\Facades\Auth;



class CenterController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::all();
        return view ('admin.center.centers')->with('centers',$centers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriescenter = Categorycenter::all();

        return view ('admin.center.createCenter', compact('categoriescenter'));
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
        'name' => 'required|min:4',
        'description'=>'required',
        'address'=>'required|min:4',
        'email'=>'required|email:rfc,dns',
        'phone'=>'required',

    ]);

        $data = new Center;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $imagecenter = $request->file;
        $imagename = time().'.'.$imagecenter->getClientOriginalExtension();
        $request->file->move('imagecenter', $imagename);
        $data->imagecenter = $imagename;
        $data->categorycenter_id = $request->categorycenter;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('center')->with('flash_message', 'Center Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $center = Center::find($id);
        return view('admin.center.showcenter')->with('centers', $center);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $categoriescenter = Categorycenter::all();

        $center = Center::find($id);
        return view('admin.center.editcenter',compact('categoriescenter'))->with('centers', $center);;
    
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
        'name' => 'required|min:4',
        'description'=>'required',
        'address'=>'required|min:4',
        'email'=>'required|email:rfc,dns',
        'phone'=>'required',

    ]);
        
        $center = Center::find($id);
        $center->name = $request->name;
        $center->description = $request->description;
        $center->address = $request->address;
        $center->email = $request->email;
        $center->phone = $request->phone;
        $imagecenter = $request->file;
        if($imagecenter)
        {
            $imagename = time().'.'.$imagecenter->getClientOriginalExtension();
            $request->file->move('imagecenter', $imagename);
            $center->imagecenter = $imagename;
        }
       
         $center->save();
        return redirect('center')->with('flash_message', 'center Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Center::destroy($id);
        return redirect('center')->with('flash_message', 'Center deleted!'); 
    }

    public function search(Request $request)
    {
        $output="";
        $center=Center::where('name','Like','%'.$request->search.'%')->orWhere('address','Like','%'.$request->search.'%')->orWhere('email','Like','%'.$request->search.'%')->orWhere('phone','Like','%'.$request->search.'%')->get();
        
        foreach($center as $center)
        {
            
            $output.=
            '<tr>
            <td> '.$center->name.'</td>
                <td>'.$center->description.' </td>
                <td>'.$center->address.' </td>
                <td>'.$center->email.'</td>
                <td>'.$center->phone.' </td>   
            </tr>'; 
        }

        return response($output);

    }
}
