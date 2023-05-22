<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tag;
use Illuminate\Support\Facades\Route;

class tagController extends Controller
{
    public function tag()
    {
        $tags = tag::all();
        return view('system-test.tag.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('system-test.tag.add_update');
    }

    public function edit($id)
    {
        $tags = tag::findOrFail($id);
        return view('system-test.tag.edit', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        //validated
        $validated = $request->validate([
            'name' => 'required|max:255',
         
        ]);

        $tag = new tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('system-test.tag.index');
    }

    public function update(Request $request, $id)
    {
        $tags = tag::findOrFail($id);
        $tags->name = $request->name;
        $tags->save();
        return redirect()->route('system-test.tag.index');
    }

    public function destroy(Request $request, $id)
    {
        $tags = tag::findOrFail($id);
        $tags->delete();
        return redirect()->route('system-test.tag.index');
    }

}
