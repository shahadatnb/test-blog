<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PageController extends Controller
{
    public function getIndex(){
    	$posts=Post::orderby('created_at','desc')->limit(4)->get();
    	return view('welcome')->withPosts($posts);
    }

    public function getAbout()
    {
    	return view('about');
    }
}
