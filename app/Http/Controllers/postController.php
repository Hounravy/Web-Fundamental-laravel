<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\tag;
use App\Models\category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    
    public function post()
    {
        $posts = post::all();
        return view('system-test.post.index', ['posts'=>$posts]);
    }

    public function create()
    {
        $categories = category::all();
        $tags = tag::all();
        return view('system-test.post.add_update', ['categories'=>$categories, 'tags'=> $tags]);
    }

    public function edit($id)
    {
        $posts = post::findOrFail($id);
        $categories = category::all();
        $tags = tag::all();
        return view('system-test.post.edit', ['posts' => $posts, 'categories'=>$categories, 'tags'=>$tags]);
        
    }

    public function store(Request $request)
    {
        
        DB::transaction(function () use($request){

            //validated
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
         
        ]);
        $fileName=time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath= $request->file('thumbnail')->storeAs(
            'uploads',
            $fileName,
            'public'
        );

            $post = new post();
        $post->user_id=auth()->id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumnail = $filePath;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        });

        

        return redirect()->route('system-test.post.index');
    }

    public function update(Request $request, $id)
    {
       
        //validated
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
         
        ]);
        

        $post = post::findOrFail($id);
        $post->user_id=auth()->id();
        $post->title = $request->title;
        $post->content = $request->content;
        
        $post->category_id = $request->category_id;
        if($request->hasFile('thumbnail'))
        {
            $fileName=time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath= $request->file('thumbnail')->storeAs(
            'uploads',
            $fileName,
            'public'
        );
        }
        else
        {
            $filePath = $request->cur_pic;
        }
        
        $post->thumnail = $filePath;
        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->route('system-test.post.index');
    }

    public function destroy(Request $request, $id)
    {
        $posts = post::findOrFail($id);
        $posts->delete();
        return redirect()->route('system-test.post.index');
    }

    //article

    public function article($id)
    {
        $posts = post::findOrFail($id);
        return view('system-test.article', ['posts'=>$posts]);
    }

}
