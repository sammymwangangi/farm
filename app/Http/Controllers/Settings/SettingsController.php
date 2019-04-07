<?php

namespace App\Http\Controllers\Settings;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings\Settings;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Settings::first();
        return view('settings.index', ['setting' => $setting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'from' => 'required|date',
                'to' => 'required|date',
                'price' => 'required',
                // 'credit_card_number' => 'required_if:payment_type,cc'
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $setting = Settings::create([
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'price' => $request->input('price'),
        ]);
        $setting->save();
        return redirect()->back()->with('info', 'Data saved!');
    }

}
