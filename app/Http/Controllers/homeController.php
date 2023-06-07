<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;


class homeController extends Controller
{
  public function index(Request $request)
  {
    $posts = post::when($request->category_id, function ($query, $category_id) {
      $query->where('category_id', $category_id);
  })
  ->when($request->search, function ($query, $search) {
    $query->where('title', 'LIKE', '%'.$search.'%');
})
  ->when($request->tag_id, function ($query, $tag_id) {
    $query->whereHas('tags', function ($tag_query) use($tag_id) {
      $tag_query->where('id', $tag_id);
    });
  })
     ->paginate(2)
     ->withQueryString();
    return view('system-test.index', ['posts'=>$posts]);
  }
}
