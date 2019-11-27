<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Auth;
use App\Users;
use App\Address;
class AddressController extends Controller
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
    public function create(Request $request)
    {   $countries=Country::get();
        $user_id=Auth::user()->id;
        $userDetails=Users::find($user_id);
       
       
        return view('address.create',compact('countries','userDetails'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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
    {   $address = Address::find($id);
        $countries=Country::all();
        $user_id=Auth::user()->id;
        $userInfo=Users::where('id',$user_id)->first();  
        return view('address.edit',compact('address','countries','userInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       $request->validate([
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pincode'=>'required',
            'mobile'=>'required',
            'name'=>'required'

            ]);
            $data=$request->all();
            $user_id=Auth::user()->id;
            $userInfo=Users::where('id',$user_id)->first();
            $userInfo->firstname=$data['name'];
            $userInfo->save();
            $address= Address::find($id);
            $address->userId=$user_id;
            $address->address=$data['address'];
            $address->city=$data['city'];
            $address->state=$data['state'];
            $address->country=$data['country'];
            $address->pincode=$data['pincode'];
            $address->mobile=$data['mobile'];
            $address->save();  
            
            return redirect('account')->with('flash_message_success', 'Address added successfully');

        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::find($id)->delete();
        return redirect('account')->with('flash_message_success','Address deleted successfully');
    }
    public function store(Request $request)
    {   $user_id=Auth::user()->id;
        if($request->isMethod('post')){
        $request->validate([
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pincode'=>'required',
            'mobile'=>'required',

        ]);
            $data=$request->all();
            $address=new Address();
            $address->userId=$user_id;
            $address->address=$data['address'];
            $address->city=$data['city'];
            $address->state=$data['state'];
            $address->country=$data['country'];
            $address->pincode=$data['pincode'];
            $address->mobile=$data['mobile'];
            $address->save();
            
            return redirect('account')->with('flash_message_success', 'Address updated successfully');

        }
    }
}
