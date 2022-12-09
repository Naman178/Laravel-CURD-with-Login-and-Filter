<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $employee = Employee::orderBy('id','desc')->paginate(5);
        return view('employee.index', compact('employee'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('employee.create');
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
            'name' => 'required',
            'email' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'contactno' => 'required',
        ]);

        $name = $request->post('name');
        $email = $request->post('email');

        $imageName = time().'.'.$request->profile_pic->extension();  
        $request->profile_pic->move(public_path('Employee_Profile_Pic'), $imageName);

        $contactno = implode(',', $request->post('contactno'));

        Employee::create(['name'=>$name , 'email'=>$email , 'profile_pic'=> $imageName,'contactno'=>$contactno]);

        return redirect()->route('employee.index')->with('success','Employee has been added successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

     /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'profile_pic' => 'image|mimes:jpeg,png,jpg|max:2048',
            'contactno' => 'required',
        ]);
        
        $name = $request->post('name');
        $email = $request->post('email');
        $contactno = implode(',', $request->post('contactno'));
        if($request->profile_pic){
            $imageName = time().'.'.$request->profile_pic->extension();  
            $request->profile_pic->move(public_path('Employee_Profile_Pic'), $imageName);
            $employee->fill(['name'=>$name , 'email'=>$email , 'profile_pic'=> $imageName,'contactno'=>$contactno])->save();
        }
        else{
            $employee->fill(['name'=>$name , 'email'=>$email ,'contactno'=>$contactno])->save();
        }

        return redirect()->route('employee.index')->with('success','Employee Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee has been deleted successfully');
    }

}
