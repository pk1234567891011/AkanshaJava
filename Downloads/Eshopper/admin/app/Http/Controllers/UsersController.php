<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\Users;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->select('users.*','roles.role_name as category')
             ->latest()->paginate(2);
      // $users = Users::latest()->paginate(5);
           
        return view('users.index',compact('users'))->with('i',(request()->input('page',1)-1)*2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     $roles=Roles::orderBy('role_name', 'desc')->get();
           $roles=Roles::all();
          return view('users.create')
                ->with('users', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'firstname'=>'required|regex:/^[a-zA-Z]+$/',
            'lastname'=>'required|regex:/^[a-zA-Z]+$/',
            'email'=>'required|email',
            'status'=>'required',
             'role_id'=>'required',
             'password'=>'required',
            // 'password_confirmation'=>'required',

           

    ]);
        Users::create($request->all());
        return redirect()->route('users.index')->with('success','category created successfully');

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
         $roles=Roles::all();
         $users = Users::find($id);
        return view('users.edit',compact('users','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $users = Users::find($id);
        request()->validate([
            'firstname'=>'required|regex:/^[a-zA-Z]+$/',
            'lastname'=>'required|regex:/^[a-zA-Z]+$/',
            'email'=>'required|email',
            'status'=>'required',
             'role_id'=>'required',
             'password'=>'required',
             //'password_confirmation'=>'required',


    ]);

        Users::find($id)->update($request->all());
        return redirect()->route('users.index')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Users::find($id)->delete();
        return redirect()->route('users.index')->with('success','user deleted successfully');
    }

}
