<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        
        
        

        if($usertype=='1'){
            return view('admin.home');
        }else{
            $data = product::paginate(3);
            $user= auth()->user();
            $count = cart::where('phone',$user->phone)->count();
            return view('User.home',compact('data','count'));
        }
    }
    public function index(){
        if(Auth::id()){
            return redirect('redirect');
        }else{
            $data = product::paginate(3);
            return view('User.home',compact('data'));
        }
        
    }
    public function search(Request $request){
        $search =$request->search;
        if($search == ''){
            $data = product::paginate(3);
            return view('User.home',compact('data'));
        }
        $data = product::where('title','like','%'.$search.'%')->get();
        return view('User.home',compact('data'));
    }
    
    public function addToCart(Request $request,$id){
        if(Auth::id()){

            $user=auth()->user();
            $product=product::find($id);
            $cart=new cart;

            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            $cart->price=$product->price;
            $cart->quantity=$request->quantity;
            $cart->save();

            return redirect()->back()->with('message','Product Added Successfully');
        }else{
            return redirect('login');
        }
    }

    public function showcart(){

        $user= auth()->user();

        $cart=cart::where('phone',$user->phone)->get();
        // $data=product::where('price',$user->price)->get();

        $count = cart::where('phone',$user->phone)->count();


        return view('User.showcart',compact('count','cart'));
    }


   public function deletecart($id){
       $data= cart::find($id);
       $data->delete();
       return redirect()->back()->with('message','Product Removed Successfully');
   }

   public function confirmorder(Request $request){
       $user=auth()->user();

       $name=$user->name;
       $phone=$user->phone;
       $address=$user->address;

        foreach($request->productname as $key=>$productname){
            $order = new order();

            $order->product_name = $request->productname[$key];
    
            $order->price = $request->price[$key];

            $order->quantity = $request->quantity[$key];

            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status='Not Delivered';

            $order->save();
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Product Ordered Successfully');
   }

   public function ourproduct(){
    if($user=auth()->user() ){
            $count = cart::where('phone',$user->phone)->count();
            $data = product::all();
            return view('User.ourproduct',compact('data','count'));
        }else{
            $data = product::all();
            return view('User.ourproduct',compact('data'));
        }
    }
    
    public function aboutus(){
        return view('User.aboutus');
    }
    

    public function contactus(){
        return view('User.contactus');
    }

//     public function home(){
//         $data = product::paginate(3);
//         return view('User.home',compact('data'));

//     }
}
