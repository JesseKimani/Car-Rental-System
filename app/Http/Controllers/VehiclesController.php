<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use DB;

class VehiclesController extends Controller
{
    
    public function index()
    {
        
        $vehicles = Vehicle::latest()->paginate(5);
    
        return view('vehicles.index',compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'make' => 'required',
            'yearofmanufacture' => 'required',
            'bookingamount' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Vehicle::create($input);
     
        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle Added successfully.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show',compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit',compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'model' => 'required',
            'make' => 'required',
            'yearofmanufacture' => 'required',
            'bookingamount' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $vehicle->update($input);
    
        return redirect()->route('vehicles.index')
                        ->with('success','updated successfully');
    }
 
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
     
        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle deleted successfully');
    }

    public function displayCars(Vehicle $vehicle)
    {
        $vehicles = Vehicle::latest()->paginate(5);
    
        return view('availablecars',compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
