<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
       
 
    public function customLogin(Request $request)
    {
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
    
        if (Auth::attempt($credentials)) {
            $employee = Employee::orderBy('id','desc')->paginate(5);
            return view('employee.index', compact('employee'));
        }

        return redirect("login")->with('success','Login details are not valid.');
    }
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}
