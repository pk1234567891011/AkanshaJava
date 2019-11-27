<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Product;
use App\Product_categories;
use App\Product_images;
use App\Users;
use App\Product_attributes_assoc;
use App\Product_attributes;
use App\Product_attribute_values;
use Auth;
use Session;
use Hash;
use Mail;
use App\Cart;
use App\Address;
use App\Coupon;
use Illuminate\Http\Request;
class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $category = Category::with('children')->get();
        $sliders = Banner::orderby('id', 'desc')->paginate(10);
        $images = Product_images::where('status', 'active')->get();
        $productsAll = Product::has('imgs')->get();
        return view('Eshopper.first', compact('sliders', 'category', 'images', 'productsAll'));

    }
    /*public function products($name = null)
    {
    $categoryDetails = Category::where(['name' => name])->first();
    $productsAll = Product::has('imgs')->get();

    return view('Eshopper.listing', compact('$categoryDetails'));
    }*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
        $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',

            ]);
            $data = $request->all();
            $usersCount = Users::where('email', $data['email'])->count();
            if ($usersCount > 0) {
                return redirect()->back()->with('flash_message_error', 'Email already exists');
            } else { $user = new Users();
                $user->firstname = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->role_id = 5;
                $user->save();
              
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if (Auth::attempt($user_data)) {
            Session::put('frontSession',$user_data['email']);
            return redirect('homes');
            }
        }
        }
        return view('Eshopper.login-register');
        
    }
    public function forgotPassword(Request $request)
    {   if($request->isMethod('post')){
        $data=$request->all();
        $usersCount=Users::where('email',$data['email'])->count();
        if($usersCount==0){
            return redirect()->back()->with('flash_message_error','Email does not exists');
        }
        $userDetail=Users::where('email',$data['email'])->first();
        $random_password=str_random(8);
        $new_password=bcrypt($random_password);
        Users::where('email',$data['email'])->update(['password'=>$new_password]);
        $email=$data['email']; 
        
        $name=$userDetail->name;
        $messageData=[
            'email'=>$email,
            'name'=>$name,
            'password'=>$random_password
        ];
        Mail::send('emails.forgotpassword',$messageData,function($message)use($email){
         $message->to($email)->subject('New Password');

        });
        return redirect('login-register')->with('flash_message_success', 'Check your email for new password');
    }
        return view('Eshopper.forgot');
    }
    public function checkslogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if (Auth::attempt($user_data)) {
            Session::put('frontSession',$user_data['email']);
            return redirect('homes');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    public function successlogins()
    {
        return redirect('homes');
    }
    public function logouts()
    {
        Auth::logout();
        Session::forget('frontSession');
        return redirect('login-register');
    }
    public function products($url = null)
    {   $categoryDetails = Category::where(['name' => $url])->first();
        $categoryCount = Category::where(['name' => $url])->count();
        if($categoryCount==0)
        {
            abort(404);
        }
        $sliders = Banner::orderby('id', 'desc')->paginate(10);
       /* $productCat = Product_categories::where(['category_id' => $categoryDetails->id])->get();
        $productsAll=Product::whereIn('id', $productCat->pluck('product_id'))->get();
        $category = Category::with('children')->get();
        $image = Product_images::whereIn('product_id', $productsAll->pluck('id'))->get(); */
        
       /* if ($categoryDetails->parent_id == 0) {
            $subCategories = Category::where(['parent_id' => $categoryDetails->id])->get();
            $cat_ids = "";
            foreach ($subCategories as $subCat) {
                $cat_ids .= $subCat->id . ",";
            }
            
            $category = Category::with('children')
            ->whereIn('id' ,array($cat_ids))->get();
            $category=json_decode(json_encode($category));
            $product = Product::whereIn('id' ,array($cat_ids))->get();
            
            $category = Category::with('children')->get();
            $sliders = Banner::orderby('id', 'desc')->paginate(10);
            $images = Product_images::where('status', 'active')->get();
            $productsAll = Product::has('imgs')
                ->get();
            $image = Product_images::whereIn('product_id', $product->pluck('id'))->get();
           /* $product=json_decode(json_encode($product));
            echo "<pre>" ; print_r($product);
            die;*/
        /*}
         else {

        $product = Product::where(['id' => $productCat->product_id])->get();
        $category = Category::with('children')->get();
        $sliders = Banner::orderby('id', 'desc')->paginate(10);
        $images = Product_images::where('status', 'active')->get();
        $productsAll = Product::has('imgs')
            ->get();
        $image = Product_images::whereIn('product_id', $product->pluck('id'))->get();

         }*/
         if ($categoryDetails->parent_id == 0) {
            $subCategories = Category::where(['parent_id' => $categoryDetails->id])->get();
            
            $cat_ids = "";
            foreach ($subCategories as $subCat) {
                $cat_ids .= $subCat->id . ",";
            }
            
            $category = Category::with('children')
            ->whereIn('id' ,array($cat_ids))->get();
            $categorys=json_decode(json_encode($category));
            $productsAll=Product::whereIn('id', $category->pluck('subCategories'))->get();
          // $image = Product_images::whereIn('product_id', $productsAll->pluck('id'))->get();
            

             }
         else {
            $productCat = Product_categories::where(['category_id' => $categoryDetails->id])->get();
            
            $productsAll=Product::whereIn('id', $productCat->pluck('product_id'))->get();
            
            $category = Category::with('children')->get();
            
            //$image = Product_images::whereIn('product_id', $productsAll->pluck('id'))->get();

         }
        return view('Eshopper.listing', compact('productsAll', 'product', 'image', 'sliders', 'category','categoryDetails'));
         }
     
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::user()->id;
        echo $user_id;
        exit();
    }
    public function prod($id){
        $productDetails=Product::where('id',$id)->first();
        //$product = Product::where(['id' => $productCat->product_id])->get();
        $category = Category::with('children')->get();
        $sliders = Banner::orderby('id', 'desc')->paginate(10);
        //$images = Product_images::where('status', 'active')->get();
       $product_attributes_asso=Product_attributes_assoc::where('product_id',$productDetails->id)->first();
       $product_attributes=Product_attributes::where('id',$product_attributes_asso->product_attribute_id)->first();
       $product_attribute_value=Product_attribute_values::where('product_attribute_id',$product_attributes->id)->first();
      
        $productsAll = Product::has('imgs')
            ->get();
            $product_image=Product_images::where('product_id',$productDetails->id)->first();
          
      //$image = Product_images::where('image_name', $product_image->pluck('image_name'))->get();

        return view('Eshopper.details')->with(compact('category','productDetails','product_image','product_attributes','product_attribute_value'));
        }
    public function account()
    {   $user_id=Auth::user()->id;
        $add = Address::where('userId',$user_id)->get();
        $paginate=Address::latest()->paginate(3);
        $userInfo=Users::where('id',$user_id)->first();
        
        return view('Eshopper.account',compact('add','userInfo','paginate'));
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
    public function chkUserPassword(Request $request)
    {
        $data=$request->all();
        $current_password=$data['current_pwd'];
        $user_id=Auth::User()->id;
        $check_password=Users::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true";
            die;

        }
        else{
            echo "false";
            die;

        }
    }
    public function updatePassword(Request $request)
    {
       $data=$request->all();
       $old_password=Users::where('id',Auth::User()->id)->first();
       $current_pwd=$data['current_pwd'];
       if(Hash::check($current_pwd,$old_password->password))
       {
        $new_password=bcrypt($data['new_pwd']);
        Users::where('id',Auth::User()->id)->update(['password'=>$new_password]);
        return redirect()->back()->with('flash_message_success', 'Password updated Successfuully');
       }
       else{
           return redirect()->back()->with('flash_message_success', 'Current password is incorrect');
       }
    }
    public function addtocart(Request $request){
       $data=$request->all();
       if(empty($data['user_email'])){
           $data['user_email']="";
       }
       $session=Session::get('session');

       if(empty($session)){
       $session=str_random(40);
       Session::put('session',$session);
       }
       $countProduct=Cart::where(['product_id'=>$data['product_id'],'session'=>$session])->count();
       if($countProduct>0){
        return redirect()->back()->with('flash_message_error', 'Product already exists in the cart');
       }
       else{
           $getSku=Product::where('id',$data['product_id'])->first();
       Cart::insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$getSku->sku,'price'=>$data['price'],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],'session'=>$session]);
       }
       return redirect('cart')->with('flash_message_success', 'Product has been added to cart|');

    }
    public function cart(Request $request){
        $session=Session::get('session');
        $userCart=Cart::where('session',$session)->get();
        foreach($userCart as $key => $product){
            $productDetail=Product::where('id',$product->product_id)->first();
            $image=Product_images::where('product_id',$productDetail->id)->first();
            $userCart[$key]->image=$image->image_name;
        }
      
        return view('Eshopper.cart',compact('userCart'));
    }
    public function deleteCartProduct($id)
    {
         Cart::where('id',$id)->delete();
         return redirect('cart')->with('flash_message_success', 'Product has been delete from cart|');
    }
    public function updateCartQuantity($id,$quantity){
        $getCartDetails=Cart::where('id',$id)->first();
        $getProduct=Product::where('sku',$getCartDetails->product_code)->first();
        $update_quantity=$getCartDetails->quantity+$quantity;
        if($getProduct->quantity>=$update_quantity){
            Cart::where('id',$id)->increment('quantity',$quantity);
            return redirect('cart')->with('flash_message_success', 'Product has been updated to cart|');
        }
        else{
            return redirect('cart')->with('flash_message_error', 'Requird Product is not available');
        }
       

    }
    public function applyCoupon(Request $request)
    {
        $data=$request->all();
        print_r($data);
        die;
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
}
