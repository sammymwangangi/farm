<?php

namespace App\Http\Controllers;

use Auth;
use App\Delivery;
use App\Farmer;
use App\Settings\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Validator;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::where('farmer_no', Auth::id())->get();
        $farmers = Farmer::all();
        $setting = Settings::first();
        return view('deliveries.index', compact('deliveries', 'farmers', 'setting',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farmers = Farmer::all();
        return view('deliveries.create', compact('farmers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'farmer_no' => 'required',
                'litres' => 'required|max:10',
                'deliverer' => 'required|min:3',
                // 'credit_card_number' => 'required_if:payment_type,cc'
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $delivery = Delivery::create([
            'farmer_no' => $request->input('farmer_no'),
            'litres' => $request->input('litres'),
            'deliverer' => $request->input('deliverer'),
        ]);
        $delivery->save();

        return redirect('deliveries')->with('success', 'Delivery created!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function print_deliveries()
    {
        $deliveries = Delivery::all();
        $deliveries = DB::table('deliveries')->count();
        $setting = Settings::first();

        $pdf = PDF::loadView('deliveries.print-deliveries',
            [
                'deliveries' => $deliveries,
                'setting' => $setting
            ]
        )
            ->setPaper('a4', 'landscape');
        return $pdf->stream('Deliveries-list.pdf');
    }
}
