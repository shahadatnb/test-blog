<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Validator;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(2);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'=>'required'
            ));

        $post = new Post;
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body=$request->body;

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success','The Blog Post was Successfully Save');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=category::all();
        $cats=array();
        foreach ($categories as $category) {
            $cats[$category->id]= $category->name;
        }
        $tags=Tag::All();
        $tags2=array();
        foreach ($tags as $tag) {
            $tags2[$tag->id]=$tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255',
            'body'=>'required'
            ));
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->slug=$request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->body=$request->input('body');
        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }

        Session::flash('success', 'Post Seccessfully Updated');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success','Post was Successfully Deleded');
        return redirect()->route('posts.index');
    }
}
