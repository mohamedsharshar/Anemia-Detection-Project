<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 
use App\Models\Material; 
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{

    public function index($id)
    {
        $materials = Material::where('service_id', $id)->get();
        return view ('materials.index',compact('id'))->with('materials', $materials);
    }

    public function create($id)
    {
        $service = Service::find($id);
        return view('materials.create')->with('services', $service);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|min:4',
            'name' => 'required|min:4',
            'description'=>'required|min:5',
            'price'=>'required|integer|between:100,1000000',
            'nbItems'=>'required|integer|between:10,10000',
    
        ]);
        $data = new Material;
        $data->reference = $request->reference;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->nbItems = $request->nbItems;
        $data->service_id = $request->service_id;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('/center/serviceAdmin/material/'.$request->service_id)->with('flash_message', 'Material Addedd!'); 
    }

    public function show($id)
    {
        $material = Material::find($id);
        return view('materials.show')->with('materials', $material);
    }

    public function edit($id)
    {
        $material = Material::find($id);
        return view('materials.edit')->with('materials', $material);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reference' => 'required|min:4',
            'name' => 'required|min:4',
            'description'=>'required|min:5',
            'price'=>'required|integer|between:100,1000000',
            'nbItems'=>'required|integer|between:10,10000',
    
        ]);
        $material = Material::find($id);
        $input = $request->all();
        $material->update($input);
        return redirect('/center/serviceAdmin/material/'.$request->service_id)->with('flash_message', 'material Updated!');
    }

    public function destroy($id)
    {
        $material = Material::find($id);
        Material::destroy($id);
        return redirect('/center/serviceAdmin/material/'.$material->service_id)->with('flash_message', 'material deleted!'); 
    }

    public function archive($id)
    {
        $material = Material::find($id);
        $material->status = 'Unavailable';
        $material->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $material = Material::find($id);
        $material->status = 'Available';
        $material->save();
        return redirect()->back();
    }
}
