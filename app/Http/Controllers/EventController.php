<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
       return view('dasboard.event.index',compact('events'));
    }
    public function create()
    {
        return view ('dasboard.event.index');
    }
    public function store(Request $request){
        $validate=$request ->validate([
            'title' =>"required",
            'deskripsi' => "required",
            'harga'=>"numeric|required",
            'kategori'=>"required | in:musik,seni,olahraga,film,wisata",
            'image'=> "nullable|image|mimes:png,jpg",
        ]);
        $imagepath = "image/Komodo.jpg";
        if($request->hasFile('image')){
            $imagepath = $request->file('image')->store('image',"public");
        }
        $validate["image"] = $imagepath;
        $validate["creator_id"] = Auth::user()->id ;
        Event::create($validate);
        
        return redirect () -> route('home');
    }
}
