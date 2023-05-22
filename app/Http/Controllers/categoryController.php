<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class categoryController extends Controller
{
    public function category()
    {
        $categories = category::all();
        return view('system-test.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('system-test.category.add_update');
    }

    public function edit($id)
    {
        $categories = category::findOrFail($id);
        return view('system-test.category.edit', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        //validated
        $validated = $request->validate([
            'name' => 'required|max:255',
         
        ]);

        $categories = new category();
        $categories->name = $request->name;
        $categories->save();

        return redirect()->route('system-test.category.index');
    }

    public function update(Request $request, $id)
    {
        $categories = category::findOrFail($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('system-test.category.index');
    }

    public function destroy(Request $request, $id)
    {
        $categories = category::findOrFail($id);
        $categories->delete();
        return redirect()->route('system-test.category.index');
    }

}
