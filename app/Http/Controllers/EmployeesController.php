<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'name' => 'required|min:3',
            'nid' => 'required|min:8|unique:employees',
            'phone' => 'required|min:9|unique:employees',
            'email' => 'required|unique:users',
            'payroll_no' => 'required|unique:employees',
        ]);

        $password = bcrypt($request->nid);
        $name = $request->name;
        $user = User::create(['name' => $name, 'email' => $request->email, 'password' => $password]);
        DB::transaction(function () use ($request, $user) {
            $employee = new Employee;
            $employee->nid = $request->nid;
            $employee->name = $request->name;
            $employee->payroll_no = $request->payroll_no;
            $employee->phone = $request->phone;
            $employee->email = $request->email;
            $employee->user_id = $user->id;
            $employee->save();
        });
        return redirect()->route('employees')->with('success', 'Employee was created successfully!');
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
        $user = Employee::find($id);
        return view('employees.edit')->withUser($user);
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
        $users = DB::table('employees')->where('id', $id)->select('email', 'nid')->first();
        $oldEmail = $users->email;
        $oldID = $users->nid;
        if ($oldEmail == $request->email) {
            DB::table('users')->where('id', $request->user_id)
                ->update([
                    'name' => $request->name,
                ]);
        }

        DB::table('employees')->where('id', $id)
            ->update([
                'name' => $request->name,
                'nid' => $request->id_no,
                'payroll_no' => $request->payroll_no,
                'phone' => $request->phone,
                'email' => $request->email

            ]);
        return redirect()->route('employees')->with('success', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = DB::table('employees')->where('id', $id)->first()->user_id;
        Employee::find($id)->delete();
        User::find($user_id)->delete();
        return redirect()->route('employees')->with('info', 'Employee has been deleted!');
    }

    public function print_employees()
    {
        $employees = Employee::all();

        $pdf = PDF::loadView('employees.print-employees',
            [
                'employees' => $employees
            ]
        )
            ->setPaper('a4', 'landscape');
        return $pdf->stream('Employee List.pdf');
    }
}
