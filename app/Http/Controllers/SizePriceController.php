<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\sizeprice;
use Illuminate\Http\Request;

class SizePriceController extends Controller
{

    public function index(){
        $sizeprices = sizeprice::all();
        return view('all_sizes_prices', compact('sizeprices'));
        
    }

    public function size_price_all(){
        $sizeprices = sizeprice::all();
        return view('dashboard', compact('sizeprices'));
        
    }

    public function viewForm(){
        $sizeprices = sizeprice::all();
        return view('sizes_prices', ['sizeprices' => $sizeprices]);

    }

    public function store(Request $request){
        
        $validated = $request -> validate([
            'pizza_size' => 'required|max:225|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+$/',
            'pizza_price' => 'required|max:225|regex:/^[0-9]+$/',

        ]);

        sizeprice::create([
            'pizza_size' => request('pizza_size'),
            'pizza_price' => request('pizza_price'),
        ]);

        return redirect('/sizes_prices')->with('message_sizes_prices_add', 'You have successfully added!');
    }

    public function editForm($id){
        $sizeprices = sizeprice::where('id', $id)->firstOrFail();

        return view('edit_sizes_prices', compact("sizeprices"));
    }
    public function edit(Request $request, $id){

         $validated = $request -> validate([
            'pizza_size' => 'required|max:225|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+$/',
            'pizza_price' => 'required|max:225|regex:/^[0-9]+$/',
    
         ]);
         
        $sizeprices = sizeprice::where('id', $id)->firstOrFail();

        $sizeprices->pizza_size = request('pizza_size');
        $sizeprices->pizza_price = request('pizza_price');
        $sizeprices->save();

        return redirect('/all_sizes_prices')->with('message_sizes_prices_edit', 'You have edited successfully!');
    }

    public function removeForm($id){
        $sizeprices = sizeprice::where('id', $id)->firstOrFail(); 

        return view('remove_sizes_prices]',compact("sizeprices"));
    }
    public function remove($id){
        $sizeprices = sizeprice::where('id', $id)->firstOrFail();
        $sizeprices->delete();

        return redirect('/all_sizes_prices')->with('message_sizes_prices_delete', 'You have delete successfully!');
    }
}
