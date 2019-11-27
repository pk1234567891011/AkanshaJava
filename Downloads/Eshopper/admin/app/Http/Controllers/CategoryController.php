<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
class CategoryController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$category= Category::latest()->paginate();
$categories=DB::table('category as c1')
->select('c1.id','c1.name','c1.status','c1.parent_id','c2.name as parent_name')
->join('category as c2','c1.parent_id','=','c2.id')

->get();

$categorys=DB::table('category')
          ->select('*')
          ->where('parent_id','=','0')
          ->get();


return view('category.index',compact('categories','categorys','category','category'));

}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$category=Category::all();
return view('category.create',compact('category'));
}

/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([

'name'=>'required',
'status'=>'required',
'parent_id'=>'required'
]);
// $category->parent_id=$request->parent_id;
Category::create($request->all());
return redirect()->route('category.index')->with('success','Category created successfully');
}


/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{$cat = Category::all();
$selectedRole = Category::first()->parent_id;

$category = Category::find($id);
$ids= $category->parent_id;
$cate=DB::table('category')
->select('id','parent_id','name as parent_name')
->where('id','=',$ids)

->get();
return view('category.edit',compact('category','selectedRole','cat','cate'));
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$category = Category::find($id);
$request->validate([

'name'=>'required',
'parent_id'=>'required',
'status'=>'required'
]);
Category::find($id)->update($request->all());
return redirect()->route('category.index')->with('success','Category updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
Category::find($id)->delete();
return redirect()->route('category.index')->with('success','Category deleted successfully');
}
}