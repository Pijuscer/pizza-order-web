<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Order;
use App\Models\pizza;
use App\Models\SizePrice;
use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        if(auth()->user()->roles!=0){
            $orders = order::all();

        }
        else{
            $orders = order::where("user_id", auth()->user()->id)->get();
        }
            $users = User::all();
            $pizzas = pizza::all();
            $sizeprices = SizePrice::all();
            $attachments = Attachment::all();  

        return view('orders', compact('orders', 'users', 'pizzas', 'sizeprices', 'attachments'));
        
    }

    public function store(Request $request){
        if(!auth()->user()->id){
            return redirect("/login");
        }
        
        $validated = $request -> validate([
            'pizza_id' => 'required|max:225|',
            'pizza_size' => 'required|max:225|',
            'pizza_attachments_id'=> 'max:225',
        
            

        ]);
        $sizes=SizePrice::all();
       

        $price=0;
        $sizeprice = SizePrice::select("pizza_price")->where("id", request("pizza_size"))->first();
        $price=$sizeprice->pizza_price;
        if ((request("pizza_attachments_id")) !=null)
        {
            $price+=1.0;  
        }
       foreach($request->pizza_attachments_id as $attachment){
        Order::create([
            'user_id' => auth()->user()->id,
            'pizza_id' => request('pizza_id'),
            'pizza_size_price_id' => request('pizza_size'),
            'pizza_attachments_id' => $attachment,
            'price' => $price,

        ]);
       }


        return redirect('/dashboard')->with('message_orders_add', 'You have successfully added!');
    }

}
