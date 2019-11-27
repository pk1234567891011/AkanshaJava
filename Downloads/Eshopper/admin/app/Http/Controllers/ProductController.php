<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_images;
use DB;
use Illuminate\Http\Request;
use App\Product_attributes;
use App\Product_attribute_values;
use App\Category;
use App\Product_categories;
use App\Product_attributes_assoc;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->paginate(2);
        $multiple = Product::has('imgs')->get();
        return view('product.index', compact('product', 'multiple'))->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $category = Category::all();
        $attributes = Product_attributes::pluck("name","id");
        return view('product.create',compact('attributes','category'));
    }
    public function myformAjax($id){
        //$values = DB::table("product_attribute_values")->where("product_attribute_id",$id)->pluck("attribute_value","id");
        $values = Product_attribute_values::where("product_attribute_id",$id)->pluck("attribute_value","id");
        return json_encode($values);

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
            'sku' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'special_price' => 'required',
            'special_price_from' => 'required',
            'special_price_to' => 'required',
            'status' => 'required',
            'quantity' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'is_featured' => 'required',
            'CID'=>'required'
        ]);

        Product::create($request->all());
        $user = auth()->user();
       
        $product = Product::select('*')
            ->orderBy('id', 'DESC')->first();
            $category=new Product_categories();
            $category->product_id=$product->id;
            $category->category_id=$request->CID;
            $category->save();
        if ($request->hasFile('names')) {
            $file = $request->file('names');
            foreach ($file as $image) {
                $object = new Product_images();
                $filename = $image->getClientOriginalName();

                $image->move(public_path() . '/products/', $filename);
                $object->image_name = $filename;
                $object->status = $product->status;
                $object->created_by = $user->id;
                $object->product_id = $product->id;
                $object->save();
            }
        }
        $att = $request->drop;
        $val = $request->value;
        for($count = 0; $count < count($att); $count++)
        {
         $data = array(
          'product_attribute_id' => $att[$count],
          'product_attribute_value_id'  => $val[$count],
          'product_id'=>$product->id
          
         );
         $insert_data[] = $data; 
        }
  
        Product_attributes_assoc::insert($insert_data);
       return redirect()->route('product.index')->with('success', 'Product created successfully');
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
    public function first()
    {   $category=Category::with('children')->get();
        $sliders = Banner::orderby('id', 'desc')->paginate(10);
        return view('Eshopper.first',compact('sliders','category'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $multiple = Product::has('imgs')->get();
        $categories=Category::all();
        $product_categories=Product_categories::where('product_id',$id)->first();
        return view('product.edit',compact('product','multiple','categories','product_categories'));
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
        //$image = \DB::table('product')->where('id', $id)->first();
        //$trial = \DB::table('product_images')->where('product_id', $id)->get();
        $image = Product::where('id', $id)->first();
        $trial = Product_images::where('product_id', $id)->get();


        foreach ($trial as $image) {

            $file = $image->image_name;
            $filename = public_path() . '/products/' . $file;
            \File::delete($filename);

        }
        Product_images::whereIn('id', $trial->pluck('id'))->delete();
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
