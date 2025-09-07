<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request){

        $request->validate([
            'title'=>'required|string',
            'body'=>'required|string',
            'link_title'=>'required|string',
            'link_address'=>'required|string'
        ]);
        Slider::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'link_title'=>$request->link_title,
            'link_address'=>$request->link_address
        ]);
        dd('Done!');
    }
}
