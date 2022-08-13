<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use App\Models\PhotoGallery;
use App\Models\Service;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index(){
        $photos = PhotoGallery::all()->take(6);
        $slides = Slide::all();
        $details = AboutContent::all()->take(1);
        return view('frontend.home.index',[
            'photos' => $photos,
            'slides' => $slides,
            'details' => $details

        ]);
    }

    public function contact(){
        return view('frontend.contact.index');
    }

    public function saveContacts(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return back()->with('message','Your query is store successfully');
    }
    public function contactList(){
        $contacts = Contact::all();
        return view('admin.contact.contact', compact('contacts'));
    }

    public function contactListRemove($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return back();

    }

}
