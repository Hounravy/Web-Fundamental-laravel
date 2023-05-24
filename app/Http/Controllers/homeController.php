<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\tag;
use App\Models\category;

class homeController extends Controller
{
  public function index()
  {
    $posts = post::paginate(3);
    $categories = category::all();
    $tags = tag::all();
    return view('system-test.index', ['posts'=>$posts, 'nav_category'=>$categories, 'site_tage'=>$tags]);
  }
}
