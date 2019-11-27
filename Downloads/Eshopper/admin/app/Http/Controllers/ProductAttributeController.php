<?php

namespace App\Http\Controllers;

use App\Product_attributes;
use App\Product_attribute_values;
use DB;
use Illuminate\Http\Request;
use Validator;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_attributes = Product_attributes::latest()->paginate(2);

        $multiple = Product_attributes::has('parent')->get();

        return view('product_attributes.index', compact('product_attributes', 'multiple'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_attributes = Product_attributes::all();
        return view('product_attributes.create');
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
        ]);
        $rules = [];

        foreach ($request->input('values') as $key => $value) {
            $rules["values.{$key}"] = 'required';
        }

        $user = auth()->user();
        $user_id = $user->id;

        $product_attributes = new Product_attributes();
        $product_attributes->created_by = $user_id;
        $product_attributes->name = $request->name;
        $product_attributes->save();
        $product_attributes = DB::table('product_attributes')
            ->select('*')
            ->orderBy('id', 'DESC')->first();
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            if ($request->input('values')) {
                $value = $request->input('values');
                foreach ($value as $val) {
                    $object = new Product_attribute_values();
                    $object->product_attribute_id = $product_attributes->id;
                    $object->attribute_value = $val;
                    $object->created_by = $user->id;
                    $object->save();
                }

            }
        }
      
        return redirect()->route('product_attributes.index')->with('success', 'Attrribute created successfully');

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
        $attribute_name = \DB::table('product_attributes')->where('id', $id)->first();
        $attribute_values = \DB::table('product_attribute_values')->where('product_attribute_id', $id)->get();

        Product_attribute_values::whereIn('id', $attribute_values->pluck('id'))->delete();
        Product_attributes::find($id)->delete();
        return redirect()->route('product_attributes.index')->with('success', 'Attribute deleted successfully');

    }
}
