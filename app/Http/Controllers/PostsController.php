<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tags;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        if($category->count()==0)
        {
            return redirect()->route('category.create');
        }
        return view('admin.posts.create')->with('category',Category::all())->with('tags',Tags::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request->tags);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'featured'=>'required|image'
        ]);

        $featuerd = $request->featured;

        $featuerd_new_name = time().$featuerd->getClientOriginalName();

        $featuerd->move('uploads/posts',$featuerd_new_name);

        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'featured'=>'uploads/posts/' . $featuerd_new_name,
            'slug'=>str_slug($request->title)
        ]);
        
        $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('posts',$post)->with('category',Category::all())
        ->with('tags',Tags::all());
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
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featuerd_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featuerd_new_name);
            $post->featured ='uploads/posts/'.$featuerd_new_name;

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back();
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('admin.posts.trash')->with('posts',$trashed);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        return redirect()->back();
    }
}
