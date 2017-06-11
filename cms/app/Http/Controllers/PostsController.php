<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
        public function index()
        {
            $posts = Post::all();
            return view('posts.index', compact('posts'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save to database
        Post::create($request->all());

        return redirect('/posts');


        //save to database example 2
//        $input = $request->all();
//        $input['title'] = $request->title;
//        Post::create($request->all());

        //save to database example 3
//        $post = new Post;
//        $post->title = $request->title;
//        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return string
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->delete();
        return redirect('/posts');
    }

    public function home(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function solutions(){
        return view('solutions');
    }

    public function contact(){
        return view('contact');
    }

    public function welcome(){
        return view('welcome');
    }

    public function show_post($id, $name, $password){
        return view('post', compact('id', 'name','password'));
    }

    public function sample(){
        $people = ['Mike', 'Tina', 'Buster', 'Rocky', 'Shrek', 'Dusty'];
        return view('sample', compact('people'));
    }


}
