<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index(){
        $attachments = attachment::all();
        return view('all_attachments', compact('attachments'));
        
    }

    public function attachments_all(){
        $attachments = attachment::all();
        return view('dashboard', compact('attachments'));
        
    }

    public function viewForm(){
        $attachments = attachment::all();
        return view('attachments', ['attachments' => $attachments]);

    }

    public function store(Request $request){
        
        $validated = $request -> validate([
            'attachment_name' => 'required|max:225|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+$/',
            'attachment_price' => 'required|max:225|regex:/^[0-9]+$/',

        ]);

        attachment::create([
            'attachment_name' => request('attachment_name'),
            'attachment_price' => request('attachment_price'),
        ]);

        return redirect('/attachments')->with('message_attachments_add', 'You have successfully added!');
    }

    public function editForm($id){
        $attachments = attachment::where('id', $id)->firstOrFail();

        return view('edit_attachments', compact("attachments"));
    }
    public function edit(Request $request, $id){

         $validated = $request -> validate([
            'attachment_name' => 'required|max:225|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+$/',
            'attachment_price' => 'required|max:225|regex:/^[0-9]+$/',
    
         ]);
         
        $attachments = attachment::where('id', $id)->firstOrFail();

        $attachments->attachment_name = request('attachment_name');
        $attachments->attachment_price = request('attachment_price');
        $attachments->save();

        return redirect('/all_attachments')->with('message_attachments_edit', 'You have edited successfully!');
    }

    public function removeForm($id){
        $attachments = attachment::where('id', $id)->firstOrFail(); 

        return view('remove_attachments]',compact("attachment"));
    }
    public function remove($id){
        $attachments = attachment::where('id', $id)->firstOrFail();
        $attachments->delete();

        return redirect('/all_attachments')->with('message_attachments_delete', 'You have delete successfully!');
    }
}
