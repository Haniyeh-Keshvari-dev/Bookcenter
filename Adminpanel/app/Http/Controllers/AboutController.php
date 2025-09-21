<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $item = About::first();
        return view('about.index',compact('item'));
    }

    public function edit(About $about)
    {
        return view('about.edit',compact('about'));
    }
    public function update(Request $request, About $about)
    {

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'link' => 'required|string',
        ]);
        $about->update([
            'title' => $request->title,
            'body' => $request->body,
            'link' => $request->link
        ]);

        return redirect()->route('about.index')->with('success','درباره ما با موفقیت ویرایش شد');

    }


}
