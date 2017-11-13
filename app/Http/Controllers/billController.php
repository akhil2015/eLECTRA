<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PDF;
use Auth;
class billController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'customerId'=> 'required|min:10|max:10'
        ]);
        $bill = new Bill;
        $bill->customerId=Input::get("customerId");
        $bill->initial=Input::get("initial");
        $bill->final=Input::get("final");
        $bill->month=Input::get("month");
        $bill->year=Input::get("year");
        $bill->units=(integer)$bill->final-(integer)$bill->initial;
        $admin=DB::table('admins')->first();
        $rate=$admin->rate;
        $bill->amount=$bill->units * $rate;
        $bill->status="Unpaid";
        $bill->save();
        return view('success');
    }
    public function pay()
    {
        $s=Auth::user()->customerId;
        DB::table('bills')
            ->where([['customerId', $s],['status','Unpaid']])
            ->update(['status' => 'paid']);
        return redirect()->intended(route('home'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
    public function updaterate(Request $request)
    {
        $newrate=Input::get("rate");
        DB::table('admins')
            ->where('id', 1)
            ->update(['rate' => $newrate]);
        return redirect()->intended(route('admin.dashboard'));
    }
    public static function calculate(string $s)
    {
        
        $sum = DB::table('bills')->where([['customerId',$s],['status','Unpaid']])->sum('amount');
        return $sum;
    }
    public function pdf(request $request)
    {
        $data= new Bill;
        $month=Input::get("month");
        $year=Input::get("year");
        $s=Auth::user()->customerId;
        $data=DB::table('bills')->where([['customerId',$s],['month',$month],['year',$year]])->get();

        $pdf=PDF::loadView('bill',['data'=>$data]);
        return $pdf->stream('bill.pdf');
    }
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
}
