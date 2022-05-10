<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use Session;
use Hash;
use Validator;
use Auth;
use DB;

class AdminsController extends Controller
{

    public function homepage(){
        return view("homepage");
    }

    public function adminLogin(){
        return view("auth.adminlogin");
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4|max:10',
        ]);
        $admins = Admins::where('email','=',$request->email) ->first();
        if($admins){
            if(Hash::check($request->password,$admins->password)){
                $request->session()->put('loginId', $admins->id);
                return redirect('adminsdashboard');
            }
            else{
                return back()->with('fail','Wrong Password !!');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
    }

    public function adminsDashboard()
    {
        return view('adminsdashboard');
    }

    public function listClients()
{
    $clients = DB::table('clients') ->get();
    return view ('clients', compact ('clients'));
}

public function editClient($id)
{
    $clients = DB::table('clients') ->where('id', $id) ->first();
    return view('updateclient', compact('clients'));
}

public function updateClient(Request $request)
{
    DB::table('clients') -> where('id', $request->id) ->update([
        'firstname' => $request ->firstname,
        'lastname' => $request ->lastname,
        'email' => $request ->email,
        'phone' => $request ->phone,
        'identity' => $request ->identity,
        'address' => $request ->address,
        'password' => $request ->password
        
    ]);
    return back()->with('client_update','Updated Successfully');
}

public function deleteClient($id)
{
    DB::table('clients') -> where('id', $id) ->delete();
    return back()->with('client_delete','Deleted Successfully');
}

}
