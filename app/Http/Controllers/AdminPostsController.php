<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest; //dodao

use App\Http\Requests;

use App\Post;  //dodao
use App\Photo;  //dodao
use App\Category;
use Illuminate\Support\Facades\Auth;  //dodao

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
          }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::lists('name','id')->all();

        return view('admin.posts.create', compact('category'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user(); // dobavljanje usera;

            if($file = $request->file('photo_id')){

                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['file'=>$name]);

                $input['photo_id'] = $photo->id;
            }

        $user->posts()->create($input);  //veze sa post User Modelu, user dobio POST_ID

        return redirect('/admin/posts');
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
         return view('admin.posts.edit');  
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
