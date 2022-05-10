<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Feedback;
use Session;
use Hash;
use Validator;
use Auth;
use DB;

class ClientsController extends Controller
{
    public function login(){
        return view("auth.clientlogin");
    }

    public function registration(){
        return view("auth.clientregistration");
    }

    public function registerClient(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'identity'=>'required',
            'address'=>'required',
            'password'=>'required|min:4|max:10',
        ]);
    
    $clients = new clients();

    $clients -> firstname = $request -> firstname;
    $clients -> lastname = $request -> lastname;
    $clients ->email = $request ->email;
    $clients ->phone = $request -> phone;
    $clients ->identity = $request -> identity;
    $clients ->address = $request -> address;
    $clients ->password = Hash::make($request ->password);

    $res = $clients ->save();
    if($res){
        return back()->with('success','Registered Successfully');
    }
    else{
        return back()->with('fail','Something was wrong');
    }

    }
    
    public function loginClient(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4|max:10',
        ]);
        $clients = Clients::where('email','=',$request->email) ->first();
        if($clients){
            if(Hash::check($request->password,$clients->password)){
                $request->session()->put('loginId', $clients->id);
                return redirect('clientsdashboard');
            }
            else{
                return back()->with('fail','Wrong Password !!');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
    }
    public function clientsDashboard()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = Clients::where('id','=',Session::get('loginId')) ->first();
        }
        return view('clientsdashboard', compact('data'));
    }
    public function logout(){
        if (Session::get('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
    public function bookCar(){
        return view("approvedbooking");
    }

    public function feedback(){
        return view("feedback");
    }

    public function storeFeedback(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'cartype'=>'required',
            'problem'=>'required',
            'rating'=>'required',
        ]);
    
    $feedback = new feedback();

    $feedback -> name = $request -> name;
    $feedback -> cartype = $request -> cartype;
    $feedback -> problem = $request -> problem;
    $feedback -> rating = $request -> rating;

    $res = $feedback ->save();
    if($res){
        return back()->with('success','Feedback Stored Successfully');
    }
    else{
        return back()->with('fail','Something was wrong');
    }

    }

    public function showFeedback()
    {
        $feedback = DB::table('feedback') ->get();
        return view ('receivedfeedback', compact ('feedback'));
    }
    
}
