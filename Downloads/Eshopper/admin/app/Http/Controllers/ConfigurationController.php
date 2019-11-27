<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;
use DB;
class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$configurations=DB::table('configuration')
             //->latest()->paginate(2);
       $configuration= Configuration::latest()->paginate(2);
           
        return view('configuration.index',compact('configuration'))->with('i',(request()->input('page',1)-1)*2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configuration=Configuration::all();
          return view('configuration.create');
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

         'conf_key'=>'required',
         'conf_value'=>'required',
         'status'=>'required'
        ]);
        Configuration::create($request->all());
        return redirect()->route('configuration.index')->with('success','Configuration created successfully');

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
       $configuration = Configuration::find($id);
        return view('configuration.edit',compact('configuration'));
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
        $configuration = Configuration::find($id);
        $request->validate([

         'conf_key'=>'required',
         'conf_value'=>'required',
         'status'=>'required'
        ]);
        Configuration::find($id)->update($request->all());
        return redirect()->route('configuration.index')->with('success','Configuration updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Configuration::find($id)->delete();
        return redirect()->route('configuration.index')->with('success','Configuration deleted successfully');
    }
}
