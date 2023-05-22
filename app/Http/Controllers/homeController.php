<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class homeController extends Controller
{
  public function index()
  {
    $posts = post::all();
    return view('system-test.index', ['posts'=>$posts]);
  }
}
