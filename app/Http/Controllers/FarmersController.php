<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\Farmer;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class FarmersController extends Controller
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
        $farmers = Farmer::all();
        return view('farmers.index')->with('farmers', $farmers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmers.create');
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
            'no' => 'required|min:1|max:6|unique:farmers',
            'name' => 'required|min:3',
            'nid' => 'required|min:8|max:10|unique:farmers',
            'phone' => 'required|min:9|max:10|unique:farmers',
            'email' => 'required|unique:users',
            'locality' => 'required',
            'acno' => 'required|min:8|max:12|unique:farmers',
        ]);

        $password = bcrypt($request->nid);
        $name = $request->name;
        $user = User::create(['name' => $name, 'email' => $request->email, 'password' => $password]);
        DB::transaction(function () use ($request, $user) {
            $farmer = new Farmer;
            $farmer->no = $request->no;
            $farmer->nid = $request->nid;
            $farmer->name = $request->name;
            $farmer->acno = $request->acno;
            $farmer->locality = $request->locality;
            $farmer->phone = $request->phone;
            $farmer->email = $request->email;
            $farmer->user_id = $user->id;
            $farmer->save();
        });
        return redirect()->route('farmers')->with('success', 'Farmer was created successfully!');
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
        $user = Farmer::find($id);
        return view('farmers.edit')->withUser($user);
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
        $users = DB::table('farmers')->where('id', $id)->select('email', 'nid')->first();
        $oldEmail = $users->email;
        $oldID = $users->nid;
        if ($oldEmail == $request->email) {
            DB::table('users')->where('id', $request->user_id)
                ->update([
                    'name' => $request->fname . '' . $request->laname
                ]);
        }

        DB::table('farmers')->where('id', $id)
        ->update([
            'name' => $request->name,
            'no' => $request->no,
            'nid' => $request->nid,
            'locality' => $request->locality,
            'acno' => $request->acno,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('farmers')->with('success', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = DB::table('farmers')->where('id', $id)->first()->user_id;

        Farmer::find($id)->delete();
        User::find($user_id)->delete();
        return redirect()->route('farmers')->with('info', 'Farmer has been deleted!');
    }

    public function print_farmers()
    {
        $farmers = Farmer::all();

        $pdf = PDF::loadView('farmers.print-farmers',
            [
                'farmers' => $farmers
            ]
        )
            ->setPaper('a4', 'landscape');
        return $pdf->stream('Farmers list.pdf');
    }

}
