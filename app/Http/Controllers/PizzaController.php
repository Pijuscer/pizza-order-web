<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pizza;
use App\Models\sizeprice;
use App\Models\attachment;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = pizza::all();
        return view('all_pizzas', compact('pizzas'));
        
    }

    public function pizzaAll(){
        $pizzas = pizza::all();
        $sizeprices = sizeprice::all();
        $attachments = attachment::all();
        return view('dashboard', compact('pizzas', 'sizeprices', 'attachments'));
        
    }

    public function viewForm(){
        $pizzas = pizza::all();
        return view('pizzas', ['pizzas' => $pizzas]);

    }

    public function store(Request $request){
        
        $validated = $request -> validate([
            'pizza_name' => 'required|max:225|',
            'pizza_ingredients' => 'required|max:225|',
            'pizza_foto' => 'required|image|',

        ]);

        $pizzas = $request->file('pizza_foto')->store('pizza_foto', 'public');

        pizza::create([
            'pizza_name' => request('pizza_name'),
            'pizza_ingredients' => request('pizza_ingredients'),
            'pizza_foto' => $pizzas
        ]);

        return redirect('/pizzas')->with('message_pizzas_add', 'You have successfully added!');
    }

    public function editForm($id){
        $pizzas = pizza::where('id', $id)->firstOrFail();

        return view('edit_pizzas', compact("pizzas"));
    }
    public function edit(Request $request, $id){

         $validated = $request -> validate([
            'pizza_name' => 'required|max:225|',
            'pizza_ingredients' => 'required|max:225|',
            'pizza_foto' => 'required|image|',
    
         ]);
         
        $pizzas = pizza::where('id', $id)->firstOrFail();

        $pizzas->pizza_name = request('pizza_name');
        $pizzas->pizza_ingredients = request('pizza_ingredients');
        $pizzas->pizza_foto = request('pizza_foto');
        $pizzas->save();

        return redirect('/all_pizzas')->with('message_pizzas_edit', 'You have edited successfully!');
    }

    public function removeForm($id){
        $pizzas = pizza::where('id', $id)->firstOrFail();

        return view('remove_pizzas]',compact("pizzas"));
    }
    public function remove($id){
        $pizzas = pizza::where('id', $id)->firstOrFail();
        $pizzas->delete();

        return redirect('/all_pizzas')->with('message_pizzas_delete', 'You have delete successfully!');
    }
}
