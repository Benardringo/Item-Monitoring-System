<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Seller;
use App\Models\Item;
use App\Models\Buy;
use App\Models\Sell;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function create_store()
    {
        return view('layouts.store');
    }
    

    public function add_seller()
    {
        return view('layouts.seller');
    }


    public function add_item()
    {
        $item = item::all();
        return view('layouts.item',compact('item') );
    }


    public function buyitem()
    {
        $item = item::all();
        return view('layouts.buyitem',compact('item') );
    }

    public function sellitem()
    {
        $item = item::all();
        return view('layouts.sellitem',compact('item') );
    }


    public function add_store(Request $request)
    {
     $store=new store;
     $store->name=$request->name;
     $store->location=$request->location;
     $store->save();
      return redirect()->back()->with('massage','Store Added Successfuly');
    }


    public function addseller(Request $request)
    {
     $user=new user;
     $user->name=$request->name;
     $user->email=$request->email;
     $user->password=$request->password;
     $user->role=$request->role;
     $user->save();
     return redirect()->back()->with('massage','User Added Successfuly');
    }


      public function buy_item(Request $request)
    {

     $buy=new buy;
     $type = $request->type;
     $id = $request->id;
     $quantity = $request->quantity;

     if($type =='Carton'){
     $sum= 10 * $quantity;
     }
     else{
     $sum= 12 * $quantity;
     }  
     $data=item::find($id);

     $data->quantity= $data->quantity + $sum;
     $buy->name=$request->name;
     $buy->type=$type;
     $buy->quantity=$quantity;

     $buy->save();
     $data->save();
     return redirect()->back()->with('massage','Item Bought Successfuly');
    }


    public function additem(Request $request)
    {
     $item=new item;
     $item->name=$request->name;
     $item->category=$request->category;
     $item->discripsion=$request->discripsion;

     $photo=$request->photo;
     $photoname=time().'.'.$photo->getClientoriginalExtension();
     $request->photo->move('itemimage',$photoname);
     $item->photo=$photoname;

     $item->price=$request->price;
     $item->save();
     return redirect()->back()->with('massage','Item Added Successfuly');
    }

    public function sell_item(Request $request)
    {
     $sell=new sell;
     $type = $request->type;
     $id = $request->id;
     $quantity = $request->quantity;

     if($type =='unity'){
     $sum= 1 * $quantity;
     }
     else{
     $sum= 12 * $quantity;
     }  
     $data=item::find($id);

     $data->quantity= $data->quantity - $sum;
     $sell->name=$request->name;
     $sell->type=$type;
     $sell->quantity=$quantity;

     $sell->save();
     $data->save();
     return redirect()->back()->with('massage','Item sold Successfuly');
    }

}
