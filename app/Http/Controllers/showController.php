<?php

namespace App\Http\Controllers;
use App\Models\Show;
use Illuminate\Http\Request;
class showController extends Controller
{
    public function index($slug)
    {
    $show = Show::where('slug', $slug)->firstOrFail();
    return view('events.show', compact('show'));
    }
}
