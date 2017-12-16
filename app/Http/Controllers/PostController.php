<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(3);
       // return view('posts.index');
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();

        return view('posts.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. validate the data from request
        $this->validate($request, array(
                'title'=>'required|max:255',
                'slug'=>'required|min:5|max:255|alpha_dash|unique:posts,slug',
                'category_id'=>'required|integer',
                'body'=>'required'
            ));
        //2. store the data
        $post= new Post;
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->get('category_id'); //no diff in using get
        $post->body=$request->body;
        $post->save();

        Session::flash('success','The blog was successfully posted');
        //3. redirect to another page
        return redirect()->route('posts.show', $post->id);
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

        return view('posts.show', ['post'=>$post]);
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
        $categories=Category::all();
        return view('posts.edit', ['post'=>$post,
                                   'categories'=>$categories]);
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
         $post=Post::find($id);
         /* while editing post , if slug is not changed then it violets the unique index so if is used to solve this problem. bcoz laravel unique validation compares the slug field with all slug column values, which in turn produces error. refer part 25 1/2 from devmarketer youtube channel for this*/
        if( $request->input('slug')==$post->slug )
        {
            $this->validate($request, [
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255',
                'category_id'=>'required|integer',
                'body'=>'required'
                 ]);
        }
        else
        {
            $this->validate($request, [
                'title'=>'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'=>'required|integer',
                'body'=>'required'
                 ]);     
         }

        
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->get('category_id');
        $post->body=$request->body;
        $post->save();

        Session::flash('success','well done! The post was succesfully edited');
        return redirect()->route('posts.show', $id);
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
        $post->delete();
        Session::flash('success','The post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
