<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = Coupon::latest()->paginate(2);
        return view('coupon.index',compact('coupon'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $coupon=Coupon::all();
        return view('coupon.create');
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
            'code' => 'required',
            'percent_off' => 'required',
            'no_of_uses' => 'required'
        ]);
        $user = auth()->user();
        $user_id = $user->id;
        $coupon=new Coupon();
        $coupon->code=$request->code;
        $coupon->percent_off=$request->percent_off;
        $coupon->no_of_uses=$request->no_of_uses;
        $coupon->created_by=$user_id;
        $coupon->save();
        return redirect()->route('coupon.index')->with('success','Coupon created successfully');
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
        $coupon = Coupon::find($id);
        return view('coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $coupon = Coupon::find($id);
        $request->validate([
            'code' => 'required',
            'percent_off' => 'required',
            'no_of_uses' => 'required'
        ]);
        $user = auth()->user();
        $user_id = $user->id;
        $coupon->code=$request->code;
        $coupon->percent_off=$request->percent_off;
        $coupon->no_of_uses=$request->no_of_uses;
        $coupon->modified_by=$user_id;
        $coupon->save();
        Coupon::find($id)->update($request->all());
        return redirect()->route('coupon.index')->with('success','Coupon created successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        return redirect()->route('coupon.index')->with('success','Coupon deleted successfully');
    }
}
